<?php
namespace Craft;

require craft()->path->getPluginsPath().'elementapi/vendor/autoload.php';

use League\Fractal\TransformerAbstract;

class UniversalTransformer extends TransformerAbstract
{
    private $depth;

    public function transform(EntryModel $entry)
    {
        $this->depth = 0;
        $data = $this->EntryTransformer($entry);
        $data['type'] = $entry->type->handle;
        $data['editLink'] = "http://craft.horseman.io/admin/entries/{$entry->section->handle}/{$entry->id}-{$entry->slug}";
        $fieldData =  $this->BaseObjectTransform($entry);
        return array_merge($data,$fieldData);
    }

    public function BaseObjectTransform($object)
    {
        //Get fields for object
        if(isset($object->type)){
            $fieldLayout = $object->type->getFieldLayout();
        }else{
            //Some Base Objects don't have types
            $fieldLayout = $object->getFieldLayout();
        }
        $tabs = $fieldLayout->getTabs();
        $fields = [];
        //Flatten fields to one array
        foreach($tabs as $tab){
            $fields = array_merge($fields,$tab->getFields());
        }
        //Begin processing Data
        $fieldData = [];
        foreach($fields as $fieldContainer){
            $field = $fieldContainer->field;
            $fieldData[$field->handle] = [
                "type" => $field->type,
                "settings" => $field->settings,
                "data" => $object[$field->handle],
            ];
        }
        //Assemble Data
        $data = [];
        foreach($fieldData as $handle => $field){
            $data[$handle] = false;
            if(!is_null($field['data'])){
                $transformerName = $field['type'] . "Transformer";
                //Determin if this is type Element Criteria
                if(gettype($field['data']) == "object"){
                    if(get_class($field['data']) == "Craft\ElementCriteriaModel"){
                        $transformerName = "ElementsCriteriaTransformer";
                    }
                }
                $data[$handle] = $this->$transformerName($field['data'],$field['settings']);
            }

        }
        return $data;
    }


    public function AssetTransformer($data){
        //For now just return url
        return "http://craft.horseman.io{$data->url}"; 
    }
    public function CategoryTransformer($data){
        return $data;
    }
    public function PlainTextTransformer($data, Array $settings){
        return $data;
    }
    public function DateTransformer(DateTime $data, Array $settings){
        //var_dump($data);
        //var_dump($settings);
        //die;
    }
    public function RichTextTransformer(RichTextData $data, Array $settings){
        return $data->getParsedContent();
    }
    public function DropdownTransformer(SingleOptionFieldData $data, Array $settings){
        if(!$data->selected){
            return false;
        }
        return [
            "value" => $data->value,
            "label" => $data->label,
        ];
    }
    public function TableTransformer($data){
        return $data;
    }

    public function NumberTransformer($data){
        return $data;
    }

    public function LightswitchTransformer($data){
        return $data;
    }

    public function UserTransformer(UserModel $user){
        $baseUserData = [
            "fullName" => $user->fullName,
            "firstName" => $user->firstName,
            "lastName" => $user->lastName
        ];
        $data = $this->BaseObjectTransform($user);
        $data['editLink'] = "http://craft.horseman.io/admin/users/{$user->id}";
        $data = array_merge($baseUserData,$data);
        return $data;
    }
    public function TagTransformer(TagModel $data){
        return $data->title;
    }
    //Different than the initial entry point since we don't want to go all the way down an infinite rabbit hole. Purposely leave it at the basics
    public function EntryTransformer(EntryModel $entry){
        $data =  [
            'id' => $entry->id,
            'slug' => $entry->slug,
            'title' => $entry->title,
            'url' => $entry->getUrl(),
        ];
        $data['type'] = $entry->type->handle;
        $data['editLink'] = "http://craft.horseman.io/admin/entries/{$entry->section->handle}/{$entry->id}-{$entry->slug}";

        // Have to prevent infinite recurssion.
        // 2 Seems like a good default
        if($this->depth > 2){
            return $data;
        }

        // Increment here as this code my call itself eventually
        $this->depth++;
        $data = array_merge($data,$this->BaseObjectTransform($entry));
        // Reset since this is run for each field
        $this->depth--;
        return $data;
    }
    public function MatrixBlockTransformer(MatrixBlockModel $block){
        $data = [];
        $data['type'] = $block->type->handle;
        $blockData =  $this->BaseObjectTransform($block);
        //Manipulate Content Blocks
        $data = array_merge($data,$blockData);
        $data = $this->parseContentBlock($data);
        return $data;
    }

    public function ElementsCriteriaTransformer(ElementCriteriaModel $elements, Array $settings){

        $singleEntry = false;
        if(isset($settings['limit']) && $settings['limit'] == 1){
            $singleEntry = true;
        }

        $data = [];
        foreach($elements as $element){
            $type = $element->elementType;
            $transformer = $type . "Transformer";
            $data[] = $this->$transformer($element);
        }
        
        //Parse Groups first, then sections since groups can be in sections, but not vice versa
        $data = $this->parseGroups($data);
        $data = $this->parseSections($data);

        if(count($data) < 1){
            return false;
        }
        if($singleEntry){
            return $data[0];
        }
        return $data;
    }

    public function parseCriteria($queryString,$entry)
    {

    }

    public function parseGroups(Array $data)
    {
        //Check if Groups were used, replay them to combine
        $groupsData = [];
        $isGroup = false;
        foreach($data as $key => $datum){
            if(!isset($datum['type'])){
                continue;
            };
            if($datum['type'] == "groupStart"){
                $isGroup  = true;
            }
            if($isGroup){
                $groupData[] = $datum;
                unset($data[$key]);
            }
            if($datum['type'] == "groupEnd"){
                //Strip the first and last items off, since it's meta
                $meta = array_merge(array_pop($groupData),array_shift($groupData));
                $meta["displayModule"] = $meta["displayModule"][0]["slug"];
                $bgColor = $meta['backgroundColor']['value'];
                $isConstrained = $meta['constrainWidth'] > 0;
                unset($meta['type']);
                unset($meta['constrainWidth']);
                unset($meta['backgroundColor']);

                $group = [
                    "type" => "group",
                    "meta" => $meta,
                    "data" => $groupData,
                    "bgColor" => $bgColor,
                    "isConstrained" => $isConstrained,
                ];
                $data[$key] = $group;
                //Make sure everything is in proper order
                ksort($data);

                $groupData = [];
                $isGroup = false;
            }
        } 
        //reset indexes so transformer doesn't include indexes
        $data = array_values($data);
        return $data;

    }

    public function parseSections(Array $data)
    {

        //Check if Sections were used, replay them to combine
        $sectionData = [];
        $isSection = false;
        foreach($data as $key => $datum){
            if(!isset($datum['type'])){
                continue;
            };
            if($datum['type'] == "sectionStart"){
                $isSection = true;
            }
            if($isSection){
                $sectionData[] = $datum;
                unset($data[$key]);
            }
            if($datum['type'] == "sectionEnd"){
                //Strip the first and last items off, since it's meta
                $meta = array_merge(array_pop($sectionData),array_shift($sectionData));
                $bgColor = $meta['backgroundColor']['value'];
                $isConstrained = $meta['constrainWidth'] > 0;
                unset($meta['type']);
                unset($meta['constrainWidth']);
                unset($meta['backgroundColor']);

                $section = [
                    "type" => "section",
                    "meta" => $meta,
                    "data" => $sectionData,
                    "bgColor" => $bgColor,
                    "isConstrained" => $isConstrained,
                ];
                $data[$key] = $section;
                //Make sure everything is in proper order
                ksort($data);
                $sectionData = [];
                $isSection = false;
            }
        } 
        //reset indexes so transformer doesn't include indexes
        $data = array_values($data);
        return $data;
    }

    public function parseContentBlock(Array $block){
        if($block['type'] == "contentBlock"){
            $content = $block['contentPieces'];
            $module = $block['displayModule']['slug'];
            $isConstrained = $block['constrainWidth'] > 0;
            $block = [
                "type" => "component",
                "component" => $module,
                "content" => $content,
                "bgColor" => $block['backgroundColor']['value'],
                "isConstrained" => $isConstrained,
            ];
        } 
        return $block;
    }
}

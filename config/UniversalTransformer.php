<?php
namespace Craft;

require craft()->path->getPluginsPath().'elementapi/vendor/autoload.php';

use League\Fractal\TransformerAbstract;

class UniversalTransformer extends TransformerAbstract
{
    public function transform(EntryModel $entry)
    {
        $data = $this->EntryTransformer($entry);
        $data['type'] = $entry->type->handle;
        $fieldData =  $this->BaseObjectTransform($entry);
        return array_merge($data,$fieldData);
    }

    public function BaseObjectTransform($object)
    {
        //Get fields for object
        $fieldLayout = $object->type->getFieldLayout();
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
            //var_dump($field);
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


    public function PlainTextTransformer($data, Array $settings){
        return $data;
    }
    public function RichTextTransformer(RichTextData $data, Array $settings){
        return $data->getParsedContent();
    }

    public function TagTransformer(TagModel $data){
        return $data->title;
    }
    //Different than the initial entry point since we don't want to go all the way down an infinite rabbit hole. Purposely leave it at the basics
    public function EntryTransformer(EntryModel $entry){
        return [
            'id' => $entry->id,
            'slug' => $entry->slug,
            'title' => $entry->title,
            'url' => $entry->getUrl(),
        ];
    }
    public function MatrixBlockTransformer(MatrixBlockModel $block){
        $data = [];
        $data['type'] = $block->type->handle;
        $blockData =  $this->BaseObjectTransform($block);
        return array_merge($data,$blockData);
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
}

<?php
namespace Craft;

require craft()->path->getPluginsPath().'elementapi/vendor/autoload.php';

use League\Fractal\TransformerAbstract;

class EndpointTransformer  extends TransformerAbstract
{
    public function transform(EntryModel $entry)
    {
        //Load $endpoints
        require craft()->path->getConfigPath().'elements/elements.php';
        $endpointData = [];
        foreach($endpoints as $endpoint => $transform){
            $info = $transform("slug");
            $data =[
                "endpoint" => $endpoint,
            ];
            $data = array_merge($data,$info);
            $endpointData[] = $data;
        }
        return $endpointData;
    }

}

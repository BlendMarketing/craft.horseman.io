<?php
namespace Craft;

//Load $endpoints
require craft()->path->getConfigPath().'elements.php';

$endpointEndpoint = [
    "api/endpoints.json" => function() use ($enpoints) {
        require craft()->path->getConfigPath().'EndpointTransformer.php';
        return [
            "first" => true,
            "transformer" => 'Craft\EndpointTransformer',
        ];
    }
];

$finalEndpoints =  array_merge($endpoints,$endpointEndpoint);
return [
    "defaults" => [
        "elementsPerPage" => 10,
        "elementType" => "Entry",
    ],
    "endpoints" => $finalEndpoints,
    ];

    die;

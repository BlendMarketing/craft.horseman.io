<?php
namespace Craft;


HeaderHelper::setHeader([
    "Access-Control-Allow-Origin" => "*",
	"Content-Type" => "application/json",
    "Access-Control-Allow-Credentials" => "true",
]);

//Load $endpoints
require craft()->path->getConfigPath().'elements/elements.php';

$endpointEndpoint = [
    "api/endpoints.json" => function() use ($enpoints) {
        require craft()->path->getConfigPath().'elements/EndpointTransformer.php';
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

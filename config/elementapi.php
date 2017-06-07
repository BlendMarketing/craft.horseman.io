<?php
namespace Craft;

return [
    "defaults" => [
        "elementsPerPage" => 10,
        "elementType" => "Entry",
    ],
    "endpoints" => [
        "<section:{slug}>.json" => function($section) use ($transformerEntrypoint) {
            require craft()->path->getConfigPath().'UniversalTransformer.php';
            return [
                "criteria" => [
                    "section" => $section,
                ],
                "transformer" => 'Craft\UniversalTransformer',
            ];
        },
        ]
    ];

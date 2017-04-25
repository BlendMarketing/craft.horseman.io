<?php
namespace Craft;

$componentTransformer = function(EntryModel $entry) {

    $authors = [];
    $components = [];
    foreach ($entry->authors as $author) {
        $authors[] = $author->title;
    }

    foreach ($entry->components as $block) {
        $blockValues = [];
        $fieldList = $block->getFieldLayout()->getFields();
        foreach ($fieldList as $field) {
            $handle = $field->getField()->handle;
            $blockValues[$handle] = $block->{$handle};
        }
        $components[] = $blockValues;
    }

    return [
        "title" => $entry->title,
        "id" => $entry->id,
        "authors" => $authors,
        "components" => $components,
    ];
};


return [
    "defaults" => [
        "elementsPerPage" => 10,
        "elementType" => "Entry",
    ],
    "endpoints" => [
        "components.json" => function() use ($componentTransformer) {
            HeaderHelper::setHeader([
                "Access-Control-Allow-Origin" => "http://horseman.dev"
            ]);
            return [
                "criteria" => [
                    "section" => "components",
                ],
                "transformer" => $componentTransformer,
            ];
        },
        "components/<slug:{slug}>.json" => function($slug) use ($componentTransformer) {

            HeaderHelper::setHeader([
                "Access-Control-Allow-Origin" => "http://horseman.dev"
            ]);


            return [
                "criteria" => [
                    "section" => "components",
                    "slug" => $slug,
                ],
                "paginate" => false,
                "first" => true,
                "transformer" => $componentTransformer,
            ];
        },
    ]
];

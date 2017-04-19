<?php
namespace Craft;

return [
    "defaults" => [
        "elementsPerPage" => 10,
        "elementType" => "Entry",
    ],
    "endpoints" => [
        "components/<slug:{slug}>.json" => function($slug){

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
                "transformer" => function(EntryModel $entry) {

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
                },
            ];
        },
    ]
];

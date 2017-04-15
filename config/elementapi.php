<?php
namespace Craft;

return [
    'defaults' => [
        'elementsPerPage' => 10,
        'elementType' => 'Entry',
    ],
    'endpoints' => [
        craft()->request->path => function(){
            $segments = craft()->request->getSegments();
            $slug = preg_replace("/.json/", "", $segments[count($segments) - 1]);
            return [
                'criteria' => [
                    'section' => "pages",
                    'slug' => $slug,
                ],
                'paginate' => false,
                'first' => true,
                'transformer' => function(EntryModel $entry) {
                    return [
                        'title' => $entry->title,
                        'id' => $entry->id,
                    ];
                },
            ];
        },
    ]
];

<?php
namespace Craft;

return [
    'defaults' => [
        'elementsPerPage' => 10,
        'elementType' => 'Entry',
    ],
    'endpoints' => [
        craft()->request->path => function(){
            HeaderHelper::setHeader([
                'Access-Control-Allow-Origin' => 'http://horseman.dev'
            ]);

            $segments = craft()->request->getSegments();
            $slug = $segments[count($segments) - 1];
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
                        'body' => $entry->body ? $entry->body->getParsedContent() : "",
                    ];
                },
            ];
        },
    ]
];

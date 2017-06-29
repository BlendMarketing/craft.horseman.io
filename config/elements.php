<?php

namespace Craft;

$endpoints = [
    "<section:{slug}>/<slug:{slug}>.json" => function($section,$slug) {
        require craft()->path->getConfigPath().'UniversalTransformer.php';
        return [
            "description" => "This is a universal transformer. Just enter the channel slug",
            "criteria" => [
                "section" => $section,
                "slug" => $slug,
            ],
            "first" => true,
            "transformer" => 'Craft\UniversalTransformer',
        ];
    },
    "<section:{slug}>.json" => function($section) {
        require craft()->path->getConfigPath().'UniversalTransformer.php';
        return [
            "description" => "This is a universal transformer. Just enter the channel slug",
            "criteria" => [
                "section" => $section,
            ],
            "transformer" => 'Craft\UniversalTransformer',
        ];
    },
];



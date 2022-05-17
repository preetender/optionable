<?php

return [
    'cache' => [
        'tag' => 'optionables',
        'ttl' => 60 * 60 * 24,
        'name' => 'option.%s',
        'support_tags' => env('OPTIONABLE_TAG_ENBALE', true)
    ],

    'option' => [
        'default_value' => false
    ]
];

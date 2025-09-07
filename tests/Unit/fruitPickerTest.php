<?php

require __DIR__ . "/../../src/helperFunctions/fruitPicker.php";

$mockData = $sampleData = [
    [
        "type" => "apple",
        "color" => "green",
        "weight" => 100
    ],
    [
        "type" => "apple",
        "color" => "red",
        "weight" => 80
    ],
    [
        "type" => "pear",
        "color" => "yellow",
        "weight" => 55
    ],
    [
        "type" => "apple",
        "color" => "yellow",
        "weight" => 120
    ]
];



test('Happy case', function () use ($mockData) {    
    $filters = [
        [
            "key" => "type",
            "operator" => "=",
            "value" => "apple"
        ],
        [
            "key" => "weight",
            "operator" => "<=",
            "value" => 110
        ]
    ];

    $result = fruitPicker($mockData, $filters);

    expect($result)->toBeArray();
    expect($result['type'])->toBe('apple');
    expect($result['color'])->toBe('green');
    expect($result['weight'])->toBe(100);
});



test('No valid items', function () use ($mockData) {    
    $filters = [
        [
            "key" => "type",
            "operator" => "=",
            "value" => "apple"
        ],
        [
            "key" => "color",
            "operator" => "=",
            "value" => "purple"
        ]
    ];
    
    $result = fruitPicker($mockData, $filters);
    
    expect($result)-> toBeNull();
});
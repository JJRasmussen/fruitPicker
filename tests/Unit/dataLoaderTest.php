<?php

require __DIR__ . "/../../src/helperFunctions/dataLoader.php";

test('Data fetching from json to assoc. array', function () {
    $data = dataLoader(__DIR__ . '/../../src/sampleData.json');
    
    expect($data)-> toBeArray();
    expect($data[0])->toHaveKeys(['type', 'color', 'weight']);
});

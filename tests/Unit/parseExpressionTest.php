<?php

require __DIR__ . "/../../src/helperFunctions/parseExpression.php";

test('Happy path turning string into assoc array of filters', function ()  {    
    $expression = 'type = apple';

    $parsedExpression = parseExpression($expression);

    expect($parsedExpression)->toBeArray();
    expect(count($parsedExpression))->toBe(1);
    expect($parsedExpression[0]['key'])->toBe('type');
    expect($parsedExpression[0]['operator'])->toBe('=');
    expect($parsedExpression[0]['value'])->toBe('apple');
});

test('Happy path with three key filters', function ()  {    
    $expression = 'type = pear and color = green and weight <= 110';

    $parsedExpression = parseExpression($expression);

    expect($parsedExpression)->toBeArray();
    expect($parsedExpression[0]['key'])->toBe('type');
    expect($parsedExpression[0]['operator'])->toBe('=');
    expect($parsedExpression[0]['value'])->toBe('pear');

    expect($parsedExpression[1]['key'])->toBe('color');
    expect($parsedExpression[1]['operator'])->toBe('=');
    expect($parsedExpression[1]['value'])->toBe('green');

    expect($parsedExpression[2]['key'])->toBe('weight');
    expect($parsedExpression[2]['operator'])->toBe('<=');
    expect($parsedExpression[2]['value'])->toBe(110);
});

test('Case insensitivity', function () {    
    $expression = 'TyPe = PeaR';
    
    $parsedExpression = parseExpression($expression);

    expect($parsedExpression)->toBeArray();
    expect($parsedExpression[0]['key'])->toBe('type');
    expect($parsedExpression[0]['value'])->toBe('pear');
});
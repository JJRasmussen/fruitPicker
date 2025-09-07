<?php 

function parseExpression($expression){
    $filters = [];

    $expressions = preg_split('/\s+and\s+/i', $expression);

    foreach ($expressions as $expression){
        $expression = trim($expression);

        if(preg_match('/^(\w+)\s*(=|<=|>=|<|>)\s*(.+)$/', $expression, $matches)){
            $key = $matches[1];
            $operator = $matches[2];
            $value = $matches[3];

            if(is_numeric($value)){
                $value = (int)$value;
            };

            $filters[] = [
                'key' => $key,
                'operator'  => $operator,
                'value' => $value
            ];
        };
    };


    return $filters;
    }
<?php

function matchFirst($fruits, $filters){
    
    foreach($fruits as $fruit){
        $match = true;

        foreach ($filters as $filter) {
            $key = $filter['key'];
            $operator = $filter['operator'];
            $value = $filter['value'];

            switch ($operator){
                case '=':
                    if ($fruit[$key] != $value) $match = false;
                    break;
                case '<':
                    if ($fruit[$key] >= $value) $match = false;
                    break;
                case '>':
                    if ($fruit[$key] <= $value) $match = false;
                    break;
                case '<=':
                    if ($fruit[$key] > $value) $match = false;
                    break;
                case '>=':
                    if ($fruit[$key] < $value) $match = false;
                    break;
                default:
                    $match = false;
            }
            if (!$match) break; 
        }
        if($match) {
            return $fruit;
        };
    };
    return null;
};
#!/usr/bin/env php
<?php
require "helperFunctions/dataLoader.php";
require "helperFunctions/parseExpression.php";
require "helperFunctions/matchFirst.php";

if ($argc != 2){
    echo "Missing expression \n";
    echo "Please format your command as: \n";
    echo "./fruitPicker.php '[key] ['operator'] ['value']\n";
    echo "A valid input is: ./fruitPicker.php 'type = apple and weight > 80 and color = green'\n";
    die();
};

//fetch json data from sampleData.json and convert it to an associative array
$data = dataLoader("sampleData.json");

//get expressions from command line
$expression = $argv[1];

//turn the expression string into an array of filters 
$filters = parseExpression($expression);


//TODO move to separate file and add tests
if (empty($filters)){
    echo "Invalid expression:\n";
    echo "Please use format like: 'type = apple and weight > 80'\n";
    die();
};

if (count($filters) > 3){
    echo "Too many requirements. \n";
    echo "Please limit yourself to type, color and weight";
    die();
};

//pick the first valid item from the data
$match = matchFirst($data, $filters); 

//TODO move final message to separate file and add tests
if ($match){
    echo "Here is your fruit: \n";
    print_r($match);
} else {
    echo "No matching fruit was found.\n";
};
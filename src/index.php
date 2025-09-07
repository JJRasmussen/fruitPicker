<?php
require "helperFunctions/dataLoader.php";
require "helperFunctions/dd.php";
require "helperFunctions/parseExpression.php";
//fetch json data from sampleData.json and convert it to an associative array
$data = dataLoader("sampleData.json");

$expression = "type = apple and weight = 110";

$expressions = parseExpression($expression);

dd($expressions);
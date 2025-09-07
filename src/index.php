<?php
require "helperFunctions/dataLoader.php";
require "helperFunctions/dd.php";

//fetch json data from sampleData.json and convert it to an associative array
$data = dataLoader("sampleData.json");

dd($data);
<?php 
function dataLoader($filepath)
    {
    $json = file_get_contents($filepath);
    return json_decode($json, true);
};
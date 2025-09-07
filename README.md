# fruitPicker.php

A CLI tool written to pick a fruit from a local json file of fruits.

The script has a main file "fruitPicker.php" which handles command line feedback and the required helper functions.

To run the script from the command line simply:
1. Make sure the main script is executable.
2. Run it with PHP adding expressions like
    - "type = apple and color = green"
    - "color = red and weight > 50"
    - "type = pear"

NOTE: quotation marks are required
An example of full command line argument is:

- php fruitPicker.php "color = yellow and type = pear"

## dataLoader()
Gets the content of the sample json data.
Returns it as an associative array

## parseExpression()
Splits the input string each time " and " is written.
Each expression is regex pattern matched for:

- First word as a key
- Operator
- Word or number as value

strings are turned to lower case.
numeric $values are switched to the int type.
The three matches are recorded as a filter.

## filter validation is performed.
If no filters were valid, or more than three filters were valid the script is terminated.

## matchFirst()
Each fruit is tested against each filter.
If the key, operator and value match, the fruit is returned.
If not the next fruit is tested.
If no fruit is valid null is returned.

## final message
if a match was found it is made human readable and returned.
If not "No match" is echoed.

# Tests
The main three functions were tested using Pest.

## dataLoaderTest.php
tests that JSON data is successfully loaded into an associative array with expected keys.

## matchFirst()
Happy path tested where filters match the first valid fruit.

Case where no fruit matches the filters and null is returned.

## parseExpression()
Happy path tested where a single expression is turned into key/operator/value filter.

Handles creation of multiple filters joined with " and ".

Tests case insensitivity.

## Tests to be added
- Type strictness.
- Integration test for the full CLI flow.
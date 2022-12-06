<?php

$file = file_get_contents('day5_input.txt');
$lines = explode("\n", $file);

// get the first 10 lines of lines
$stacks = array_slice($lines, 0, 8);

// parse stacks alphabetical characters only
$stacks = array_map(function ($stack) {
    return str_split(preg_replace('/[^A-Z]/', '', $stack));
}, $stacks);


// remove the first 10 elements from lines
$lines = array_slice($lines, 10);

// cycle over lines and extract numbers only into an array
$steps = array_map(function ($line) {
    // replace everything that is not a number with nothing and return an array of each char
    return array_merge(['move'], str_split(preg_replace('/[^0-9]/', '', $line)));
}, $lines);

// remove emtpy values from steps and stacks
$steps = array_filter($steps);
$stacks = array_filter($stacks);

// Loop through the rearrangement steps
foreach ($steps as $step) {
    // Extract the information from the current step
    list($action, $wat, $from, $to) = $step;
    
    // Move the specified number of crates from the source stack to the destination stack
    for ($i = 0; $i < $quantity; $i++) {
        
        // Remove the top crate from the source stack

        if (empty($stacks[$from - 1]) || empty($stacks[$to - 1])) {
            continue;
        }

        $crate = array_pop($stacks[$from - 1]);

        // Add the crate to the top of the destination stack
        array_push($stacks[$to - 1], $crate);
    }
}

// Loop through the stacks and build the result message
$message = '';
foreach ($stacks as $stack) {
    // Add the top crate of each stack to the message
    var_dump($stacks[$from - 1], $stacks[$to - 1]);

    $message .= array_pop($stack);
}

// Output the result
echo $message;
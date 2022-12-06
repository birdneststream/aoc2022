<?php

$file = file_get_contents('day5_input.txt');
$lines = explode("\n", $file);

// Gave up trying to parse this so I typed it manually like a noob
// Then i even got that wrong so had to reverse them. God damn elves.

//             [J] [Z] [G]
//             [Z] [T] [S] [P] [R]
// [R]         [Q] [V] [B] [G] [J]
// [W] [W]     [N] [L] [V] [W] [C]
// [F] [Q]     [T] [G] [C] [T] [T] [W]
// [H] [D] [W] [W] [H] [T] [R] [M] [B]
// [T] [G] [T] [R] [B] [P] [B] [G] [G]
// [S] [S] [B] [D] [F] [L] [Z] [N] [L]
//  1   2   3   4   5   6   7   8   9

$stacks = [
    ['R', 'W', 'F', 'H', 'T', 'S'],
    ['W', 'Q', 'D', 'G', 'S'],
    ['W', 'T', 'B'],
    ['J', 'Z', 'Q', 'N', 'T', 'W', 'R', 'D'],
    ['Z', 'T', 'V', 'L', 'G', 'H', 'B', 'F'],
    ['G', 'S', 'B', 'V', 'C', 'T', 'P', 'L'],
    ['P', 'G', 'W', 'T', 'R', 'B', 'Z'],
    ['R', 'J', 'C', 'T', 'M', 'G', 'N'],
    ['W', 'B', 'G', 'L']
];

// cycle over stacks and reverse the arrays
foreach ($stacks as $key => $stack) {
    $stacks[$key] = array_reverse($stack);
}

// remove the first 10 elements from lines
$lines = array_slice($lines, 10);

// cycle over lines and extract numbers only into an array
$steps = array_map(function ($line) {
    $elements = explode(" ", $line);
    return ['move', $elements[1], $elements[3], $elements[5]];
}, $lines);

// Loop through the rearrangement steps
foreach ($steps as $index => $step) {
    // Extract the information from the current step
    list($action, $quantity, $from, $to) = $step;

    // Move the specified number of crates from the source stack to the destination stack
    for ($i = 0; $i < $quantity; $i++) {
        // Remove the top crate from the source stack
        $crate = array_pop($stacks[$from - 1]);
        // Add the crate to the top of the destination stack
        array_push($stacks[$to - 1], $crate);
    }
}

// Loop through the stacks and build the result message
$message = '';
foreach ($stacks as $stack) {
    // Add the top crate of each stack to the message
    $message .= array_pop($stack);
}

// Output the result
echo $message . "\n";

// Part 2
foreach ($steps as $index => $step) {
    // Extract the information from the current step
    list($action, $quantity, $from, $to) = $step;
    $from = intval($from);
    $to = intval($to);
    $quantity = intval($quantity);

    // Remove the crates from the "from" stack
    $crates = array_splice($stacks[$from - 1], -$quantity);

    // Add the crates to the "to" stack in the same order they were removed
    array_splice($stacks[$to - 1], -0, 0, $crates);
}

// Print the final stack configuration
foreach ($stacks as $stack) {
    echo $stack[0];
}

echo "\n";

<?php

$lines = file_get_contents('day1_input.txt');

$lines = explode("\n\n", $lines);
$deer  = [];

// loop through each line
foreach ($lines as $index => $line) {
    $food = explode("\n", $line);

    $total = 0;
    foreach ($food as $item) {
        $total = $total + (int) $item;
    }

    $deer[$index] = $total;
}

arsort($deer);

echo "Top elf total: ";
print_r(array_slice($deer, 0, 1, true));

$sum = 0;
foreach (array_slice($deer, 0, 3) as $value) {
    $sum = $sum + $value;
}

echo "Top three elves total: $sum";

<?php

$file = file_get_contents('day4_test.txt');
$lines = explode("\n", $file);

// Part 1 & 2
$totalPart1 = 0;
$totalPart2 = 0;

foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line)) {
        continue;
    }

    $parts = explode(',', $line);
    $range1 = explode('-', $parts[0]);
    $range2 = explode('-', $parts[1]);

    // check if range1 and range2 overlap values
    $range1 = range($range1[0], $range1[1]);
    $range2 = range($range2[0], $range2[1]);
    $overlap = array_intersect($range1, $range2);

    if (empty($overlap)) {
        continue;
    }

    $totalPart2++;

    if (count($overlap) >= count($range2) || count($range1) <= count($overlap)) {
        $totalPart1++;
    }
}

echo "Found part 1: $totalPart1\nFound part 2: $totalPart2\n";
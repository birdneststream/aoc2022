<?php

$file = file_get_contents('day3_input.txt');
$lines = explode("\n", $file);

// Define the score for each letter as the array index
$alphabet = range('a', 'z');
$alphabet = array_merge($alphabet, range('A', 'Z'));
$total = 0;

// Part 1
foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line)) {
        continue;
    }

    $length = strlen($line);
    $sackLength = $length / 2;
    $sackContents = str_split($line, $sackLength);

    foreach ($sackContents as $index => $sack) {
        $sackContents[$index] = str_split($sack);
    }

    $same = [];
    foreach ($sackContents[0] as $index => $letter) {
        foreach ($sackContents[1] as $letter2) {
            if ($letter2 === $letter && (in_array($letter, $same) === false)) {
                $same[] = $letter;
            }
        }
    }

    foreach ($same as $letter) {
        $total = $total + array_search($letter, $alphabet)+1;
    }
}

echo "Total score part 1: $total\n";

// Part 2
$lines = array_chunk($lines, 3);
$total = 0;

foreach ($lines as $index => $line) {
    $lines[$index] = array_map('str_split', $line);
}

foreach ($lines as $line) {
    $same = [];
    foreach ($line[0] as $index => $letter) {
        foreach ($line[1] as $letter2) {
            foreach ($line[2] as $letter3) {
                if ($letter2 === $letter && $letter === $letter3 && (in_array($letter, $same) === false)) {
                    $same[] = $letter;
                    $total = $total + array_search($letter, $alphabet)+1;
                }
            }
        }
    }
}

echo "Total score part 2: $total\n";

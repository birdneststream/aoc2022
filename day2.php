<?php

$lines = file_get_contents('day2_input.txt');

// for each lines
$lines = explode("\n", $lines);

$score = 0;

$playArray = [
    "A" => "Rock",
    "B" => "Paper",
    "C" => "Scissors",
    "X" => "Rock",
    "Y" => "Paper",
    "Z" => "Scissors",
];

// score 1 for Rock, 2 for Paper, and 3 for Scissors
// Win - 6 points
// Tie - 3 points
// Loss - 0 points

foreach ($lines as $line) {
    $player1 = substr($line, 0, 1);
    $player2 = substr($line, 2, 3);

    // Tie
    if ($playArray[$player1] === $playArray[$player2]) {
        $score = $score + 3;

        switch($playArray[$player2]) {
            case "Rock":
                $score = $score + 1;
                break;
            case "Paper":
                $score = $score + 2;
                break;
            case "Scissors":
                $score = $score + 3;
                break;
        }
        continue;
    }

    // Loss
    if ($playArray[$player1] == "Rock" && $playArray[$player2] == "Scissors") {
        $score = $score + 3;
        continue;
    }

    // Win
    if ($playArray[$player1] == "Rock" && $playArray[$player2] == "Paper") {
        $score = $score + 8;
        continue;
    }

    // Loss
    if ($playArray[$player1] == "Paper" && $playArray[$player2] == "Rock") {
        $score = $score + 1;
        continue;
    }

    // Win
    if ($playArray[$player1] == "Paper" && $playArray[$player2] == "Scissors") {
        $score = $score + 9;
        continue;
    }

    // Win
    if ($playArray[$player1] == "Scissors" && $playArray[$player2] == "Rock") {
        $score = $score + 7;
        continue;
    }

    // Loss
    if ($playArray[$player1] == "Scissors" && $playArray[$player2] == "Paper") {
        $score = $score + 2;
        continue;
    }
}

echo "Part 1 Score: $score\n";

$score = 0;

// X - Lose
// Y - Draw
// Z - Win
// Rock defeats Scissors, Scissors defeats Paper, and Paper defeats Rock
//     "Rock" => 1,
//     "Paper" => 2,
//     "Scissors" => 3,

foreach ($lines as $line) {
    $player1 = substr($line, 0, 1);
    $player2 = substr($line, 2, 3);

    if ($playArray[$player1] == "Rock") {
        switch($player2) {
            case "X":
                $score = $score + 3;

                break;
            case "Y":
                $score = $score + 3 + 1;

                break;
            case "Z":
                $score = $score + 6 + 2;

                break;
        }
        continue;
    }

    if ($playArray[$player1] == "Paper") {
        switch($player2) {
            case "X":
                $score = $score + 1;
                break;

            case "Y":
                $score = $score + 3 + 2;
                break;

            case "Z":
                $score = $score + 6 + 3;
                break;
        }

        continue;
    }


    if ($playArray[$player1] == "Scissors") {
        switch($player2) {
            case "X":
                $score = $score + 2;
                break;

            case "Y":
                $score = $score + 3 + 3;
                break;

            case "Z":
                $score = $score + 6 + 1;
                break;
        }

        continue;
    }
}

echo "Part 2 Score: $score\n";

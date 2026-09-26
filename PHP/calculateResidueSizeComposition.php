<?php

function calculateResidueVolume($sequence)
{
    $volumes = [
        'A' => 88.6,
        'R' => 173.4,
        'N' => 114.1,
        'D' => 111.1,
        'C' => 108.5,
        'Q' => 143.8,
        'E' => 138.4,
        'G' => 60.1,
        'H' => 153.2,
        'I' => 166.7,
        'L' => 166.7,
        'K' => 168.6,
        'M' => 162.9,
        'F' => 189.9,
        'P' => 112.7,
        'S' => 89.0,
        'T' => 116.1,
        'W' => 227.8,
        'Y' => 193.6,
        'V' => 140.0
    ];

    $length = strlen($sequence);

    if($length === 0){
        return ['total' => 0, 'mean' => 0];
    }

    $totalVolume = 0;

    foreach(str_split($sequence) as $aa){
        $totalVolume += $volumes[$aa];
    }

    return ['total' => $totalVolume, 'mean' => $totalVolume / $length];
}
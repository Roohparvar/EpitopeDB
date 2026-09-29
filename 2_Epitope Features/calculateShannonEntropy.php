<?php

function calculateShannonEntropy($sequence)
{
    $length = strlen($sequence);

    if($length <= 1){
        return ['raw' => 0, 'normalized' => 0];
    }

    $counts = array_count_values(str_split($sequence));

    $rawEntropy = 0;

    foreach($counts as $count){
        $p = $count / $length;
        $rawEntropy -= $p * log($p, 2);
    }

    $maximumEntropy = log(min($length, 20),2);
    $normalizedEntropy = $rawEntropy / $maximumEntropy;

    return ['raw' => $rawEntropy,'normalized' => $normalizedEntropy];
}

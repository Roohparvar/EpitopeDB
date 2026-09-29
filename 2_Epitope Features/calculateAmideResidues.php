<?php

function calculateAmideResidues($sequence)
{
    $length = strlen($sequence);

    if($length === 0){
        return ['count' => 0, 'percentage' => 0];
    }

    $count = substr_count($sequence, 'N') + substr_count($sequence, 'Q');

    return ['count' => $count, 'percentage' => ($count / $length) * 100];
}
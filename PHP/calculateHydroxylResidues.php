<?php
function calculateHydroxylResidues($sequence)
{
    $length = strlen($sequence);

    if($length === 0){
        return ['count' => 0, 'percentage' => 0];
    }

    $count = substr_count($sequence, 'S') + substr_count($sequence, 'T');

    return ['count' => $count, 'percentage' => ($count / $length) * 100];
}
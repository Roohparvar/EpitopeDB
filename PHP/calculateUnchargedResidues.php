<?php

/* ========================================================= UNCHARGED RESIDUES | All residues except K, R, D and E ========================================================= */
function calculateUnchargedResidues($sequence){
    $length = strlen($sequence);

    if($length === 0){
        return ['count' => 0, 'percentage' => 0];
    }

    $chargedCount =
        substr_count($sequence, 'K')
        + substr_count($sequence, 'R')
        + substr_count($sequence, 'D')
        + substr_count($sequence, 'E');

    $count = $length - $chargedCount;

    return ['count' => $count, 'percentage' => ($count / $length) * 100];
}
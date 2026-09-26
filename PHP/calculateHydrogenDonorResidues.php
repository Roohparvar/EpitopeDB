<?php

/* ========================================================= HYDROGEN-DONOR RESIDUES | R + K + W ========================================================= */
function calculateHydrogenDonorResidues($sequence){
    $length = strlen($sequence);

    if($length === 0){
        return ['count' => 0, 'percentage' => 0];
    }

    $count = substr_count($sequence, 'R') + substr_count($sequence, 'K') + substr_count($sequence, 'W');

    return ['count' => $count, 'percentage' => ($count / $length) * 100];
}



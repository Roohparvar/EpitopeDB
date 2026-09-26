<?php

/* ========================================================= POSITIVE RESIDUES | K + R ========================================================= */
function calculatePositiveResidues($sequence){
    $length = strlen($sequence);

    if($length === 0){
        return ['count' => 0, 'percentage' => 0];
    }

    $count = substr_count($sequence, 'K') + substr_count($sequence, 'R');

    return ['count' => $count, 'percentage' => ($count / $length) * 100];
}



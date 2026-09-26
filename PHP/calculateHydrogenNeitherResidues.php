<?php

/* ========================================================= NON-HYDROGEN-DONOR/ACCEPTOR RESIDUES A + C + G + I + L + M + F + P + V ========================================================= */
function calculateHydrogenNeitherResidues($sequence){
    $length = strlen($sequence);

    if($length === 0){
        return ['count' => 0, 'percentage' => 0];
    }

    $count =
        substr_count($sequence, 'A')
        + substr_count($sequence, 'C')
        + substr_count($sequence, 'G')
        + substr_count($sequence, 'I')
        + substr_count($sequence, 'L')
        + substr_count($sequence, 'M')
        + substr_count($sequence, 'F')
        + substr_count($sequence, 'P')
        + substr_count($sequence, 'V');

    return ['count' => $count, 'percentage' => ($count / $length) * 100];
}



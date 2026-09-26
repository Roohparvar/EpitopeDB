<?php
/* ========================================================= HYDROGEN-DONOR-AND-ACCEPTOR RESIDUES | N + Q + H + S + T + Y ========================================================= */
function calculateHydrogenDonorAcceptorResidues($sequence){
    $length = strlen($sequence);

    if($length === 0){
        return ['count' => 0, 'percentage' => 0];
    }

    $count =
        substr_count($sequence, 'N')
        + substr_count($sequence, 'Q')
        + substr_count($sequence, 'H')
        + substr_count($sequence, 'S')
        + substr_count($sequence, 'T')
        + substr_count($sequence, 'Y');

    return ['count' => $count, 'percentage' => ($count / $length) * 100];
}



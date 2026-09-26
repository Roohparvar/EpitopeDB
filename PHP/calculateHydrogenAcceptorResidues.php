/* ========================================================= HYDROGEN-ACCEPTOR RESIDUES | D + E ========================================================= */
function calculateHydrogenAcceptorResidues($sequence){
    $length = strlen($sequence);

    if($length === 0){
        return ['count' => 0, 'percentage' => 0];
    }

    $count = substr_count($sequence, 'D') + substr_count($sequence, 'E');

    return ['count' => $count, 'percentage' => ($count / $length) * 100];
}


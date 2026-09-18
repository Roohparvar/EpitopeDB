<?php

function calculateAromaticResidues($sequence)
{
    /* Aromatic amino acids: Phenylalanine (F) & Tryptophan (W) & Tyrosine (Y) */

    return substr_count($sequence, 'F') + substr_count($sequence,'W') + substr_count($sequence,'Y');
}

function calculateAromaticResiduePercentage($sequence)
{
    $length = strlen($sequence);

    if($length === 0){
        return 0;
    }

    $count = calculateAromaticResidues($sequence);

    return ($count / $length) * 100;
}

?>
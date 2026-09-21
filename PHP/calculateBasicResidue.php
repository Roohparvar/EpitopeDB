<?php

/* BASIC RESIDUE COUNT (K + R + H) */
function calculateBasicResidueCount($sequence)
{
    return substr_count($sequence, 'K') + substr_count($sequence, 'R') + substr_count($sequence, 'H');
}

/* BASIC RESIDUE PERCENTAGE (K + R + H) */
function calculateBasicResiduePercentage($sequence)
{
    $length = strlen($sequence);

    if($length === 0){
        return 0;
    }

    $count = calculateBasicResidueCount($sequence);

    return ($count / $length) * 100;
}
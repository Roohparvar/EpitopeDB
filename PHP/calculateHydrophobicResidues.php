<?php

function calculateHydrophobicResidues($sequence)
{
    $hydrophobicResidues = ['A','V','I','L','M','F','W','Y'];

    $count = 0;

    foreach($hydrophobicResidues as $aa){
        $count +=
        substr_count($sequence,$aa);
    }

    return $count;
}



function calculateHydrophobicResiduePercentage($sequence)
{
    $length = strlen($sequence);

    if($length === 0){
        return 0;
    }

    $count = calculateHydrophobicResidues($sequence);

    return ($count / $length) * 100;
}
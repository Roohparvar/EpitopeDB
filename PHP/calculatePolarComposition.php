<?php

function calculatePolarResidueCounts($sequence)
{
    $polarResidues = ['R','N','D','Q','E','H','K','S','T','Y'];
    $nonPolarResidues = ['A','C','G','I','L','M','F','P','W','V'];

    $polarCount = 0;
    $nonPolarCount = 0;

    foreach($polarResidues as $aa){
        $polarCount += substr_count($sequence, $aa);
    }

    foreach($nonPolarResidues as $aa){
        $nonPolarCount += substr_count($sequence, $aa);
    }

    return ['polar' => $polarCount,'nonpolar' => $nonPolarCount];
}


function calculatePolarCompositionPerResidue($polarCount, $nonPolarCount, $length){
    if($length === 0){
        return ['polar' => 0, 'nonpolar' => 0];
    }

    return ['polar' => $polarCount / $length, 'nonpolar' => $nonPolarCount / $length];
}
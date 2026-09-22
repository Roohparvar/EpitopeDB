<?php
define('WATER_MASS', 18.01524);

function getResidueMasses()
{
    return [
        'A'=>71.08,
        'R'=>156.19,
        'N'=>114.10,
        'D'=>115.09,
        'C'=>103.14,
        'E'=>129.12,
        'Q'=>128.13,
        'G'=>57.05,
        'H'=>137.14,
        'I'=>113.16,
        'L'=>113.16,
        'K'=>128.17,
        'M'=>131.19,
        'F'=>147.18,
        'P'=>97.12,
        'S'=>87.08,
        'T'=>101.11,
        'W'=>186.21,
        'Y'=>163.18,
        'V'=>99.13
    ];
}

function calculateMass($sequence, $masses, $water)
{
    $mass = $water;

    foreach(str_split($sequence) as $aa){
        $mass += $masses[$aa];
    }

    return $mass;
}


function calculateMeanResidueMass($molecularWeight, $length)
{
    if($length === 0){
        return 0;
    }

    return ($molecularWeight - WATER_MASS) / $length;
}
/* ========================================================= End Residue MASSES ========================================================= */
<?php

function calculateExtinctionCoefficient($epitope)
{
    $numW = substr_count($epitope, 'W');
    $numY = substr_count($epitope, 'Y');
    $numC = substr_count($epitope, 'C');

    $numCystine = floor($numC / 2);

    $extReduced = ($numW * 5500) + ($numY * 1490);
    $extOxidized = ($numW * 5500) + ($numY * 1490) + ($numCystine * 125);

    return ['reduced' => $extReduced, 'oxidized' => $extOxidized];
}
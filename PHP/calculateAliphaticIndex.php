<?php

function calculateAliphaticIndex($sequence)
{
    $length = strlen($sequence);

    if($length === 0){
        return 0;
    }

    $numA = substr_count($sequence, 'A' );
    $numV = substr_count($sequence, 'V');
    $numI = substr_count($sequence, 'I');
    $numL = substr_count($sequence, 'L');

    $xA = ($numA / $length) * 100;
    $xV = ($numV / $length) * 100;
    $xI = ($numI / $length) * 100;
    $xL = ($numL / $length) * 100;

    /* Aliphatic Index = X(Ala) + 2.9 X(Val) + 3.9 [X(Ile) + X(Leu)] */

    return $xA + (2.9 * $xV) + (3.9 * ($xI + $xL));
}

?>


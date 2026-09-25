<?php

function getAtomicComposition()
{
    return [
        'A' => ['C'=>3,  'H'=>5,  'N'=>1, 'O'=>1, 'S'=>0],
        'R' => ['C'=>6,  'H'=>12, 'N'=>4, 'O'=>1, 'S'=>0],
        'N' => ['C'=>4,  'H'=>6,  'N'=>2, 'O'=>2, 'S'=>0],
        'D' => ['C'=>4,  'H'=>5,  'N'=>1, 'O'=>3, 'S'=>0],
        'C' => ['C'=>3,  'H'=>5,  'N'=>1, 'O'=>1, 'S'=>1],
        'E' => ['C'=>5,  'H'=>7,  'N'=>1, 'O'=>3, 'S'=>0],
        'Q' => ['C'=>5,  'H'=>8,  'N'=>2, 'O'=>2, 'S'=>0],
        'G' => ['C'=>2,  'H'=>3,  'N'=>1, 'O'=>1, 'S'=>0],
        'H' => ['C'=>6,  'H'=>7,  'N'=>3, 'O'=>1, 'S'=>0],
        'I' => ['C'=>6,  'H'=>11, 'N'=>1, 'O'=>1, 'S'=>0],
        'L' => ['C'=>6,  'H'=>11, 'N'=>1, 'O'=>1, 'S'=>0],
        'K' => ['C'=>6,  'H'=>12, 'N'=>2, 'O'=>1, 'S'=>0],
        'M' => ['C'=>5,  'H'=>9,  'N'=>1, 'O'=>1, 'S'=>1],
        'F' => ['C'=>9,  'H'=>9,  'N'=>1, 'O'=>1, 'S'=>0],
        'P' => ['C'=>5,  'H'=>7,  'N'=>1, 'O'=>1, 'S'=>0],
        'S' => ['C'=>3,  'H'=>5,  'N'=>1, 'O'=>2, 'S'=>0],
        'T' => ['C'=>4,  'H'=>7,  'N'=>1, 'O'=>2, 'S'=>0],
        'W' => ['C'=>11, 'H'=>10, 'N'=>2, 'O'=>1, 'S'=>0],
        'Y' => ['C'=>9,  'H'=>9,  'N'=>1, 'O'=>2, 'S'=>0],
        'V' => ['C'=>5,  'H'=>9,  'N'=>1, 'O'=>1, 'S'=>0]
    ];
}

function calculateAtoms($sequence)
{
    $table = getAtomicComposition();

    $atoms = [
        'C' => 0,
        'H' => 0,
        'N' => 0,
        'O' => 0,
        'S' => 0
    ];

    foreach(str_split($sequence) as $aa){
        foreach($atoms as $atom => $value){
            $atoms[$atom] += $table[$aa][$atom];
        }
    }

    /* Add H2O to convert residue composition into complete neutral peptide composition. */

    $atoms['H'] += 2;
    $atoms['O'] += 1;

    return $atoms;
}


function calculateAtomsPerResidue($atoms, $length)
{
    if($length === 0){
        return ['C' => 0, 'H' => 0, 'N' => 0, 'O' => 0, 'S' => 0, 'total' => 0];
    }

    /* Remove terminal H2O to obtain residue-only atomic composition before dividing by length. */
    $residueAtoms = ['C' => $atoms['C'], 'H' => $atoms['H'] - 2, 'N' => $atoms['N'], 'O' => $atoms['O'] - 1, 'S' => $atoms['S']];
    $totalResidueAtoms = $residueAtoms['C'] + $residueAtoms['H'] + $residueAtoms['N'] + $residueAtoms['O'] + $residueAtoms['S'];

    return [
        'C' => $residueAtoms['C'] / $length,
        'H' => $residueAtoms['H'] / $length,
        'N' => $residueAtoms['N'] / $length,
        'O' => $residueAtoms['O'] / $length,
        'S' => $residueAtoms['S'] / $length,
        'total' => $totalResidueAtoms / $length
    ];
}

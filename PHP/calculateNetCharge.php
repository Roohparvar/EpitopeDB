<?php

function calculateNetCharge($epitope, $pH)
{
    $epitope = strtoupper(trim($epitope));
    $length = strlen($epitope);

    if($length === 0){
        return 0;
    }

    /* ProMoST pKa values for basic side chains */
    $pKaBasic = [
        'K' => [
            'primary'    => 9.80,
            'n_terminal' => 10.00,
            'c_terminal' => 9.30
        ],

        'R' => [
            'primary'    => 12.50,
            'n_terminal' => 11.50,
            'c_terminal' => 11.50
        ],

        'H' => [
            'primary'    => 6.08,
            'n_terminal' => 4.89,
            'c_terminal' => 6.89
        ]
    ];

    /* ProMoST pKa values for acidic side chains */
    $pKaAcidic = [
        'D' => [
            'primary'    => 4.07,
            'n_terminal' => 3.57,
            'c_terminal' => 4.57
        ],

        'E' => [
            'primary'    => 4.45,
            'n_terminal' => 4.15,
            'c_terminal' => 4.75
        ],

        'C' => [
            'primary'    => 8.28,
            'n_terminal' => 8.70,
            'c_terminal' => 7.85
        ],

        'Y' => [
            'primary'    => 9.84,
            'n_terminal' => 10.34,
            'c_terminal' => 9.34
        ]
    ];

    /* Residue-specific pKa values for the free N-terminal group */
    $pKaNTerminal = [
        'G' => 7.50,
        'A' => 7.58,
        'S' => 6.86,
        'P' => 8.36,
        'V' => 7.44,
        'T' => 7.02,
        'C' => 8.12,
        'I' => 7.48,
        'L' => 7.46,
        'N' => 7.22,
        'D' => 7.70,
        'Q' => 6.73,
        'K' => 6.67,
        'E' => 7.19,
        'M' => 6.98,
        'H' => 7.18,
        'F' => 6.96,
        'R' => 6.76,
        'Y' => 6.83,
        'W' => 7.11
    ];

    /* Residue-specific pKa values for the free C-terminal group */
    $pKaCTerminal = [
        'G' => 3.70,
        'A' => 3.75,
        'S' => 3.61,
        'P' => 3.40,
        'V' => 3.69,
        'T' => 3.57,
        'C' => 3.10,
        'I' => 3.72,
        'L' => 3.73,
        'N' => 3.64,
        'D' => 3.50,
        'Q' => 3.57,
        'K' => 3.40,
        'E' => 3.50,
        'M' => 3.68,
        'H' => 3.17,
        'F' => 3.98,
        'R' => 3.41,
        'Y' => 3.60,
        'W' => 3.78
    ];

    $firstAA = $epitope[0];
    $lastAA = $epitope[$length - 1];

    $positiveCharge = 0;
    $negativeCharge = 0;

    /* Free N-terminal group */
    $nTerminalPKa = $pKaNTerminal[$firstAA];
    $positiveCharge += 1 / (1 + pow(10, $pH - $nTerminalPKa));

    /* Free C-terminal group */
    $cTerminalPKa = $pKaCTerminal[$lastAA];
    $negativeCharge += 1 / (1 + pow(10, $cTerminalPKa - $pH));

    /* Ionizable side chains */
    foreach (str_split($epitope) as $index => $aa) {
		if ($index === 0) {
			$position = 'n_terminal';
		} elseif ($index === $length - 1) {
			$position = 'c_terminal';
		} else {
			$position = 'primary';
		}

		/* Basic side chains */
		if (isset($pKaBasic[$aa])) {
			$sideChainPKa = $pKaBasic[$aa][$position];
			$positiveCharge += 1 / (1 + pow(10, $pH - $sideChainPKa));
		}

		/* Acidic side chains */
		if (isset($pKaAcidic[$aa])) {
			$sideChainPKa = $pKaAcidic[$aa][$position];
			$negativeCharge += 1 / (1 + pow(10, $sideChainPKa - $pH));
		}
	}

    return $positiveCharge - $negativeCharge;
}
# Epitope Feature Functions
A collection of PHP functions for assessing whether a user-provided epitope is similar to database epitopes based on various well-established features reported in the literature.

## Functions
| File | Description |
|---|---|
| `calculateAliphaticIndex.php` | Calculates the aliphatic index from the relative abundance of alanine, valine, isoleucine, and leucine. |
| `calculateAromaticResidues.php` | Calculates the count and percentage of aromatic residues: phenylalanine, tryptophan, and tyrosine (`F`, `W`, and `Y`). |
| `calculateAtoms.php` | Calculates the atomic composition (`C`, `H`, `N`, `O`, and `S`) of a complete neutral peptide. |
| `calculateBasicResidue.php` | Calculates the count and percentage of basic residues: lysine, arginine, and histidine (`K`, `R`, and `H`). |
| `calculateExtinctionCoefficient.php` | Calculates the reduced and oxidized molar extinction coefficients of a peptide at 280 nm. |
| `calculateGRAVY.php` | Calculates the grand average of hydropathicity using the Kyte–Doolittle scale. |
| `calculateHydrophilicity.php` | Calculates the mean sequence hydrophilicity using the Hopp–Woods scale. |
| `calculateHydrophobicResidues.php` | Calculates the count and percentage of hydrophobic residues (`A`, `V`, `I`, `L`, `M`, `F`, `W`, and `Y`). |
| `calculateMass.php` | Calculates peptide molecular weight and mean residue mass using residue masses and the mass of water. |
| `calculateNetCharge.php` | Calculates peptide net charge at a specified pH; used for theoretical pI estimation and net charge calculation at pH 7.4. |
| `calculateTheoreticalPI.php` | Calculates the theoretical isoelectric point (pI) of a peptide using its net charge. |
| `calculatePolarComposition.php` | Calculates polar and non-polar residue counts and their per-residue values. |
| `calculateResidueSizeComposition.php` | Calculates the counts and percentages of residues in the three normalized van der Waals volume groups. |
| `calculateShannonEntropy.php` | Calculates both raw and length-normalized Shannon entropy of an epitope sequence. |

## Input
Functions expect peptide sequences containing uppercase standard amino-acid codes.

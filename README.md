# Epitope Feature Functions
A collection of PHP functions for assessing whether a user-provided epitope is similar to database epitopes based on various well-established features reported in the literature.

## Functions
| File | Description |
|---|---|
| `calculateAliphaticIndex.php` | Calculates the aliphatic index from the relative abundance of alanine, valine, isoleucine, and leucine. |
| `calculateAmideResidues.php` | Calculates the count and percentage of amide-containing residues (N and Q) in an epitope sequence. |
| `calculateAromaticResidues.php` | Calculates the count and percentage of aromatic residues: phenylalanine, tryptophan, and tyrosine (`F`, `W`, and `Y`). |
| `calculateAtoms.php` | Calculates the atomic composition (`C`, `H`, `N`, `O`, and `S`) of a complete neutral peptide. |
| `calculateExtinctionCoefficient.php` | Calculates the reduced and oxidized molar extinction coefficients of a peptide at 280 nm. |
| `calculateGRAVY.php` | Calculates the grand average of hydropathicity using the Kyte–Doolittle scale. |
| `calculateHydrogenDonorCapableResidues.php` | Calculates the count and percentage of hydrogen donor-capable residues (R, K, W, N, Q, H, S, T, and Y). |
| `calculateHydrogenAcceptorCapableResidues.php` | Calculates the count and percentage of hydrogen acceptor-capable residues (D, E, N, Q, H, S, T, and Y). |
| `calculateHydrogenNeitherResidues.php` | Calculates the count and percentage of residues with neither hydrogen donor nor acceptor capability (A, C, G, I, L, M, F, P, and V). |
| `calculateHydrogenNeitherResidues.php` | Calculates the count and percentage of residues classified as neither hydrogen-bond donors nor acceptors (A, C, G, I, L, M, F, P and V). |
| `calculateHydroxylResidues.php` | Calculates the count and percentage of hydroxyl-containing residues (S and T) in an epitope sequence. |
| `calculateMass.php` | Calculates peptide molecular weight and mean residue mass using residue masses and the mass of water. |
| `calculateNetCharge.php` | Calculates peptide net charge at a specified pH; used for theoretical pI estimation and net charge calculation at pH 7.4. |
| `calculatePolarComposition.php` | Calculates polar and non-polar residue counts and their per-residue values. |
| `calculateNegativeResidues.php` | Calculates the count and percentage of negatively charged residues (D and E). |
| `calculatePositiveResidues.php` | Calculates the count and percentage of positively charged residues (K and R). |
| `calculateResidueSizeComposition.php` | Calculates the counts and percentages of residues in the three normalized van der Waals volume groups. |
| `calculateShannonEntropy.php` | Calculates both raw and length-normalized Shannon entropy of an epitope sequence. |
| `calculateTheoreticalPI.php` | Calculates the theoretical isoelectric point (pI) of a peptide using its net charge. |

## Input
Functions expect peptide sequences containing uppercase standard amino-acid codes.

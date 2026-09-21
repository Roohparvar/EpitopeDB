# Epitope Feature Functions
A collection of PHP functions for assessing whether a user-provided epitope is similar to database epitopes based on various well-established features reported in the literature.

## Functions
| File | Description |
|---|---|
| `calculateAliphaticIndex.php` | Calculates the aliphatic index from the relative abundance of alanine, valine, isoleucine, and leucine. |
| `calculateAromaticResidues.php` | Calculates the count and percentage of aromatic residues: phenylalanine, tryptophan, and tyrosine (`F`, `W`, and `Y`). |
| `calculateAtoms.php` | Calculates the atomic composition (`C`, `H`, `N`, `O`, and `S`) of a complete neutral peptide. |
| `calculateBasicResidue.php` | Calculates the count and percentage of basic residues: lysine, arginine, and histidine (`K`, `R`, and `H`). |

## Input
Functions expect peptide sequences containing uppercase standard amino-acid codes.

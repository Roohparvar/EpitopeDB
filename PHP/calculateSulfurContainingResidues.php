 <?php
 
function calculateSulfurContainingResidues($sequence)
{
    $length = strlen($sequence);

    if($length === 0){
        return ['count' = 0, 'percentage' = 0];
    }

    $count = substr_count($sequence, 'C') + substr_count($sequence, 'M');

    return ['count' = $count, 'percentage' = ($count  $length)  100];
}
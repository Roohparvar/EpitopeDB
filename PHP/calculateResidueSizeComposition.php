<?php

function calculateResidueSizeComposition($sequence)
{
    $length = strlen($sequence);

    if($length === 0){
        return [
            'small_count' => 0,
            'medium_count' => 0,
            'large_count' => 0,
            'small_percentage' => 0,
            'medium_percentage' => 0,
            'large_percentage' => 0
        ];
    }

    static $groupMap = [
        'G'=>'small',
        'A'=>'small',
        'S'=>'small',
        'C'=>'small',
        'T'=>'small',
        'P'=>'small',
        'D'=>'small',

        'N'=>'medium',
        'V'=>'medium',
        'E'=>'medium',
        'Q'=>'medium',
        'I'=>'medium',
        'L'=>'medium',

        'M'=>'large',
        'H'=>'large',
        'K'=>'large',
        'F'=>'large',
        'R'=>'large',
        'Y'=>'large',
        'W'=>'large'
    ];

    $counts = [
        'small' => 0,
        'medium' => 0,
        'large' => 0
    ];

    for($i = 0; $i < $length; $i++){
        $aa = $sequence[$i];

        if(isset($groupMap[$aa])){
            $group = $groupMap[$aa];
            $counts[$group]++;
        }
    }

    return [
        'small_count' =>
        $counts['small'],

        'medium_count' =>
        $counts['medium'],

        'large_count' =>
        $counts['large'],

        'small_percentage' =>
        ($counts['small'] / $length) * 100,

        'medium_percentage' =>
        ($counts['medium'] / $length) * 100,

        'large_percentage' =>
        ($counts['large'] / $length) * 100
    ];
}
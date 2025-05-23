<?php

include 'cadenzas.php';
include 'scales.php';

$products = array_merge($cadenzas, $scales);

$cadenzasJson = json_encode($cadenzas);
$scalesJson = json_encode($scales);
$productsJson = json_encode($products);

$files = [
    'cadenzas.json' => $cadenzasJson,
    'scales.json' => $scalesJson,
    'products.json' => $productsJson,
];

foreach ($files as $fname => $fval) {
    $f = fopen($fname, 'w') or die("Can't open $fname for writing");
    fprintf($f, $fval);
    fclose($f);
}

echo "done\n";

/*
[
'all' => 'https://nymetmusic.com/product-category/solo-instruments/mark-knight-cadenzas-and-scales/',

'link' => 'https://nymetmusic.com/product/cadenzas-for-carl-stamitz-viola-concerto-no-1-in-d-op-1/',
'link' => 'https://nymetmusic.com/product/cadenzas-for-hoffmeister-viola-concerto-in-d-mark-knight/',
'link' => 'https://nymetmusic.com/product/cadenzas-for-mozart-violin-concertos-no-1-in-b-flat-k207-no-2-in-d-k211-mark-knight/',
'link' => 'https://nymetmusic.com/product/cadenzas-for-haydn-cello-concerto-in-c-hob-viib1-mark-knight/',
'link' => 'https://nymetmusic.com/product/concerto-in-c-major-for-viola-haydn-hob-viib1-transcribed-with-candenzas-mark-knight/',

'link' => 'https://nymetmusic.com/product/carl-flesch-plus-scales-for-viola-volume-i-collated-and-fingered-by-mark-knight/',
'link' => 'https://nymetmusic.com/product/carl-flesch-plus-scales-for-viola-volume-ii-collated-and-fingered-by-mark-knight/',
'link' => 'https://nymetmusic.com/product/carl-flesch-plus-scales-for-viola-volume-iii-collated-and-fingered-by-mark-knight/',
'link' => 'https://nymetmusic.com/product/carl-flesch-plus-scales-for-violin-volume-i-collated-and-fingered-by-mark-knight/',
'link' => 'https://nymetmusic.com/product/carl-flesch-plus-scales-for-violin-volume-ii-collated-and-fingered-by-mark-knight/',
'link' => 'https://nymetmusic.com/product/carl-flesch-plus-scales-for-violin-volume-iii-collated-and-fingered-by-mark-knight/',
]
*/



/*

[
'all' => '/shop/powersearch/powersearch_results?search=Strings+Attached',

'link' => 'https://boosey.com/shop/prod/Knight-Mark-Cadenzas-for-Carl-Stamitz-Viola-Concerto-No-1-in-D-op-1/2067549',
'link' => 'https://boosey.com/shop/prod/Knight-Mark-Cadenzas-for-Hoffmeister-Viola-Concerto-in-D/2067544',
'link' => 'https://boosey.com/shop/prod/Knight-Mark-Cadenzas-For-Mozart-Violin-Concertos-I-II/2063222',
'link' => 'https://boosey.com/shop/prod/Knight-Mark-Cadenzas-for-Haydn-Cello-Concerto-in-C-Hob-VIIb-1/2067553',
'link' => 'https://boosey.com/shop/prod/Knight-Mark-Concerto-in-C-major-for-Viola-Haydn-Hob-VIIb-1/2067556',
'link' => 'https://boosey.com/shop/prod/Flesch-Carl-Carl-Flesch-Plus-Scales-for-Viola-Volume-I/2067557',
'link' => 'https://boosey.com/shop/prod/Flesch-Carl-Carl-Flesch-Plus-Scales-for-Viola-Volume-II/2067546',
'link' => 'https://boosey.com/shop/prod/Knight-Mark-Carl-Flesch-Plus-Scales-For-Viola-Vol-III/2364993',
'link' => 'https://boosey.com/shop/prod/Flesch-Carl-Carl-Flesch-Plus-Scales-for-Violin-Volume-I/2063118',
'link' => 'https://boosey.com/shop/prod/Flesch-Carl-Carl-Flesch-Plus-Scales-for-Violin-Volume-II/2067554',
'link' => 'https://boosey.com/shop/prod/Knight-Mark-Carl-Flesch-Plus-Scales-For-Violin-Vol-III/2364995',
]


*/
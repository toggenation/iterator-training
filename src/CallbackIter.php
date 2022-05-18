<?php

$dirIt = new GlobIterator('/var/www/wms/tmp/*.csv');

$recursiveFiles = new CallbackFilterIterator(
    $dirIt,

    function ($current, $key, $it) {
        return preg_match('|test627|i', $current);
    }
);

foreach ($recursiveFiles as $name) {
    echo $name . PHP_EOL;
}

echo iterator_count($recursiveFiles) . PHP_EOL;

/**
 * output
 * /var/www/wms/tmp/TEST627b509d5ac743.01130673.csv
 * /var/www/wms/tmp/TEST627b52ac03dad4.63971256.csv
 * /var/www/wms/tmp/TEST627b53a94454a9.12415465.csv
 * /var/www/wms/tmp/TEST627b54cdee2a88.20247776.csv
 * /var/www/wms/tmp/TEST627b55a2530101.43769565.csv
 * /var/www/wms/tmp/TEST627b5643c63625.69582969.csv
 * 6
 */

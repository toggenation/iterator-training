<?php

$it = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator('/var/www/wms/logs', FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::CHILD_FIRST
);


// run out of memory trying to convert the iterator
// to an array
// var_dump(iterator_to_array($it));

// echo print_r(iterator_to_array($it), true);

// array_map('unlink', iterator_to_array($it));

// this allows it to run without running out of mem
foreach ($it as $k => $v) {
    if ($it->hasChildren()) {
        echo "Has Children " . $k . "\n";
        rmdir($k);
        continue;
    }
    echo "Deleting $k";
    unlink($k);
}

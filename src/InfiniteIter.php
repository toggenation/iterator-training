<?php


$data = [1, 2, 3];

// as it's name implies it rewinds the pointer to the start
// and keeps going forever
$it = new InfiniteIterator(new ArrayIterator($data));


$ctr = 0;

foreach ($it as $i) {
    $ctr++;

    // do this or it will go on forever
    if ($ctr === 1000333330) die;

    echo "{$i} - {$ctr}" . PHP_EOL;
}

// Output

/*
// ... forever...
2 - 9995
3 - 9996
1 - 9997
2 - 9998
3 - 9999

*/
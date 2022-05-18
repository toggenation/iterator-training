<?php

$a = new ArrayIterator(['test1', 'test2', 'test3', 'test4', 'aaa']);

$it = new RegexIterator(
    $a,
    '/^(test)(\d)+/',
    RegexIterator::REPLACE
);

$it->replacement = '$2:$1';


foreach ($it as $el) {
    echo $el . PHP_EOL;
}

// Output

/*
1:test
2:test
3:test
4:test
*/

<?php

// genorator

function abc()
{
    yield 1;
    yield 2;
    yield 3;
}
echo "Generator\n";
foreach (abc() as $num) {
    echo $num . PHP_EOL;
}

// stop a generator
function rabc()
{
    yield 1;
    return; // don't use a return value
    yield 2;
    yield 3;
}
echo "Stopped Generator\n";
foreach (rabc() as $num) {
    echo $num . PHP_EOL;
}

// Output
/*
Generator
1
2
3
Stopped Generator
1
*/

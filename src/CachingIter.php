<?php
// CachingIterator aka LookAhead Iterator
$animals = ['Cat', 'Dog', 'Shark', 'Elephant', 'Tiger', 'Lion', 'Bear', 'Donkey', 'Sheep'];

$collection = new CachingIterator(new ArrayIterator($animals));
var_dump($collection->current()); // null
var_dump($collection->getInnerIterator()->current()); // Cat

foreach ($collection as $animal) {
    echo "Current: {$animal}";

    if ($collection->hasNext()) {
        echo ' - Next:' . $collection->getInnerIterator()->current();
    }
    echo PHP_EOL;
}

/**
 * output 
 * 
 * Current: Cat - Next:Dog
 * Current: Dog - Next:Shark
 * Current: Shark - Next:Elephant
 * Current: Elephant - Next:Tiger
 * Current: Tiger - Next:Lion
 * Current: Lion - Next:Bear
 * Current: Bear - Next:Donkey
 * Current: Donkey - Next:Sheep
 * Current: Sheep
 */

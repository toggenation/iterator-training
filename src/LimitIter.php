<?php

require '../../vendor/autoload.php';

use Faker\Factory;

$page = 5;
$perPage = 10;
$resultOffset = ($page * $perPage) - $perPage;

$faker = Faker\Factory::create();

for ($i = 0; $i < 125; $i++) {
    $words[]['name'] = $faker->word() . ' ' . $i;
}

$it = new ArrayIterator($words);

try {
    foreach (new LimitIterator($it, $resultOffset, $perPage) as $result) {
        echo "{$result['name']}\n";
    }
} catch (OutOfBoundsException $e) {
    echo "No Records Found" . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage();
}

// Output 

/*
ullam 40
harum 41
deleniti 42
est 43
molestiae 44
aut 45
enim 46
molestias 47
placeat 48
molestiae 49
*/

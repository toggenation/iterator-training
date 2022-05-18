<?php

use Enqueue\Router\Recipient;

$menu = [
    'Home',
    'Register',
    'About' => [
        'The Team',
        "Our Story",
    ],
    'Contact' => [
        'Locations',
        'Support',
    ]
];


class HookRecursiveIteratorIterator extends RecursiveIteratorIterator
{
    public function beginChildren(): void
    {
        // echo __METHOD__ . PHP_EOL;
        echo '<ul data-where="beginChildren">', PHP_EOL;
    }

    public function endChildren(): void
    {
        // echo __METHOD__ . PHP_EOL;

        echo '</ul></li>', "\n";
    }
}

$it = new HookRecursiveIteratorIterator(
    new RecursiveArrayIterator($menu),
    RecursiveIteratorIterator::SELF_FIRST
);

ob_start();

echo '<ul>', "\n";

foreach ($it as $k => $v) {
    /**
     * @var RecursiveIterator $it
     */
    if ($it->hasChildren()) {
        echo "<li>{$k}\n";
        continue;
    }
    echo "<li>{$v}</li>\n";
}

echo "</ul>\n";

$html = ob_get_clean();

$config = [
    'indent'         => true,
    'output-xhtml'   => false,
    'wrap'           => 200,
    'show-body-only' => true,
    'clean' => true,
];

// Tidy
$tidy = new tidy;
$tidy->parseString($html, $config, 'utf8');
$tidy->cleanRepair();

// Output
echo $tidy . PHP_EOL;

// Output

/*

<ul>
  <li>Home
  </li>
  <li>Register
  </li>
  <li>About
    <ul data-where="beginChildren">
      <li>The Team
      </li>
      <li>Our Story
      </li>
    </ul>
  </li>
  <li>Contact
    <ul data-where="beginChildren">
      <li>Locations
      </li>
      <li>Support
      </li>
    </ul>
  </li>
</ul>

*/
<?php

echo "*.php\n";
$it = new GlobIterator('/var/www/wms/webroot/*.php');;

foreach ($it as $path => $file) {
    echo $path . ' - ' . $file->getFilename() . PHP_EOL;
}


echo "*.txt\n";
$it = new GlobIterator('/var/www/wms/webroot/*.txt');;

foreach ($it as $path => $file) {
    echo $path . ' - ' . $file->getFilename() . PHP_EOL;
}

// Output

/*

*.php
/var/www/wms/webroot/index.php - index.php
/var/www/wms/webroot/info.php - info.php
/var/www/wms/webroot/phpinfo.php - phpinfo.php
*.txt
/var/www/wms/webroot/htaccess.txt - htaccess.txt

*/
<?php

$rdi = new RecursiveDirectoryIterator('/var/www/wms/webroot', FilesystemIterator::SKIP_DOTS);
$rii  = new RecursiveIteratorIterator($rdi, RecursiveIteratorIterator::CHILD_FIRST);
// now ready to walk the entire tree below the specified root
foreach ($rii as $file) {
    /**
     * @var SplFileInfo $file
     */
    echo $file->getPathname(), "\n";
}

/*

/var/www/wms/webroot/img/x-lg.svg
/var/www/wms/webroot/img/TOGGEN-LOGO.svg
/var/www/wms/webroot/img/toggen-logo-122x27.png
/var/www/wms/webroot/img/down-arrow.svg
/var/www/wms/webroot/img/100pbc-bottling-company.png
/var/www/wms/webroot/img/test-error-icon.png
/var/www/wms/webroot/img/cake.logo.svg
/var/www/wms/webroot/img/TOGGEN-GOAT.svg
/var/www/wms/webroot/img/test-fail-icon.png
/var/www/wms/webroot/img
/var/www/wms/webroot/phpinfo.php
/var/www/wms/webroot/.htaccess


 */
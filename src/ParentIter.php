<?php

$rdi = new RecursiveDirectoryIterator('/var/www/wms/src');

// only iterates nodes with children
// ie. directories are parents
// in this case it iterates directories

$dirsOnly = new ParentIterator($rdi);

$iter = new RecursiveIteratorIterator(
    $dirsOnly,
    RecursiveIteratorIterator::CHILD_FIRST
);

foreach ($iter as $dir) {
    echo $dir . PHP_EOL;
}


// Output
// Note CHILD_FIRST shows the deepest folders in the tree first

/*
/var/www/wms/src/React/shipment-app
/var/www/wms/src/React/put-away/public
/var/www/wms/src/React/put-away/src
/var/www/wms/src/React/put-away
/var/www/wms/src/React
/var/www/wms/src/View/Helper
/var/www/wms/src/View/Cell
/var/www/wms/src/View
/var/www/wms/src/Middleware/UnauthorizedHandler
/var/www/wms/src/Middleware
/var/www/wms/src/Listener
/var/www/wms/src/Error
/var/www/wms/src/Policy
/var/www/wms/src/Console
/var/www/wms/src/Form
/var/www/wms/src/Controller/Component
/var/www/wms/src/Controller
/var/www/wms/src/Mailer
*/
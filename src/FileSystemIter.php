<?php


// filesystem iterator has skip dots on by default
$it = new FilesystemIterator('/var/www/wms/src');

foreach ($it as $file) {

    // not required
    // if ($file->isDot()) {
    //     continue;
    // }
    // if ($file->isFile()) {
    // echo "{$file->getFilename()}" . PHP_EOL;
    // }

    // if ($file->isDir()) {
    //     echo "DIR:::: {$file->getFilename()}" . PHP_EOL;
    // }

    echo $file->getFilename() . PHP_EOL;
}


/**
 * output
 * 
 * Command
 * Log
 * Routing
 * Job
 * Lib
 * Model
 * React
 * View
 * Middleware
 * Application.php
 * Listener
 * Error
 * Policy
 * Console
 * Form
 * Controller
 * Mailer
 */

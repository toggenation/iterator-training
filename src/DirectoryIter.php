<?php

$it = new DirectoryIterator('/var/www/wms/src');

foreach ($it as $file) {
    if ($file->isDot()) {
        continue;
    }
    if ($file->isFile()) {
        echo "FILE:::: {$file->getFilename()}" . PHP_EOL;
    }

    if ($file->isDir()) {
        echo "DIR:::: {$file->getFilename()}" . PHP_EOL;
    }
    echo $file->getFilename() . PHP_EOL;
}


/**
 * output 
 * 
 * DIR:::: Command
 * Command
 * DIR:::: Log
 * Log
 * DIR:::: Routing
 * Routing
 * DIR:::: Job
 * Job
 * DIR:::: Lib
 * Lib
 * DIR:::: Model
 * Model
 * DIR:::: React
 * React
 * DIR:::: View
 * View
 * DIR:::: Middleware
 * Middleware
 * FILE:::: Application.php
 * Application.php
 * DIR:::: Listener
 * Listener
 * DIR:::: Error
 * Error
 * DIR:::: Policy
 * Policy
 * DIR:::: Console
 * Console
 * DIR:::: Form
 * Form
 * DIR:::: Controller
 * Controller
 * DIR:::: Mailer
 * Mailer
 */

<?php

$it = new RecursiveDirectoryIterator('/var/www/wms/webroot', FilesystemIterator::SKIP_DOTS);

foreach (new RecursiveTreeIterator($it) as $path => $file) {

    echo $file . "\n";
}



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

$data = new RecursiveArrayIterator($menu);

$it = new RecursiveTreeIterator($data);

$it->setPrefixPart(
    RecursiveTreeIterator::PREFIX_LEFT,
    '//'
);

$it->setPrefixPart(
    RecursiveTreeIterator::PREFIX_RIGHT,
    '||'
);

foreach ($it as $nav) {
    echo $nav . PHP_EOL;
}


// Default output
/*
| | |-/var/www/wms/webroot/files/templates/200x150-Product-Sample-Label.png
| | |-/var/www/wms/webroot/files/templates/5-CartonLabel.txt
| | |-/var/www/wms/webroot/files/templates/Screen Shot 2022-02-11 at 11.18.47 am.png
| | |-/var/www/wms/webroot/files/templates/69-NoBarcode3DigitQtySSCCPalletLabel.txt
| | |-/var/www/wms/webroot/files/templates/200x150-Product-Sample-Label.glabels
| | \-/var/www/wms/webroot/files/templates/100x50custom-1.glabels
| |-/var/www/wms/webroot/files/edi
| | \-/var/www/wms/webroot/files/edi/send
| |   |-/var/www/wms/webroot/files/edi/send/outbound
| |   \-/var/www/wms/webroot/files/ed* i/send/inbound
| |-/var/www/wms/webroot/files/daily_reports
| | |-/var/www/wms/webroot/files/daily_reports/2022-04-_Daily_Shift_Report.pdf
| | |-/var/www/wms/webroot/files/daily_reports/2022-04-14_Daily_Shift_Report.pdf
| | |-/var/www/wms/webroot/files/daily_reports/2022-05-05_Daily_Shift_Report.pdf
| | |-/var/www/wms/webroot/files/daily_reports/20_Daily_Shift_Report.pdf
 */


// With prefixes modified
/*
/|-||Home
//|-||Register
//|-||Array
//| |-||The Team
//| \-||Our Story
//\-||Array
//  |-||Locations
//  \-||Support
*/

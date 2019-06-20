<?php
/**
 * Header file.
 */
use PhpOffice\PhpSpreadsheet\Helper\Sample;

error_reporting(E_ALL);

require_once __DIR__ . '/../src/Bootstrap.php';

$helper = new Sample();

// Return to the caller script when runs by CLI
if ($helper->isCli()) {
    return;
}
?>
<html>
<head>
    <title><?php echo $helper->getPageTitle(); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/bootstrap/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/bootstrap/css/phpspreadsheet.css"/>
    <script src="/bootstrap/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>    
        <?php
        //echo $helper->getPageHeading();

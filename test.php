<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'stretch']);
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output('test.pdf', \Mpdf\Output\Destination::FILE);
?>
<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    $mpdf = new \Mpdf\Mpdf([
        'setAutoTopMargin' => 'stretch',
        'fontDir' => array_merge($fontDirs, [
            __DIR__ . '/my_fonts',
        ]),
        'fontdata' => $fontData + [
            'frudiger' => [
                'R' => 'HelveticaNeueCond.ttf',
                'I' => 'HelveticaNeueCond Italic.ttf',
                'B' => 'HelveticaNeueCond Bold.ttf',
                'BI' =>'HelveticaNeueCond BoldItalic.ttf'
            ],
            'wingdings' => [
                'R' => 'Wingdings Regular.ttf',
                'I' => 'Wingdings Regular.ttf',
                'B' => 'Wingdings Regular.ttf',
                'BI' =>'Wingdings Regular.ttf'
            ]
        ],
        'default_font' => 'frudiger'
    ]);


    $page_content = file_get_contents('./test.html', TRUE);

    // $mpdf = new \Mpdf\Mpdf();
    // $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($page_content);

    $mpdf->Output('test.pdf', \Mpdf\Output\Destination::FILE);
?>
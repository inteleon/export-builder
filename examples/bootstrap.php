<?php

use Inteleon\ExportBuilder\Builders\ReportBuilder;

// Init
require('../vendor/autoload.php');
class_alias('Inteleon\Pdf\Bridge', 'fpdi_bridge');

// Test data
$data = [];
for ($i = 0; $i < 123; $i++) {
    $data[] = [md5(uniqid()), 'test', rand() - 1000, rand() - 1000];
}

(new ReportBuilder())
    ->title('Random data')
    ->text('Period: Big bang - Future')

    ->addColumn('first', 47.5, null)
    ->addColumn('second',  47.5, null)
    ->addColumn('third', 47.5, '5678', true)
    ->addColumn('fourth', 47.5, '1234', false)

    ->numAmountColumns(2)
    ->data($data)
    ->addAccountingOrder(true)

    ->filename('report_test')
    ->exporter('pdf')
    ->render();

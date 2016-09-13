<?php

namespace Inteleon\ExportBuilder\CSV;

class ReportCSV extends AbstractExporterCSV
{

    public function build()
    {
        $handle = fopen('php://memory', 'w+');
        fputcsv($handle, $this->base->column_names, ';');
        foreach ($this->base->data as $row) {
            fputcsv($handle, $row, ';');
        }
        rewind($handle);
        return $handle;
    }
}

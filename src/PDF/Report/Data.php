<?php

namespace Inteleon\ExportBuilder\PDF\Report;

use Inteleon\ExportBuilder\Bases\ReportBase;
use Inteleon\ExportBuilder\PDF\ReportPDF;

class Data
{
    /**
     * @var ReportBase
     */
    private $base;

    public function __construct(ReportBase $base)
    {
        $this->base = $base;
    }

    /**
     * Set data on the pdf.
     *
     * @param ReportPDF $pdf
     */
    public function setData(ReportPDF $pdf)
    {
        $pdf->SetFillColor(240, 240, 240);
        $odd = true;
        foreach ($this->base->data as $row) {
            $pdf->SetFont('Arial', '', 5);
            $pdf->SetLineWidth(0.1);
            $col_index = 0;

            foreach ($row as $text) {
                $amount_column = $col_index >= $this->base->amount_columns_start;
                if ($amount_column) {
                    $this->base->sums_page [$col_index] += $text;
                    $this->base->sums_total[$col_index] += $text;
                    $text = $text == 0 ? '' : number_format($text, 2, ',', ' ');
                }
                $pdf->Cell(
                    $this->base->column_widths[$col_index++],
                    2.64,
                    $text,
                    'LR',
                    0,
                    $amount_column ? 'R' : 'L',
                    !$odd
                );
            }

            $odd = !$odd;
            $this->base->num_rows_page++;
            $this->base->num_rows_total++;
            $pdf->Ln();
        }
        $this->base->data_finished = true;
    }
}

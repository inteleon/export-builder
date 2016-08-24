<?php

namespace Inteleon\ExportBuilder\PDF\Report;

use Inteleon\ExportBuilder\Bases\ReportBase;
use Inteleon\ExportBuilder\PDF\ReportPDF;

class Header
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
     * Set the header on the pdf.
     *
     * @param ReportPDF $pdf
     */
    public function setHeader(ReportPDF $pdf)
    {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(60, 5, $this->base->title, 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(70, 5, $this->base->text, 0, 0, 'C');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(60, 5, 'Sida ' . $pdf->PageNo() . '/{nb}', 0, 0, 'R');

        $pdf->SetY(4.5);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(190, 5, 'Utskriftsdatum: ' . date('Y-m-d'), 0, 0, 'R');

        $pdf->SetLineWidth(0.4);
        $pdf->Line(12, 11.8, 202, 11.8);

        if (!$this->base->last_page) {
            $pdf->SetXY(12, 11.9);
            $pdf->SetLineWidth(0.1);
            $pdf->SetFontSize(4);
            $pdf->SetFillColor(220, 220, 220);
            $pdf->SetFont('Arial', 'B', 5);

            foreach ($this->base->account_names as $col_index => $name) {
                $pdf->Cell(
                    $this->base->column_widths[$col_index],
                    3,
                    $name,
                    $name != null,
                    0,
                    $col_index >= $this->base->amount_columns_start ? 'R' : 'L',
                    $name != null
                );
            }
            $pdf->Ln();
            foreach ($this->base->column_names as $col_index => $name) {
                $pdf->Cell(
                    $this->base->column_widths[$col_index],
                    3,
                    $name,
                    1,
                    0,
                    $col_index >= $this->base->amount_columns_start ? 'R' : 'L',
                    1
                );
            }
        } else {
            $pdf->SetLineWidth(0.1);
            $pdf->SetXY(12, 13.9);
        }

        $pdf->Ln();
    }
}

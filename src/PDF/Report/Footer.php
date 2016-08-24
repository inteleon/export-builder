<?php

namespace Inteleon\ExportBuilder\PDF\Report;

use Inteleon\ExportBuilder\Bases\ReportBase;
use Inteleon\ExportBuilder\PDF\ReportPDF;

class Footer
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
     * Set the footer on the pdf.
     *
     * @param ReportPDF $pdf
     */
    public function setFooter(ReportPDF $pdf)
    {
        $pdf->SetLineWidth(0.1);
        if (!$this->base->last_page) {
            $pdf->SetFillColor(220, 220, 220);

            // Page sums
            $pdf->SetFont('Arial', 'B', 5);
            for ($w = 0; $w < count($this->base->column_widths); $w++) {
                $val = '';
                if ($w == 0) {
                    $val = 'Antal: ' . $this->base->num_rows_page;
                } elseif ($w >= $this->base->amount_columns_start) {
                    $val = number_format($this->base->sums_page[$w], 2, ',', ' ');
                }
                $pdf->Cell($this->base->column_widths[$w], 3, $val, 1, 0, $w == 0 ? 'L' : 'R', 1);
            }
            $pdf->Ln();
            $pdf->Line(12, $pdf->GetY(), 202, $pdf->GetY());

            $this->base->num_rows_page = 0;
            foreach ($this->base->sums_page as $col => $_) {
                $this->base->sums_page[$col] = 0;
            }

            // Total sums
            if ($this->base->data_finished) {
                $pdf->SetFont('Arial', 'B', 5.6);
                for ($w = 0; $w < count($this->base->column_widths); $w++) {
                    $val = '';
                    if ($w == 0) {
                        $val = 'Totalt: ' . $this->base->num_rows_total;
                    } elseif ($w >= $this->base->amount_columns_start) {
                        $val = number_format($this->base->sums_total[$w], 2, ',', ' ');
                    }
                    $pdf->Cell($this->base->column_widths[$w], 3, $val, 1, 0, $w == 0 ? 'L' : 'R', 1);
                }
                $pdf->Ln();
                $pdf->Line(12, $pdf->GetY(), 200, $pdf->GetY());
            }
        }

        $pdf->SetLineWidth(0.4);
        $pdf->Line(12, 288, 202, 288);
        $pdf->SetY(-12);
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(0, 10, 'Sida '.$pdf->PageNo().'/{nb}', 0, 0, 'C');

        if ($this->base->data_finished) {
            $this->base->last_page = true;
        }
    }
}

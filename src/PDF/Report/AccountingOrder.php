<?php

namespace Inteleon\ExportBuilder\PDF\Report;

use Inteleon\ExportBuilder\Bases\ReportBase;
use Inteleon\ExportBuilder\PDF\ReportPDF;

class AccountingOrder
{
    /**
        * @var ReportBase
    */
    private $base;

    /**
     * AccountingOrder constructor.
     */
    public function __construct(ReportBase $base)
    {
        $this->base = $base;
    }

    /**
     * Add an accounting order to the pdf.
     *
     * @param ReportPDF $pdf
     */
    public function setAccountingOrder(ReportPDF $pdf)
    {
        $pdf->AddPage();
        $pdf->SetLineWidth(0.1);

        // Headline
        $pdf->SetY(40);
        $pdf->SetFont('Arial', '', 25);
        $pdf->Cell(80, 5, 'Bokföringsorder', 0, 1, '');

        // Headline
        $pdf->SetY(80);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(85, 8, 'Text', 1, 0, 'L', 1);
        $pdf->Cell(25, 8, 'Konto', 1, 0, 'L', 1);
        $pdf->Cell(40, 8, 'Debet', 1, 0, 'R', 1);
        $pdf->Cell(40, 8, 'Kredit', 1, 1, 'R', 1);

        // Data
        $sum_debit = 0;
        $sum_credit = 0;
        $pdf->SetFont('Arial', '', 11);
        for ($i = 0; $i < count($this->base->column_names); $i++) {
            if ($this->base->account_names[$i] != null && $this->base->account_debits != null) {
                $pdf->Cell(85, 8, $this->base->column_names[$i], 1, 0, 'L');
                $pdf->Cell(25, 8, $this->base->account_names[$i], 1, 0, 'L');
                if ($this->base->account_debits[$i]) {
                    $pdf->Cell(40, 8, number_format($this->base->sums_total[$i], 2, ',', ' '), 1, 0, 'R');
                    $pdf->Cell(40, 8, '', 1, 0, 'R');
                    $sum_debit += $this->base->sums_total[$i];
                } else {
                    $pdf->Cell(40, 8, '', 1, 0, 'R');
                    $pdf->Cell(40, 8, number_format($this->base->sums_total[$i], 2, ',', ' '), 1, 0, 'R');
                    $sum_credit += $this->base->sums_total[$i];
                }

                $pdf->Ln();
            }
        }

        // Sums
        $pdf->Cell(85, 8, '', 0, 0, 'L', 0);
        $pdf->Cell(25, 8, 'Summa', 1, 0, 'L', 1);
        $pdf->Cell(40, 8, number_format($sum_debit, 2, ',', ' '), 1, 0, 'R', 1);
        $pdf->Cell(40, 8, number_format($sum_credit, 2, ',', ' '), 1, 1, 'R', 1);
    }
}

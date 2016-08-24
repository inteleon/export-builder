<?php

namespace Inteleon\ExportBuilder\PDF;

use Inteleon\ExportBuilder\PDF\Report\AccountingOrder;
use Inteleon\ExportBuilder\PDF\Report\Data;
use Inteleon\ExportBuilder\PDF\Report\Header;
use Inteleon\ExportBuilder\PDF\Report\Footer;

class ReportPDF extends AbstractExporterPDF
{
    /**
     * Build the report.
     *
     * @return $this
     */
    public function build()
    {
        $this->SetTitle($this->base->title);
        $this->SetTopMargin(7.2);
        $this->AliasNbPages();
        $this->AddPage();
        $this->SetAutoPageBreak(true, 13);

        (new Data($this->base))->setData($this);

        if ($this->base->add_accounting_order) {
            (new AccountingOrder($this->base))->setAccountingOrder($this);
        }

        return $this;
    }

    public function setHeader()
    {
        (new Header($this->base))->setHeader($this);
    }

    public function setFooter()
    {
        (new Footer($this->base))->setFooter($this);
    }
}

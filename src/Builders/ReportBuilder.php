<?php

namespace Inteleon\ExportBuilder\Builders;

use Inteleon\ExportBuilder\Bases\ReportBase;
use Inteleon\ExportBuilder\CSV\ReportCSV;
use Inteleon\ExportBuilder\PDF\ReportPDF;

use LogicException;

class ReportBuilder extends Builder
{
    /**
     * constructor.
     */
    public function __construct(
        $pdf_class = 'Inteleon\ExportBuilder\PDF\ReportPDF',
        $csv_class = 'Inteleon\ExportBuilder\CSV\ReportCSV'
    ) {
        parent::__construct(new ReportBase());

        $this->addExportType('pdf', $pdf_class);
        $this->addExportType('csv', $csv_class);
    }

    /**
     * Set the title on the report.
     * This is visible on every page at the top left.
     *
     * @param string $title
     * @return $this
     */
    public function title($title)
    {
        $this->base->title = $title;

        return $this;
    }

    /**
     * Set text on the report.
     * This is visible on every page at the top middle
     *
     * @param string $text
     * @return $this
     */
    public function text($text)
    {
        $this->base->text = $text;

        return $this;
    }

    /**
     * Add a column to the report.
     *
     * @param string $name
     * @param integer $width
     * @param string $account_name
     * @param boolean $account_debit
     * @return $this
     */
    public function addColumn($name, $width, $account_name = null, $account_debit = null)
    {
        $this->base->column_names[]   = $name;
        $this->base->column_widths[]  = $width;
        $this->base->account_names[]  = $account_name;
        $this->base->account_debits[] = $account_debit;

        return $this;
    }

    /**
     * Add an accounting order.
     * This is a page that summarize each amount-column.
     * `account_name` and `account_debit` must be used in the `addColumn(...)` for these columns.
     *
     * @param boolean $add_accounting_order
     * @return $this
     */
    public function addAccountingOrder($add_accounting_order)
    {
        $this->base->add_accounting_order = $add_accounting_order;

        return $this;
    }

    /**
     * Set the data on the report.
     * The parameter should be a matrix.
     *
     * @param array $data
     * @return $this
     */
    public function data(array $data)
    {
        $this->base->data = array_merge($this->base->data, $data);

        return $this;
    }

    /**
     * Set number of columns containing an amount.
     * These will always be the last columns in the report.
     * The columns will be right aligned and summarized on each page, and total for the report.
     *
     * @param integer $num_amount_columns
     * @return $this
     * @throws LogicException
     */
    public function numAmountColumns($num_amount_columns)
    {
        $num_columns = count($this->base->column_names);
        if ($num_columns == 0) {
            throw new LogicException('columnNames must be called before numAmountColumns');
        }

        $this->base->num_amount_columns = $num_amount_columns;
        $this->base->amount_columns_start = $num_columns - $num_amount_columns;

        for ($i = $this->base->amount_columns_start; $i < $num_columns; $i++) {
            $this->base->sums_page [$i] = 0;
            $this->base->sums_total[$i] = 0;
        }

        return $this;
    }
}

<?php

namespace Inteleon\ExportBuilder\Bases;

class ReportBase extends AbstractBase
{
    /**
     * @var string
     */
    public $title = '';

    /**
     * @var string
     */
    public $text = '';

    /**
     * Number of columns that contain an amount
     * Will be Right-aligned and summed.
     *
     * @var int
     */
    public $num_amount_columns = 0;

    /**
     * What index the amount columns start at.
     *
     * @var int
     */
    public $amount_columns_start = 999;

    /**
     * Name of columns.
     *
     * @var array
     */
    public $column_names = [];

    /**
     * Account names of columns
     *
     * @var array
     */
    public $account_names = [];

    /**
     * Account is debit. (otherwise credit)
     *
     * @var array
     */
    public $account_debits = [];

    /**
     * Width of the columns.
     *
     * @var array
     */
    public $column_widths = [];

    /**
     * Data for table.
     *
     * @var array
     */
    public $data = [];

    /**
     * Add a last page or not.
     *
     * @var bool
     */
    public $add_accounting_order = false;


    /**
     * Sum for each column on this page.
     * @var array
     */
    public $sums_page = [];

    /**
     * Sum for each column in this report.
     *
     * @var array
     */
    public $sums_total = [];

    /**
     * num rows on this page.
     *
     * @var int
     */
    public $num_rows_page = 0;

    /**
     * num rows in this report.
     *
     * @var int
     */
    public $num_rows_total = 0;

    /**
     * data has finished writing
     *
     * @var boolean
     */
    public $data_finished = false;

    /**
     * On last page.
     *
     * @var bool
     */
    public $last_page = false;
}

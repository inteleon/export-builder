<?php

namespace Inteleon\ExportBuilder\CSV;

use Inteleon\ExportBuilder\Bases\AbstractBase;
use Inteleon\ExportBuilder\Exporter;

abstract class AbstractExporterCSV implements Exporter
{
    /**
     * @var AbstractBase
     */
    protected $base;

    public function __construct(AbstractBase $base)
    {
        $this->base = $base;
    }

    public function build()
    {
        // TODO: Implement this.
    }

    public function download()
    {
        // TODO: Implement this.
    }

    public function render()
    {
        // TODO: Implement this.
    }

    public function store($path)
    {
        // TODO: Implement this.
    }
}

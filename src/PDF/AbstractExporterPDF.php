<?php

namespace Inteleon\ExportBuilder\PDF;

use Inteleon\ExportBuilder\Bases\AbstractBase;
use Inteleon\ExportBuilder\Exporter;
use Inteleon\Pdf\Pdf;

abstract class AbstractExporterPDF extends Pdf implements Exporter
{
    /**
     * @var AbstractBase
     */
    protected $base;

    public function __construct(AbstractBase $base)
    {
        parent::__construct();
        $this->base = $base;
    }

    /**
     * Override this if a header should be used.
     */
    public function setHeader()
    {
    }

    /**
     * Override this if a footer should be used.
     */
    public function setFooter()
    {
    }

    public function download()
    {
        $this->build()->Output('D', $this->getFilename());
    }

    public function render()
    {
        $this->build()->Output('I', $this->getFilename());
    }

    public function store($path)
    {
        $this->build()->Output('F', $this->getFilename($path));
    }

    // @codingStandardsIgnoreStart

    function Header()
    {
        $this->setHeader();
    }

    function Footer()
    {
        $this->setFooter();
    }

    // @codingStandardsIgnoreEnd

    /**
     * Generate the filename
     *
     * @param string $path
     * @return string
     */
    private function getFilename($path = '')
    {
        return
            ($path != '' ? $path . DIRECTORY_SEPARATOR : '')
            . $this->base->filename . '.pdf';
    }
}

<?php

namespace Inteleon\ExportBuilder\CSV;

use Inteleon\ExportBuilder\Bases\AbstractBase;
use Inteleon\ExportBuilder\Exceptions\ExportStoreException;
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

    public function download()
    {
        $filename = $this->getFilename();
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename='{$filename}'");
        $this->render();
    }

    public function render()
    {
        $stream = $this->build();
        echo stream_get_contents($stream);
        fclose($stream);
    }

    /**
     * @return string
     */
    public function buffer()
    {
        $stream = $this->build();
        $content = stream_get_contents($stream);
        fclose($stream);

        return $content;
    }


    public function store($path)
    {
        $stream = $this->build();
        if (!file_put_contents($this->getFilename($path), stream_get_contents($stream))) {
            throw new ExportStoreException('Cannot store content to path: ' . $this->getFilename($path));
        }
        fclose($stream);
    }

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
            . $this->base->filename . '.csv';
    }
}

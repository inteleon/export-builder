<?php

namespace Inteleon\ExportBuilder\Builders;

use Inteleon\ExportBuilder\Bases\AbstractBase;
use Inteleon\ExportBuilder\Exporter;
use InvalidArgumentException;

abstract class Builder
{
    /**
     * @var AbstractBase
     */
    protected $base;

    /**
     * @var string
     */
    protected $exporter;

    /**
     * @var array
     */
    private $export_types = [];

    /**
     * Builder constructor.
     *
     * @param AbstractBase $base
     */
    public function __construct(AbstractBase $base)
    {
        $this->base = $base;
    }

    /**
     * Set the filename.
     *
     * @param $filename
     * @return $this
     */
    public function filename($filename)
    {
        $this->base->filename = $filename;

        return $this;
    }

    /**
     * Set what export type.
     * This uses the types added with `addExportType(...)`
     *
     * @param $exporter
     * @return $this
     */
    public function exporter($exporter)
    {
        $this->exporter = $exporter;

        return $this;
    }

    /**
     * Set the different formats for exporting,
     * and what class to be used to export that format.
     *
     * @param $name
     * @param $class
     * @throws InvalidArgumentException
     */
    public function addExportType($name, $class)
    {
        if (!class_exists($class)) {
            throw new InvalidArgumentException($class . ' does not exists.');
        }

        $this->export_types[$name] = $class;
    }

    /**
     * Build the file.
     *
     * @return mixed
     */
    public function build()
    {
        return $this->getExporter()->build();
    }

    /**
     * Download the file.
     *
     * @return mixed
     */
    public function download()
    {
        return $this->getExporter()->download();
    }
    /**
     * View the file in the browser.
     *
     * @return mixed
     */
    public function render()
    {
        return $this->getExporter()->render();
    }

    /**
     * Store the file on the server.
     *
     * @param $path
     * @return mixed
     */
    public function store($path)
    {
        return $this->getExporter()->store($path);
    }

    /**
     * Gets the filename.
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->base->filename;
    }

    /**
     * Get the exporter used for building the file.
     *
     * @return Exporter
     */
    public function getExporter()
    {
        $export_type = strtolower($this->exporter);

        if (!isset($this->export_types[$export_type])) {
            throw new InvalidArgumentException($export_type . ' is not a valid export type.');
        }

        $class = $this->export_types[$export_type];

        return new $class($this->base);
    }
}

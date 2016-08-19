<?php
/**
 * Created by PhpStorm.
 * User: Inteleon
 * Date: 2016-08-23
 * Time: 09:44
 */

namespace Inteleon\ExportBuilder;

use Inteleon\ExportBuilder\Bases\AbstractBase;

interface Exporter
{
    public function __construct(AbstractBase $base);

    /**
     * Just build it and return the result.
     *
     * @return mixed
     */
    public function build();

    /**
     * Download it.
     *
     * @return mixed
     */
    public function download();

    /**
     * Render it in the browser.
     * @return mixed
     */
    public function render();

    /**
     * Store it on the server.
     *
     * @param string $path
     * @return mixed
     */
    public function store($path);
}

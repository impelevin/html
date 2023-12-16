<?php

namespace Core\Traints;

use League\Plates\Engine;

trait View
{
    protected function render(string $name, array $data = [])
    {
        $templates = new Engine(__DIR__.'/../../views');
        echo $templates->render($name, $data);
    }
}
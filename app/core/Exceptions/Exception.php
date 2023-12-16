<?php

namespace Core\Exceptions;

use Core\Traints\View;

class Exception extends \Exception
{
    use View;

    public function show()
    {
        $this->render('error', [
            'code' => $this->getCode(),
            'message' => $this->getMessage()
        ]);

        exit();
    }
}
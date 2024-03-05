<?php

namespace Crafterlp\ActiveServersSdk\Exceptions;

use Exception;

class AccessDeniedException extends Exception
{

    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('This action is unauthorized.');
    }
}
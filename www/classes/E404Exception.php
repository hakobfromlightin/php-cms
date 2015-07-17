<?php

namespace Application\Classes;

class E404Exception
    extends \Exception
{
    protected $message;
    protected $code = 404;
}
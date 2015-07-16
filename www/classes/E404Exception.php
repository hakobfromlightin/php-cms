<?php

class E404Exception
    extends Exception
{
    protected $message;
    protected $code = 404;
}
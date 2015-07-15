<?php

class E404Ecxeption
    extends Exception
{
    protected $message;
    protected $code = 404;
}
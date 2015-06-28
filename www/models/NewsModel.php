<?php

class NewsModel
    extends AbstractModel
{
    public $id;
    public $title;
    public $text;

    protected static $table = 'news';
    protected static $order = 'date DESC';
    protected static $class = 'NewsModel';
}
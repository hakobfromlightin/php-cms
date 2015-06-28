<?php

class View
{
    public static function display($viewName){
        include __DIR__ . '../assets/' . $viewName;
    }
}
<?php

namespace Application\Classes;

interface IModel
{
    public static function getAll();
    public static function getOne($id);
}
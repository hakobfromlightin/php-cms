<?php

namespace Application\Classes;

class View
    implements \Iterator, \Countable

{
    protected $data = [];
    private $position = 0;

    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function render($template)
    {
        //$this->data['items'] = $items
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function count()
    {
        return count($this->data);
    }

    public function __construct()
    {
        $this->position = 0;
    }

    function rewind()
    {
        $this->position = 0;
    }

    function current()
    {
        return $this->data[$this->position];
    }

    function key()
    {
        return $this->position;
    }

    function next()
    {
        ++$this->position;
    }

    function valid()
    {
        return isset($this->data[$this->position]);
    }
}
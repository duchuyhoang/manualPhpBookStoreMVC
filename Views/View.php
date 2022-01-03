<?php

class View
{
    private $__content = array();

    public function __construct()
    {
    }


    public function load($view, $data = array())
    {
        extract($data);
        ob_start();

        require_once dirname(__FILE__) . "./" . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();
        $this->__content[] = $content;
    }

    public function show()
    {
        foreach ($this->__content as $html) {
            echo $html;
        }
    }
}

<?php

class Router
{
    private $url;
    private $pattern;
    private $controller;


    function __construct($url, $exact, $controller)
    {
        $this->url = $url;
        $this->controller = $controller;
        $standelized = str_replace("/", "", $url);

        if ($exact == true) {
            $this->pattern = '/^' . $standelized . '$/';
        } else {
            $this->pattern = '/^' . $standelized . '/i';
        }
    }

    function getController($url)
    {
        // $isMatched = preg_match($this->pattern, $url);
        $isMatched = preg_match($this->pattern, $url);
        $returnController = new stdClass();
        $returnController->isMatched = $isMatched ? true : false;
        $returnController->controller = $isMatched ? $this->controller : null;

        return $returnController;
    }

    // function 


}

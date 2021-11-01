<?php

class View
{
    /**
     * @desc biến lưu trữ các view đã load
     */
    private $__content = array();

    public function __construct()
    {
    }


    /**
     * Load view
     * 
     * @param   string
     * @param   array
     * @desc    hàm load view, tham số truyền vào là tên của view và dữ liệu truyền qua view
     */
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

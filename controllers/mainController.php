<?php
require_once "./controllers/Toolbox.class.php";


abstract class MainController
{

    protected function genererPage($data)
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }
}
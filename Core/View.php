<?php

namespace Core;

class View
{
    public $content;
    public function load($viewname, $data = [])
    {
        ob_start();
        extract($data);
        /*
         * Using the extract() operation can introduce some security risks
         * and create variables with uncontrolled names. Therefore,
         * it should be used with caution. If security measures and
         * controls are lacking, malicious users can exploit data
         * injection vulnerabilities. It is safer to process unsafe
         * data or user inputs in a controlled manner rather than
         * using extract() directly.
         */
        require BASEDIR.'/App/View/'.$viewname.'.php';
            $this->content = ob_get_contents();
        ob_clean();
        return $this->content;
    }
}
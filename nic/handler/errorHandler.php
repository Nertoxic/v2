<?php
$error = new errorHandler;
class errorHandler
{

    public function get(){

        if(!empty($GLOBALS['errorNessage'])) {
            return $GLOBALS['errorMessage'];
        }

    }

}
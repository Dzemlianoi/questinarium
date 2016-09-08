<?php

class checkAccess
{
    public static $denied = array('admin', 'Services');

    public static function isNotLogged()
    {
        return empty($_SESSION['user']);
    }
    public static function allowedAccess($controller){
        if (in_array($controller,self::$denied)) {
            if (self::isNotLogged()) {
                return false;
            }
        }
        return true;
    }
}
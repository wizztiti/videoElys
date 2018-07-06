<?php
/**
 * Created by PhpStorm.
 * User: wizztiti
 * Date: 06/07/2018
 * Time: 11:57
 */

if(! function_exists('flash')){
    function flash($message, $type = 'success')
    {
        session()->flash('notification.message', $message);
        session()->flash('notification.type', $type);
    }
}
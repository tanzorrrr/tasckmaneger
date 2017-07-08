<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autoload
 *
 * @author Admin
 */
function __autoload($class_name)
{
    //List all calss directoreas array

    $array_paths = array(
        '/models/',
        '/components/',
        '/controllers/',
    );

    foreach($array_paths as $path){
        $path = ROOT. $path .$class_name.'.php';

        if(is_file($path)){
            include_once $path;
        }
    }
}

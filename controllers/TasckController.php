<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tasck
 *
 * @author Admin
 */
require_once (ROOT."/models/Tasc.php");
class TasckController {
    public  function Actionindex(){
        require_once (ROOT."/views/tasck/index.php");
    }

    public function actionCreatetask(){

        $tasclist = Tasc::getTascksList();
        $userlist = User::getUserList();

       ;

        if(isset($_POST['submit'])){
             var_dump($_POST);
                echo "<br>";
            $option = array();
            $option['title']= $_POST['title'];
            $option['description']= $_POST['description'];
            $option['text']= $_POST['text'];
           // $option['image']= $_POST['image'];

            $option['userid']= $_POST['userid'];
            //$option['status']= $_POST['status'];

            $errors =false;

            if(!isset($option['title'])||empty($option)){
                $errors ="Pfild geps";
            }

            if(!$errors=false) {
                echo "<br>";
                var_dump($option);
                $id= Tasc::createTask($option);
            }


        }
        
        require(ROOT . '/views/cabinet/index.php');
        return true;
    }
    
    
   



}

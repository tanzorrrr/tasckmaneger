<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteController
 *
 * @author Admin
 */
class SiteController {
    public  function Actionindex(){
        require_once (ROOT."/views/site/index.php");
    }
    
}

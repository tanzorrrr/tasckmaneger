<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tasc
 *
 * @author Admin
 */
class Tasc {
    public static function createTask($option)
    {

        $db = Db::getConnection();

        $sql = "INSERT INTO tascks 
            (title,description,text,userid)
            VALUES(:title,:description,:text,:userid)";
        echo "hui";
        var_dump($option);

        $result = $db->prepare($sql);
        $result->bindParam(':title', $option['title'], PDO::PARAM_STR);
        $result->bindParam(':description', $option['description'], PDO::PARAM_STR);
        $result->bindParam(':text', $option['text'], PDO::PARAM_STR);
        $result->bindParam(':userid', $option['userid'], PDO::PARAM_STR);
        

        if ($result->execute()) {
            return $db->lastInsertId();
            
        }
        return 0;
        var_dump($result);
    }


    public  static  function getTascksList(){
        $db = Db::getConnection();

        $sql = "SELECT * FROM `tascks` INNER JOIN `Users` ON tascks.Userid=Users.id";

        $result =$db->query($sql);
        $tasclist = array();
        $i =0;
        while ($row=$result->fetch()){
            $tasclist[$i]['id'] = $row['id'];
            $tasclist[$i]['title'] = $row['title'];
            $tasclist[$i]['userid'] = $row['Userid'];
            $tasclist[$i]['name'] = $row['name'];
            $tasclist[$i]['email'] = $row['email'];
            $i++;
        }

        return $tasclist;
    }
    
}

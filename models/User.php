<?php
class User
{
    //Register user

    public static function register($name, $email,$password){
        $db = Db::getConnection();
        //Db connect
        $sql = 'INSERT INTO Users(name,email,password)'.'VALUES(:name, :email,:password)';
        //Resivd end return resultUsed Prepaared request
        $result = $db->prepare($sql);
        $result->bindParam(':name',$name, PDO::PARAM_STR);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->bindParam(':password',$password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name)
    {
        if(strlen($name)>=2){
            return true;
        }

        return false;
    }

    public static function checkPhone($phone)
    {
        if(strlen($phone)>=10){
            return true;
        }

        return false;
    }

    public static function checkPassword($password)
    {
        if(strlen($password)>=2){
            return true;
        }

        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }

        return false;
    }

    public static function checkEmailExists($email)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM Users WHERE email = :email';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserById($id)
    {
        if($id){
            $db = Db::getConnection();
            $sql = 'SELECT *FROM Users WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            //show we whant resiwd data lice array
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function checkUserData($email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM Users WHERE email = :email AND password = :password';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();

        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;
    }
    public static function edit($id, $name, $password)
    {
        $db =Db::getConnection();

        $sql = "UPDATE user 
            SET name = :name, password = :password 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam('id',$id, PDO::PARAM_INT);
        $result->bindParam('name',$name, PDO::PARAM_STR);
        $result->bindParam('password',$password, PDO::PARAM_STR);
        return  $result->execute();

    }
    //remeber User in sessions

    public static function auth($userId)
    {

        $_SESSION['user']= $userId;
    }

    public static function checkLogged()
    {

        //if sesion exisr return users id
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location:/user/login");
    }

    public static function isGuest()
    {

        if(isset($_SESSION['user'])){
            return false;
        }
        return true;
    }

    public static function getUserList(){
        $db = Db::getConnection();

        $sgl = "SELECT * FROM `Users` WHERE 1";

        $result =$db->query($sgl);
        $Userlist = array();
        $i =0;
        var_dump($result);
        while ($row=$result->fetch()){
            $Userlist[$i]['id'] = $row['id'];
            $Userlist[$i]['name'] = $row['name'];
            $i++;
        }
        return  $Userlist;
    }

}
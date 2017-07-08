<?php

class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email ='';
        $password ='';
        $result =false;

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email= $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkName($name)){
                $errors[] ='Name hewe ti bee morr then two laters';
            }

            if(!User::checkEmail($email)){
                $errors[] ='Wrong mail';
            }

            if(!User::checkPassword($password)){
                $errors[] ='Password cant be less 6 leters ';
            }

            if(User::checkEmailExists($email)){
                $errors[] ='This Email is olaredi exist';
            }

            if($errors==false){
                $result = User::register($name, $email,$password);
            }

        }
        require_once (ROOT.'/views/user/register.php');
        return true;
    }
    public function actionLogin()
    {
        // Переменные для формы
        $email = false;
        $password = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet");
            }
        }

        require_once (ROOT.'/views/user/login.php');
        return true;
    }

    //remuve data user from session

    //public function actionLogout()
    //{

       // unset($_SESION['user']);
        //header("Location: /");
    //}
}
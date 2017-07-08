<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ROOT.'/views/layout/header.php';?>
    <div class="container">
    <div class="row">

        <div class="col-sm-4 col-sm-offset-4 padding-right">

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="signup-form"><!--sign up form-->
                <h2>Вход на сайт</h2>
                <form action="#" method="post">
                    <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                    <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                    <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                </form>
            </div><!--/sign up form-->


            <br/>
            <br/>
        </div>
    </div>
</div>


    </section>
<?php include ROOT.'/views/layout/footer.php';?>
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.07.2017
 * Time: 17:06
 */
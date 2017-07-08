<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ROOT.'/views/layout/header.php';?>


<?php include ROOT.'/views/layout/aside.php';?>
<?php include ROOT.'/views/layout/aside.php';?>
<div class="col-md-8">


    <h2>users</h2>
    <div class="coment col-md-8">

        <table class="col-md-12" border="1">
            <tr>
                <th>№</th>
                <th><a href="">User Name</a></th>
                <th><a href="">User email</a></th>
                <th><a href="">photo</a></th>
                <th><a href="">Tasck title</a></th>
                <th><a href="">Tasck status</a></th>

            </tr>
            <?php foreach($tasclist as $tasck):?>
            <tr>
                <td><a href=""></td>
                <td><a href=""><?php echo $tasck['name'];?></td>
                <td><a href=""><?php echo $tasck['title'];?></a></a></td>
                <td><a href=""></a></a></td>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
            </tr>
            <?php endforeach;?>
        </table>


        <form action="tasckcreate" class="col-md-12" method="POST">
            <p><label for="">tasck title</label></p>
            <input type="text" class="col-md-12" name="title">
          
            <p><label for="">tasck short description</label></p>
            <textarea name="description" id="" cols="30" rows="10">

            </textarea>
            <p><label for="">tasck image</label></p>
            <input type="file">
            <p><label for="">tasck fool description</label></p>
            <textarea name="text" id="" cols="30" rows="10"></textarea>
            <h3>select user</h3>

            <select id="">

                <?php foreach($userlist as $user):?>
                <option name="name" value="<?php echo $user['id']?>">
                    <input type="text" name="userid" value="<?php echo $user['id'];?>">
                    </span><?php echo $user['name'];?></option>
                <?php endforeach;?>
            </select>
            <p><input type="submit" name="submit"></p>
        </form>
    </div>
</div>
</div>
</section>




<?php include ROOT.'/views/layout/footer.php';?>

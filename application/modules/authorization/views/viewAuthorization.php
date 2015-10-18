 <h2>Авторизация</h2>
    <form action="#" method="POST">
        <p><input type="email" name="email" value="<?php echo $email;?>" placeholder="Email"></p>
        <p><input type="password" name="password" placeholder="Пароль"></p>
        <p><input type="submit" name="submit" value="Войти"></p>
        <p><button><a href="/reg" style="text-decoration: none; color: black;">Зарегистрироваться</a></button></p>
    </form>
    <?php
    if(isset($errors) && is_array($errors) && $submit == 'submit') {
        echo '<ul>';
        foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }
    ?>
<?php if($addUser == 1): ?>                                                             <!-- если регистрация прошла успешно выводим сообщение и ссылку на диалоги-->
    <p>Поздравляем. Регистрация прошла успешно</p>
    <p><a href="/dialogs">Перейти к диалогам</a></p>
<?php else : ?>
    <h2>Регистрация</h2>                                                                <!-- если необходимо зарегистрироваться или рег данные с ошибками заполняем форму-->
    <form action="#" method="POST">
        <p><input type="text" name="name" value="<?php echo $name;?>" placeholder="Имя"></p>
        <p><input type="email" name="email" value="<?php echo $email;?>" placeholder="Email"></p>
        <p><input type="password" name="password" placeholder="Пароль"></p>
        <p><input type="submit" name="submit" value="Регистрация"></p>
    </form>
    <?php
        if(isset($errors) && is_array($errors) && $submit == 'submit') {
        echo '<ul>';
        foreach ($errors as $error) {
            if ($error) {
                echo '<li>' . $error . '</li>';
            }
        }
        echo '</ul>';
        }
    ?>
<?php endif; ?>


<?php
foreach($rows as $row){
    echo $row->id_user . '<br>';
    echo $row->message . '<br>';
    echo $row->date_add;
    echo '<hr>';
}
?>
<form action="#" method="post">
    <p><textarea id="text" rows="1" cols="85" name="text" placeholder="Ваше сообщение"></textarea></p>
    <p><button id="submit" name="submit">Оправить</button></p>
</form>




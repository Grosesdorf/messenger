
<?php
foreach($rows as $row){
    echo $row->id_user . '<br>';
    echo $row->message . '<br>';
    echo $row->date_add;
    echo '<hr>';
}
?>
<form action="/dialog/addMessage/<?php echo $idDialog?>" method="post">
    <p><textarea id="text" rows="1" cols="85" name="message" placeholder="Ваше сообщение"></textarea></p>
    <p><input type="hidden" name="userId" value="<?php echo $userId;?>"></p>
    <p><input type="hidden" name="dialogId" value="<?php echo $idDialog;?>"></p>
    <p><input type="submit" id="submit" name="submit" value="Оправить"></p>
</form>




<?php echo '<h3>Вы вошли, как ' . $userName . '</h3><hr>';?>
<h4>Ваши диалоги...</h4>
<hr>
<form action="<?php $base_url ?>" method="post">
    <p>Сортировать диалоги по дате</p>
    <input type="submit" name="sort" value="DESC">
    <input type="submit" name="sort" value="ASC">
</form>
<hr>
<?php
if($rows) {
    foreach ($rows as $row) {
        echo 'ID диалога: ' . $row->id . '<br />';
        if($row->name == $userName){
            $row->name = $row->name_mess;
        }
        echo '=> ' . $row->name . '<br />';
        echo $row->date_message . '<br />';
        echo substr($row->message, 0, 350) . '<br />';
        echo '<form action="/dialog/showDialog" method="post">
             <input type="submit" name="submit" value="К диалогу">
             <input type="hidden" name="id_dialog" value="' . $row->id . '">
             <input type="hidden" name="id_own" value="' . $row->id_owner_dialog . '">
             <input type="hidden" name="id_comp" value="' . $row->id_companion_dialog . '">
             </form>';
        echo '<hr>';
    }
}
else{
    echo "Диалоги отсутствуют...";
}
//echo '<pre>';
//print_r($rows);
//echo '</pre>';
?>



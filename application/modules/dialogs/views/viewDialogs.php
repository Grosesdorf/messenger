<h3>This is list dialogs.</h3>
<form action="<?php $base_url ?>" method="post">
    <input type="submit" name="sort" value="DESC">
    <input type="submit" name="sort" value="ASC">
</form>
<?php
foreach($result->result() as $row){
    echo $row->id . '<br />';
    echo $row->name_own . ' говорит с  ' . $row->name_comp . '<br />';
    echo substr($row->message, 0, 300) . '<br />';
    echo $row->date_add . '<br />';
    echo '<form action="#" method="post">
          <input type="button" name="dialog" value="Перейти к диалогу">
          </form>';
    echo '<hr>';
}
print_r($_POST);
?>



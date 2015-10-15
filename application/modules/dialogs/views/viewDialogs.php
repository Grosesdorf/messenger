<h3>This is list dialogs.</h3>
<?php
foreach($result->result() as $row){
    echo $row->id . '<br />';
    echo $row->id_owner_dialog . '===>' . $row->id_companion_dialog . '<br />';
    echo $row->date_add . '<br /><hr>';
}
?>
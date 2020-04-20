<?php 
    session_start();
    $_SESSION = array();
    session_destroy();
    unset($_POST);
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
?>
<?php

session_start();
if(!$_SESSION['login']){
    header('Location: index.html');
    exit();
}

?>
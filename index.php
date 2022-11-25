<?php
    include $_SERVER["DOCUMENT_ROOT"]."./env.php";
    include $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    dbConnect($db_host, $db_port, $db_name, $db_schema, $db_username, $db_password);
    include $_SERVER["DOCUMENT_ROOT"]."./func/auth.php";
    
    include $_SERVER["DOCUMENT_ROOT"]."/views/login.php";
?>
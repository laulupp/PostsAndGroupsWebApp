<?php

    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/auth/header.php";
    if(isset($_GET['page'])){
        if($_GET['page']=="register"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/register.php";
        }
        else{
            include $_SERVER["DOCUMENT_ROOT"]."/views/login.php";
        }
    } else {
        include $_SERVER["DOCUMENT_ROOT"]."/views/login.php";
    }
    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/auth/footer.php";

?>
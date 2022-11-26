<?php
    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/home/header.php";
    if(isset($_GET['page'])){
        if($_GET['page']=="home"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
        }
        else{
            include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
        }
    } else {
        include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
    }
    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/home/footer.php";
?>
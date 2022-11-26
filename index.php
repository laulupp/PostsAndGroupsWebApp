<?php
    require_once ($_SERVER["DOCUMENT_ROOT"]."./env.php");
    include $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    include $_SERVER["DOCUMENT_ROOT"]."./func/auth.php";

    session_start();

    $dbC = new dbCredit();
    dbConnect($dbC);
    
    $message = "";
    if(!isLoggedIn()){
        if(isset($_POST['tryLogin'])){
            $message = tryToLogin($_POST['username'], $_POST['password'], $dbC);
        }
        if(isset($_POST['tryRegister'])){
            $message = tryToRegister($_POST['username'], $_POST['password'], $_POST['password2'], $dbC);
            if($message==""){
                tryToLogin($_POST['username'], $_POST['password'], $dbC);
            }
        }
    }
    else if(isset($_POST['page']) && $_POST['page']=="logout"){
        logout();
    }

    if(isLoggedIn()){
        //echo "logged in";
        include $_SERVER["DOCUMENT_ROOT"]."/routes/default.php";
    } else {
        include $_SERVER["DOCUMENT_ROOT"]."/routes/auth.php";
    }

?>
<?php
    /*include $_SERVER["DOCUMENT_ROOT"]."/views/partial/auth/header.php";

        $request = $_SERVER['REQUEST_URI'];
        echo $request;
        switch($request){
            case '/register':
                include $_SERVER["DOCUMENT_ROOT"]."/views/register.php";
                break;
            case '/login': 
                include $_SERVER["DOCUMENT_ROOT"]."/views/login.php";
                break;
            default:
                header("Location: /login");
        }

    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/auth/footer.php";*/

    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/auth/header.php";
    if(isset($_POST['page'])){
        if($_POST['page']=="register"){
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
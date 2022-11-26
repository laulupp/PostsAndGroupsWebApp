<?php
    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/home/header.php";

    if(isset($_POST['page'])){
        if($_POST['page']=="home"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
        }
        else if($_POST['page']=="addpost"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/addpost.php";
        } 
        else if($_POST['page']=="myposts"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/myposts.php";
        }
        else if($_POST['page']=="tryCreatePost"){
            include $_SERVER["DOCUMENT_ROOT"]."/func/posts.php";
            $message = tryToCreatePost($_POST['title'], $_POST['shortd'], $_POST['longd'], $_SESSION['user'], $dbC);
            if($message == ""){
                $message = "Post added successfully";
                include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
            }else{
                include $_SERVER["DOCUMENT_ROOT"]."/views/addpost.php";
            }
        }
    } else {
        include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
    }
    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/home/footer.php";
?>
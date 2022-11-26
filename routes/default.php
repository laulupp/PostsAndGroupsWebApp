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
            include_once $_SERVER["DOCUMENT_ROOT"]."/func/posts.php";
            $message = tryToCreatePost($_POST['title'], $_POST['shortd'], $_POST['longd'], $_SESSION['user'], $dbC);
            if($message == ""){
                $message = "Post added successfully";
                include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
            }else{
                include $_SERVER["DOCUMENT_ROOT"]."/views/addpost.php";
            }
        }
        else if($_POST['page']=="tryDelete"){
            include_once $_SERVER["DOCUMENT_ROOT"]."/func/posts.php";
            $message = tryDelete($_POST['postID'], $dbC);
            if($message == ""){
                $message = "Post deleted successfully";
                if(isset($_POST['nextpg']) && $_POST['nextpg']=="myposts"){
                    include $_SERVER["DOCUMENT_ROOT"]."/views/myposts.php";
                }
                else{
                    include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
                }
            }else{
                include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
            }
        }
        else{
            include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
        }
    } else {
        include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
    }
    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/home/footer.php";
?>
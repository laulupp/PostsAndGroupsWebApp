<?php
    include $_SERVER["DOCUMENT_ROOT"]."/views/partial/home/header.php";

    if(isset($_GET['page'])){
        if($_GET['page']=="home"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
        }
        else if($_GET['page']=="addpost"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/addpost.php";
        } 
        else if($_GET['page']=="myposts"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/myposts.php";
        }
        else if($_GET['page']=="tryCreatePost"){
            include_once $_SERVER["DOCUMENT_ROOT"]."/func/posts.php";
            $message = tryToCreatePost($_POST['title'], $_POST['shortd'], $_POST['longd'], $_SESSION['user'], $dbC);
            if($message == ""){
                $message = "Post added successfully";
                include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
            }else{
                include $_SERVER["DOCUMENT_ROOT"]."/views/addpost.php";
            }
        }
        else if($_GET['page']=="tryDelete"){
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
        else if($_GET['page'] == "viewpost"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/viewpost.php";
        }
        else if($_GET['page'] == "tryCreateComment"){
            include_once $_SERVER["DOCUMENT_ROOT"]."/func/posts.php";
            tryToCreateComment($dbC);
            include $_SERVER["DOCUMENT_ROOT"]."/views/viewpost.php";
        }
        else if($_GET['page'] == "createGroup"){
            if(isset($_POST['page']) && $_POST['page'] == "createGroup" ){
                include_once $_SERVER["DOCUMENT_ROOT"]."/func/groups.php";
                createGroup();
                include $_SERVER["DOCUMENT_ROOT"]."/views/mygroups.php";
            }
            else {
                include $_SERVER["DOCUMENT_ROOT"]."/views/creategroup.php";
            }
        }
        else if($_GET['page'] == "joinGroup"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/joingroup.php";
        }
        else if($_GET['page'] == "tryJoinGroup"){
            include_once $_SERVER["DOCUMENT_ROOT"]."/func/groups.php";
            if(isset($_POST['groupid'])){
                 $message = tryJoinGroup($_POST['groupid']);
                 if($message == ""){
                    include $_SERVER["DOCUMENT_ROOT"]."/views/mygroups.php";
                 }
                 else{
                    include $_SERVER["DOCUMENT_ROOT"]."/views/joingroup.php";
                 }
            }
            else{
                include $_SERVER["DOCUMENT_ROOT"]."/views/home.php";
            }
        }
        else if($_GET['page'] == "myGroups"){
            include $_SERVER["DOCUMENT_ROOT"]."/views/mygroups.php";
        }
        else if($_GET['page'] == "joinChat"){
            if(isset($_POST['groupId'])){
                include_once $_SERVER["DOCUMENT_ROOT"]."/func/groups.php";
                if(isset($_POST['sendMessage'])){
                    addMessage();
                }
                include $_SERVER["DOCUMENT_ROOT"]."/views/groupchat.php";
            }
            else {
                include $_SERVER["DOCUMENT_ROOT"]."/views/mygroups.php";
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
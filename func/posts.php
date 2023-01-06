<?php
function tryToCreatePost($title, $shortd, $longd, $user, $dbC){
    if(strlen($title) == 0 || strlen($shortd) == 0 || strlen($longd) == 0){
        return "Please complete all fields";
    }
    pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_postsTable."(title, owner, shortdescription, longdescription) VALUES ('$title', '$user', '$shortd', '$longd')");
    
    //getting postid
    $idrow = pg_query("SELECT id FROM ".$dbC->db_schema.".".$dbC->db_postsTable." WHERE owner='".$_SESSION['user']."' ORDER BY id DESC");
    $id = pg_fetch_row($idrow)[0];

    $result = pg_query("SELECT id, topic FROM ".$dbC->db_schema.".".$dbC->db_topicsTable);
    while($line = pg_fetch_row($result)){
        if(isset($_POST["topic".$line[0]]) && $_POST["topic".$line[0]] == "on"){
            $topicid = $line[0];
            pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_resolverPostTopic."(postid, topicid) VALUES ('$id', '$topicid')");
        }
    }

    return "";
}
function showAllPosts($dbC){
    $result = pg_query("SELECT title, owner, shortdescription, longdescription, id FROM ".$dbC->db_schema.".".$dbC->db_postsTable);
    while($line = pg_fetch_row($result)){
        $title = $line[0];
        $title[0] = strtoupper($title[0]);
        $owner = $line[1];
        $owner[0] = strtoupper($owner[0]);
        $shortd = $line[2];
        $shortd[0] = strtoupper($shortd[0]);
        $longd = $line[3];
        $longd[0] = strtoupper($longd[0]);
        $postid = $line[4];
        $postid[0] = strtoupper($postid[0]);
        $nextpg="home";
        include $_SERVER["DOCUMENT_ROOT"]."/models/post.php";
    }
}
function showPostById($dbC, $id){
    $result = pg_query("SELECT title, owner, shortdescription, longdescription, id FROM ".$dbC->db_schema.".".$dbC->db_postsTable." WHERE id=".$id);
    $line = pg_fetch_row($result);
        $title = $line[0];
        $title[0] = strtoupper($title[0]);
        $owner = $line[1];
        $owner[0] = strtoupper($owner[0]);
        $shortd = $line[2];
        $shortd[0] = strtoupper($shortd[0]);
        $longd = $line[3];
        $longd[0] = strtoupper($longd[0]);
        $postid = $line[4];
        $postid[0] = strtoupper($postid[0]);
        $nextpg="home";
        include $_SERVER["DOCUMENT_ROOT"]."/models/post.php";
}
function showUserPosts($dbC){
    $result = pg_query("SELECT title, owner, shortdescription, longdescription, id FROM ".$dbC->db_schema.".".$dbC->db_postsTable." WHERE owner='".$_SESSION['user']."'");
    while($line = pg_fetch_row($result)){
        $title = $line[0];
        $title[0] = strtoupper($title[0]);
        $owner = $line[1];
        $owner[0] = strtoupper($owner[0]);
        $shortd = $line[2];
        $shortd[0] = strtoupper($shortd[0]);
        $longd = $line[3];
        $longd[0] = strtoupper($longd[0]);
        $postid = $line[4];
        $postid[0] = strtoupper($postid[0]);
        $nextpg="myposts";
        include $_SERVER["DOCUMENT_ROOT"]."/models/post.php";
    }
}
function tryDelete($id, $dbC){
    $result = pg_query("SELECT owner FROM ".$dbC->db_schema.".".$dbC->db_postsTable." WHERE id='".$id."'");
    $res = pg_fetch_row($result)[0];
    if($res == $_SESSION['user']){
        pg_query("DELETE FROM ".$dbC->db_schema.".".$dbC->db_postsTable." WHERE id='".$id."'");
        pg_query("DELETE FROM ".$dbC->db_schema.".".$dbC->db_commentsTable." WHERE postid='$id'");
        pg_query("DELETE FROM ".$dbC->db_schema.".".$dbC->db_resolverPostTopic." WHERE postid='$id'");
        return "";
    } else {
        return "Action invalid!";
    }
}
function tryToCreateComment($dbC){
    if(isset($_POST['comment']) && $_POST['comment'] != null){
        pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_commentsTable."(postid, comment, ownerid) VALUES ('".$_GET['postid']."', '".$_POST['comment']."', '".$_SESSION['userid']."');");
    }
}
function showCommentsWithId($dbC, $id){
    $result = pg_query("SELECT comment, ownerid FROM ".$dbC->db_schema.".".$dbC->db_commentsTable." WHERE postid='".$id."'");
    while($line = pg_fetch_row($result)){
        $ownerQ = pg_query("SELECT username FROM ".$dbC->db_schema.".".$dbC->db_usersTable." WHERE id = '".$line[1]."'");
        $owner = pg_fetch_row($ownerQ)[0];
        $owner[0] = strtoupper($owner[0]);
        $comment = $line[0];
        include $_SERVER["DOCUMENT_ROOT"]."/models/comment.php";
    }
}
function showTopics($dbC){
    $result = pg_query("SELECT id, topic FROM ".$dbC->db_schema.".".$dbC->db_topicsTable);
    while($line = pg_fetch_row($result)){
        $index = $line[0];
        $name = $line[1];
        include $_SERVER["DOCUMENT_ROOT"]."/models/topic.php";
    }
}
function showTopicsOfPost($dbC, $postid){
    $result = pg_query("SELECT topicid FROM ".$dbC->db_schema.".".$dbC->db_resolverPostTopic." WHERE postid = '$postid'");
    $resultStr = "";

    $ok = true;

    while($line = pg_fetch_row($result)){
        $resultTopicName = pg_query("SELECT topic FROM ".$dbC->db_schema.".".$dbC->db_topicsTable." WHERE id = '".$line[0]."'");
        $topicname = pg_fetch_row($resultTopicName)[0];
        $topicname[0] = strtoupper($topicname[0]);
        if($ok == true){
            $resultStr = $topicname;
            $ok = false;
        } 
        else {
            $resultStr = $resultStr.", ".$topicname;
        }
    }

    if($resultStr == ""){
        $resultStr = "There area no topics associated with this post";
    }
    return $resultStr;
}
    
?>

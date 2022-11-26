<?php
function tryToCreatePost($title, $shortd, $longd, $user, $dbC){
    if(strlen($title) == 0 || strlen($shortd) == 0 || strlen($longd) == 0){
        return "Please complete all fields";
    }
    pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_postsTable."(title, owner, shortdescription, longdescription) VALUES ('$title', '$user', '$shortd', '$longd')");
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
        return "";
    } else {
        return "Action invalid!";
    }
}
?>
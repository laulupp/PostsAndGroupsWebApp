<?php
function tryToCreatePost($title, $shortd, $longd, $user, $dbC){
    if(strlen($title) == 0 || strlen($shortd) == 0 || strlen($longd) == 0){
        return "Please complete all fields";
    }
    pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_postsTable."(title, owner, shortdescription, longdescription) VALUES ('$title', '$user', '$shortd', '$longd')");
    return "";
}

?>
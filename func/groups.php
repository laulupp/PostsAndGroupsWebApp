<?php

function generateInviteCode($id){
    return $id + 1000;
}
function getIdFromInviteCode($groupkey){
    return $groupkey - 1000;
}
function createGroup(){
    include_once $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    $dbC = new dbCredit();
    $id = 1;
    $res = pg_query("SELECT id FROM ".$dbC->db_schema.".".$dbC->db_groups." ORDER BY id DESC");
    $resline = pg_fetch_row($res);
    if(pg_num_rows($res) > 0){  
        $id = $resline[0] + 1;
    }
    pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_groups."(groupkey, ownerid) VALUES ('".generateInviteCode($id)."','".$_SESSION['userid']."')");
    pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_resolverUserGroup."(userid, groupid) VALUES ('".$_SESSION['userid']."','".$id."')");
}
function tryJoinGroup($groupkey){

    //region getting id from groupkey
    $groupid = getIdFromInviteCode($groupkey);
    //end region

    include_once $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    $dbC = new dbCredit();

    $res = pg_query("SELECT id FROM ".$dbC->db_schema.".".$dbC->db_resolverUserGroup." WHERE groupid = '$groupid' AND userid = '".$_SESSION['userid']."'");
    if(pg_num_rows($res) > 0){
        return "You are already in this group!";
    }
    $res = pg_query("SELECT id FROM ".$dbC->db_schema.".".$dbC->db_resolverUserGroup." WHERE groupid = '$groupid'");
    if(pg_num_rows($res) == 0 ){
        return "The group doesn't exist!";
    }
    pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_resolverUserGroup."(userid, groupid) VALUES ('".$_SESSION['userid']."','".$groupid."')");
    return "";
}
function showGroups(){
    include_once $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    $dbC = new dbCredit();

    $res = pg_query("SELECT groupid FROM ".$dbC->db_schema.".".$dbC->db_resolverUserGroup." WHERE userid = '".$_SESSION['userid']."'");
    while($line = pg_fetch_row($res)){
        $groupid = $line[0];
        $res2 = pg_query("SELECT groupkey, ownerid FROM ".$dbC->db_schema.".".$dbC->db_groups." WHERE id = '$groupid'");
        $line2 = pg_fetch_row($res2);
        $groupkey = $line2[0];
        $isowner = false;
        if($line2[1] == $_SESSION['userid']){
            $isowner = true;
        }
        include $_SERVER["DOCUMENT_ROOT"]."/models/group.php";
    }

}
function addMessage(){
    include_once $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    $dbC = new dbCredit();

    pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_messages." (groupid, ownerid, text) VALUES ('".$_POST['groupId']."', '".$_SESSION['userid']."', '".$_POST['message']."')");
}
function getUsernameFromId($id){
    include_once $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    $dbC = new dbCredit();

    $res = pg_query("SELECT username FROM ".$dbC->db_schema.".".$dbC->db_usersTable." WHERE id = '$id'");
    $line = pg_fetch_row($res);
    return $line[0];
}
function showMessages(){
    include_once $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    $dbC = new dbCredit();

    $res = pg_query("SELECT ownerid, text, createdat FROM ".$dbC->db_schema.".".$dbC->db_messages." WHERE groupid = '".$_POST['groupId']."'");
    if(pg_num_rows($res) == 0){
        ?>
            <h3 class="w3-center w3-margin w3-text-gray">There are no messages in this group yet</h3>
        <?php
    }
    while($line = pg_fetch_row($res)){
        $timestmp = substr($line[2],0,16);
        $message = $line[1];
        $messageowner = getUsernameFromId($line[0]);
        $messageowner[0] = strtoupper($messageowner[0]);
        if($line[0] == $_SESSION['userid']){
            include $_SERVER["DOCUMENT_ROOT"]."/models/mymessage.php";
        }
        else {
            include $_SERVER["DOCUMENT_ROOT"]."/models/othermessage.php";
        }
    }
}
?>
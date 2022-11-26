<?php 

function checkUserExists($user, $dbC){
    $res = pg_query("SELECT * FROM ".$dbC->db_schema.".".$dbC->db_usersTable." WHERE username = '".$user."'");
    if(pg_num_rows($res) > 0){
        return true;
    }
    return false;
}
function tryToLogin($user, $password, $dbC){
    if($user == null || $password == null){
        return "Invalid creditentials";
    }
    $res = pg_query("SELECT password FROM ".$dbC->db_schema.".".$dbC->db_usersTable." WHERE username = '".$user."'");
    if(pg_num_rows($res) > 0){
        $pwd = pg_fetch_row($res);
        if($pwd[0] == md5($password)){
            $_SESSION['user'] = $user;
            //$_SESSION['password'] = $password;
            return "";
        }

        return "Invalid password";
    }
    return "Invalid username";
}
function tryToRegister($user, $password, $repassword, $dbC){
    if($user == null || $password == null || $repassword == null){
        return "Please complete all fields";
    }
    if(checkUserExists($user, $dbC)){
        return "The username already exists";
    }

    if($password != $repassword){
        return "The passwords don't match";
    }
    pg_query("INSERT INTO ".$dbC->db_schema.".".$dbC->db_usersTable."(username, password) VALUES ('".$user."', '".md5($password)."')");
    return "";
}
function logout(){
    $_SESSION['user'] = null;
}
function isLoggedIn(){
    if(isset($_SESSION['user'])){
        return true;
    }
    return false;
}
?>
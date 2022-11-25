<?php 
function checkUserExists($user){
    $res = pg_query("SELECT * FROM ".$db_name." WHERE username = ".$user);
    if(pg_num_rows($res) > 0){
        return true;
    }
    return false;
}
function tryToLogin($user, $password){
    $res = pg_query("SELECT password FROM ".$db_name." WHERE username = ".$user);
    if(pg_num_rows($res) > 0){
        $pwd = pg_fetch_row($res);
        if($pwd[0] == md5($password)){
            session_start();
            $_auth = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            return "";
        } else {
            $_auth=false;
            return "Invalid password";
        }
    }
    return "Invalid username";
}

?>
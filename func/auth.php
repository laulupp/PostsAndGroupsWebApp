<?php 
function checkUserExists($user){
    $res = pg_query("SELECT * FROM ".$db_name." WHERE username = ".$user);
    if(pg_num_rows($res) > 0){
        return true;
    }
    return false;
}
function tryToLogin($user, $password){
    if($user === null || $password === null){
        return "Invalid creditentials";
    }
    $res = pg_query("SELECT password FROM ".$db_name." WHERE username = ".$user);
    if(pg_num_rows($res) > 0){
        $pwd = pg_fetch_row($res);
        if($pwd[0] == md5($password)){
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            return "";
        }

        return "Invalid password";
    }
    return "Invalid username";
}
function tryToRegister($user, $password, $repassword){
    if($user === null || $password === null || $repassword === null){
        return "Please complete all fields";
    }
    if(checkUserExists($user)){
        return "The username already exists";
    }

    if($password != $repassword){
        return "The passwords don't match"
    }
    pg_query("INSERT INTO ".$db_name."(username, password) VALUES (".$user.", ".md5($password).")");
    return "";
}
function logout(){
    session_abort();
}
?>
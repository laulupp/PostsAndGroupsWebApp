<?php
    include $_SERVER["DOCUMENT_ROOT"]."./env.php";
    include $_SERVER["DOCUMENT_ROOT"]."./func/db.php";
    include $_SERVER["DOCUMENT_ROOT"]."./func/auth.php";

    class dbCredit{
        public $db_host       = "localhost";
        public $db_port       = "5432";
        public $db_username   = "postgres";
        public $db_password   = "admin";
        public $db_name       = "weblogin";
    
        public $db_schema     = "public";
        public $db_usersTable = "users";
        public $db_postsTable = "posts";
    }

    $dbC = new dbCredit();
    dbConnect($dbC);
    
    $message = "";
    if(isset($_POST['tryLogin'])){
        $message = tryToLogin($_POST['username'], $_POST['password'], $dbC);
    }

    if(isLoggedIn()){
        include $_SERVER["DOCUMENT_ROOT"]."/routes/default.php";
    } else {
        include $_SERVER["DOCUMENT_ROOT"]."/routes/auth.php";
    }

?>
<?php //this file must be mentioned in the .gitignore file
      //but the project works with a local database, so there isnt' any information leak
$db_host       = "localhost";
$db_port       = "5432";
$db_username   = "postgres";
$db_password   = "admin";
$db_name       = "weblogin";

$db_schema     = "public";
$db_usersTable = "users";
$db_postsTable = "posts";

?>
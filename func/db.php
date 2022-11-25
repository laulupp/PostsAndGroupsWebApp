<?php
function dbConnect($db_host, $db_port, $db_name, $db_schema, $db_username, $db_password){
    $connection = pg_connect("host=".$db_host." port=".$db_port." user=".$db_username." password=".$db_password);
    if($connection){
        if(pg_num_rows(pg_query("SELECT datname FROM pg_database WHERE datname = '".$db_name."'")) == 0){
            pg_query("CREATE DATABASE ".$db_name);
        }
        $connection = pg_connect("host=".$db_host." port=".$db_port." dbname=".$db_name." user=".$db_username." password=".$db_password);
        pg_query("CREATE SCHEMA IF NOT EXISTS ".$db_schema." AUTHORIZATION CURRENT_ROLE");
        pg_query("CREATE TABLE IF NOT EXISTS ".$db_schema.".".$db_name."( id SERIAL primary key, username Varchar(255) not null, password Varchar(255) not null)");
        return true;
    }
    echo "No db connection";
    return false;
}


?>
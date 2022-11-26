<?php

function dbConnect($dbC){

        $connection = pg_connect("host=".$dbC->db_host." port=".$dbC->db_port." user=".$dbC->db_username." password=".$dbC->db_password);
        if($connection){
            if(pg_num_rows(pg_query("SELECT datname FROM pg_database WHERE datname = '".$dbC->db_name."'")) == 0){
                pg_query("CREATE DATABASE ".dbC->$db_name);
            }
            $connection = pg_connect("host=".$dbC->db_host." port=".$dbC->db_port." dbname=".$dbC->db_name." user=".$dbC->db_username." password=".$dbC->db_password);
            pg_query("CREATE SCHEMA IF NOT EXISTS ".$dbC->db_schema." AUTHORIZATION CURRENT_ROLE");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_usersTable."( id SERIAL primary key, username Varchar(255) not null, password Varchar(255) not null)");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_postsTable."( id SERIAL primary key, owner Varchar(255) not null, title Varchar(255) not null, shortdescription Varchar(255) not null, longdescription Varchar(5000), datecreated timestamp NOT NULL DEFAULT now())");
            return true;
        }
        echo "No DB connection";
        return false;
}


?>
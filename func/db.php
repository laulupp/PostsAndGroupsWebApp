<?php

function dbConnect($dbC){

        $connection = pg_connect("host=".$dbC->db_host." port=".$dbC->db_port." user=".$dbC->db_username." password=".$dbC->db_password);
        if($connection){
            if(pg_num_rows(pg_query("SELECT datname FROM pg_database WHERE datname = '".$dbC->db_name."'")) == 0){
                pg_query("CREATE DATABASE ".$dbC->db_name);
            }
            $connection = pg_connect("host=".$dbC->db_host." port=".$dbC->db_port." dbname=".$dbC->db_name." user=".$dbC->db_username." password=".$dbC->db_password);
            pg_query("CREATE SCHEMA IF NOT EXISTS ".$dbC->db_schema." AUTHORIZATION CURRENT_ROLE");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_usersTable."( id SERIAL primary key, username Varchar(255) not null, password Varchar(255) not null, fullname Varchar(255) not null)");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_postsTable."( id SERIAL primary key, owner Varchar(255) not null, title Varchar(255) not null, shortdescription Varchar(255) not null, datecreated timestamp NOT NULL DEFAULT now(), type Integer not null, idoftype Integer not null)");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_replyTable."( id SERIAL primary key, postid Integer not null, message Varchar(1000) not null, ownerid Integer not null )");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_sportsTable."( id SERIAL primary key not null, team1 Varchar(255) not null, team2 Varchar(255) not null, winner Varchar(255) not null, Score Varchar(255) not null )");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_electronicsTable."( id SERIAL primary key not null, components Varchar(1000) not null, mountingtutorial Varchar(2500) not null )");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_entertainmentTable."( id SERIAL primary key not null, joke Varchar(1000) not null, source Varchar(255) not null )");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_resolver."( id SERIAL primary key not null, userid Integer not null, groupid Integer not null)");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_group."( id SERIAL primary key not null, groupkey Integer not null)");
            pg_query("CREATE TABLE IF NOT EXISTS ".$dbC->db_schema.".".$dbC->db_messages."( id SERIAL primary key not null, groupid Integer not null, ownerid Integer not null, text Varchar(500) not null)");
            return true;
        }
        echo "No DB connection";
        return false;
}


?>

<?php
   @mysql_connect('localhost','root','') or die('connection error');
   if(!@mysql_select_db('hm1')){
    $query = "CREATE DATABASE hm1";
    if(mysql_query($query))
    {   mysql_select_db('hm1');
        $q="create table register( no int(100) AUTO_INCREMENT PRIMARY KEY,hotel_name varchar(20),manager_name varchar(20),address varchar(20),city varchar(20),phone varchar(20),password varchar(100),photo1 varchar(100),photo2 varchar(100),type varchar(20),description varchar(100),near1 varchar(100),near2 varchar(100),near3 varchar(100))";
        $q1="create table price( no int(100) PRIMARY KEY,price int(11),offers varchar(100))";
        $res1=mysql_query($q);
        $res2=mysql_query($q2);
        if(!($res1==1 && $res2==1))
            die("table cannot be created");
    }
    else
        die("database cannot be created");
   }
?>


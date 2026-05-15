<?php
define('db_host','localhost');
define('db_user','root');
define('db_pass','');
define('db_name','air9ja');
$conn=new mysqli(db_host,db_user,db_pass) or die('unable to connect');
$conn->query("create database if not exists ". db_name);
$conn->select_db(db_name);

<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "m-posyandu";

$db = mysqli_connect($server, $username, $password, $db_name);

if(!$db){
    die("Gagal Terhubung : ".$db->connect_error);
}
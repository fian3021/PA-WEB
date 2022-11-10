<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "posyandu";

$db = new mysqli($server, $username, $password, $db_name);

if (!$db){
    die("Gagal Terhubung :".$db->connection_status);
}
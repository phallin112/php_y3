<?php

// connect to the database
$host = '127.0.0.1';
$dbname = 'web_a';
$user = 'root';
$password = '';

// mysqli connect
$db = new mysqli($host, $user, $password,$dbname);

if ($db->connect_error){
    echo 'Connect failed. '. $db->connect_error;
    die();
}


?>

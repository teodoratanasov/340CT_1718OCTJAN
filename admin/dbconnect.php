<?php

$host = "localhost";

$user = "root";

$password = "";

$dbname = "scm2_db";

$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){

    die("error in connection");

}

?>
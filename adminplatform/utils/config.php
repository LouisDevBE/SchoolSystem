<?php

$dbhost = "host";
$dbuser = "Username";
$dbpass = "Password";
$dbname = "Database";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}

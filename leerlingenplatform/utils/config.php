<?php

$dbhost = "Host";
$dbuser = "User";
$dbpass = "Password";
$dbname = "Database";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}

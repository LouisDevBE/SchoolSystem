<?php

$dbhost = "ID376192_schooll.db.webhosting.be";
$dbuser = "ID376192_schooll";
$dbpass = "Dijk4str";
$dbname = "ID376192_schooll";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "clientprocess";


$link = mysqli_connect($host, $user, $pass);

if (!$link)
{
    die('Could not connect: ' . mysqli_error());
}
else
{
	$db_selected = mysqli_select_db($link,$db);
	if (!$db_selected)
		{
			die ('Can\'t use database $db : ' . mysqli_error());
		} 
	else
		{
			true;
		}
}

?>

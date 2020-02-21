<?php
require("../data/db_connect.php");
$fn = $_COOKIE['fn'];
$ln = $_COOKIE['ln'];
$street = $_COOKIE['street'];
$city = $_COOKIE['city'];
$st = $_COOKIE['st'];
$zip = $_COOKIE['zip'];
$em = $_COOKIE['em'];
$ops = $_COOKIE['opsys'];
$opsys = $_COOKIE['opsys'];
$dept = $_COOKIE['d'];
if($dept == "Marketing")
{	$d = 1;}
elseif($dept == "Accounting")
{	$d = 2;}
elseif($dept == "Operations")
{	$d = 3;}
else
{	$d = 4;}
$c = $_COOKIE['c'];


$s1 = "insert into corpclient values('$em','$fn','$ln',$d)";
$result1 = mysqli_query($link,$s1);

$s2 = "insert into address values('$em','$street','$city','$st','$zip')";
$result2 = mysqli_query($link,$s2);

$s3 = "insert into ClientComments(cem,comments) values('$em','$c')";
$result3 = mysqli_query($link,$s3);

$s4 = "insert into ClientSoftware values('$em',$ops)";
$result4 = mysqli_query($link,$s4);

$apps = array(5,6,7);
foreach($apps as $value)
	{
		if(isset($_COOKIE[$value]) and !empty($_COOKIE[$value]) and $_COOKIE[$value]==5)
		{
			$data = $_COOKIE[$value];
			$sql5 = "insert into ClientSoftware values('$em',$data)";
			$result5 = mysqli_query($link,$sql5);
		}
		elseif(isset($_COOKIE[$value]) and !empty($_COOKIE[$value]) and $_COOKIE[$value]==6)
		{
			$data = $_COOKIE[$value];
			$sql6 = "insert into ClientSoftware values('$em',$data)";
			$result6 = mysqli_query($link,$sql6);
		}
		elseif(isset($_COOKIE[$value]) and !empty($_COOKIE[$value]) and $_COOKIE[$value]==7)
		{
			$data = $_COOKIE[$value];
			$sql7 = "insert into ClientSoftware values('$em',$data)";
			$result7 = mysqli_query($link,$sql7);
		}
		else
		{
			continue;
		}
		
	}

header("Location:view_client.php");













?>
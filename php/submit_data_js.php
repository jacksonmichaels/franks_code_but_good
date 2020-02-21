<?php
require("../data/db_connect.php");
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$street = $_POST['street'];
$city = $_POST['city'];
$st = $_POST['st'];
$zip = $_POST['zip'];
$em = $_POST['em'];
if($_POST['ops'] == "MAC")
{	$ops = 4;}
elseif($_POST['ops'] == "Windows 7")
{	$ops = 3;}
elseif($_POST['ops'] == "Windows 8")
{	$ops = 2;}
else
{	$ops = 1;}
$opsys = $_POST['ops'];
$dept = $_POST['dept'];
if($dept == "Marketing")
{	$d = 1;}
elseif($dept == "Accounting")
{	$d = 2;}
elseif($dept == "Operations")
{	$d = 3;}
else
{	$d = 4;}
$c = $_POST['c'];


$s1 = "insert into corpclient values('$em','$fn','$ln',$d)";
$result1 = mysqli_query($link,$s1);

$s2 = "insert into address values('$em','$street','$city','$st','$zip')";
$result2 = mysqli_query($link,$s2);

$s3 = "insert into ClientComments(cem,comments) values('$em','$c')";
$result3 = mysqli_query($link,$s3);

$s4 = "insert into ClientSoftware values('$em',$ops)";
$result4 = mysqli_query($link,$s4);

$apps = array('Word','Excel','PPT');
foreach($apps as $value)
	{
		if(isset($_POST[$value]) and !empty($_POST[$value]) and $_POST[$value]=="Word")
		{
			$data = 5;
			$sql5 = "insert into ClientSoftware values('$em',$data)";
			$result5 = mysqli_query($link,$sql5);
		}
		elseif(isset($_POST[$value]) and !empty($_POST[$value]) and $_POST[$value]=='Excel')
		{
			$data = 6;
			$sql6 = "insert into ClientSoftware values('$em',$data)";
			$result6 = mysqli_query($link,$sql6);
		}
		elseif(isset($_POST[$value]) and !empty($_POST[$value]) and $_POST[$value]=='PPT')
		{
			$data = 7;
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
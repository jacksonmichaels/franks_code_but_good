<?php
require_once("../data/db_connect.php");
include("extract_student_id.php");
$sid = $n;
echo"Student ID: $sid";
$aid = $a;
$cid = $c;
include("../include/header_1.inc");
echo "<title>Customer Account Results</title>";
include("../include/header_2.inc");

			$fn = $_COOKIE['fn'];
			$ln = $_COOKIE['ln'];
			$street = $_COOKIE['street'];
			$city = $_COOKIE['city'];
			$st = $_COOKIE['st'];
			$zip = $_COOKIE['zip'];
			$em = $_COOKIE['em'];
			$opsys = $_COOKIE['opsys'];
			$course = $_COOKIE['course'];
			$year = $_COOKIE['year'];
			$comments = $_COOKIE['comments'];
			echo"$sid $fn  $ln $em $year $comments $aid $course";

$query1= "INSERT into address VALUES($aid,'$street','$city','$st','$zip')";
$query2= "INSERT into student VALUES($sid,'$fn','$ln','$em','$year','$comments',$aid,'$course')";
$query3 = "insert into computer values($cid,'$opsys',$sid)";	

$result1 = mysqli_query($link,$query1);
$result2 = mysqli_query($link,$query2);
$result3 = mysqli_query($link,$query3);

$data = array("word", "excel","ppt");
$apps = array();
foreach ($data as $a)
{
	if(isset($_COOKIE[$a]))
	{
		$value = $_COOKIE[$a];
		if($value==1)
		{
			$w = 1;
			array_push($apps,$w);
		}
		elseif($value==2)
		{
			$e = 2;
			array_push($apps,$e);
		}
		else
		{
			$p = 3;
			array_push($apps,$p);
		}
	}
}

foreach($apps as $i)
{
	$sql_apps = "Insert into computerapps values($cid,$i)";
	$result4 = mysqli_query($link,$sql_apps);
}

mysqli_close($link);

if($result1 != TRUE)
	{
		echo"<span style='font-size:24px;'>There was an error processing address data. Please re-enter your data.</span>";
		echo"<h1>$aid, $street, $city, $st, $zip did not make it into the database.</h1>";
	}
elseif($result2 != TRUE)
	{
		echo"<span style='font-size:24px;'>There was an error processing student data. Please re-enter your data.</span>";
		echo"<h1>$sid, $fn, $ln, $em, $year, $comments, $aid, $course did not make it into the database.</h1>";
	}

elseif($result3 != TRUE)
	{
		echo"<span style='font-size:24px;'>There was an error processing course data. Please re-enter your data.</span>";
		echo"<h1>$cid, $opsys, $sid</h1>";
	}
elseif($result4 != TRUE)
	{
		echo"<span style='font-size:24px;'>There was an error processing computer applications data. Please re-enter your data.</span>";
	}
else
	{
		header("Location:../php/success.php");
	}
	
include("../include/footer.inc");

$x = array('fn','ln','street','city','st','zip','em','opsys','course','year','comments');
$y = array('word','excel','ppt');
foreach($x as $i)
	{	
		setcookie($i,'',time()-3600,'/');
	}
foreach($y as $j)
{
	setcookie($j,'',time()-3600,'/');
}

?>

















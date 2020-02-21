<?php
require_once("db_connect.php");
$query1 = "Select max(sid) from student";
$result1 = mysqli_query($link,$query1);

$query2 = "Select max(aid) from address";
$result2 = mysqli_query($link,$query2);

$query3 = "Select max(cid) from computer";
$result3 = mysqli_query($link,$query3);

while($row = mysqli_fetch_array($result1))
	{
		$n = $row['max(sid)'];
		$n = $n+1;
	}
	
while($row = mysqli_fetch_array($result2))
	{
		$a = $row['max(aid)'];
		$a = $a+1;
	}

while($row = mysqli_fetch_array($result3))
	{
		$c = $row['max(cid)'];
		$c = $c+1;
	}
	
?>
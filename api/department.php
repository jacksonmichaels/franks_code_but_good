<?php
require_once("../data/db_connect.php");
$data = $_POST['data']; /* individual query such as dept_id or ops_id */
global $link;
$query = "select cfn,cln,dept_name from corpclient,department 
	where department.dept_id=corpclient.dept_id 
    and corpclient.dept_id=".(int)$data;
	$results = array();
	$result = mysqli_query($link,$query);
	
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$results[] = $row;
	}
	
	echo json_encode(($results));
/*
	$row = mysqli_fetch_array($result1);
	echo"<table><tr><td>Department:{$row['dept_name']}</td></tr>
	<tr><td>First Name</td><td>Last Name</td></tr>";
	while($row = mysqli_fetch_array($result1))
	{
	echo"
	<tr>
	<td class='data_td'>{$row['cfn']}</td>" .
	"<td class='data_td'>{$row['cln']} </td>" .
	"</tr>";
	}
*/
?>
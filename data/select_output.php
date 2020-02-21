<?php
require_once("db_connect.php");
include("../include/header_1.inc");
echo"<title>Summary Data</title>";
include("../include/header_2.inc");
$data = $_POST['data']; /* individual query such as dept_id or ops_id */
$q = $_POST['query_id'];/* Select query to run radio btn selection */


$process = array(1,2,3,4);


function callAll(){
	global $link;
	$process = array(1,2,3,4);
	$data = $_POST['data'];
	$q = $_POST['query_id'];
	foreach($process as $value)
	{
		if(($q == $value) and ($q == 1))
		{
			$query1 = "select cfn,cln,dept_name from corpclient,department 
						where department.dept_id=corpclient.dept_id 
						and corpclient.dept_id=".$data;
			$result1 = mysqli_query($link,$query1);
			$row = mysqli_fetch_array($result1);
			prev($result1);
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
			
		}
		elseif(($q == $value) and ($q == 2))
		{
			$sql = "select cfn,cln,soft_name
					from corpclient,software, clientsoftware
					where software.soft_id=clientsoftware.soft_id and
						clientsoftware.cid = corpclient.cid
					and software.soft_id=".$data;
			$result = mysqli_query($link,$sql);
			echo"<table><tr><td>First Name</td><td>Last Name</td>
			     <td>Operating System</td></tr>";
			while($row = mysqli_fetch_array($result))
			{
				echo"
				<tr>
				<td class='data_td'>{$row['cfn']}</td>" .
				"<td class='data_td'>{$row['cln']} </td>" .
				"<td class='data_td'>{$row['soft_name']} </td>" .
				"</tr>";
			}
		}
	}
	echo"<tr><td colspan='3'>
	<button class='btn' onclick=\"window.location.href='manage_data.php'\">Manage Data Page
	</button></td></tr>";
}
echo"</table>";
callAll();
mysqli_close($link);

include("../include/footer.inc");

?>
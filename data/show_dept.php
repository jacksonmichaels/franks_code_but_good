<?php
require_once("db_connect.php");
include("../include/header_1.inc");
echo "<title>Client Department</title>";
include("../include/header_2.inc");

$query = "select cid,cfn,cln,dept_name,department.dept_id
from corpclient,department
where corpclient.dept_id = department.dept_id
order by cid";
$result= mysqli_query($link,$query);
echo"
<table id='showOutput'>
	<tr>
		<td class='client_data'>Client ID</td><td class='client_data'>Client Full Name</td><td class='client_data'>Department ID</td><td class='client_data'>Department</td></tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo"
			<tr>
			<td class='data_td'>{$row['cid']}</td>" .
			"<td class='data_td'>{$row['cfn']} {$row['cln']}</td>" .
			"<td class='data_td'>{$row['dept_id']}</td>".
			"<td class='data_td'>{$row['dept_name']}</td>".
			"</tr>";
		}
	
echo"
	<tr>
		<td colspan='5'>
			<button class='btn' onclick=\"window.location.href='../index.php'\">Return to Home Page</button>
		</td>
	</tr>
</table>";
mysqli_close($link);

include("../include/footer.inc");

?>
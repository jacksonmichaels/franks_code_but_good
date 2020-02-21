<?php
require_once("db_connect.php");
include("../include/header_1.inc");
echo "<title>Client Comments</title>";
include("../include/header_2.inc");

$query1 = "select corpclient.cid,cfn,cln,comments
from corpclient, clientcomments
where corpclient.cid = clientcomments.cid
order by corpclient.cid";
$result1 = mysqli_query($link,$query1);


echo"
<table id='showOutput'>
	<tr>
		<td class='client_data'>Client ID</td><td class='client_data'>Client Name</td><td class='client_data'>Comments</td>";

		while($row = mysqli_fetch_array($result1))
		{
			echo"
			<tr>
			<td class='data_td'>{$row['cid']}</td>" .
			"<td class='data_td'>{$row['cfn']} {$row['cln']} </td>" .
			"<td class='data_td'>{$row['comments']} </td>".
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
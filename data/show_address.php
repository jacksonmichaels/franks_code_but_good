<?php
require_once("db_connect.php");
include("../include/header_1.inc");
echo "<title>Client Address</title>";
include("../include/header_2.inc");

$query1 = "select corpclient.cid,cfn,cln,cstreet,ccity,cst,czip
from corpclient,address
where corpclient.cid = address.cid";
$result1 = mysqli_query($link,$query1);

echo"
<table id='showOutput'>
	<tr>
		<td class='client_data'>Client First Name</td><td class='client_data'>Client Last Name</td><td class='client_data'>Street</td><td class='client_data'>City</td><td class='client_data'>State</td><td class='client_data'>Zip
		Code</td></tr>";

		while($row = mysqli_fetch_array($result1))
		{
			echo"
			<tr>
			<td class='data_td'>{$row['cfn']}</td>" .
			"<td class='data_td'>{$row['cln']} </td>" .
			"<td class='data_td'>{$row['cstreet']} </td>".
			"<td class='data_td'>{$row['ccity']} </td>".
			"<td class='data_td'>{$row['cst']}</td>".
			"<td class='data_td'>{$row['czip']}</td>".
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
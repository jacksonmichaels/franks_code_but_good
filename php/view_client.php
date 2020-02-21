<?php
require("../data/db_connect.php");
$sql = "select cfn,cln,cstreet,ccity,cst,czip,corpclient.cem
from corpclient, address
where corpclient.cem = address.cem";
$result =  mysqli_query($link,$sql);

include("../include/header_1.inc");
echo"<title>View Client Data</title>";
include("../include/header_2.inc");
echo'
	<table>
		<tr>
			<td>View Client Data</td>
		</tr>
		<tr>
			<td>Client Name</td>
			<td>Address</td>
			<td>Client Contact</td>
		</tr>';
		while($row = mysqli_fetch_assoc($result))
		{
			echo"<tr><td>".$row['cfn']." ".$row['cln']."</td>".
			"<td>".$row['cstreet']." ".$row['ccity'].", ".
			$row['cst']."  ".$row['czip']."</td><td>".
			$row['cem']."</td></tr>";
		}
		echo"</table>";

include("../include/footer.inc");
?>











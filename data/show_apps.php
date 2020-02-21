<?php
require_once("db_connect.php");
include("../include/header_1.inc");
echo "<title>Client Software</title>";
include("../include/header_2.inc");

$query1 = "select corpclient.cid,cfn,cln,soft_name
from corpclient,software,clientsoftware
where corpclient.cid=clientsoftware.cid and
	software.soft_id=clientsoftware.soft_id
order by corpclient.cid";
$result1 = mysqli_query($link,$query1);

echo"
<table id='showOutput'>
	<tr>
		<td class='client_data'>Client ID</td><td class='client_data'>Client Name</td><td class='client_data'>Software</td></tr>";
		
		$previous_record = null;
		$last_record = null;
		while($row = mysqli_fetch_array($result1))
		{
			if($previous_record!=null and $row['cid']==$previous_record['cid'])
				{
					echo"<tr><td class='data_td'></td>" .
						"<td class='data_td'></td>".
						"<td class='data_td'>{$row['soft_name']}</td></tr>";
				}
			
			elseif($row['soft_name']!= $last_record)
				{
					echo"<tr><td class='data_td'>{$row['cid']}</td>" .
						"<td class='data_td'>{$row['cfn']} {$row['cln']}</td>".
						"<td class='data_td'>{$row['soft_name']}</td></tr>";
				}
			else
				{
					$previous_record = $row;
				}
			$previous_record = $row;
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
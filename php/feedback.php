<?php





function callDept()
{
	$expdate = time()+(1000*60*60*24*14);
	if($_COOKIE['dept'] == 1)
	{
		$dept = "Marketing";
	}
	elseif($_COOKIE['dept'] == 2)
	{
		$dept = "Accounting";
	}
	elseif($_COOKIE['dept'] == 3)
	{
		$dept = "Operations";
	}
	else
	{
		$dept = "IT";
	}
	setcookie('d',$dept,$expdate,'/');
}
callDept();
function sysData()
{
	$expdate = time()+(1000*60*60*24*14);
	if($_COOKIE['opsys'] == 1)
	{
		$op = "Windows 10";
	}
	elseif($_COOKIE['opsys'] == 3)
	{
		$op = "Windows 7";
	}
	elseif($_COOKIE['opsys'] == 2)
	{
		$op = "Windows 8";
	}
	else
	{
		$op = "MAC";
	}
	setcookie('op',$op,$expdate,'/');
}	
sysData();
	
include("../include/header_1.inc");
echo"<title>Form Feedback Page</title>";
include("../include/header_2.inc");
echo"
	<table id='feedbk_tbl'>
		<tr>
			<td colspan='2' id='feedback_title'>Data Confirmation Page</td>
		</tr>
		<tr>
			<td class='labels'>First Name:</td>
			<td>".$_COOKIE['fn']."</td>
		</tr>
		<tr>
			<td class='labels'>Last Name:</td>
			<td>".$_COOKIE['ln']."</td>
		</tr>
		<tr>
			<td class='labels'>Street:</td>
			<td>".$_COOKIE['street']."</td>
		</tr>
		<tr>
			<td class='labels'>City:</td>
			<td>".$_COOKIE['city']."</td>
		</tr>
		<tr>
			<td class='labels'>State:</td>
			<td>".$_COOKIE['st']."</td>
		</tr>
		<tr>
			<td class='labels'>Zip Code:</td>
			<td>".$_COOKIE['zip']."</td>
		</tr>
		<tr>
			<td class='labels'>E-Mail Address:</td>
			<td>".$_COOKIE['em']."</td>
		</tr>
		<tr>
			<td class='labels'>Operating System:</td>
			<td>".$_COOKIE['op']."</td>
		</tr>
		<tr>
			<td class='labels'>Application Software:</td>
			<td>";function checkApp()
					{
						$ck_apps= array(5=>'Word',6=>'Excel',7=>'PPT');
						foreach($ck_apps as $key=>$value)
						{
							if(!empty($_COOKIE[$key]))
							{
								echo $value.'<br/>';				
							}
				
						}
					}
					$app = checkApp();
echo"
			</td>
		</tr>
		<tr>
			<td class='labels'>Department:</td>
			<td>".$_COOKIE['d']."</td>
		</tr>
		<tr>
			<td class='labels'>Comments:</td>
			<td>".$_COOKIE['c']."</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type='button' value='Return to Form' onclick=\"window.location.href='client.php'\" />
				
				<input type='button' value='Submit Data' onclick=\"window.location.href='submit_data.php'\" />
			</td>
		</tr>
	</table>";




include("../include/footer.inc");

?>
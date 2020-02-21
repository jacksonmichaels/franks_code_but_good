<?php
require("../data/db_connect.php");
$sql1 = "select dept_id,dept_name from Department order by dept_id";
$result1 =  mysqli_query($link,$sql1);

$sql2="select soft_id, soft_name from software where soft_type=1
		order by soft_id ";
$result2=mysqli_query($link,$sql2);

$sql3="select distinct cst from address order by cst";
$result3=mysqli_query($link,$sql3);


include("../include/header_1.inc");
echo "<title>Data Management Portal</title>
	  <script type='text/javascript' src='../common/menu.js'></script>";
include("../include/header_2.inc");
//Start home page content here
echo"

<table>
	<tr>
		<td id='banner'>
			<h1>Welcome to the Client Data Portal</h1>
		</td>
	</tr>";
	include("../include/navbar.inc");
	echo"
	<tr>
		<td>
	<div id='process_menu'>
		<span>Select a Process:</span>
			<span class='radio'>
				<input type='radio' name='p' value='d' onclick=showQuery('all_dept') />
				Department
			</span>
			<span class='radio'>
				<input type='radio' name='p' value='a'/>
				Application Software
			</span>
			<span class='radio'>
				<input type='radio' name='p' value='o' onclick=showQuery('all_ops') />
				Operating System
			<span class='radio'>
				<input type='radio' name='p' value='d' onclick=showQuery('all_st') />
				Residency: By State
			</span>
			<span class='radio'>
				<input type='radio' name='p' value='d' onclick=showQuery('all_zip') />
				Residency: By Zip Code
			</span>
	</div>

<form name='process' action='../data/select_output.php' method='post'>
<div id='all_dept'>
	Select A Department:
	<select name='data'>
      <option value=''>Choose One</option>";
		while($row = mysqli_fetch_assoc($result1))
			{
				echo"<option value='".$row['dept_id']."'>".
				$row['dept_name']."</option>";
			}
    echo" 
    </select>
	<p>
		<input type='hidden' value='1' name='query_id'/>
		<input type='submit' value='Select Data' name='s' />
	</p>
</div>
</form>

<form name='process' action='../data/select_output.php' method='post'>
<div id='all_ops'>
	Select An Operating System:
	<select name='data'>
      <option value=''>Choose One</option>";
		while($row = mysqli_fetch_assoc($result2))
			{
				echo"<option value='".$row['soft_id']."'>".
				$row['soft_name']."</option>";
			}
    echo"  
    </select>
	<p>
		<input type='hidden' value='2' name='query_id'/>
		<input type='submit' value='Select Data' name='s' />
	</p>
</div>
</form>

<form name='process' action='../data/select_output.php' method='post'>
<div id='all_st'>
	Select A State:
	<select name='data'>
      <option value=''>Choose One</option>";
		while($row = mysqli_fetch_assoc($result3))
			{
				echo"<option value='".$row['cst']."'>".
				$row['cst']."</option>";
			}
    echo"
    </select>
	<p>
		<input type='hidden' value='3' name='query_id'/>
		<input type='submit' value='Select Data' name='s' />
	</p>
</div>
</form>


<form name='process' action='../data/select_output.php' method='post'>
<div id='all_zip'>
	Enter  Zip Code:<input name='data' size='5' maxlength='5'/>
	<p>
	<input type='hidden' value='4' name='query_id'/>
		<input type='submit' value='Select Data' name='s' />
	</p>
</div>
</form>
</td>
</tr>
</table>";

//End home page content here
include("../include/footer.inc");
?>
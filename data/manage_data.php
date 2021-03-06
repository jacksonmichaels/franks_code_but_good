<?php
require("../data/db_connect.php");
$sql1 = "select dept_id,dept_name from Department order by dept_id";
$result1 =  mysqli_query($link,$sql1);

$sql2="select soft_id, soft_name from software where soft_type=1
		order by soft_id ";
$result2=mysqli_query($link,$sql2);

$sql3="select distinct cst from address order by cst";
$result3=mysqli_query($link,$sql3);

function mysql_selector($mysql_result, $id_key, $name_key){
	echo"
	<select name='data' required>
	<option value=''>Choose One</option>";
	  while($row = mysqli_fetch_assoc($mysql_result))
		  {
			  echo"<option value='".$row[$id_key]."'>".
			  $row[$name_key]."</option>";
		  }
  echo"
  </select>";
}

function mysql_div_list($mysql_result, $id_key, $name_key, $url){
	while($row = mysqli_fetch_assoc($mysql_result))
	{
		echo"<div onClick=getData('".$url."',".$row[$id_key].")>".
		$row[$name_key]." </div>";
	}
}

?>

<?php include("../include/header_1.inc"); ?>
<title>Data Management Portal</title>
<script defer type='text/javascript' src='../common/menu.js'></script>
<?php include("../include/header_2.inc"); ?>

<table>
	<tr colspan="2">
		<td id='banner'>
			<h1>Welcome to the Client Data Portal</h1>
		</td>
	</tr>
	<?php include("../include/navbar.inc"); ?>
	<tr>
	<td>
	<div id='process_menu'>
		<span>Select a Process:</span>
		<div>
			<h3 id="all_dept" onclick="showQuery('all_dept_div')">Department</h3>
			<div id="all_dept_div">
			<?php
				mysql_div_list($result1, 'dept_id', 'dept_name', '/api/department.php');
			?>
			</div>
		</div>
		<h3 id='app_soft_div' >
			Application Software
		</h3>
		<div>
			<h3 id="all_ops" onclick="showQuery('all_ops_div')">Operating System</h3>
			<div id="all_ops_div" >
				<?php mysql_div_list($result2,'soft_id', 'soft_name','/api/operating.php'); ?>
			</div>
		</div>
		<div>
			<h3 id="all_st" onclick="showQuery('all_st_div')">Residency: By State</h3>
			<div id="all_st_div" >
				<?php mysql_div_list($result3, 'cst', 'cst', ''); ?>
			</div>
		</div>
		<div>
			<h3 id="all_zip" onclick="showQuery('all_zip_div')">Residency: By Zip Code</h3>
			<div id="all_zip_div" >
				<input name='data' size='5' maxlength='5'/>
			</div>
		</div>
	</div>
	<div id="data"></div>
</td>

</tr>
</table>


<?php include("../include/footer.inc");?>
<tr>
	<td id="navbar">
		<a href="../index.php">Home</a>
		<a href="#" onclick="showMenu('menu1','menu2');";>Enter Data</a>
		<a href="#" onclick="showMenu('menu2','menu1');";>See Data</a>
		<a href="../data/manage_data.php">Manage Data</a>
	</td>
</tr>

<div id="menu1">
	<a href="../htm/client.htm">HTM Page</a><br>
	<a href="../php/client.php">PHP Page</a>
</div>

<div id="menu2">
	<p>Use the links below to review student data:</p>
		<a href="../data/show_data.php">General Data</a>
		<a href="../data/show_address.php">Address</a>
		<a href="../data/show_dept.php">Department</a>
		<a href="../data/show_apps.php">Applications</a>
		<a href="../data/show_comments.php">Comments</a>
</div>
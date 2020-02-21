<?php
include("./include/header_1.inc");
echo "<title>Student Home Page</title>
	  <script type='text/javascript' src='./common/menu.js'></script>";
include("./include/header_2_hp.inc");
//Start home page content here
echo"
<table>
	<tr>
		<td id='banner'>
			<h1>Welcome to the Client Data Portal</h1>
		</td>
	</tr>";
	include("./include/navbar_hp.inc");
	echo"
	<tr><!-- Start main content here -->
		<td>
			<p id='main_intro'>
				All content for the home page goes here. The home is designed to provide examples of working with dynamic JavaScript menus and PHP processes. It is also an example of how to manage data presentation in a Web site.
			</p>
		</td>
	</tr>
</table>
";

//End home page content here
include("./include/footer.inc");
?>
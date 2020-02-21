<?php
require("../data/db_connect.php");
$sql = "select dept_id,dept_name from Department order by dept_id";
$result =  mysqli_query($link,$sql);

include("../include/header_1.inc");
echo"<title>Form Validation</title>";
include("../include/header_2.inc");
echo'

	<form name="client" action="validation_new.php" onsubmit="return val_data();" method="post">
	<table>
		<tr>
			<td colspan="2">
				<h1 style="text-align:center;">Client Input Form</h1>
			</td>
		</tr>
    	<tr>
        	<td class="labels">First Name:</td>
            <td><input name="fn" size="20" ></td>
        </tr>
		<tr>
        	<td class="labels">Last Name:</td>
            <td><input name="ln" size="20" ></td>
        </tr>
		<tr>
        	<td class="labels">Street:</td>
            <td><input name="street" size="30" ></td>
        </tr>
		<tr>
        	<td class="labels">City:</td>
            <td><input name="city" size="30" ></td>
        </tr>
        <tr>
        	<td class="labels">State:</td>
            <td><input name="st" size="2" maxlength="2" ></td>
        </tr>
        <tr>
        	<td class="labels">Zip:</td>
            <td><input name="zip" size="5" maxlength="5" ></td>
        </tr>
		<tr>
        	<td class="labels">E-Mail:</td>
            <td><input name="em" size="30" ></td>
        </tr>
		<tr>
        	<td class="labels">Confirm E-Mail Address:</td>
            <td><input name="em2" size="30" ></td>
        </tr>
        <tr>
        	<td class="labels">Operating System:</td>
            <td>
			
			<input type="radio" name="opsys" value="3">Windows 7<br />
			<input type="radio" name="opsys" value="2">Windows 8<br />
			<input type="radio" name="opsys" value="4">MAC<br />
			<input type="radio" name="opsys" value="1">Windows 10
			
			</td>
        </tr>
        <tr>
        	<td class="labels">Application Software</td>
            <td>
            <input type="checkbox" value="5" name="word">Word<br />
			<input type="checkbox" value="6" name="excel">Excel<br />
			<input type="checkbox" value="7" name="ppt">PowerPoint
            </td>
        </tr>
        <tr>
        	<td class="labels">Department:</td>
            <td>
            	<select name="dept">
                	<option value="">Choose One</option>';
						while($row = mysqli_fetch_assoc($result))
						{
							echo"<option value='".$row['dept_id']."'>".
							$row['dept_name']."</option>";
						}
                 echo'  
                </select>
            </td>
        </tr>
		<tr>
        	<td class="labels">Comments:</td>
            <td>
            	<textarea name="c" rows="10" cols="50"></textarea>
            </td>
        </tr>
        <tr>
        	<td colspan="2" style="text-align:center;">
            	<input type="submit" name="s" value="Send Data">
           
            	<input type="reset" name="r" value="Clear Data">
            </td>
        </tr>
	</table>
    </form>
';
include("../include/footer.inc");
?>











<?php

$killdate = time()-3600;
$ck_apps= array(5=>'Word',6=>'Excel',7=>'PPT');

foreach($ck_apps as $key=>$value)
	{
		setcookie($key,$value,$killdate,"/");
	}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	checkForm();
}
else
{
	header("Location:sorry.php");
}

function checkForm()
{
	$form = array('fn','ln','street','city','st','zip','em','dept','c');
	$pattern = '/^[A-Z a-z0-9\.\@]+$/';
	foreach($form as $input)
	{
		try
		{
		$i = htmlspecialchars($_POST[$input]);
		$i = trim($i);
		if(!isset($_POST[$input]) or empty($_POST[$input]))
		{
			
			echo"<h1>Blank input field: ".$input."</h1>".
				"Return to <a href=\"client.php\">form</a>";
				exit;
				
		}
		elseif(!preg_match($pattern,$i) or !isset($_POST[$input]) or empty($_POST[$input]))
		{
			echo"<h1>Failure validating input.</h1>".
				"Return to <a href=\"client.php\">form</a>";
				exit;
		}
		else
		{
			continue;
		}
		}
		catch(Exception $e)
		{
			header("Location:sorry.php");
		}
	}
	makeAppCookies();
}

function makeAppCookies()
{
	$expdate = time()+(1000*60*60*24*14);
	$form = array('fn','ln','street','city','st','zip','em','dept','c');
	$checked = array("word","excel","ppt");
	$count = 0;
	foreach($checked as $value)
	{
		if(isset($_POST[$value]) and !empty($_POST[$value]))
		{
			echo"<h1>Post value =".$_POST[$value]."</h1>";
			$count =1;
			$i = htmlspecialchars($_POST[$value]);
			$i = trim($i);
			echo"<h1>".$i."</h1>";
			setcookie($i, $i, $expdate, "/");
			
	    }
		else
		{
			continue;
		}
	}
	if($count == 0)
	{
		echo"<h1>Please select an application.</h1>".
				"Return to <a href=\"client.php\">form</a>";
	}
	foreach($form as $i)
		{
			$j = htmlspecialchars($_POST[$i]);
			setcookie($i,$j,$expdate,"/");
		}
		checkOps();	
}

function checkOps()
{
	if(is_null($_POST['opsys']))
	{
		echo"<h1>Please select an opsys.</h1>";
		//header("Location:sorry.php");
	}
	else
	{
		$i = htmlspecialchars($_POST['opsys']);
		$i = trim($i);
		$expdate = time()+(1000*60*60*24*14);
		setcookie('opsys',$i,$expdate,'/');
		header("Location:feedback.php");
	}
	
}

?>







/*
	This JavaScript file will control the operations of the menu system
*/

function showMenu(a,b){
	var m = document.getElementById(a).style;
	var x = document.getElementById(b).style;
	if(m.display == "block")
	{
		m.display = "none";
	}
	else
	{
		m.display = "block";
		x.display = "none";
	}
}

function showNavMenu(){
	var nav = document.getElementById('nav_menu').style;
	if(nav.display == "block")
	{
		nav.display = "none";
	}
	else
	{
		nav.display = "block";
	}
}

function showSubMenu(){
	var nav = document.getElementById('menu1a').style;
	if(nav.display == "block")
	{
		nav.display = "none";
	}
	else
	{
		nav.display = "block";
	}
}

function showQuery(a){
	var menu = new Array('all_dept','all_ops','all_st','all_zip');
	for (i=0;i<menu.length;i++)
	{
		if(menu[i] == a)
		{
			var x = document.getElementById(a).style;
			x.display = "block";
			
		}
		else
		{
			var y = document.getElementById(menu[i]).style;
			y.display = "none";
		}
	}
}




















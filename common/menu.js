/*
	This JavaScript file will control the operations of the menu system
*/

const allDept = document.getElementById('all_dept');
const allOps = document.getElementById('all_ops');
const allSt = document.getElementById('all_st');
const allZip = document.getElementById('all_zip');

const all = [allDept, allOps, allSt, allZip];

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

function showQuery(a){
	all.forEach(element => {
		if (element.id === a){
			element.style.display = "block";
		}
		else {
			element.style.display = "none";

		}
	})
}


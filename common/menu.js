/*
	This JavaScript file will control the operations of the menu system
*/

const allDept = document.getElementById('all_dept');
const allOps = document.getElementById('all_ops');
const allSt = document.getElementById('all_st');
const allZip = document.getElementById('all_zip');

const manageForm = document.getElementById('manage_form');

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


const getData = async (url, data) => {

	const formData = new FormData();
	formData.append("data", data);
	const res =  await fetch(url, {
		method: 'POST',
		body: formData,
	})
	const json = await res.json();
	const dataDiv = document.getElementById('data');
	dataDiv.innerHTML = `
	<table>
	<tr><td>${json[0].dept_name}</td></tr>
	<tr><td>First Name</td><td>Last Name</td></tr>
	${json.reduce((acc, cur) => acc + `
		<tr>
		${Object
			.keys(cur)
			.reduce((row_acc, row_key) => row_acc + `
				<td class='data_td'>${cur[row_key]}</td>
			`, "")}

		</tr>
	`, "")}`;

	console.log(json);
}

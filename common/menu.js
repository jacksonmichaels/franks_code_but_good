/*
	This JavaScript file will control the operations of the menu system
*/

const allDeptDiv = document.getElementById('all_dept_div');
const allOpsDiv = document.getElementById('all_ops_div');
const allStDiv = document.getElementById('all_st_div');
const allZipDiv = document.getElementById('all_zip_div');

const allDiv = [allDeptDiv, allOpsDiv, allStDiv, allZipDiv];


allDiv.forEach(div => {
	div.style.display = "none";
})


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
	allDiv.forEach(element => {
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

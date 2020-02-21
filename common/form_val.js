// JavaScript Document
function findCookie(val) {
    var cookie = null;
    var findVal = val + "=";
    var dc = document.cookie;
    if (dc.length > 0)
    {
       var start = dc.indexOf(findVal);
       if (start >= 0)
       {
          start += findVal.length;
          lastVal = dc.indexOf(";", start);
          if (lastVal == -1)
          {
             lastVal = dc.length;
          }
          cookie = (dc.substring(start, lastVal));
          }
          else
          {
             return cookie;
          }
        }
		return cookie;		
}

function val_data() {
//Use this code in the form_val file to delete all checkbox cookies

	for(i=0;i<3;i++)
		{
			if(findCookie("apps"+[i]) != null)
				{
					document.cookie = "apps"+[i] + "=; expires=Thu, 01-Jan-70 00:00:01 GMT" + "; path=/";
				}
		}
	//Start collecting form data here 
	var fn = document.client.fn.value;
	var ln = document.client.ln.value;
	var street = document.client.street.value;
	var city = document.client.city.value;
	var st = document.client.st.value.toUpperCase();
	var zip = document.client.zip.value;
	var em = document.client.em.value;
	var em2 = document.client.em2.value;
	var ops = document.client.opsys.value;
	var dept = document.client.dept.value;
	var c = document.client.comments.value;

	var RegExpText = /^[A-Z a-z]+$/;
	var RegExpSt = /^[A-Z]{2}$/;
	/*
	var RegExpZip = /^[0-9]{5}[\-]{1}[0-9]{4}$/; 5-4 zip input
	*/
	var RegExpZip = /^[0-9]{5}$/;
	var RegExpOps = /^(1|2|3|4){1}/;
	
	var RegExpDept = /^(1|2|3|4|5){1}$/;
	
	var RegExpComments = /[<|>|=|$|&|#|\||\\]/;
	
	
	//Note ? = zero or one time     * = zero or more times       + = one or more times 
	var RegExpEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	
	if (!RegExpText.test(fn))
		{
			alert("Please enter your first name");
			document.client.fn.focus();
			document.client.fn.select();
			document.client.fn.style.backgroundColor = "#ffffcc";
			return false;
		}

	else if (!RegExpText.test(ln))
		{
			alert("Please enter your last name");
			document.client.ln.focus();
			document.client.ln.select();
			document.client.ln.style.backgroundColor = "#ffffcc";
			return false;
		}
	else if(RegExpComments.test(street)|| document.client.street.value=="")
		{
			alert("Please enter your street address.");
			document.client.street.focus();
			document.client.street.select();
			document.client.street.style.backgroundColor = "#ffffcc";
			return false;
		}
		
	else if (!RegExpText.test(city))
		{
			alert("Please enter your city");
			document.client.city.focus();
			document.client.city.select();
			document.client.city.style.backgroundColor = "#ffffcc";
			return false;
		}
	
	else if(!RegExpSt.test(st))
		{
			alert("Please enter your state of residency.");
			document.client.st.focus();
			document.client.st.select();
			return false;
		}
	
	else if(!RegExpZip.test(zip))
		{
			alert("Please enter your zip code");
			document.client.zip.focus();
			document.client.zip.select();
			return false;
		}
	
	else if(!RegExpEmail.test(em))
		{
			alert("Please enter your email address");
			document.client.em.focus();
			document.client.em.select();
			return false;
		}
	
	else if(!RegExpEmail.test(em2) || em2!=em)
		{
			alert("Please enter proper and matching email addresses");
			document.client.em2.focus();
			document.client.em2.select();
			return false;
		}
	
	else if(!RegExpOps.test(ops))
		{
			alert("Please select your operating system");
			return false;
		}
	
	else if ((document.client.word.checked == "") && (document.client.excel.checked == "") && (document.client.ppt.checked == ""))
		{
 			alert("Please select at least one application program you use.");
 			return false;
		}

	else if (((document.client.word.checked) && (document.client.word.value !="5")) || ((document.client.excel.checked) && (document.client.excel.value !="6")) || ((document.client.ppt.checked && document.client.ppt.value !="7")))
		{
			alert("There was an issue accessing the value of your checkbox selection. Please try again.");
 			return false;
		}
		
	else if(!RegExpDept.test(dept))
		{
			alert("Please select one department");
			/*Do not use these two statements with a selection list
			document.client.dept.focus();
			document.client.dept.select();
			*/
			return false;
		}

		else if(RegExpComments.test(c) || document.client.comments.value=="")
		{
			alert("Please provide us with some feedback");
			document.client.comments.focus();
			return false;
		}
	else
	//THIS IS HOW YOU GET THE COOKIE OF A CHECKBOX: Code provided by Kevin Law
		{
			alert("Thanks");
			var app = new Array();
			dc=document.client;
			var allFields = dc.elements
			for(i=0;i<allFields.length;i++){
			if(allFields[i].type=="checkbox")
				{
					if (allFields[i].checked == 1) {
					app.push(allFields[i].value);
					}
				}
				}
			makeCookies(fn,ln,street,city,st,zip,em,ops,app,dept,c);
			
		}	
	
	
}

function makeCookies(fn,ln,street,city,st,zip,em,ops,app,dept,c){
	var today = new Date();
	var expdate = today.getTime(1000*60*60*24*7);
	with(document)
	{
	cookie = "first_name ="+fn+";expires = "+expdate+";path='/'";
	cookie = "last_name ="+ln+";expires = "+expdate+";path='/'";
	cookie = "street ="+street+";expires = "+expdate+";path='/'";
	cookie = "city ="+city+";expires = "+expdate+";path='/'";
	cookie = "st ="+st+";expires = "+expdate+";path='/'";
	cookie = "zip ="+zip+";expires = "+expdate+";path='/'";
	cookie = "em ="+em+";expires = "+expdate+";path='/'";
	cookie = "ops ="+ops+";expires = "+expdate+";path='/'";
	cookie = "dept ="+dept+";expires = "+expdate+";path='/'";
	cookie = "c ="+c+";expires = "+expdate+";path='/'";
	}	
	//Code to create cookies for any application chosen in the form
	for(i=0;i<app.length;i++)
		{
			//document.write("<h1>"+app[i]+"</h1>");
			if((app[i].value!="")||(app[i].value!=null))
				{
					document.cookie="apps"+[i]+"="+app[i]+";expires="+expdate+";path=/";
				}
			else
				{
					return true;
					i++
				}
				
		}
	
}












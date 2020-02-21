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

var fname=findCookie("first_name");
var lname=findCookie("last_name");
var street = findCookie("street");
var city = findCookie("city");
var st = findCookie("st");
var zip = findCookie("zip");
var em = findCookie("em");
var ops = findCookie("ops");
var dept = findCookie("dept");
var comm = findCookie("c");
var word = findCookie("apps0");
var excel = findCookie("apps1");
var ppt = findCookie("apps2");

var sys = new Array("","Windows 7","Windows 8","Windows 10","MAC");
var x = sys[ops]

var d = new Array("Marketing","Accounting","Operations","IT")
var k = dept-1
de = d[k];


var labels = new Array("First Name","Last Name","Street","City","St","Zip","E-Mail Address","Operating System","Department","Comments");
var cookieArray = new Array(fname,lname,street,city,st,zip,em,x,de,comm);
var cookieName = new Array('fn','ln','street','city','st','zip','em','ops','dept','c')
	

function showCookies(){
	document.write("<form action='../php/submit_data_js.php' method='post' name='feedback'>");
	document.write("<table id='tableTitle'><tr><td colspan='2'>Form Confirmation Page");
	document.write("</td></tr>");
	document.write("<tr><td colspan='2' id='intro'><h3>Please confirm your input is correct. ");
	document.write("<input type='hidden' value='test' name='test'>");
	document.write("If you need to make any changes, please click on the 'Return to Form' button below.");
	document.write("</h3></td></tr>");
	
	for (i=0;i<7;i++)
		{
			document.write("<tr><td class='feedback_labels'>");
			document.write(labels[i]+": </td><td class='data'>");
			document.write(cookieArray[i]);
			//New code for validation_new.php file
			document.write("<input  value='"+cookieArray[i]+"' name='"+cookieName[i]+"'>");
			//End new code
			document.write("</td></tr>");
		}
				
	document.write("<tr><td class='feedback_labels'>Applications:</td><td class='data'>");
		appsDisplayCookies();
	document.write("</td></tr>");

	for(i=7;i<labels.length;i++)
		{
			document.write("<tr><td class='feedback_labels'>");
			document.write(labels[i]+": </td><td class='data'>");
			document.write(cookieArray[i]);
			//New code for validation_new.php file
			document.write("<input type='hidden' value='"+cookieArray[i]+"' name='"+cookieName[i]+"'>");
			//End new code
			document.write("</td></tr>");
		}			
	
	
	document.write("<tr><td colspan='2'>");
	document.write("<input type='submit' name='submit' value='Send Data'>");
	document.write("<input type='button' value='Return to Form' onclick='window.location.href=\"../htm/client.htm\"'>");
	document.write("</form></td></tr>");

	document.write("</table>");
	}
	
function appsDisplayCookies(){
	
	var appCookie = new Array(word,excel,ppt);
	for (i=0;i<appCookie.length;i++)
		{
			if((appCookie[i] != "")&&(appCookie[i] != null)&& appCookie[i] == 5)
				{
					k = 'Word';
					document.write(k+"<br/>");
					document.write("<input type='hidden' value='"+k+"' name='"+k+"' />");
				}
			else if((appCookie[i] != "")&&(appCookie[i] != null) && appCookie[i] == 6)
				{	
					k = 'Excel';
					document.write(k+"<br/>");
					document.write("<input type='hidden' value='"+k+"' name='"+k+"' />");
				}
			else if((appCookie[i] != "")&&(appCookie[i] != null) && appCookie[i] == 7)
				{	
					k = 'PPT';
					document.write(k);
					document.write("<input type='hidden' value='"+k+"' name='"+k+"' />");
				}
			else
				{
					continue;
				}
		}
}

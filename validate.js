function validate() 
{

var nameexpression = /^[a-zA-Z ]+$/;
var mobileexpression = /^[0-9]+$/;
var emailexpression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;


var firstname = document.getElementById('fullname');
var username = document.getElementById('uname');
var password = document.getElementById('pass');
var mobile = document.getElementById('mobile');
var email= document.getElementById('email');
var date= document.getElementById('date');

var message="";


if(firstname.value=="")
{
message="Name can not be empty.\n";
}
else if(!firstname.value.match(nameexpression))
{
message="Invalid Name Entered.\n";
}
if(username.value=="")
{
message+="Username can not be empty.\n";
}
if(password.value=="")
{
message+="Password can not be empty.\n";
}
else if(password.value.length<10)
{
message+="Length of password should be at least 10.\n";
}
if(date.value=="")
{
message+="Date can not be empty.\n";
}
if(mobile.value=="")
{
	message+="Mobile Number should not be empty.\n";
}
else if(mobile.value.match(mobileexpression))
{
	var mobileno=mobile.value;
	if(mobileno.length>10)
		message+="Mobile Number should not exceed 10 digits.\n";
}
else
{
	message+="Invalid Mobile Number Entered.\n";
}
if(email.value=="")
{
	message+="Email should not be empty.\n";
}
else if(!email.value.match(emailexpression))
{
	message+="Invalid Email address Number Entered.\n";
}
if(!document.getElementById('male').checked && !document.getElementById('female').checked)
{
	message+="Gender Should be specified.\n";
}
if(message!="")
{
document.getElementById("demo").innerHTML="* Fill all fields correctly and enter valid data *";
alert(message);
return false;
}
else
	return true;
}
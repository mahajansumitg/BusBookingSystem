<html>
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Travel Agency Pune</title>

<script language="javascript" src="validate.js"></script>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styleh.css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1>Travel Agency Pune</h1>
		</div>
		<div id="slogan">
			<h2>Have a nice journey!!</h2>
		</div>
	</div>
	<div id="menu">
		<ul>
			<li class="first current_page_item"><a href="home.html">Homepage</a></li>
			<li><a href="gallary.html">Gallery</a></li>
			<li><a href="regist.php">Registration</a></li>
			<li><a href="cancel.php">Cancellation</a></li>
			<li><a href="update.php">Updation</a></li>
			<a href="contact.html">Contact Us</a>
			<li class="last"><a href="admin.php">Admin Login</a></li>
		</ul>
		
	</div>

	<br><br><br>

	<div>
	<center><font size="6">Welcome To New Registration For Whole Tour Of Pune Darshan</font><br><br>
	
	<form onsubmit='return validate()' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	<p id="demo" style="margin-left:40%;"></p>
	<b>Name :-     </b><input id="fullname" type="text" name ="fname" pattern="^[a-zA-Z ]+$" placeholder="Full Name"><br><br>
	<b>Email :-     </b><input id="email" type="email" name="email" placeholder="Email"><br><br>
	<b>Password :-     </b><input id="pass" type="password" name="pass" placeholder="Password"><br><br>
	<b>Gender :-    </b><input type="radio" id="male" name="gender" value="Male">Male
			    <input type="radio" id="female" name="gender" value="Female">Female<br><br>
	<b>Mobile :-     </b><input id="mobile" type="text" name="mobile" placeholder="Mobile Number"><br><br>
	<b>Enter Your Selected Date of Journey In dd/mm/yyyy Format :-     </b><input id="date" type="text" name="date" placeholder="dd/mm/yyyy"><br><br>
	<table border="3">
	<tr><th><input type="checkbox" name="agree" value="agree">-Click in the box to agree the conditions.</th></tr>
	<tr><th>1.You can not carry any harmful things with you,such as gun & knife.</th></tr>
	<tr><th>2.If you have any problems with your knees, then you wont be allowed go & climb at some spots.</th></tr>
	<tr><th>3.You can not take photographs at some places, because it is not permitted at that places.</th></tr>
	<tr><th>4.You have to board from our head office which is at "AISSMS IOIT, Near RTO Office, Kenedy Road, Shivaji Nagar, Pune".</th></tr>
	</table>
	<br>
	<input id="reset" type="reset" value="Reset">         <input id="submit" type="submit" value="Register Now" name="submit" onclick="return validate()"><br><br>
	</form>
	-------------------------------------------------------------------------------------------------------------<br><br>
	</table>
	
	<?php

	if(isset($_GET['submit'])) 
	{
		
		$fname = $_GET['fname']; 
		$email = $_GET['email'];
		$pass = $_GET['pass']; 
		$gender = $_GET['gender'];
		$mobile = $_GET['mobile'];
		$date = $_GET['date'];	
		
		$connection = new MongoClient(); // connects to localhost:27017

			if(isset($_GET['agree']))
			{
				$doc = array(
				"Full Name" => "$fname",
				"Email" => "$email",
				"Password" => "$pass",
				"Gender" => "$gender",
				"Mobile" => "$mobile",
				"Date of Journey" => "$date"
				);
				
				$student = $connection->mydb->student;
				
				$cursor = $student->find(array("Date of Journey" => "$date"));
				$cnt = $cursor->count();
				if ( $cnt > 2 )
				{
					echo "<br>Registration Unsuccessful.<br>Sorry, there is no vaccancy on this date.<br>Please try some anoher date.";
				}
				else
				{
				$student->insert( $doc );
				echo "<br>Registration Successful.<br>Please verify in the list given below that your entry is registered or not.<br>You can mail us or call us for the further assistence.<br>Our contat details are given in the link 'Contact Us' in the upper right corner in the navigation bar.<br>";	
				}
				
				echo "Your report of journey is given below.<br>";
				$cursor = $student->find(array("Email" => "$email"));		
				echo "<br><table border=3>";
				echo "<tr><b><th>Full Name</th><th>Email</th><th>Gender</th><th>Mobile</th><th>Date of Journey</th></b></tr>";
				foreach ( $cursor as $id => $value )
				{
					
					 echo"<tr>";
					 echo"<td>";echo $value['Full Name'];echo"</td>";
					 echo"<td>";echo $value['Email'];echo"</td>";
					 echo"<td>";echo $value['Gender'];echo"</td>";
					 echo"<td>";echo $value['Mobile'];echo"</td>";
					 echo"<td>";echo $value['Date of Journey'];echo"</td>";
					 echo"</tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "You have to agree our terms & conditions for registration.";
			}
	}
	?>  

	</center><br><br><br><br>
	</div>
</div>

</body>
</html>
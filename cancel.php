<html>
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Travel Agency Pune</title>
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
	<center><font size="6">Cancellation Of Reservation</font><br><br><br>
	<form onsubmit='return validate()' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	<b>Email :- </b><input id="email" type="text" name="email" placeholder="Email"><br><br>
	<b>Password :- </b><input id="pass" type="password" name="pass" placeholder="Password"><br><br>
	<input id="cancel" name="cancel" type="submit" value="Cancel Now"><br><br>
	</form>
	-------------------------------------------------------------------------------------------------------------<br><br>
	</table>

	<?php

	if(isset($_GET['cancel'])) 
	{ 	

		$email = $_GET['email'];
		$pass = $_GET['pass']; 

		$connection = new MongoClient();
		$student = $connection->mydb->student;
		
		$student->remove(array("Password" => "$pass"));
		
	} 
	
	?>  

	</center><br><br><br><br>
	</div>

</div>



</body>
</html>
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

	<br><br>

	<div>
	<center><font size="6">Updation In Reservation</font><br>
	
	<br>-------------------------------------------------------------------------------------------------------------
	<form onsubmit='return validate()' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">	
	<p id="demo" style="margin-left:40%;"></p>
	
	<font size="4">If you want to Update <u>Another Field</u>, then Select That Field :- </font>
	
	<br><br>
	<table>
	<tr><th><a href="updatename.php">1.Name</a></tr></th>
	<tr><th><a href="updatepass.php">2.Password</a></tr></th>
	<tr><th><a href="updategen.php">3.Gender</a></tr></th>
	<tr><th><a href="updatemob.php">4.Mobile</a></tr></th>
	<tr><th><a href="updatedate.php">5.Date</a></tr></th>
	</table>
	<br>-------------------------------------------------------------------------------------------------------------
	<br><br>
	
	<font size="4"><b>Updation of Gender</b></font><br><br>
	
	<font size="4">Enter The Email_ID :- <input type="text" id="email" name ="email" placeholder="Email_ID"></font><br><br>
	
	<font size="4">Enter The Password :- <input type="password" id="pass" name ="pass" placeholder="Password"></font><br><br>

	<font size="4">Enter The Gender :- <input type="text" id="fullname" name ="up_data" placeholder="Enter Data"></font><br><br>
	
	<input id="update" name="update" type="submit" value="Update Now"><br><br>
	
	<br>-------------------------------------------------------------------------------------------------------------<br><br>
	
	<h3><font size="3">If you are a new user, <a href="regist.php">Click Here</a></font></h3>

	-------------------------------------------------------------------------------------------------------------<br>
	
	<?php

	if(isset($_GET['update'])) 
	{ 
 
		$connection = new MongoClient();
		$student = $connection->mydb->student;

		$email = $_GET['email'];	
		$pass = $_GET['pass'];
		$up_data = $_GET['up_data'];
		
		$newdata = array('$set' => array("Gender" => "$up_data"));
		$student->update(array("Password" => "$pass"), $newdata);	
		
		echo "Your new updated <u>report</u> of journey is given below.<br>";
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
		echo "<br><br>";

	}
	
	?>	
	<br><br><br>
	</div>

</div>



</body>
</html>
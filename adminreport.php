<html>

<body>
<center>
<form onsubmit='return validate()' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<font size="4">Journey report</font>
<font size="4">Choose the date for which you want report :-</font>
<input type="text" id="date" name="date" placeholder="dd/mm/yyyy"><br><br>
<input id="generate" name="generate" type="submit" value="submit"><br><br>
</form>

<?php
		if(isset($_GET['generate'])) 
		{ 
			$connection = new MongoClient();
			$student = $connection->mydb->student;
			
			$date=$_GET['date'];
			
			$cursor = $student->find(array("Date of Journey" => "$date"));
			$cnt = $cursor->count();
			echo "<br><table border=3>";
			echo "<tr><b><th>Full Name</th><th>Email</th><th>Password</th><th>Gender</th><th>Mobile</th><th>Date of Journey</th></b></tr>";
			foreach ( $cursor as $id => $value )
			{
				
				 echo"<tr>";
				 echo"<td>";echo $value['Full Name'];echo"</td>";
				 echo"<td>";echo $value['Email'];echo"</td>";
				 echo"<td>";echo $value['Password'];echo"</td>";
				 echo"<td>";echo $value['Gender'];echo"</td>";
				 echo"<td>";echo $value['Mobile'];echo"</td>";
				 echo"<td>";echo $value['Date of Journey'];echo"</td>";
				 echo"</tr>";
			}
			echo "</table>";echo"<br>";
		}
?>

</center>
</body>
</html>
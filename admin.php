<html>
<head>
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<li><a href="admin.php">Admin</a></li>
	<li> <a href="index.php">Home<a></li>
	<br>
	<!-- login -->
	<form method="post">
		name : <input type="text" name="name">
			<br>

		password : <input type="text" name="pass">
			<br>
			<input type="submit" value="login">
	</form>

	<?php

	$name = $_POST['name'];
	$pass = $_POST['pass'];

	if ($name==('admin') & $pass==('')) {


		$con = mysqli_connect('localhost', 'root', '');
		if(!$con) {
			echo "not connected to server";
		}

		if(!mysqli_select_db($con, "task")) {
			echo "database not conncted";
		}

		$sql = "SELECT * FROM person";

		$myData = mysqli_query($con, $sql);

		echo "<table border=1>
		<tr>
		<th> Name </th>
		<th> Email </th>
		</tr>";
		while($record = mysqli_fetch_array($myData)){
			echo "<tr>";
			echo "<td>" . $record['Name'] . "</td>";
			echo "<td>" . $record['Email'] . "</td>";
			echo "<tr>";
		}
		echo "</table>";

		mysqli_close($con);
	}
	else {
		echo "wrong password or name please try again";
	}
	

	?>



</body>
</html>
<?php
	$con = mysqli_connect('127.0.0.1', 'root', '');
	if(!$con) {
		echo "not connected to server";
	}

	if(!mysqli_select_db($con, "task")) {
		echo "database not conncted";
	}

	$Name=$_POST["username"];
	$Email=$_POST["email"];

	$sql = "insert into person (Name,Email) VALUES ('$Name','$Email')";

	if(!mysqli_query($con, $sql)) {
		echo "error!!!!!";

	}
	


$msg = <<<EMAIL
Hello $Name
Thank you!! You Have Subscribe To Us.
EMAIL;
$subject = "Welcome Massage";

if ($_POST['submit']) {
    $success= mail($Email, $subject, $msg);
    if($success)
    { 
        echo '
        <p>Your message has been sent!</p>
        ';
    } else { 
        echo '
        <p>Something went wrong, go back and try again!</p>
        '; 
    }
}
	header ("refresh:2; url=index.php");




?>

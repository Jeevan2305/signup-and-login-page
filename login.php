<?php
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','login_page');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(email, password) values(?, ?)");
		$stmt->bind_param("ssi", $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "<h1>Login successfully...</h1>";
		$stmt->close();
		$conn->close();
	}
?>
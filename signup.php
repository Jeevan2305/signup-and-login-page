<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','login_page');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(name, email, password) values(?, ?, ?)");
		$stmt->bind_param("sssi", $name, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "<h1>Signup successful...</h1>";
		$stmt->close();
		$conn->close();
	}
?>
<?php 
require_once("connection.php");

if(isset($_POST['submit'])) {
	if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['tel'])) {	
	$data = [
		"fname" => $_POST['fname'],
		"lname" => $_POST['lname'],
		"email" => $_POST['email'],
		"tel" => $_POST['tel'],

	];

	$stmt = $pdo->prepare("INSERT INTO members (fname, lname, email, tel) VALUES (:fname, :lname, :email, :tel)");
	$stmt->execute($data);

	echo "<h3 align='center' style='color: green'>The data was successfully entered into database.</h3>";
	echo "<p align='center'><a href='index.php' styl='button'>View Member List</a></p>";


	}else{
		echo "<h2 align='center' style='color: red'>Please completely fill the form data.</h2>";
	}


}else{
	echo "<h3 align='center'>Please enter member details in the form below:</h3>";
	echo "<p align='center'><a href='index.php' styl='button'>View Member List</a></p>";
}

 ?>

<!DOCTYPE html>
<html>
	<body>
	<h2>Create Member</h2>
		<form action="" method="post">
		  <label for="fname">First name:</label><br>
		  <input type="text" id="fname" name="fname"><br>
		  <label for="lname">Last name:</label><br>
		  <input type="text" id="lname" name="lname"><br>
		  <label for="email">Email:</label><br>
		  <input type="email" id="email" name="email"><br>
		  <label for="tel">Telephone:</label><br>
		  <input type="text" id="tel" name="tel"><br><br>
		  <input type="submit" id="submit" name="submit" value="submit">
		</form> 
	</body>
</html>
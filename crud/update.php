<?php 
require_once("connection.php");
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM members WHERE id = ?');
$stmt->execute([$id]);
$member = $stmt->fetch();
// echo $member['lname'];



if(isset($_POST['submit'])) {
	if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['tel'])) {	
	$data = [
		"fname" => $_POST['fname'],
		"lname" => $_POST['lname'],
		"email" => $_POST['email'],
		"tel" => $_POST['tel'],
		"id" => $_POST['id'],


	];

	$sql = "UPDATE members SET fname = :fname, lname = :lname, email = :email, tel = :tel WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);

	echo "<h3 align='center' style='color: green'>The member data was successfully updated.</h3>";
	echo "<p align='center'><a href='index.php' styl='button'>Updated Member List</a></p>";
	die();


	}else{
		echo "<h2 align='center' style='color: red'>Please do not leave any field blank.</h2>";
	}


}else{
	echo "<h3 align='center'>Please update member details in the form given below:</h3>";
	echo "<p align='center'><a href='index.php' styl='button'>View Member List</a></p>";
}

 ?>

<!DOCTYPE html>
<html>
	<body>
	<h2>Update Member</h2>
		<form action="" method="post">
		  <label for="id">Member ID:</label><br>
		  <input type="number" id="id" name="id" value="<?=$member['id']?>" readonly><br>
		  <label for="fname">First name:</label><br>
		  <input type="text" id="fname" name="fname" value="<?=$member['fname']?>"><br>
		  <label for="lname">Last name:</label><br>
		  <input type="text" id="lname" name="lname" value="<?=$member['lname']?>"><br>
		  <label for="email">Email:</label><br>
		  <input type="email" id="email" name="email" value="<?=$member['email']?>"><br>
		  <label for="tel">Telephone:</label><br>
		  <input type="text" id="tel" name="tel" value="<?=$member['tel']?>"><br><br>
		  <input type="submit" id="submit" name="submit" value="submit">
		</form> 
	</body>
</html>
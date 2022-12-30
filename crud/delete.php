<?php 
require_once("connection.php");
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM members WHERE id = ?');
$stmt->execute([$id]);
$member = $stmt->fetch();
// echo $member['lname'];


if(isset($_POST['submit'])) {

	$sql = "DELETE FROM members WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);
	echo "<h3 align='center' style='color: green'>The member data was successfully deleted.</h3>";
	echo "<p align='center'><a href='index.php' styl='button'>Updated Member List</a></p>";
	die();

}

 ?>

<!DOCTYPE html>
<html>
	<body>
	<h2>Delete Member</h2>
	<h4><strong style='color: red'>Caution: </strong> Click 'confirm' button to delete member data</h4>
		<form action="" method="post">
		  <label for="id">Member ID:</label><br>
		  <input type="number" id="id" name="id" value="<?=$member['id']?>" readonly><br>
		  <label for="fname">First name:</label><br>
		  <input type="text" id="fname" name="fname" value="<?=$member['fname']?>" readonly><br>
		  <label for="lname">Last name:</label><br>
		  <input type="text" id="lname" name="lname" value="<?=$member['lname']?>" readonly><br>
		  <label for="email">Email:</label><br>
		  <input type="email" id="email" name="email" value="<?=$member['email']?>" readonly><br>
		  <label for="tel" readonly>Telephone:</label><br>
		  <input type="text" id="tel" name="tel" value="<?=$member['tel']?>" readonly><br><br>
		  <input type="submit" id="submit" name="submit" value="confirm">
		</form> 
	</body>
</html>
<?php
require_once("connection.php");
$members = $pdo->query('SELECT * FROM members')->fetchAll();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Crud Demo</title>
    <style>
      .button {
        border: none;
        background-color: #008CBA;
        color: white;
        padding: 15px 40px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
   <link>

</head>
<body>
<div class="member-list">
<h1 align="center">PDO CRUD</h1>
<h3 align="center">Member List</h3>
<?php if($members) { ?>
  <style>table, th, td {border: 1px solid black;} </style>

<table style="width:100%">
  <thead>    
    <tr>
      <th>Member ID</th>
      <th>First Name</th>
     <th>Last Name</th>
     <th>Email</th>
     <th>Telephone</th>
    <th >Edit</th>
   <th>Delete</th>
    </tr>
  </thead>  
  <tbody>
    <?php foreach($members as $row) {?>
    <tr>
      <td align="center"><?=$row['id']?></th>
      <td><?=$row['fname']?></td>
      <td><?=$row['lname']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['tel']?></td>
      <td><a href="update.php?id=<?=$row['id']?>">Edit</a></td>
      <td><a href="delete.php?id=<?=$row['id']?>">Delete</a></td>
    </tr>
  <?php } ?>
   
  </tbody>
</table>
<?php }else{
  echo "<p align='center' style='color: red'>Currently no members exist in the database. Please use the form below to insert member data into the database</p>";
} ?>

<p align="center"><a href="./create.php" class="button">Add Member</a></p>
</div>
</body>
</html>

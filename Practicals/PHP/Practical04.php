?>
<!DOCTYPE html >
<html>
<head>
<title>Program 4</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body_bg">
<div <div align="center">
<h4>Program 4</h4>
<h3>Enter Login Details</h3>
<form id="login-form" method="post" >
<table border="0.5" >
<tr>
<td><label for="user_id">User Name</label></td>
<td><input type="name" name="user_id" id="user_id"></td>
</tr>
<tr>
<td><label for="user_pass">Password</label></td>
<td><input type="password" name="user_pass" id="user_pass"></input></td>
</tr>
<tr>
<td><input type="submit" value="Submit" />
<td><input type="reset" value="Reset"/>
</tr>
</table>
</form>
</div>
<?php
$dbhost='localhost:8889';
$dbuser ='root';
$dbpassword ='root';
$dbdatabase= 'People';
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
if (!$connection){
die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, $dbdatabase);
if (!$select_db){
die("Database Selection Failed" . mysqli_error($connection));
}
if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
$username = $_POST['user_id'];
$password = $_POST['user_pass'];
$query = "SELECT * FROM `Users` WHERE name='$username' and password='$password'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count == 1){
echo "<script type='text/javascript'>alert('Login Credentials
verified')</script>";
}
else{
echo "<script type='text/javascript'>alert('Invalid Login
Credentials')</script>";
}
}
?>
</body>
</html>
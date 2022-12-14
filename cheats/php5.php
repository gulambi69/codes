<?php
$name=$_POST['name'];
$pass=$_POST['pass'];

$servername="localhost";
$username="root";
$password="";
$database="login";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Failed to connect :".mysqli_connect_error());
}
echo "Connection was Successful";

$query=mysqli_query($conn,"INSERT INTO `validusers` (`user`, `pass`) VALUES ('$name', '$pass')");

if($query)
    echo "record update successful";
else 
    echo "record update not successful".mysqli_error($conn);
?>
<?php
$name=$_POST['name'];
$pass=$_POST['pass'];
$servername="localhost";
$username="root";
$password="";
$database="login";
$f=0;
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Failed to connect :".mysqli_connect_error());
}
echo "Connection was Successful";
echo "<br>";
$query="SELECT * FROM `validusers` WHERE `user` LIKE '$name'";
$result=mysqli_query($conn,$query);
while($rows=mysqli_fetch_assoc($result))
{
    if($rows['pass']==$pass)
    $f=1;
    break;
}
if($f==0)
echo "Invalid User";
else
echo "Welcome $name";
// print_r ($rows);
?>
<?php
session_start();
$_SESSION['success'] = "";
$db = mysqli_connect('localhost:8889', 'root', 'root', 'People');
// Registration code
if (isset($_POST['reg_user'])) {
$name = mysqli_real_escape_string($db, $_POST['name']);
$rollno = mysqli_real_escape_string($db, $_POST['rollno']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$age = mysqli_real_escape_string($db, $_POST['age']);
$gender = mysqli_real_escape_string($db, $_POST['gender']);
$socities = mysqli_real_escape_string($db, $_POST['societies']);
$course = mysqli_real_escape_string($db, $_POST['course']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$id_card = mysqli_real_escape_string($db, $_POST['id_card']);
$errors=[];
if (empty($name)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($rollno)) { array_push($errors, "Password is required"); }
if (count($errors) == 0) {
$query = "INSERT INTO Students
(name,rollno,email,age,gender,societies,course,address,id_card)
VALUES('$name','$rollno','$email','$age','$gender','$socities','$course','$address','$id_card'
)";
mysqli_query($db, $query);
$_SESSION['name'] = $name;
$_SESSION['success'] = "You have logged in";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Name</th><th>Roll No</th><th>Email</th><th>Age</th>
<th>Gender</th><th>Societies</th><th>Course</th><th>Address</th><th>ID Card</th></tr>";
class TableRows extends RecursiveIteratorIterator {
function __construct($it) {
parent::__construct($it, self::LEAVES_ONLY);
}
function current() {
return "<td style='width: 150px; border: 1px solid black;'>" . parent::current().
"</td>";
}
function beginChildren() {
echo "<tr>";
}
function endChildren() {
echo "</tr>" . "\n";
}
}
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "People";
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM Students");
$stmt->execute();
// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
echo $v;
}
}
catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
echo "<script>alert('Insertion was Successfull !');</script>";
}
}
?>
<html>
<head><title>Practical 05</title>
<script>
    function cbChange1(obj)
    {
    var cbs = document.getElementsByName("society");
    for (var i = 0; i < cbs.length-1; i++)
    {
    cbs[i].checked = false;
    }
    }
    function cbChange2(obj)
    {
    var cbs = document.getElementsByName("societ");
    var i = cbs.length-1
    cbs[i].checked = false;
    }
    function form_validation()
    {
    var checkBoxes = document.getElementsByName( 'societiy' );
    var isChecked = false;
    for (var i = 0; i < checkBoxes.length; i++)
    {
    if ( checkBoxes[i].checked )
    {
    isChecked = true;
    };
    };
    if (!isChecked)
    {
    alert( 'Please, check at least one checkbox!' );
    }
    }
    function emailvalidation(inputText){
    var mailformat = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$/;
    if(!inputText.value.match(mailformat))
    {
    alert("You have entered an invalid email address!");
    return false;
    }
    else
    {
    return true;
    }
    }
    function rollnumber(inputtxt)
    {
    var num = /^\d{8}$/;
    if(inputtxt.value.match(num))
    {
    return true;
    }
    else
    {
    alert("Enter a valid rollno");
    return false;
    }
    }
    function validateImage(file) {
    var f= file.value;
    var t = f.substring(f.lastIndexOf('.') + 1).toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" ) {
    alert('Please select a valid image file');
    return false;
    }
    return true;
    }
    </script>
</head>
<body>
<h1 align="center"><b><u>Student Registration form</u></b></h1>
<form name="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
method="post" onsubmit="return(form_validation());">
<b> <label for="name">Name of student : </label></b>
<input type="text" name="name" placeholder="Enter your name" maxlength="50" size="30" required><br/><br/>
<b><label for="name">Roll No. :</label></b>
<input type="text" name="roll" placeholder="Enter your Roll no." maxlength="8" size="30" required
onchange="rollnumber(document.form1.rollno)"><br/><br/>
<b><label for="name">Email :</label></b>
<input type="email" name="email" maxlength="100" size="30" required
onchange="emailvalidation(document.form1.email)"><br/><br/>
<b><label for="name">Age :</label></b>
<input type="number" name="age" min="16" max="22" size="3" required><br/><br/>
<fieldset><legend><b>Gender</b></legend>
	Male<input type="radio" name="gender" id="gender1" value="Male" checked>
	Female<input type="radio" name="gender" id="gender2" value="Female">
    Others<input type="radio" name="gender" id="gender3" value="Other">
    Prefer not to say<input type="radio" name="gender" id="gender4" value="Prefer not to say">
</fieldset><br>
<b>Society</b><br/>
<label for="society" >Are u in any society?</label><br>
<input type="checkbox" id="society1" name="societies" value="Arts" onchange="cbChange2(this)">
<label for="society1">Arts</label>
<input type="checkbox" id="society2" name="societies" value="Dance" onchange="cbChange2(this)">
<label for="society2">Dance</label>
<input type="checkbox" id="society3" name="societies" value="Drama" onchange="cbChange2(this)">
<label for="society3">Drama</label>
<input type="checkbox" id="society4" name="societies" value="Music" onchange="cbChange2(this)">
<label for="society4">Music</label>
<input type="checkbox" id="none" name="societies" value="None" onchange="cbChange1(this)">
<label for="none">None</label>
<br/><br/>
<b><label for="Course">Choose course:</label></b>
<select id="course" name="course" required>
<option value="" selected>--select--</option>
    <option value="BSc">BSC</option>
    <option value="Bcom">Bcom</option>
    <option value="BBa">BBA</option>
    <option value="Ba">BA</option>
</select><br/>
<br/><b>Address :</b>
<br/><textarea row="10" col="10" id="address" required></textarea><br/><br/>
<label for="id_card">ID Card:</label><br>
<input type="file" id="id_card" name="id_card" required
onchange="validateImage(document.form1.id_card)" ><br>
<br>
<input type="reset" value="reset">
<input type="submit" value="submit">			
</form>
</body>
</html>
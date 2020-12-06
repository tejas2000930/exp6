<html>
<head>
<title>Employee information</title>
<style>
div.head{
background-color:#80ced6;


}
body{ background:##ffcc99
;
background-size: 1200px 1000px;


}


form {


height:200px; margin: 0 auto;
}

h2 {
color: ##33ccff;

}
h1 {
color: ##33ccff;
 
font-size:3em;
}

form{
color:#000;
font-size:1.5em; font-weight:900;



}
table {
font-family: serif;
border-collapse: collapse; width: 50%;
align: center;
background-color:##33ccff;

}
tr:hover{
background-color: #ba78ac;

}
td, th {
/* border: 1px solid ;*/ text-align: center; padding: 8px; height:80px;
font-size:30px;

}
 
/*tr:nth-child(even) { background-color: #dddddd;
}*/
/*input[type=radio] {




width:100%; height:50px;
box-sizing: border-box; border: none; background-color: #fab; color: blue;
}*/


input[type=text] {





width:90%; height:50px;
box-sizing: border-box; font-family: serif; color: ##33ccff;
font-size:30px;
}

#error{
color: #f8a;

}
 
input[type=submit],#button { background-color: #ffcc99


;
border: none; color: white;
padding: 15px 32px; text-align: center;
text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;
}









</style>

</head>
<body>
<?php
$name = $email = $salary = $gender = $job = "";
$noname = $noemail = $nosalary = $nogender = $nojob = "";


if(!empty($_POST))
{


if($_SERVER["REQUEST_METHOD"]=="POST"){
$input_error = false;
if (empty($_POST["name"])){
$noname= "name is required";
$input_error = true;
}
else{

$name = refine($_POST["name"]); if (!preg_match("/^[a-zA-Z ]*$/",$name)){
 
$noname="Invalid name";
}
}


if (empty($_POST["email"])) {
$noemail = "email is required";
$input_error = true;
}
else {
$email = refine($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$noemail = "Invalid email format";

}
}


if (empty($_POST["salary"])) {
$nosalary = "salary is required";
$input_error = true;
}
else {
$salary = refine($_POST["salary"]);
if (!filter_var($salary, FILTER_VALIDATE_FLOAT)) {
$nosalary = "Invalid salary";

}
}


if (empty($_POST["gender"])){
 
$nogender = "gender is required";
$input_error = true;
} else {
$gender = refine($_POST["gender"]);

}





if (empty($_POST["job"])){
$nojob = "job required";
$input_error = true;
} else {
$job = refine($_POST["job"]);

}







}


if($input_error == false){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tea156";




$conn = mysqli_connect($servername, $username, $password, $dbname);
 


if (!$conn) {
die("Connection failed: " . mysqli_connect_error());

}
$sql = "INSERT INTO tea156 (employee_name,email,job,salary,gender) VALUES ('$name', '$email', '$job','$salary','$gender')";





if (mysqli_query($conn, $sql)) {
echo '<script language="javascript">';
echo 'alert("New record created successfully")'; echo '</script>';

} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}
}
}


function refine($text){
$text = trim($text);
$text = stripslashes($text);
$text = htmlspecialchars($text); return $text;
}
 
?>
<! 	>
<center>
<br>
<div class="head"><h1> EMPLOYEE INFORMATION </h1></div><br>
<h2>* required entries</h2>
</center>
<center><br><br>
<div class="theform">


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr>
<td>
NAME :</td><td> <input type="text" name="name" value="<?php echo
$name;?>"></td><td> <span id="error">*
<?php echo $noname; ?></span></td></tr>
<tr><td>
EMAIL:</td><td> <input type="text" name="email" value="<?php echo
$email;?>"></td><td> <span id="error">*
<?php echo $noemail; ?></span></td> </tr>
<tr><td>
JOB  : </td><td>	<input type="text" name="job" value="<?php echo
$job;?>"></td><td> <span id="error">*
    <?php echo $nojob; ?></span></td> </tr>
    <tr><td>
 
SALARY:</td><td> <input type="text" name="salary" value="<?php echo
$salary;?>"></td><td> <span id="error">*
    <?php echo $nosalary ; ?></span></td></tr>
<tr><td>
GENDER:</td><td> <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">MALE
<input type="radio" name="gender" <?php if (isset($gender) &&
$gender=="female") echo "checked";?> value="female">FEMALE</td><td>
<span id="error">*
<?php echo $nogender; ?></span></td> </tr></table><br>
<input type="submit" name="submit" value="SUBMIT" id="submit">
</form>
</div>
</center>
<br><br>
<div >
<center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!	<button name="edit"
onclick='window.location.replace("http://localhost/stgobain/edit_dataright.php ")' id="button">EDIT</button>-->
<button name="view" id="button" onclick= 'window.location.replace("http://localhost/stgobain/display_data.php")'w3>VIE W</button>
</center>
</div>
</body>
</html>
 

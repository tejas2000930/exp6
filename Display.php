<html>
<body>
<style> table {
 
font-family: arial, sans-serif; border-collapse: collapse; width: 100%;
}

tr:hover{
background-color: #ba78ac;

}
td, th {
border: 1px solid #dddddd; text-align: left;
padding: 8px;

}


tr:nth-child(even) { background-color: #dddddd;
}
#button {
background-color: #ffb3d9; border: none;
color: white; padding: 15px 32px; text-align: center;
text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;
 
}
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tea156";




$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
die("Connection failed: " . mysqli_connect_error());

}


$sql = "SELECT employeeID, employee_name, email,job,salary,gender FROM employee_data";
$result = mysqli_query($conn, $sql); echo "<table border:>";
echo "<tr>
<th>EMPLOYEE ID</th>
<th>NAME</th>
<th>EMAIL</th>
<th>JOB</th>
<th>SALARY</th>
<th>GENDER</th>
<th>ACTION</th>
 
</tr>";
if (mysqli_num_rows($result) > 0) {


while($row = mysqli_fetch_assoc($result)) {
echo "<tr><td>" . $row["employeeID"]. "</td><td>" .
$row["employee_name"].
"</td><td>" . $row["email"]. "</td><td>" . $row["job"]. "</td><td>" . $row["salary"]. "</td><td>" . $row["gender"].
"</td><td><a href='edit_dataright.php?employee_id=".$row["employeeID"]. "'>Edit</a></td></tr>";
}
?>




<?php
} else {
echo "0 results";

}
echo "</table>"; mysqli_close($conn);
?>
<br><br>
<center>
<div>
<button name="back" id="button" onclick=
'window.location.replace("http://localhost/exp6/employee.php")'>BACK</button>
</div></center>
</body>
</html>

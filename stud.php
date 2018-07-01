<html>
<h1>INTERNAL MARKS</h1>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
 $table=$_POST['sub'];
 $regno=$_POST['reg'];
 
 
 $conn = new mysqli($servername, $username, $password, 'imc');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT im FROM $table where regno=$regno ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<center>Your Internal mark for Subject:$table is</center> <center><p style='font-size:50px;'><b> " . $row["im"]. "</center></b></p>";
		echo "<br>";
    } 
}
else
{
	echo "Regno does not exist";
}
$conn->close();
?>
<a href="index.html">Go back to Main Page</a>
</body>
</html>

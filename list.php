<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
 $table=$_POST['sub'];
 
 
 $conn = new mysqli($servername, $username, $password, 'imc');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM $table";
$result = $conn->query($sql);
echo "<center><h1>LIST OF STUDENTS AND THEIR MARKS IN SUBCODE: ".$table."</h1></center>";
if ($result->num_rows > 0) {
    // output data of each row
	echo "<center><table border='2px' cellpadding='10'> <tr><th>Regno:</th><th> Name: </th><th> UT1: </th><th> UT2: </th><th> UT3: </th><th> INTERNAL: </th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["regno"]. "</td><td>" . $row["name"].  "</td><td>" . $row["ut1"].  "</td><td>" . $row["ut2"].  "</td><td>" . $row["ut3"].  "</td><td>" . $row["im"].  "</td><tr><br></center>";
    } 

}
else
{
	echo "<center>No Records found</center>"; 
}
$conn->close();
?>
<a href="index.html">Go back to Main Page</a>
</body>
</html>

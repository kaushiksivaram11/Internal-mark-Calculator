<html>
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


$sql = "SELECT ut1,ut2,ut3 FROM $table where regno=$regno";
$result = $conn->query($sql);
echo "<center><h1>INTERNAL MARK</center></h1>";
if ($result->num_rows > 0) {
    
	    while($row = $result->fetch_assoc()) {
           $tot=$row["ut1"]+$row["ut2"]+ $row["ut3"];
		   $internal=$tot/15;
		   echo "<center>Internal mark for the Register number: $regno and for subject $table  is <p style='font-size:50px;'><b>".round($internal)."</b></center>";
		   echo "<br>";
		   $sql = "UPDATE  $table SET im=$internal WHERE regno=$regno";
if ($conn->query($sql) === TRUE) {
    echo "<center>Record updated successfully</center>";
}
		   
    } 
}



$conn->close();
?>
<a href="index.html">Go back to Main Page</a>
</body>
</html>

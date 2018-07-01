<html>
<body>

<?php
if(isset($_POST['delete'])){
error_reporting( error_reporting() & ~E_NOTICE );
$sname="localhost";
$usr = "root";
$pass = "";
$conn = mysqli_connect($sname , $usr , $pass);


if($conn->connect_error)
	die("Connection Failure");
else
echo "Success <br />";


$sql = "use imc";

if($conn->query($sql))
{
	
	$subcode=$_POST['sub'];
	$reg=$_POST['reg'];
		$sql1 = "delete from ".$subcode." where regno='$reg';";
	if($conn->query($sql1))
	{
	echo "In ".$subcode." , regno:".$reg." has been deleted <br />";
	}
}
}

else
{
?>
<form method="post" action = "<?php $_PHP_SELF ?>">
Enter Subject code:
<select  name="sub">
<option value ="cs6501" > CS6501</option>
<option value ="cs6502"> CS6502 </option>
<option value ="cs6503"> CS6503</option>

</select>
<br><br>
Enter register number to delete:<input type="text" name="reg"/>
<input type="submit" value="Delete Record" name="delete"/>
</form>
<?php
 }
?>
<a href="index.html">Go back to Main Page</a>
</body>
</html>

<html>
<body>

<?php
if(isset($_POST['update'])){
error_reporting( error_reporting() & ~E_NOTICE );$sname="localhost";
$usr = "root";
$pass = "";
$conn = mysqli_connect($sname , $usr , $pass);


if($conn->connect_error)
	die("Connection Failure");
else
echo "Success<br >";


$sql = "use imc";

if($conn->query($sql))
{
	echo "Database Selected<br>";
	$id=$_POST['id'];
	$ut1=$_POST['ut1'];
	$ut2=$_POST['ut2'];
	$ut3=$_POST['ut3'];
	$sub=$_POST['sub'];	
	$sql = "update ".$sub." set ut1='$ut1',ut2='$ut2',ut3='$ut3' where regno='$id';";
	if($conn->query($sql))
	{
	echo "Updated UT-1 marks as ".$ut1." for regno:".$id."<br >";
	echo "Updated UT-2 marks as ".$ut2." for regno:".$id."<br >";
	echo "Updated UT-3 marks as ".$ut3." for regno:".$id."<br >";
	echo "<center>Thank You</center>";
	}
	else
	{
		echo "Register number does not exist";
	}
}

}
else{
	?>
	<form method="post" action = "<?php $_PHP_SELF ?>">
Enter Subject code:
<select  name="sub">
<option value ="cs6501" > CS6501</option>
<option value ="cs6502"> CS6502 </option>
<option value ="cs6503"> CS6503</option>

</select>
<br>
<br>
Enter register number:<input type="text" name="id"/><br><br>
Enter marks for UT-1:<input type="number" name="ut1" min="0" max="100"/><br><br>
Enter marks for UT-2:<input type="number" name="ut2" min="0" max="100"/><br><br>
Enter marks for UT-3:<input type="number" name="ut3" min="0" max="100"/><br><br>
<input type="submit" value="Update" name="update"/>
</form>
<?php
 }
?>
<a href="index.html">Go back to Main Page</a>
</body>
</html>


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
	$ut2=$_POST['ut2'];
	$sub=$_POST['sub'];	
	$sql = "update ".$sub." set ut2='$ut2' where regno='$id';";
	if($conn->query($sql))
	{
	echo "Updated UT-2 marks as ".$ut2." for regno:".$id."<br >";
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
Enter marks for UT-2:<input type="number" name="ut2" min="0" max="100"/><br><br>
<input type="submit" value="Update" name="update"/>
</form>
<?php
 }
?>
<a href="index.html">Go back to Main Page</a>
</body>
</html>


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
	echo "Database Selected";
	$subcode=$_POST['sub'];
$reg=$_POST['reg'];
$name=$_POST['name'];
$ut1=$_POST['ut1'];
$ut2=$_POST['ut2'];
$ut3=$_POST['ut3'];
$imc=$_POST['imc'];	
	$sql = "update".$subcode."set reg='$reg',name='$name',ut1='$ut1',ut2='$ut2',ut3='$ut3',imc='$imc' where id='$id';";
	if($conn->query($sql))
	{
	echo "Table Updated<br >";
	}
	else
	{
		echo "Id not exist";
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
Enter Reg.no:<input type="text" name="reg">
Enter name:<input type="text" name="name"/>
Enter ut1 marks:<input type="number" name="ut1" min="0" max="100"/>
Enter ut2 marks:<input type="number" name="ut2" min="0" max="100"/>
Enter ut3 marks:<input type="number" name="ut3" min="0" max="100"/>
Enter internal marks:<<input type="number" name="imc" min="0" max="20"/>
<input type="submit" value="Insert" name="submit"/>
</form>
<?php
 }
?>
<a href="index.html">Go back to Main Page</a>
</body>
</html>


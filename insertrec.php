
<html>
<head><h1>Insert Record</h1>
<body>

<?php
 if(isset($_POST['submit'])){
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
$conn->query($sql);
$subcode=$_POST['sub'];
$reg=$_POST['reg'];
$name=$_POST['name'];
$ut=$_POST['ut'];
$mark=$_POST['mark'];
$sq="select * from $subcode where regno='$reg';";
$result = $conn->query($sq);
if ($result->num_rows> 0) {
	echo "Record already exists.Updating UT marks.............<br>"; 
	switch($ut)
	{
		
		case "ut1":
			
			$sq1="update ".$subcode." set ut1='$mark' where regno='$reg';";break;
			case "ut2":
			
			$sq1="update ".$subcode." set ut2='$mark' where regno='$reg';";break;
			case "ut3":
			$sq1="update ".$subcode." set ut3='$mark' where regno='$reg';";break;
	}

			
if($conn->query($sq1))
{
	echo "UT marks updated successfully for Register no:$reg in Subject: $subcode";
}
}
else
{
	switch($ut)
	{
	case "ut1":
		$sql = "insert into ".$subcode."(regno,name,ut1) values ('$reg','$name','$mark');";break;
	case "ut2":
		$sql = "insert into ".$subcode."(regno,name,ut2) values ('$reg','$name','$mark');";break;
	case "ut3":
		$sql = "insert into ".$subcode."(regno,name,ut3) values ('$reg','$name','$mark');";break;
	}
if($conn->query($sql))
{
	echo "Successfully inserted<br />";
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
Enter Reg.no:<input type="text" name="reg"><br><br>
Enter name:<input type="text" name="name"/><br><br>
Enter UT Marks for:
<select  name="ut">
<option value ="ut1" > UT-1</option>
<option value ="ut2"> UT-2 </option>
<option value ="ut3"> UT-3</option>
</select><br><br>
Enter marks:<input type="number" name="mark" min="0" max="100"/><br>
<input type="submit" value="Insert" name="submit"/>
</form>
<?php
 }
?>
<a href="index.html">Go back to Main Page</a>
</body>
</html>



<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

?>
 
<?php

if(isset($_POST["update"])){
echo "working";
mysqli_select_db ($conn,"bricks");

$user_id=$_POST["new_id"];
$password=$_POST["new_password"];
$address=$_POST["new_address"];
$contact_number=$_POST["new_con_num"];

$sql="UPDATE customer"."SET password='$password',address='$address',con_num='$contact_number',password1='$password'"."WHERE c_id='$user_id'";
$retval=mysql_query($sql,$conn);

if(!retval)
{
	die('Could not update' . mysql_error());
}
else{
echo "Update successful";
}
mysql_close($conn);

}

?>
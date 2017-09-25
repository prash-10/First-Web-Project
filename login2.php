<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>

<?php

mysqli_select_db ($conn,"bricks");
session_start();

if(isset($_POST["login"]))
{
$id=$_POST["id"];
$password=$_POST["password"];

if(!$_POST["id"] || !$_POST["password"])
{
	echo "Please fill all the fields";
	exit();
}

$sql="select * FROM customer WHERE c_id='$id'AND password='$password'";
$result=$conn -> query($sql);
if($result -> num_rows >0)
{
	while($row=$result -> fetch_assoc())
	{
	echo "Hello ! ". $row["firstname"] ." ";
	exit();
	}
}

else {
	echo "Wrong Combination of Username and Password";
	exit();
}
}
session_destroy ();
?>
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

//echo "chal gya bc";
if(isset($_POST["submit"]))
{
	$city="";
	$city=$_POST["city"];
	mysqli_select_db ($conn,"bricks");
	
	$sql="SELECT s_name,supervisor,s_contact_no FROM society where s_location='$city'";
	$result=$conn -> query($sql);
	
	if($result -> num_rows >0)
	{
	while($row = $result->fetch_assoc()) {
	   echo "<br> Society Name: ". $row["s_name"] . " Supervisor Name: ". $row["supervisor"]. " - Contact Number: ". $row["s_contact_no"]. " <br>";
	}
	}
	
	echo "yes boss";
}

mysqli_close($conn)

?>
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

if(isset($_POST["submit"]))
{
	$work=$_POST["work"];
	mysqli_select_db ($conn,"bricks");
	
	$sql="SELECT b_id,st_name,mobile FROM staff WHERE work='$work'";
	$result=$conn -> query($sql);
	
	if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
        echo "<br> Building Id : ". $row["b_id"] . " <br><br> Name: ". $row["st_name"]. " - Number: ". $row["mobile"]. " <br>";
	}
	}
}

mysqli_close($conn)

?>
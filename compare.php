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

if(isset($_POST["compare"]))
{
	$bId1=$_POST["b_id1"];
	$bId2=$_POST["b_id2"];
	
	mysqli_select_db ($conn,"bricks");
	
	$sql="SELECT type,facing,furnished,cost,floor FROM flats inner join building on flats.b_id=building.b_id WHERE flats.b_id='$bId1'";
	$sql1="SELECT type ,facing,furnished,cost,floor FROM flats inner join building on flats.b_id=building.b_id WHERE flats.b_id='$bId2'";
	
		$result=$conn -> query($sql);
	
	if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
        echo "<br> Building Id: '$bId1' <br><br> Type : ". $row["type"] . "  <br> Facing: ". $row["facing"]. "  <br> Furnished or not: ". $row["furnished"]. "  <br> Cost: ". $row["cost"]."  <br> Floor Number : ".$row["floor"]." <br>";
	}
	}
	
	mysqli_free_result($result);
	
		$result1=$conn -> query($sql1);
	
	if($result1->num_rows > 0){
	while($row = $result1->fetch_assoc()) {
        echo "<br> Building Id: '$bId2' <br><br> Type : ". $row["type"] . " <br> Facing: ". $row["facing"]. " <br> Furnished or not: ". $row["furnished"]. " <br> Cost: ". $row["cost"]." <br> Floor Number : ".$row["floor"]."<br>";
	}
	}
	
}

mysqli_close ($conn);

?>
<?php

$servername = "mysql.hostinger.in";
$username = "u930505839_prash";
$password = "abcdef";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

?>

<?php

if(isset($_POST["submit1"]))
{
	$fnameErr = $lnameErr = $passErr = $emailErr = "";
	//$fname = $lname = $pass = $email = "" ;


	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$pass=$_POST["pass"];
	$email=$_POST["email"];

	mysqli_select_db ($conn,"u930505839_ainfo");
	
		
	if(!empty($_POST["email"]))
	{
		$sql="select fname from register where Email='$email' AND Password='$pass'";
		$result=$conn -> query($sql);
		
		$row = $result-> fetch_assoc();
		
		if($email == $row['Email'] && $pass==$row['Password'])
		{
			echo "Hello $fname";
		}
		
		else {
			echo "Wrong Id or Password";
		}
	}
	

}

    echo "crime master gogo";
	mysqli_close($conn)

?>



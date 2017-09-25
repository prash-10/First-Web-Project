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

<!doctype html>
<html lang="en-us">
<head>
<meta charset="UTF-8" />
<title>Solve your problems.</title>
<link rel="stylesheet" href="manage_ss.css" type="text/css"/>
<script>
function createblock(){
					document.getElementById("d103").style.visibility="visible";
}
function changeLink(){
						document.getElementById("a101").style.visibility="hidden";
						document.getElementById("a103").style.visibility="visible";
						}
function changeRegister(){
						document.getElementById("a101").style.visibility="visible";
						document.getElementById("a103").style.visibility="hidden";
}						
</script>
</head>

<body>

<header>
<br /><br /><br /><br /><br /><br /><br /><br />
</header>
<div id="d102">
<h1 id="h101">Help us solve your problem</h1>
<a href="homepage.php" id="a102">
<img id="i101" src="logo2.jpg" alt="logo" />
</a>
<br />
</div>

<div id="d104"><h3><a id="a101" onmouseover="changeLink()"><</a></h3></div>
<div id="d105"><h3><a id="a103" href="register.php" onmouseout="changeRegister()">Register</a></h3></div>

<!--<form id="f102" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><br />
Username:<br />
<input type="text" name="id" placeholder="Username" /><br />
Password:<br />
<input type="password" name="password" placeholder="Password"/><br /><br />
<input type="submit" name="login" value="LogIn" />
</form>-->

<form id="f101" form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h3 id="h301">Choose the Service: </h3>
<br />
<select name="work">
<option value="electrician">Electrician</option>
<option value="plumber">Plumber</option>
<option value="carpenter">Carpenter</option>
<option value="painter">Painter</option>
<option value="security">Security</option>
</select><br /><br />
<input id="in101" type="submit" name="submit" value="Submit" />
<br />
</form>

<div id="d101">
<h3>
<br />
<a href="Buy.php" id="a104" class="link">Buy</a>
<br />
<a href="Manage.php" id="a105" class="link">Manage</a>
<br />
<a href="Gallery.php" id="a106" class="link">Gallery</a>
<br />
<a href="#footer" id="a107" class="link">Contact Us</a>
<br />
<a href="About.php" id="a108"class="link">About Us</a>
<br />
</h3>

</div>
<div id="d103">
<h3 id="h302">
<?php

if(isset($_POST["submit"]))
{
	$work=$_POST["work"];
	mysqli_select_db ($conn,"bricks");
	
	$sql="SELECT st_name,mobile,b_id FROM staff WHERE work='$work'";
	$result=$conn -> query($sql);
	
	if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
        echo "<br>	Building Id :".$row["b_id"]." <br><br> Name: ". $row["st_name"]. " - Number: ". $row["mobile"]. " <br>";
	}
	}
}

mysqli_close($conn);

?>
</h3>
</div>
<br /><br /><br /><br /><br /><br />

<footer id="footer">
<br /><pre>
YATHARTH SINGHAL: 9871626396	ysinghal2209@gmail.com<br/>
SONALI MITTAL: 	  7289938069	sonalimittal23@gmail.com<br />
PRASHANT SINGH:   9560156465	prashantsingh1896@gmail.com<br/>
<br /></pre>
</footer></p>
</div>
</body>
</html>
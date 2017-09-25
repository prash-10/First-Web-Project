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
<title>Builder's League</title>
<link rel="stylesheet" href="home_ss.css" type="text/css" />

<script>
function hide(){
			document.getElementById("f102").style.visibility="hidden";
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
<h1 id="h101">THE BUILDER'S LEAGUE</h1>
<a href="homepage.php" id="a102">
<img id="i101" src="logo2.jpg" alt="logo" />
</a>
</div>

<form id="f102" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="hide()"><br />
Username:<br />
<input type="text" name="id" placeholder="Username" /><br />
Password:<br />
<input type="password" name="password" placeholder="Password"/><br /><br />
<input type="submit" name="login" value="LogIn" />
</form>

<br/>
<br />
<div id="d104"><h3><a id="a101" onmouseover="changeLink()"><</a></h3></div>
<div id="d105"><h3><a id="a103" href="register.php" onmouseout="changeRegister()">Register</a></h3></div>

<section>
<div id="d103"><img onload="changeImage()" id="i102" src="interior.jpg" alt="Sample picture of one of our House." /></div>
<p id= "p101">The Living Room Gaur Greens.</p>
</section>

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
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<footer id="footer">
<br /><pre>
YATHARTH SINGHAL: 9871626396	ysinghal2209@gmail.com<br/>
SONALI MITTAL: 	  7289938069	sonalimittal23@gmail.com<br />
PRASHANT SINGH:   9560156465	prashantsingh1896@gmail.com<br/>
<br /></pre>
</footer>
<h3 id="h301">
<?php

mysqli_select_db ($conn,"bricks");
session_start();

if(isset($_POST["login"]))
{
$id=$_POST["id"];
$password=$_POST["password"];

if(!$_POST["id"] | !$_POST["password"])
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
mysqli_close($conn);
?></h3>

</body>
</html>
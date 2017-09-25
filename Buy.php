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
<title>Buy your House.</title>
<link rel="stylesheet" href="buy_ss.css" type="text/css"/>
<!--<link rel="stylesheet" href="bootstrap.css" type="text/css"/>-->
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
<h1 id="h101">Buy your Dream House!!</h1>
<a href="homepage.php" id="a102">
<img id="i101" src="logo2.jpg" alt="logo" />
</a>
<br />
</div>

<div id="d104"><h3><a id="a101" onmouseover="changeLink()"><</a></h3></div>
<div id="d105"><h3><a id="a103" href="register.php" onmouseout="changeRegister()">Register</a></h3></div>

<a id="a100" class="link1" href="#d106" >Update</a>

<div id="d106" >
<form id="f102" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><br />
Username:<br />
<input type="text" name="new_id" placeholder="Username" /><br />
New Password:<br />
<input type="password" name="new_password" placeholder="Password"/><br /><br />
New Address:<br />
<input type="text" name="new_address" placeholder="Address"/><br /><br />
New Contact_No:<br />
<input type="text" name="new_con_num" placeholder="Contact_No"/><br /><br />
<input type="submit" name="update" value="Update" />
</form>
</div>


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

<form id="f101" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h3 id="h301">Choose the location of your Dream House</h3>
<br />
<select name="city">
<option value="Delhi">Delhi</option>
<option value="Noida">Noida</option>
<option value="Gaziabad">Gaziabad</option>
</select><br /><br />
<input id="in101" type="submit" name="submit" value="Submit" />
<br />
</form>

<br /><br /><br /><br /><br /><br /><br /><br />

<div id="d103">
<h3 id="h302">
<?php

if(isset($_POST["submit"]))
{	$city="";
	$city=$_POST["city"];
	mysqli_select_db ($conn,"bricks");
	
	$sql="SELECT b_id,s_name,supervisor,s_contact_no FROM society,building where s_location='$city' AND building.s_id=society.s_id";
	$result3=$conn -> query($sql);

	if($result3 -> num_rows >0)
	{
		while($row = $result3->fetch_assoc()) {
	  echo "<br> BID:  ".$row["b_id"].   "  Society Name: ".$row["s_name"].  "   Supervisor Name: ". $row["supervisor"]. " - Contact Number: ". $row["s_contact_no"]. " <br>";
	}
	}
}

?>
</h3>

<form id="f103" action="compare.php" method="post">
To Comapare any two flats enter the BID from above.<br/><br />
ID1:<br />
<input type="text" name="b_id1" /><br />
ID2:<br />
<input type="text" name="b_id2" /><br /><br />
<input type="submit" name="compare" value="Compare" />
</form>
</div>

<h3 id="h301">
<?php
if(isset($_POST["login"]))
{
$id=$_POST["id"];
$password=$_POST["password"];

if(!$_POST["id"] | !$_POST["password"])
{
	echo "Please fill all the fields";
	exit();
}

$sql3="select * FROM customer WHERE c_id='$id'AND password='$password'";
$result4=$conn -> query($sql3);
if($result4 -> num_rows >0)
{
	while($row=$result4 -> fetch_assoc())
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

?></h3>

<footer id="footer">
<br /><pre>
YATHARTH SINGHAL: 9871626396	ysinghal2209@gmail.com<br/>
SONALI MITTAL: 	  7289938069	sonalimittal23@gmail.com<br />
PRASHANT SINGH:   9560156465	prashantsingh1896@gmail.com<br/>
<br /></pre>
</footer>
</body>
</html>

<?php

if(isset($_POST["update"])){

mysqli_select_db ($conn,"bricks");

$user_id=$_POST["new_id"];
$password=$_POST["new_password"];
$address=$_POST["new_address"];
$contact_number=$_POST["new_con_num"];
$retval="";

$sq="UPDATE customer SET password='$password',address='$address',contact_no='$contact_number' WHERE c_id='$user_id'";
//$retval=mysqli_query($conn,$sq);


if ($conn->query($sq) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);

}

?>
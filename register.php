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
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="reg_ss.css" type="text/css" />
<script>
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
<h1 id="h101">Register Yourself</h1>
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

<form id="f101" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<br /><br />First Name:<sup>*</sup><br />
<input type="text" class="inputclass" name="firstname" placeholder="First Name" /><br /><br />
Last Name:<sup>*</sup><br />
<input type="text" class="inputclass" name="lastname" placeholder="Last Name" /><br /><br />
Username:<sup>*</sup><br />
<input type="text" class="inputclass" name="id" placeholder="Id" /><br /><br />
Password:<sup>#</sup><br />
<input type="password" class="inputclass" name="password" placeholder="Password" /><br /><br />
Re-enter Password:<sup>*</sup><br />
<input type="password" class="inputclass" name="password1" placeholder="Re-enter Password" /><br /><br />
Gender:<sup>*</sup><br />
<input type="radio"  id="in102" name="gender" value="male" />Male<br />
<input type="radio" class="inputclass" name="gender" value="female" />Female<br /><br />
Occupation:<sup>*</sup><br />
<input type="text" class="inputclass" name="occupation" placeholder="Occupation" /><br /><br />
Age:<sup>*</sup><br />
<input type="text" class="inputclass" name="age" placeholder="Age" /><br /><br />
Address:<sup>*</sup><br />
<textarea rows="5" col="20" name="address" placeholder="Address" ></textarea><br /><br />
Contact Number:<sup>*</sup><br />
<input type="text" class="inputclass" name="con_num" placeholder="Contact Number" ><br /><br />
<input type="submit" value="Submit" name="submit" /><br /><br />
<sup>*</sup>Mandatory Fields<br />
<sup>#</sup>Min 8 characters must contain numeric,alphabets and special characters. 
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
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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
function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["submit"])){

$firstnameErr = $lastnameErr = $idErr = $passwordErr = $password1Err = $genderErr = $ageErr = $occupationErr = $addressErr = $con_numErr = $name = "";
$firstname = $lastname = $id = $password = $password1 = $gender = $age = $occupation = $address = $con_num = "";


	
  if (empty($_POST["firstname"]) OR $_POST["firstname"]=="" ) {
     $firstnameErr = "Name is required <br><br>";
	 echo $firstnameErr;
   } else {
     $firstname = input($_POST["firstname"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
       $firstnameErr = "Only letters and white space allowed<br><br>"; 
	   echo $firstnameErr;
     }
   }
   
  if (empty($_POST["lastname"]) OR $_POST ["lastname"]=="" ) {
     $lastnameErr = "Lastame is required <br><br>";
	 echo $lastnameErr;
   } else {
     $lastname = input($_POST["lastname"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
       $lastnameErr = "Only letters and white space allowed <br><br>"; 
	   echo $lastnameErr;
     }
   }
  
  if (empty($_POST["id"]) OR $_POST ["id"] == "" ) {
     $idErr = "Please input an id of your choice";
	 echo $idErr;
   } else {
			$id=$_POST["id"];
			$sql= "SELECT c_id FROM customer WHERE c_id='$id'";
			$result=mysqli_query($conn, $sql);
			echo"Id already exists.";
			if(mysqli_num_rows($result)>1){
			echo"Id already exists.";
			exit();
	   }
     $id = input($_POST["id"]);
   }
   
  if(empty($_POST["password"]) || ($_POST["password"] != $_POST["password1"])) {
	  $passwordErr="Please enter password or check the reentered password";
	  echo $passwordErr;
        if (strlen($_POST["password"]) < 8 && strlen($_POST["password"]) >= 0) {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
		echo $passwordErr;
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
		echo $passwordErr;
    }

    elseif(!empty($_POST["password"])) {
    $password1Err = "Please Check You've Entered Or Confirmed Your Password!";
	echo $password1Err;
}

    elseif(empty($_POST["password"])){
		$passwordErr ="Password is required";
		echo $passwordErr;
	}
	else{
		$password=input($_POST["password"]);
		$password1=input($_POST["password1"]);
	}
  }

  if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
	 echo $genderErr;
   } else {
     $gender = input($_POST["gender"]);
   }
   
   if (empty($_POST["age"])) {
     $ageErr = "Age is required";
	 echo $ageErr;
   } else {
     $age = input($_POST["age"]);
   }
   
  if (empty($_POST["occupation"])) {
     $occupationErr = "Occupation is required";
	 echo $occupationErr;
   } else {
     $occupation = input($_POST["occupation"]);
	}
   
  
  if (empty($_POST["address"])) {
     $addressErr = "Address is required";
	 echo $addressErr;
   } else {
     $address = input($_POST["address"]);
   }
   
  if (empty($_POST["con_num"])) {
     $con_numErr = "Contact number is required";
	 echo $con_numErr;
   } else {
     $con_num = input($_POST["con_num"]);
	 if(!preg_match ("/[0-9]{10}/",$con_num)){
		 $con_numErr="Enter valid contact number";
		 echo $con_numErr;
	 }
   }


mysqli_select_db ($conn,"bricks");

mysqli_query ($conn,"insert into customer (firstname,lastname,c_id,contact_no,address,age,occupation,password)
values ( '$_POST[firstname]','$_POST[lastname]','$_POST[id]','$_POST[con_num]','$_POST[address]','$_POST[age]','$_POST[occupation]','$_POST[password]')");

//echo "everything added baby";

}

mysqli_close($conn);

?>
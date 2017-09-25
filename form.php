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
function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["submit"])){

$firstnameErr = $lastnameErr = $idErr = $passwordErr = $password1Err = $genderErr = $ageErr = $occupationErr = $addressErr = $con_numErr = $name = "";
$firstname = $lastname = $id = $password = $password1 = $gender = $age = $occupation = $address = $con_num = "";

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
// $data="";

	
	
  if (empty($_POST["firstname"]) OR $_POST["firstname"]=="" ) {
     $firstnameErr = "Name is required";
	 echo $firstnameErr;
   } else {
     $firstname = input($_POST["firstname"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
       $firstnameErr = "Only letters and white space allowed"; 
	   echo $firstnameErr;
     }
   }
   
  if (empty($_POST["lastname"]) OR $_POST ["lastname"]=="" ) {
     $lastnameErr = "Lastame is required";
	 echo $lastnameErr;
   } else {
     $lastname = input($_POST["lastname"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
       $lastnameErr = "Only letters and white space allowed"; 
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
			if(mysqli_num_rows($result)>1){
			echo"Id already exists.";
			exit();
	   }
     $id = input($_POST["id"]);
   }
   
  if(empty($_POST["password"]) || ($_POST["password"] != $_POST["password1"])) {
	  $passwordErr="Please enter password or check the reentered password";
	  echo $passwordErr;
        if (strlen($_POST["password"]) < 8) {
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
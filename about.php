<!doctype html>
<html lang="en-us">

<head>
<meta charset="UTF-8" />
<title>HappyHouse</title>
<link rel="stylesheet" href="about_ss.css" type="text/css" />

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
<h1 id="h101">About Us</h1>
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

<br /><br />

<div id="d110">
<h3 id="h302">
<br /><br /><br />
Anytime,Anywhere.Find your way home.<br />
THE BUILDER'S LEAGUE does an amazing job by telling you the best housing locations.<br />
We also have an option for managing house for the residents itself plus, you can anytime search
your dream location and buy your dream flat under the best building groups of the nation.<br />
We provide you with the best of both worlds!!</h3>
</div>

<div id="d112">
<h2>OWN THE HOME MEANT FOR U</h2>
</div>

<div id="d113">
<h2>THE BUILDER'S LEAGUE: QUALITY LIVING FROM THE TEAM THAT CARES.</h2>
</div>

<div id="d111">
<h2 id="h201">TELL US WHICH HOME IS YOURS, AND WE'LL HELP TRACK YOUR INVESTMENT</h2>
</div>

<div id="d114">
<h2>CONVERTING TRANSACTIONS INTO RELATIONSHIPS</h2>
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

<br /><br /><br />

<h1 id="h102">Meet Our Developers</h1>

<div id="d106">
<img id="i103" src="yathu.jpg" class="img-circle" alt="Developer1"/>
<img id="i104" src="sonali.jpg" class="img-circle" alt="Developer2"/>
<img id="i105" src="prashant.jpg" class="img-circle" alt="Developer3"/>
</div>

<span>
<div id="d107">
<p class="desc">
<h4>YATHARTH SINGHAL:</h4> Lead designer Front End Development,
learned frontend in college itself,aims to be a leading Frontend developer.
</p>
</div>

<div id="d108">
<p class="desc">
<h4>SONALI MITTAL:</h4> Database expert and documentation Engineer
Database Designing and Web.Learned Web in college itself and also aims to be a leading FrontEnd Designer.  
</p>
</div>

<div id="d109">
<p class="desc">
<h4>PRASHANT SINGH:</h4> Lead backend developer
Backend coding,learned php in college itself and also has expertise in database designing. 
</p>
</div>
</span>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<footer id="footer">
<br /><pre>
YATHARTH SINGHAL: 9871626396	ysinghal2209@gmail.com<br/>
SONALI MITTAL: 	  7289938069	sonalimittal23@gmail.com<br />
PRASHANT SINGH:   9560156465	prashantsingh1896@gmail.com<br/>
<br /></pre>
</footer>
</body>
</html>
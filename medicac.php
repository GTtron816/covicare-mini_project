<!DOCTYPE html>
<?php include 'accconn.php' ?>
<?php include 'lgout2.php'?>
<html>

<head>
<style>
    <?php include 'flatnav.css';?>
 <?php include 'drkmode-frm.css'; ?>
<?php include 'forms.css'; ?>
</style>

 <!--Icons-Kit-->
 <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'banneradmin.php';?>
<div class="topnav" >

<a  href="adminaddqt.php">Add Quarantine Center</a>
<a href="adminupdateqt.php">Edit Quarantine Center</a>
<a    href="admincheckqtbooking.php">Check Quarantine Booking</a>
<a class=active  href="medicac.php">Create Medic Account</a>

</div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
 

    
    <script src="drkmode-frm.js"></script>
<div class="form-container sign-up-container">
		<form  method="post" id="frm" action="mediccreate.php">
			<h1>Create Medic Account</h1>
		

			<input type="username" name="username" placeholder="Username" >
			<span class="err"><?php echo isset($usrer)?"*".$usrer:'';?></span>
			<input type="email" name="email" placeholder="Email" >
			<span class="err"><?php echo isset($emailerr)?"*".$emailerr:'';?></span>
			<input type="password" name="pw" placeholder="Password" >
			<span class="err"><?php echo isset($pwer)?"*".$pwer:'';?></span>
			<span class="suc"><?php echo isset($accsuc)?"*".$accsuc:'';?></span>
			<button type="submit" onclick="setsignup()" class="btn">Create Account</button>
		</form>
	</div>
</body>
</html>
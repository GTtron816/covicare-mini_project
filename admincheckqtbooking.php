<!DOCTYPE html>
<?php include 'qtconn.php'?>
<?php
session_start();
if(!isset($_SESSION['valid']))
{
    header('Location: login.php');
} 

?> 
<html> 
    <head>
        <style>
      @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

h1
{   
	position: fixed;
	top: 220px;
}

body{
    font-family: 'Montserrat', sans-serif;
    -webkit-font-smoothing: antialiased;
	background-color: rgb(212, 212, 212);
	margin: 0;
	padding: 0;
	image-rendering: -webkit-optimize-contrast ;
}

form {
    background-color: rgb(255, 255, 255);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 30px 50px;
    height: 50%;
    text-align: center;
    color: rgb(0, 0, 0);
    border-radius: 12px;
}


	input {
		background-color: #eee;
		border: none;
		padding: 12px 15px;
		margin: 8px 0;
		width: 100%;
	}
	
    .inpt {
		background-color: #eee;
		border: none;
		padding: 12px 15px;
		margin: 8px 0;
		width: 100%;
        font-family: 'Montserrat', sans-serif;
	}
	
    .form-container {
		position: fixed;
		left: 450px;
		top: 200px;
		height: 100%;
		transition: all 0.6s ease-in-out;
		width: 50%;
	
	}

	.btn {
	border-radius: 20px;
	border: none;
	background-color:  rgb(0, 60, 255);
	color: gold;
	font-size: 12px;
	font-weight: bold;
	height: 36px;
    width: 133px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
	position: fixed;
	left: 630px;
	top: 500px;
}
.btn:active {
	transform: scale(0.95);
}

.btn:focus {
	outline: none;
}
.btn:hover {
    background-color: rgb(0, 34, 134);
  } 
	
  .btn1 {
	border-radius: 20px;
	border: none;
	background-color:  rgb(0, 60, 255);
	color: gold;
	font-size: 12px;
	font-weight: bold;
	height: 36px;
    width: 133px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
	position: fixed;
	left: 870px;
	top: 500px;
}
.btn1:active {
	transform: scale(0.95);
}

.btn1:focus {
	outline: none;
}
.btn1:hover {
    background-color: rgb(0, 34, 134);
  } 

  .btn2 {
	border-radius: 20px;
	border: none;
	background-color:  rgb(0, 60, 255);
	color: gold;
	font-size: 12px;
	font-weight: bold;
	height: 36px;
    width: 133px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
	position: fixed;
	left: 1110px;
	top: 500px;
}
.btn2:active {
	transform: scale(0.95);
}

.btn2:focus {
	outline: none;
}
.btn2:hover {
    background-color: rgb(0, 34, 134);
  } 


  .btn3 {
	border-radius: 20px;
	border: none;
	background-color:  rgb(0, 60, 255);
	color: gold;
	font-size: 12px;
	font-weight: bold;
	height: 36px;
    width: 180px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
	position: fixed;
	left: 1130px;
	top: 240px;
}
.btn3:active {
	transform: scale(0.95);
}

.btn3:focus {
	outline: none;
}
.btn3:hover {
    background-color: rgb(0, 34, 134);
  } 



  .err{
		color: red;
	}
	.suc{
		color: blue;
	}
     
       .topnav {
  overflow: hidden;
  background-color: rgb(53, 53, 53);
  font-family: Helvetica;
  -webkit-font-smoothing: antialiased;
  position: fixed;
  top: 60px;
  width: 100%;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: rgb(206, 206, 206);
  color: black;
}

 .topnav a.active{
  color: white;
  background-color: rgb(0, 60, 255);
}
.btre {
    border: none;
    outline: none;
    
    transition: transform 80ms ease-in;
    box-shadow: rgba(0, 9, 61, 0.2) 0px 4px 8px 0px;
    background-color: rgb(0, 60, 255);
    border-radius: 12px;
    color: gold;
    font-size: 16px;
    cursor: pointer;
    position: absolute;
    left: 1700px;
    top: 10px;
    height: 36px;
    width: 130px;
}
            .btre:active {
            transform: scale(0.95);
        }
  
  

            .btre:hover {
               background-color: rgb(0, 34, 134);
            }

       <?php include 'drkmode-frm.css'; ?>
        </style>
        <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php include 'banneradminfixed.php';?>
  
   
    
    <div class="topnav" >
 
	<a  href="adminaddqt.php">Add Quarantine Center</a>
<a href="adminupdateqt.php">Edit Quarantine Center</a>
<a  class=active  href="admincheckqtbooking.php">Check Quarantine Booking</a>
<a   href="medicac.php">Create Medic Account</a>

</div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
<button onclick="location.href = 'logout2.php'" id="Log-Out" class="btre"><i class="fas fa-sign-out-alt"></i> Log-Out</button>
 
 

    
    <script src="drkmode-frm.js"></script>
    <div class="form-container">
		<form id="frm" method="post" action="checkqtbookingcode.php">
			<h1>ENTER CODE</h1>
		

			<input type="code" name="code" placeholder="Booking Code" >
			<span class="err"><?php echo isset($codeerr)?"*".$codeerr:'';?></span>
			<span class="suc"><?php echo isset($chksucc)?"*".$chksucc:'';?></span>
			<button type="submit" name="check" value="check"  class="btn">Check Booking</button> 
			<button type="submit" name="check" value="checkin" class="btn1">Check-in</button> 
			<button type="submit" name="check" value="checkout" class="btn2">Check-out</button> 
	        <button type="submit" name="check" value="remove" class="btn3"><i class="fas fa-times-circle"></i> Unavailed-booking</button>
		</form>
		</div>
</body>
</html>
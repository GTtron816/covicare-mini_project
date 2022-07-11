<!DOCTYPE html>
<?php include 'accconn.php' ?>
<html>

<head>
<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
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
		padding: 0 50px;
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
	
	
    .form-container {
		position: fixed;
		left: 450px;
		top: 200px;
		height: 100%;
		transition: all 0.6s ease-in-out;
		width: 50%;
		z-index: 2;
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
  .err{
		color: red;
	}
  
  <?php include 'drkmode-frm.css'; ?>	
</style>

 <!--Icons-Kit-->
 <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
</head>
<body>

<?php include 'bannerfixed.php'?>


<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
        
<script src="drkmode-frm.js"></script>
<?php
        
        
			
	

          @session_start();
		
	
		 
		   $_SESSION['page_load']=0;
		   $nor= $_SESSION['page_load'];

		   if(isset($_COOKIE["pw"])) {
           $cookievalue=$_COOKIE["pw"];
            mysqli_query($conn,"DELETE FROM forgotpass WHERE code='".$cookievalue."'");
   
		   }


?>






	<div class="form-container">
		<form id="frm" method="post" action="resetpwcode.php">
			<h1>Change Password</h1>
		

			<input type="email" name="email" placeholder="Email" >
			<span class="err"><?php echo isset($emailerr)?"*".$emailerr:'';?></span>
			
			<button type="submit"  class="btn">Submit</button>
		</form>
	</div>
</body>
</html>
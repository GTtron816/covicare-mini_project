<!DOCTYPE html>
<html>
        <head>
  

<style>
 .banner{
            color: aqua;
            background-color:  rgb(53, 53, 53);
            height: 60px;
        }	
<?php include 'logindrk.css'; ?>	 
</style>


 

<link rel="stylesheet" href="loginpage.css" type="text/css"> 




             <!--Icons-Kit-->
     <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>


    
	 

        </head>
            <body>
			
			<div class="banner" id="hed" ><img src="hplogo.png" width="180" height="55"
        alt="logo">

    </div>



        
			<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
          
			
			<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form id="frm" method="post" action="signup.php">
			<h1>Create Account</h1>
		

			<input type="username" name="username" placeholder="Username" >
			<span class="err"><?php echo isset($usrer)?"*".$usrer:'';?></span>
			<input type="email" name="email" placeholder="Email" >
			<span class="err"><?php echo isset($emailerr)?"*".$emailerr:'';?></span>
			<input type="password" name="pw" placeholder="Password" >
			<span class="err"><?php echo isset($pwer)?"*".$pwer:'';?></span>
			<span class="suc"><?php echo isset($accsuc)?"*".$accsuc:'';?></span>
			<button type="submit" id="signup" onclick="setsignup()" class="btn">Sign Up</button>
		</form>
	</div>
<script>
	function setsignup()
	{   var value='yes';
		localStorage.setItem("siup",value);
	}
</script>
	<div class="form-container sign-in-container">
		<form  id="frm2" method="post" action="accvalid.php">
			<h1>Sign in</h1>
			
		
			<input type="username"  name="username" placeholder="Username"  >
			<span class="err"><?php echo isset($usrerr)?"*".$usrerr:'';?></span>
			<input type="password"  name="pw" placeholder="Password"  >
			<span class="err"><?php echo isset($pwerr)?"*".$pwerr:'';?></span>
			<span class="err"><?php echo isset($acerr)?"*".$acerr:'';?></span>
			<a href="forgotpw.php">Forgot your password?</a>
			<span class="suc"><?php echo isset($passsuc)?"*".$passsuc:'';?></span>
			<button type="submit" class="btn">Sign In</button>
			
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>Please login with your personal info.</p>
				<button class="btn2" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>STAY SAFE!</h1>
				<p>We will overcome!! Create your account here.</p>
				<button class="btn2" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		
	</p>
</footer>
             
<script src="login.js"></script>
<script src="logindrk.js"></script>
              
            </body>
</html>
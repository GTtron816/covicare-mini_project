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
        .t1{
    font-size: 25px;
    font-weight: normal;
  }


  .t2{
    font-size: 20px;
    font-weight: normal;
  }
  .btn {
	border-radius: 20px;
	border: none;
	background-color:  rgb(0, 60, 255);
	color: gold;
	font-size: 12px;
  height: 45px;
    width: 330px;
	font-weight: bold;

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
 session_start();
 $nor= $_SESSION['page_load'];
 if($nor!=0)
 { $cookievalue=$_COOKIE["pw"];
   mysqli_query($conn,"DELETE FROM forgotpass WHERE code='".$cookievalue."'");
   header("Location: login.php");
 }

else
{
$email=$_POST['email'];

if(empty($email)){
    $emailerr="This field cannot be empty";
    include("forgotpw.php");
    die();
}
else{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $emailerr="Invalid email address";
        include("forgotpw.php");
        die();


    }}

    
    $query =mysqli_query( $conn,"SELECT username,email FROM accs where email='".$email."' ");
    $result=$query;
    if(mysqli_num_rows($result)==0)
    {
        $emailerr="Account unavailable";
        include("login.php");
        die();
    }
    else{
        $data = mysqli_fetch_assoc($query);
        $username=$data["username"];
        $email=$data["email"];
         
          /*code GENERATOR*/
        $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
        srand((double)microtime()*1000000);
        $i = 0; 

        $code= '' ;

        while ($i <5) { 
        $num = rand() % 36; 
        $tmp = substr($char, $num, 1); 
        $code = $code . $tmp;  
         $i++; 

       }
    
      echo " <t1 class=t1>Password reset code for account with: </t1>";
      echo"<br>";
      echo "<t1 class=t1>Email: $email</t1>";
      echo"<br>";
      echo "<t1 class=t1>Username: $username</t1>";
      echo"<br>";
      echo "<t1 class=t1>is Code: $code</t1>";
      mysqli_query($conn,"INSERT INTO forgotpass(username,email,code) VALUES('".$username."','".$email."','".$code."')");
      $cd="pw";
      setcookie($cd,$code,time()+(1800),"/");
    echo"<br>";
    echo'
    <button onclick=redi()  class="btn"><i class="fas fa-check-circle"></i> Click To reset Password</button> ';
     
    }
   
  }
?>

<script>
function redi()
{ 
    window.location.href="resetpw.php";
}

</script>


</body>
</html>
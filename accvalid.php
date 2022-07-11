<!DOCTYPE html>
<?php include 'accconn.php' ?>
<html>

<head>
<style>


</style>
</head>
<body>
<?php 
session_start();
$username=$_POST['username'];
$pass=$_POST['pw'];
if(empty($username)){
    $usrerr="Username cannot be empty";
    include("login.php");
    die();
}
else{
    if(!preg_match('/^\w{5,}$/', $username)) { 

        $usrerr="Only letters,numbers and underscore allowed";
        include("login.php");
        die();
       }       
}
if(empty($pass))
{
    $pwerr="Password cannot be empty";
    include("login.php");
    die();
}

else{
    
if (strlen($pass) < 8){
        $pwerr = "Your password should be atleast 8 characters!";
        include("login.php");
        die();
    
    }

    elseif (preg_match("/\\s/", $pass))
    {
        $pwerr = "Remove spaces in password!!";
        include("login.php");
        die();
    
    }



    
}
 
 
    $query =mysqli_query( $conn,"SELECT actype FROM accs where username='".$username."' AND password='".$pass."' ");
    $result=$query;
    if(mysqli_num_rows($result)==0)
{
    $acerr="Account unavailable or Password incorrect.";
    include("login.php");
    die();
}
else{
    $data = mysqli_fetch_assoc($query);
    $actype=$data["actype"];
    if($actype=="admin")
    {   $_SESSION['valid']=true;
        header("Location: adminaddqt.php");
        
    }

    elseif($actype=="medic")
    { $_SESSION['valid']=true;
        header("Location: medicaddcont.php");
        
    }
        
    
   else{
    $_SESSION['valid']=true;
    header('Location: homepageusrlogin.php');
     

   }
 }
 








?>



</body>
</html>
















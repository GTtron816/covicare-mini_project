<!DOCTYPE html>
<?php include 'qtconn.php'?>
<html>

<head>
   
<style>
*{ 
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}

body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    }
    <?php include 'flatnav.css';?>
 <?php include 'drkmode-frm.css'; ?>
</style>
<!--Icons-Kit-->
<script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
</head>


<body>

<?php include 'banneradmin.php';?>
<div class="topnav" >

<a  href="adminaddqt.php">Add Quarantine Center</a>
<a class=active href="adminupdateqt.php">Edit Quarantine Center</a>
<a   href="admincheckqtbooking.php">Check Quarantine Booking</a>
<a   href="medicac.php">Create Medic Account</a>

</div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
 

    
    <script src="drkmode-frm.js"></script>
 
<?php
    $rno=$_POST['roomno'];
?>
   <form method="post" action="rem.php" id="myform">
     <input type="hidden" name="roomno" value=<?php echo $rno ?>>
     </form>
    <script>
       
(function () {

  var val=confirm("Do you want to remove center!");
  if (val == true) {

 

    document.getElementById("myform").submit();

   
  } 
  
  else{
    window.location.href="adminupdateqt.php";
  }



}
)();</script>

</body>
</html>
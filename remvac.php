<!DOCTYPE html>
<?php include 'vaconn.php'?>
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

<?php include 'bannermedic.php' ?>
    
    <div class="topnav" >
  
    <a href="medicaddcont.php">Add Containment Zones</a>
  <a   href="medicupdatecont.php">Edit Containment Zone</a>
  <a   href="medaddhosp.php">Add Hospitals</a>
  <a  href="meduphosp.php">Edit Hospitals</a>
  <a     href="medicalad.php">Add Vaccine Centers</a>
  <a class=active  href="medvacup.php">Edit Vaccine Centers</a>
  </div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
 

    
    <script src="drkmode-frm.js"></script>

    <?php
    $no=$_POST['no'];
        mysqli_query($conn,"DELETE FROM vaccicenters WHERE no='".$no."'");
        echo "<h1>Center Removed</h1>";
        
        ?>
        </body>
</html>
<!DOCTYPE html>
<?php include 'vaconn.php'?>
<?php include 'lgout2.php'?>
<html> 
    <head>
        <style>   
       <?php include 'forms.css';?>
       <?php include 'checkbox.css';?>
       <?php include 'flatnav.css';?>
       <?php include 'drkmode-frm.css'; ?>

       </style>
        <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php include 'bannermedic.php' ?>
    
    <div class="topnav" >
  
    <a href="medicaddcont.php">Add Containment Zones</a>
  <a   href="medicupdatecont.php">Edit Containment Zone</a>
  <a   href="medaddhosp.php">Add Hospitals</a>
  <a  href="meduphosp.php">Edit Hospitals</a>
  <a  class=active   href="medicalad.php">Add Vaccine Centers</a>
  <a   href="medvacup.php">Edit Vaccine Centers</a>
  </div>

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  


    
    <script src="drkmode-frm.js"></script>
    
    <div class ="form-container">
    
        <form id="frm" method="post" action="savevcplace.php" >
             <h1>Enter Vaccine Location</h1>

             <input type="vcplace" name="vcplace" placeholder="center place" >
            <span class="err"><?php echo isset($vcplerr)?"*".$vcplerr:'';?></span>    

            <input type="lat" name="lat" placeholder="lattitude">
            <span class="err"><?php echo isset($valaterr)?"*".$valaterr:'';?></span>

            <input type="longi" name="longi" placeholder="longitude" >
        <span class="err"><?php echo isset($vclonerr)?"*".$vclonerr:'';?></span>
        <span class="suc"><?php echo isset($insucc)?"*".$insucc:'';?></span>
			<button type="submit"  class="btn">Enter</button>

        </form>
    </div>
    </body>
</html>    
<!DOCTYPE html>
<?php include 'dbconloc.php'?>
<?php include 'lgout2.php'?>
<html> 
    <head>
        <style>
     
 
     <?php include 'forms.css';?>
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
  <a class=active   href="medaddhosp.php">Add Hospitals</a>
  <a  href="meduphosp.php">Edit Hospitals</a>
  <a   href="medicalad.php">Add Vaccine Centers</a>
  <a   href="medvacup.php">Edit Vaccine Centers</a>
  </div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
 

    
 
    <script src="drkmode-frm.js"></script>
    <div class="form-container">
	
		<form id="frm" method="post" action="savehsploc.php">
			<h1>Enter Location</h1>
		


<input type="place" name="place" placeholder="Place Name" >
<span class="err"><?php echo isset($hplerr)?"*".$hplerr:'';?></span>

 
  
  <input type="lat" name="lat" placeholder="Lattitude" >
  <span class="err"><?php echo isset($laterr)?"*".$laterr:'';?></span>
  <input type="lon" name="lon" placeholder="Longitude" >
  <span class="err"><?php echo isset($lonerr)?"*".$lonerr:'';?></span>
  <span class="suc"><?php echo isset($insucc)?"*".$insucc:'';?></span>
			<button type="submit"  class="btn">Enter</button>

		</form>
</div>
</body>
</html>
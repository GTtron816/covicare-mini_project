<!DOCTYPE html>
<?php include 'hspconn.php'?>
<html>

<head>
   
<style>
 <?php include 'flatnav.css';?>
 <?php include 'drkmode-frm.css'; ?> 
<?php include 'forms.css';?> 
<?php include 'checkbox.css';?>
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
  <a  class=active href="meduphosp.php">Edit Hospitals</a>
  <a   href="medicalad.php">Add Vaccine Centers</a>
  <a   href="medvacup.php">Edit Vaccine Centers</a>
  </div>

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
<?php
   
    $no=$_POST['no'];
 
    $query =mysqli_query( $conn,"SELECT hspname,addrs,bed,oxycl,lat,lon  FROM hospitals where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $name=$data["hspname"];
    $addr=$data["addrs"];
    $bed=$data["bed"];
    $oxycl=$data["oxycl"];
    $lat=$data["lat"];
    $lon=$data["lon"];
    ?>


    <script src="drkmode-frm.js"></script>
    
	<div class="form-container">
		<form id="frm" method="post" action="uphs.php">
			<h1>Update Hospital</h1>
		
         <input type="hidden" name="no" value= <?php echo $no ?> >' 
				<span>Hospital Name:</span>
 <input type="text" name="name" placeholder="Hospital Name" value= '<?php echo $name; ?>'>
<span class="err"><?php echo isset($hnaerr)?"*".$hnaerr:'';?></span>

<span>Hospital Address:</span>
<textarea class="inpt" name="addr" placeholder="Hospital Address"   > 
<?php echo $addr; ?>
</textarea >
<span class="err"><?php echo isset($haderr)?"*".$haderr:'';?></span>


<span>Hospital Beds:</span>
<input type="number" name="bed" min=0 placeholder="Available Beds Count" value=<?php echo $bed; ?> >
<span class="err"><?php echo isset($hberr)?"*".$hberr:'';?></span>
<span>Oxygen Cylinders:</span>
<input type="number" name="oxy" min=0 placeholder="Available Oxygen Cylinders" value=<?php echo $oxycl; ?> >
  <span class="err"><?php echo isset($hoerr)?"*".$hoerr:'';?></span>
 
  <span>Lattitude:</span>
  <input type="lat" name="lat" placeholder="Lattitude" value=<?php echo $lat; ?> >
  <span class="err"><?php echo isset($laterr)?"*".$laterr:'';?></span>
  <span>Longitude:</span>
  <input type="lon" name="lon" placeholder="Longitude" value=<?php echo $lon; ?> >
  <span class="err"><?php echo isset($lonerr)?"*".$lonerr:'';?></span>
  <span class="suc"><?php echo isset($insucc)?"*".$insucc:'';?></span>
			<button type="submit"  class="btn">Enter</button>

			

		</form>
	</div>
    </body>
</html>
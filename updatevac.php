<!DOCTYPE html>
<?php include 'vaconn.php'?>
<html>
    <head>
<style>
    
    
 <?php include 'flatnav.css';?>
 <?php include 'drkmode-frm.css'; ?> 
<?php include 'forms.css';?> 

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
    $query =mysqli_query( $conn," SELECT cntrnm,addrs,avldose,lat,lon FROM vaccicenters where no='".$no."'" );
    $data = mysqli_fetch_assoc($query);

    $cntrnm=$data["cntrnm"];
    $addrs=$data["addrs"];
    $avldose=$data["avldose"];
    $lat=$data["lat"];
    $lon=$data["lon"];
    ?>
	<div class="form-container">
		<form id="frm" method="post" action="upvac.php">
			<h1>Update Vaccine Centers</h1>
		
            <input type="hidden" name="no" value=<?php echo $no ?> >
			<input type="name" name="name" placeholder="Center Name" value='<?php echo $cntrnm; ?>'>

			<span class="err"><?php echo isset($naerr)?"*".$naerr:'';?></span>
		
            <textarea class="inpt" name="addrs" placeholder="Center Address"><?php echo $addrs ?>
</textarea >
<span class="err"><?php echo isset($aderr)?"*".$aderr:'';?></span>




            <input type="dose" name="dose" placeholder="Available Dose" value=<?php echo $avldose ?> >
  <span class="err"><?php echo isset($doseerr)?"*".$doseerr:'';?></span>

  <input type="lat" name="lat" placeholder="lattitude" value=<?php echo $lat; ?>>
  <span class="err"><?php echo isset($laterr)?"*".$laterr:'';?></span>

  <input type="lon" name="lon" placeholder="longitude" value=<?php echo $lon; ?>>
  <span class="err"><?php echo isset($lonerr)?"*".$lonerr:'';?></span>
  
  <span class="suc"><?php echo isset($insucc)?"*".$insucc:'';?></span>
			<button type="submit"  class="btn">Enter</button>

		</form>
	</div>
    </body>

    
</html>
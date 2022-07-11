<!DOCTYPE html>
<?php include 'qtconn.php'?>
<?php include 'lgout2.php'?>
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
    $rmno=$_POST['roomno'];
    $query =mysqli_query( $conn,"SELECT qtname,addr,foodsrv,price,lat,lon  FROM qtlist where no='".$rmno."'");
    $data = mysqli_fetch_assoc($query);
    $qtname=$data["qtname"];
    $addr=$data["addr"];
    $fsrv=$data["foodsrv"];
    $price=$data["price"];
    $lat=$data["lat"];
    $lon=$data["lon"];
    ?>
    
	<div class="form-container">
		<form id="frm" method="post" action="updateqt.php">
			<h1>Update Quarantine Centers</h1>
		
            <input type="hidden" name="roomno" value=<?php echo $rmno ?> >
            <span class="sp">Center Name:</span>
			<input type="qtname" name="qtname" placeholder="Center Name" value='<?php echo $qtname; ?>' >
			<span class="err"><?php echo isset($qtnaerr)?"*".$qtnaerr:'';?></span>
		    <span">Address:</span>
            <textarea class="inpt" name="qtaddr" placeholder="Center Address"><?php echo $addr;?></textarea >
<span class="err"><?php echo isset($qtaderr)?"*".$qtaderr:'';?></span>

            <ul class="ks-cboxtags">
    <li><input type="checkbox" id="checkboxOne" name="fsrv" value="Yes" <?php if($fsrv=="Yes"){echo "checked=true";}?> ><label for="checkboxOne"> Food Availabe</label></li>
  </ul>
  <span>Rent:</span>
  <input type="price" name="price" placeholder="Center Rent" value=<?php echo $price; ?> >
  <span class="err"><?php echo isset($qtprerr)?"*".$qtprerr:'';?></span>
  <span>Lattitude:</span>
  <input type="lat" name="lat" placeholder="Lattitude" value=<?php echo $lat; ?> >
  <span class="err"><?php echo isset($laterr)?"*".$laterr:'';?></span>
  <span>Longitude:</span>
  <input type="lon" name="lon" placeholder="Longitude" value=<?php echo $lon; ?>  >
  <span class="err"><?php echo isset($lonerr)?"*".$lonerr:'';?></span>
  <span class="suc"><?php echo isset($insucc)?"*".$insucc:'';?></span>
			<button type="submit"  class="btn">Enter</button>

		</form>
	</div>
   
    </body>
</html>
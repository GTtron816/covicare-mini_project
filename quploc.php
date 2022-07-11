<!DOCTYPE html>
<?php include 'qtconn.php'?>
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
    $id=$_POST['place'];
    $query =mysqli_query( $conn,"SELECT loc  FROM qtloc where id_loc='".$id."'");
    $data=mysqli_fetch_assoc($query);
  
    @$loc=$data["loc"];
   
    ?>








 
    
    <div class ="form-container">
    
        <form id="frm" method="post" action="uqtloc.php" >
             <h1>Enter Place</h1>
             <span>Center place:</span> 
             <input type="hidden" name="id"  value=<?php echo $id; ?> >
             <input type="place" name="place" placeholder="Center place" value=<?php echo $loc; ?> >
             
			<button type="submit"  class="btn">Enter</button>

        </form>
    </div>
    </body>
</html>    
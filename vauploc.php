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
  <a     href="medicalad.php">Add Vaccine Centers</a>
  <a class=active  href="medvacup.php">Edit Vaccine Centers</a>
  </div>

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  


    
    <script src="drkmode-frm.js"></script>


    <?php
    $id=$_POST['place'];
    $query =mysqli_query( $conn,"SELECT place,lat,lon  FROM vacciloc where no='".$id."'");
    $data=mysqli_fetch_assoc($query);
  
    $loc=$data["place"];
    $lat=$data["lat"];
    $lon=$data["lon"];
    ?>









    
    <div class ="form-container">
    
        <form id="frm" method="post" action="vuploc.php" >
             <h1>Enter Place</h1>
             <span>Centers place:</span> 
             <input type="hidden" name="id"  value=<?php echo $id; ?> >
             <input type="place" name="place" placeholder="Center place" value='<?php echo $loc; ?>' >
            
             <span>Lattitude:</span> 
             <input type="lat" name="lat" placeholder="Lattitude"  value=<?php echo $lat; ?>  >
            
           
             <span>Longitude:</span> 
             <input type="lon" name="lon" placeholder="Longitude"  value=<?php echo $lon; ?> >
        
			<button type="submit"  class="btn">Enter</button>

        </form>
    </div>
    </body>
</html>    
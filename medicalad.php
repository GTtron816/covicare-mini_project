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
       .btde {
                border: none;
                outline: none;
                border-radius: 12px;
                transition: transform 80ms ease-in;
                box-shadow: rgba(0, 9, 61, 0.2) 0px 4px 8px 0px;
                background-color: rgb(0, 60, 255);
                color: gold;
                font-size: 16px;
              cursor: pointer;
              position: absolute;
              left: 1160px;
              top: 200px;
              height: 36px; 
              width: 133px;
            }
            
    

            .btde:active {
            transform: scale(0.95);
        }

            .btde:hover {
               background-color: rgb(0, 34, 134);
            }


            select {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  outline: 0;
  box-shadow: none;
  border: 0 !important;
  background: #eee;
  background-image: none;
  
 
}

/* Remove IE arrow */
select::-ms-expand {
  display: none;
  
}
/* Custom Select */
.select {
 
  display: flex;
  width: 54em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;

 

} 
select {
  flex: 1;
  padding: 0 .5em;
  color: black;
  cursor: pointer;
}


/* Arrow */
.select::after {
  content:  '\25BC';
  position: absolute;
  top: 168px;
  right: 48px;
  padding: 0 1em;
  background: rgb(161, 161, 161);
  color: black;
  border-radius: .25em;
  cursor: pointer;
  pointer-events: none;
  -webkit-transition: .25s all ease;
  -o-transition: .25s all ease;                    
  transition: .25s all ease;
}
/* Transition */
.select:hover::after {
  color: #f39c12;
}

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
    
        <form id="frm" method="post" action="savevac.php" >
             <h1>Enter Vaccine Centers</h1>

             
             <input type="vcname" name="vcname" placeholder="Center Name" >
			<span class="vcnaerr"><?php echo isset($vcnaerr)?"*".$vcnaerr:'';?></span>
            <?php
$query = mysqli_query($conn,"SELECT no,place FROM vacciloc");
$result=$query;
if(mysqli_num_rows($result)==0)
{
    echo " OOPS SOMETHING WENT WRONG!!!!";
}

else{
echo '
<div class="select">
  <select name="vcplace" id="slct" >
    <option selected disabled >Choose a location</option>
    ';

  
    while ($data = mysqli_fetch_assoc($query))
    {
      $no=$data["no"];
      $place=$data["place"];
      
   echo '

    <option value= "'.$no.'">'.$place.'</option>';
    }

 echo '
  </select>
</div>


';
}

?>

            <span class="err"><?php echo isset($vcplerr)?"*".$vcplerr:'';?></span>    
            <textarea class="inpt" name="vcaddr" placeholder="Center Address">
</textarea >
              <span class="vcaderr"><?php echo isset($vcaderr)?"*".$vcaderr:'';?></span>
             
        

  <input type="vcdose" name="vcdose" placeholder="Available Dose" >
      <span class="err"><?php echo isset($vcdoerr)?"*".$vcdoerr:'';?></span>
  <input type="lat" name="lat" placeholder="lattitude" >
       <span class="err"><?php echo isset($valaterr)?"*".$valaterr:'';?></span>
  <input type="longi" name="longi" placeholder="longitude" >
        <span class="err"><?php echo isset($vclonerr)?"*".$vclonerr:'';?></span>
        <span class="suc"><?php echo isset($insucc)?"*".$insucc:'';?></span>
			<button type="submit"  class="btn">Enter</button>

        </form>
    </div>


    <button  onclick="location.href ='vacaddloc.php'" class="btde"><i class="fas fa-plus"></i><span id="txt"> Add Location</span></button>
    </body>

</html>

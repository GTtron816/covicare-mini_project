<!DOCTYPE html>
<?php include 'hspconn.php'?>
<?php include 'lgout2.php'?>
<html> 
    <head>
        <style>
     
 
     @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}



body{
    font-family: 'Montserrat', sans-serif;
    -webkit-font-smoothing: antialiased;
	background-color: rgb(212, 212, 212);
	margin: 0;
	padding: 0;
	image-rendering: -webkit-optimize-contrast ;
}



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
              left: 1110px;
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
  color: #2c3e50;
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
            
       <?php include 'flatnav.css';?>
       <?php include 'drkmode-frm.css'; ?>
       <?php include 'forms.css';?>
        </style>
        <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
    </head>
    <body>
   
  
   
    <?php include 'bannermedic.php' ?>
    
    <div class="topnav" >
  
    <a href="medicaddcont.php">Add Containment Zones</a>
  <a   href="medicupdatecont.php">Edit Containment Zone</a>
  <a  class=active href="medaddhosp.php">Add Hospitals</a>
  <a   href="meduphosp.php">Edit Hospitals</a>
  <a   href="medicalad.php">Add Vaccine Centers</a>
  <a   href="medvacup.php">Edit Vaccine Centers</a>
  </div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
 

    
 
    <script src="drkmode-frm.js"></script>
    <div class="form-container">
	
		<form id="frm" method="post" action="savehosp.php">
        <h1>Enter Hospital</h1>
		
 <input type="Name" name="name" placeholder="Hospital Name" >
<span class="err"><?php echo isset($hnaerr)?"*".$hnaerr:'';?></span> 


<?php
$query = mysqli_query($conn,"SELECT no,loc FROM hosploc");
$result=$query;
if(mysqli_num_rows($result)==0)
{
    echo " OOPS SOMETHING WENT WRONG!!!!";
}
 
else{
echo '
<div class="select">
  <select name="place" id="slct" >
    <option selected disabled >Choose a location</option>
    ';

  
    while ($data = mysqli_fetch_assoc($query))
    {
      $no=$data["no"];
      $loc=$data["loc"];
      
   echo '

    <option value= "'.$no.'">'.$loc.'</option>';
    }

 echo '
  </select>
</div>


';
}

?>




<span class="err"><?php echo isset($hplerr)?"*".$hplerr:'';?></span>
<textarea class="inpt" name="addr" placeholder="Hospital Address">
</textarea >
<span class="err"><?php echo isset($haderr)?"*".$haderr:'';?></span>
<input type="number" name="bed" min=0 placeholder="Available Beds Count" >
<span class="err"><?php echo isset($hberr)?"*".$hberr:'';?></span>
<input type="number" name="oxy" min=0 placeholder="Available Oxygen Cylinders" >
  <span class="err"><?php echo isset($hoerr)?"*".$hoerr:'';?></span>
 
  
  <input type="lat" name="lat" placeholder="Lattitude" >
  <span class="err"><?php echo isset($laterr)?"*".$laterr:'';?></span>
  <input type="lon" name="lon" placeholder="Longitude" >
  <span class="err"><?php echo isset($lonerr)?"*".$lonerr:'';?></span>
  <span class="suc"><?php echo isset($insucc)?"*".$insucc:'';?></span>
			<button type="submit"  class="btn">Enter</button>

		</form>
</div>
<button onclick="location.href = 'addhsploc.php'"  class="btde"><i class="fas fa-plus"></i> Add Location</button>
    </body>
</html>
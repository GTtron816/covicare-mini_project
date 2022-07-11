<!DOCTYPE html>
<?php include 'dbconloc.php'?>
<?php
session_start();
if(!isset($_SESSION['valid']))
{
    header('Location: login.php');
} 

?> 
<html> 

    <head>
  
        <style>
      
    

.container {
    max-width: 640px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 13px;
    position:fixed;
    left: 680px;
    top: 168px;
}

ul.ks-cboxtags {
    list-style: none;
    padding: 20px;
}
ul.ks-cboxtags li{
  display: inline;
}
ul.ks-cboxtags li label{
    display: inline-block;
    background-color: rgb(255, 255, 255);
    border: 2px solid rgba(48, 48, 48, 0.3);
    color: #000000;
    border-radius: 25px;
    white-space: nowrap;
    margin: 3px 0px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.ks-cboxtags li label {
    padding: 8px 12px;
    cursor: pointer;
}

ul.ks-cboxtags li label::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f128";
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label {
    border: 2px solid#e9a1ff;
    background-color: #2c3e50;
    color: #fff;
    transition: all .2s;
}

ul.ks-cboxtags li input[type="checkbox"] {
  display: absolute;
}
ul.ks-cboxtags li input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
ul.ks-cboxtags li input[type="checkbox"]:focus + label {
  border: 2px solid #e9a1ff;
}
       <?php include 'flatnav.css';?>
       <?php include 'drkmode-frm.css'; ?>
       <?php include 'forms.css';?>

       .btre {
    border: none;
    outline: none;
    
    transition: transform 80ms ease-in;
    box-shadow: rgba(0, 9, 61, 0.2) 0px 4px 8px 0px;
    background-color: rgb(0, 60, 255);
    border-radius: 12px;
    color: gold;
    font-size: 16px;
    cursor: pointer;
    position: absolute;
    left: 1700px;
    top: 10px;
    height: 36px;
    width: 130px;
}
            .btre:active {
            transform: scale(0.95);
        }
  
  

            .btre:hover {
               background-color: rgb(0, 34, 134);
            }
            
        
        </style>
        <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
    </head>
    <body>
  
  
    <?php include 'bannermedic.php' ?>
    
  <div class="topnav" >

  <a  class=active href="medicaddcont.php">Add Containment Zones</a>
  <a   href="medicupdatecont.php">Edit Containment Zone</a>
  <a   href="medaddhosp.php">Add Hospitals</a>
  <a   href="meduphosp.php">Edit Hospitals</a>
  <a   href="medicalad.php">Add Vaccine Centers</a>
  <a   href="medvacup.php">Edit Vaccine Centers</a>
</div>

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
<button onclick="location.href = 'logout2.php'" id="Log-Out" class="btre"><i class="fas fa-sign-out-alt"></i> Log-Out</button>


    
    <script src="drkmode-frm.js"></script>

	<div class="form-container">
		<form id="frm" method="post" action="saveloc.php">
			<h1>Enter Containment Zone</h1>
		

<input type="place" name="place" placeholder="Place Name" >
<span class="err"><?php echo isset($plerr)?"*".$plerr:'';?></span>
		
<input type="number" name="newinf" min=0 placeholder="New Infections" >
<span class="err"><?php echo isset($nierr)?"*".$nierr:'';?></span>
<input type="number" name="curinf" min=0 placeholder="Currently Infected" >
<span class="err"><?php echo isset($cierr)?"*".$cierr:'';?></span>
<input type="number" name="totinf" min=0 placeholder="Total Infections" >
  <span class="err"><?php echo isset($tierr)?"*".$tierr:'';?></span>
  <input type="number" name="newcure" min=0 placeholder="Newly Cured" >
<span class="err"><?php echo isset($ncerr)?"*".$ncerr:'';?></span>
  <input type="number" name="cured" min=0 placeholder="Cured" >
  <span class="err"><?php echo isset($qtprerr)?"*".$cureerr:'';?></span>
            <ul class="ks-cboxtags">
    <li><input type="checkbox" id="checkboxOne" name="cont" value="Yes" ><label for="checkboxOne"> Containment Zone</label></li>
  </ul>
  
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
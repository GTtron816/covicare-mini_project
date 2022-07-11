<!DOCTYPE html>
<?php include 'qtconn.php'?>
<?php include 'lgout2.php'?>
<html> 
    <head>
        <style>
       <?php include 'forms.css';?>
       body,
html {
    margin: 0;
    padding: 0;
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
              left: 1200px;
              top: 170px;
              height: 36px;
              width: 133px;
            }
            
    

            .btde:active {
            transform: scale(0.95);
        }

            .btde:hover {
               background-color: rgb(0, 34, 134);
            }

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
    content: "\f067";
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
        </style>
        <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php include 'banneradmin.php';?>
  
   
    
    <div class="topnav" >

<a class=active href="adminaddqt.php">Add Quarantine Center</a>
<a  href="adminupdateqt.php">Edit Quarantine Center</a>
<a   href="admincheckqtbooking.php">Check Quarantine Booking</a>
<a   href="medicac.php">Create Medic Account</a>

</div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
 

    
    <script src="drkmode-frm.js"></script>

	<div class="form-container">
		<form id="frm" method="post" action="saveqt.php">
			<h1>Enter Quarantine Centers</h1>
		

			<input type="qtname" name="qtname" placeholder="Center Name" >
			<span class="err"><?php echo isset($qtnaerr)?"*".$qtnaerr:'';?></span>
		
           
<?php
$query = mysqli_query($conn,"SELECT id_loc,loc from qtloc");
$result=$query;
if(mysqli_num_rows($result)==0)
{
    echo " OOPS SOMETHING WENT WRONG!!!!";
}else{
    echo ' 
    <div class="select">
      <select name="qtplace" >
        <option selected disabled >Choose a Place</option>
        ';
    
      
        while ($data = mysqli_fetch_assoc($query))
        {
         
          $id=$data["id_loc"];
          $qtplace=$data["loc"];
       echo '
    
        <option value= "'.$id.'">'.$qtplace.'</option>';
        }
    
     echo '
      </select>
    </div> 
    
     
    ';
    }
    
    ?>
    <span class="err"><?php echo isset($qtplerr)?"*".$qtplerr:'';?></span>
     <textarea class="inpt" name="qtaddr" placeholder="Center Address">
</textarea >
<span class="err"><?php echo isset($qtaderr)?"*".$qtaderr:'';?></span>

            <ul class="ks-cboxtags">
    <li><input type="checkbox" id="checkboxOne" name="fsrv" value="Yes" ><label for="checkboxOne"> Food Availabe</label></li>
  </ul>
  <input type="price" name="price" placeholder="Center Rent" >
  <span class="err"><?php echo isset($qtprerr)?"*".$qtprerr:'';?></span>
  <input type="lat" name="lat" placeholder="Lattitude" >
  <span class="err"><?php echo isset($laterr)?"*".$laterr:'';?></span>
  <input type="lon" name="lon" placeholder="Longitude" >
  <span class="err"><?php echo isset($lonerr)?"*".$lonerr:'';?></span>
  <span class="suc"><?php echo isset($insucc)?"*".$insucc:'';?></span>
			<button type="submit"  class="btn">Enter</button>
		</form>
	</div>
  <button  onclick="location.href ='qtaddloc.php'" class="btde"><i class="fas fa-plus"></i><span id="txt"> Add Location</span></button>
   
    </body>
</html>
<!DOCTYPE html>
<?php include 'dbconloc.php'?>
<?php include 'lgout2.php'?>
<html>

<head>
   
<style>
body{
            background-color: rgb(212, 212, 212);
            margin: 0;
            padding: 0; 
            image-rendering: -webkit-optimize-contrast ;
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
        }

/* Reset Select */
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  outline: 0;
  box-shadow: none;
  border: 0 !important;
  background: #2c3e50;
  background-image: none;

 
}

/* Remove IE arrow */
select::-ms-expand {
  display: none;
  
}
/* Custom Select */
.select {
  position: absolute;
  display: flex;
  width: 20em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
  left: 800px;
  top: 200px;
 

}
select {
  flex: 1;
  padding: 0 .5em;
  color: #fff;
  cursor: pointer;
}


/* Arrow */
.select::after {
  content:  '\25BC';
  color: black;
  position: absolute;
  top: 0;
  right: 0;
  padding: 0 1em;
  background: #34495e;
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
.chk
{
    position: fixed;
    top: 300px;
    left: 20px;
}

.txt{
   position: fixed;
   top: 250px;
   left: 720px;
   font-size: 15px;
}

<?php include 'flatnav.css';?>
 <?php include 'drkmode-frm.css'; ?>


</style> <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
</head>

<body>
  
<?php include 'bannermedic.php' ?>
    
    <div class="topnav" >
  
    <a href="medicaddcont.php">Add Containment Zones</a>
  <a class=active  href="medicupdatecont.php">Edit Containment Zone</a>
  <a   href="medaddhosp.php">Add Hospitals</a>
  <a   href="meduphosp.php">Edit Hospitals</a>
  <a   href="medicalad.php">Add Vaccine Centers</a>
  <a   href="medvacup.php">Edit Vaccine Centers</a>
  </div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
 

    
    <script src="drkmode-frm.js"></script>
 

<?php
$query = mysqli_query($conn,"SELECT place FROM infection GROUP BY place ");
$result=$query;
if(mysqli_num_rows($result)==0)
{
    echo " OOPS SOMETHING WENT WRONG!!!!";
}else{
    echo '
    <div class="select">
      <select name="slct" id="slct" onchange=getloc(this.value);>
        <option selected disabled >Choose a location</option>
        ';
    
      
        while ($data = mysqli_fetch_assoc($query))
        {
         
          $place=$data["place"];
          
       echo '
    
        <option value= "'.$place.'">'.$place.'</option>';
        }
    
     echo '
      </select>
    </div>
    
    
    ';
    }
    
    ?>
  
 <form method="post" action="medicselecont.php" id=myform>
 <input type="hidden" name="place"  id=pna value=>
 
  
    </form>
   
 <script>
    function getloc(value)
    {   var los; 
     
         los=value; 
         document.getElementById("pna").value=los;
        
         
    
         document.getElementById("myform").submit();
   
          
 
    }
    
   
    
    </script>

    



    <script src="darkmode.js"></script>
   

</body>





</html>
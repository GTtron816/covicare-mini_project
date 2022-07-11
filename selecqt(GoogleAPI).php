<!DOCTYPE html>
<?php include 'qtconn.php'?>
<?php include 'lgout.php'?>
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
  left: 650px;
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
   left: 1020px;
   font-size: 15px;
}

<?php include 'checkbox.css';?>
<?php include 'darkmode.css'; ?>
<?php include 'flatnav.css'; ?>

</style> <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'banner.php'?>
    <div class="topnav" >

<a  href="homepageusrlogin.php">Home</a>
<a  href="selecmaploc(GoogleAPI).php">Containment Zones</a>
<a   href="selechosp.php">Hospital Tracking</a>
<a  href="vaccinetrack(GoogleAPI).php">Vaccine Tracking</a>
<a class=active  href="selecqt(GoogleAPI).php">Quarantine Booking Portal</a>
</div>


<?php
$query = mysqli_query($conn,"SELECT id_loc,loc from qtloc");
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
  
 <form method="get" action="qtlist.php" id=myform>
 <input type="hidden" name="qtplace"  id=qtna value=>
 <input type="hidden" id="foodsrv" name="foodsr" value=>
  
    </form>
    <div class="container">
  <ul class="ks-cboxtags">
    <li><input type="checkbox" id="checkboxOne" onclick="assigncheck()" ><label for="checkboxOne"> Need Food Serving</label></li>
  </ul>

</div>
    <span class=txt>*Rent Rates May Increase</span>
    <script>
    function assigncheck()
    {
       
        if (document.getElementById("checkboxOne").checked){
        document.getElementById("foodsrv").value='Yes';
       } else {
       document.getElementById("foodsrv").value='No';
     }

    }
  
 
    function getloc(value)
    {   var los;
        var checkBox = document.getElementById("foodsrv");
         los=value; 
         document.getElementById("qtna").value=los;
        
         
    
         document.getElementById("myform").submit();
   
          
 
    }
    
   
    
    </script>

    

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
    


    <script src="darkmode.js"></script>
   

</body>





</html>
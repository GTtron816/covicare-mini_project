<!DOCTYPE html>
<?php include 'qtconn.php'?>
<?php include 'lgout2.php'?>
<html>

<head>
   
<style> 
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
              left: 1050px;
              top: 205px;
              height: 36px;
              width: 150px;
            }
            
    

            .btde:active {
            transform: scale(0.95);
        }

            .btde:hover {
               background-color: rgb(0, 34, 134);
            }



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
  left: 700px;
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
  
 <form method="get" action="admselecqt.php" id=myform>
 <input type="hidden" name="qtplace"  id=qtna value=>
 
  
    </form>
   
 <script>
    function getloc(value)
    {   var los; 
     
         los=value; 
         document.getElementById("qtna").value=los;
        
         
    
         document.getElementById("myform").submit();
   
          
 
    }
    
   
    
    </script>

<button  onclick="location.href ='qtuploc.php'" class="btde"><i class="fas fa-pen-alt"></i><span id="txt"> Update Location</span></button>

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
    


    <script src="darkmode.js"></script>
   

</body>





</html>
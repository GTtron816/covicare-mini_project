<!DOCTYPE html>
<?php include 'hspconn.php'?>
<html>
<?php
session_start();
if(!isset($_SESSION['valid']))
{
    header('Location: login.php');
} 

?>
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
        .btn {
                border: none;
                outline: none;
                border-radius: 12px;
    
                box-shadow: rgba(0, 9, 61, 0.2) 0px 4px 8px 0px;
                background-color: rgb(0, 60, 255);
                color: gold;
                font-size: 16px;
              cursor: pointer;
              position: absolute;
              left: 1700px;
              top: 20px;
              height: 36px;
              width: 133px; 
            }
            
            .btn:active {
            transform: scale(0.95);
        }
  
  

            .btn:hover {
               background-color: rgb(0, 34, 134);
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

<?php include 'darkmode.css'; ?>
<?php include 'flatnav.css'; ?>

</style>

  <!--Icons-Kit-->
  <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include 'banner.php'?>
<div class="topnav" >

<a  href="homepageusrlogin.php">Home</a>
<a  href="selecmaploc(GoogleAPI).php">Containment Zones</a>
<a class=active  href="selechosp.php">Hospital Tracking</a>
<a  href="vaccinetrack(GoogleAPI).php">Vaccine Tracking</a>
<a   href="selecqt(GoogleAPI).php">Quarantine Booking Portal</a>
</div>


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
  <select name="slct" id="slct" onchange=getloc(this.value);>
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

<form method="get" action="hospital(GoogleAPI).php" id="myform">
     <input type="hidden" name="place" id="subval" value=>
     </form>

<script>
function getloc(value)
{
    var los=value; 
    document.getElementById("subval").value=los;
    document.getElementById("myform").submit();
}



</script>




<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
    
<button onclick="location.href = 'logout2.php'" id="Log-Out" class="btn"><i class="fas fa-sign-out-alt"></i> Log-Out</button>

    <script src="darkmode.js"></script>
   

</body>





</html>
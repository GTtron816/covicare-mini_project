<!DOCTYPE html>
<?php include 'vaconn.php'?>
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
<a   href="selechosp.php">Hospital Tracking</a>
<a class=active href="vaccinetrack(GoogleAPI).php">Vaccine Tracking</a>
<a   href="selecqt(GoogleAPI).php">Quarantine Booking Portal</a>
</div>

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
  <select name="slct" id="slct" onchange=getloc(this.value);>
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

<form method="get" action="vaccine(GoogleAPI).php" id="myform">
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
    


    <script src="darkmode.js"></script>
   

</body>





</html>
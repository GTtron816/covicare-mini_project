<?php include 'dbconloc.php'?>
<!DOCTYPE html>

<html>
<?php
session_start();
if(!isset($_SESSION['valid']))
{
    header('Location: login.php');
} 

?>
<head>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>






    <style>


.btdre {
  background-color: rgb(0, 60, 255);
  border-radius: 12px;
  color: gold;
  padding: 0px;
margin: 0px;
font-size: 16px;
cursor: pointer;
position: fixed;
left : 900px;
top: 730px;
height: 40px;
width: 180px;
border: none;
    outline: none;         }



.btdre:hover {
  background-color: rgb(0, 34, 134);
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
            

<?php include 'flatnav.css'; ?>


#map {
    position: fixed;
    margin: auto;
    height: 40%;
    width: 50%;
    left: 0px;
    top: 60px;
}

html, body {
height: 100%;
margin: 0;
padding: 0;
}

<?php include 'darkmode.css'; ?>

 </style>
 <!--Icons-Kit-->
 <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>

</head>
<body>
<?php include 'banner.php'?>
<div class="topnav" >

<a  href="homepageusrlogin.php">Home</a>
<a class=active  href="selecmaploc(GoogleAPI).php">Containment Zones</a>
<a href="selechosp.php">Hospital Tracking</a>
<a  href="vaccinetrack(GoogleAPI).php">Vaccine Tracking</a>
<a   href="selecqt(GoogleAPI).php">Quarantine Booking Portal</a>


</div>

<?php
 
if (isset($_GET["w1"]))
{
   $chk=$_GET["w1"];
}



$query = mysqli_query($conn,"SELECT lat,lon FROM infection where id='".$chk."'");
while ($data = mysqli_fetch_assoc($query))
{
   
    $lat = $data['lat'];   
    $lon = $data['lon'];
    
                    
}



?>

 
   

  
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
      async
    ></script>







<script>
var lati =<?php echo "$lat"?>;
var longi=<?php echo "$lon"?>

function initMap() {
  const myLatLng = { lat: lati, lng: longi };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: myLatLng
  });

  <?php
$query = mysqli_query($conn,"SELECT containment FROM infection where id= '".$chk."'");
$data = mysqli_fetch_assoc($query);
$contz=$data["containment"];
if($contz=='Yes'||$contz=='YES'||$contz=='yes')
{  echo'circlezone();'; }

else{
  echo 'pindrop();';
}




$conn->close();
   ?>


function circlezone()
{
 
  new google.maps.Circle({
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#FF0000",
      fillOpacity: 0.35,
      map,
      center: myLatLng,
      radius: Math.sqrt(200) * 100,

    });}

  function pindrop()
  {
    new google.maps.Marker({
    position: myLatLng,
    map,
    
  });}





}

</script>

<button onclick = redi() id="btdre" class="btdre"><i class="fas fa-map-marked-alt"></i> Change Location </button>
<script>




function redi()
{
  window.location.href = "selecmaploc(GoogleAPI).php";
}
</script>





    

    
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
    
<button onclick="location.href = 'logout2.php'" id="Log-Out" class="btn"><i class="fas fa-sign-out-alt"></i> Log-Out</button>  
    <script src="darkmode.js"></script>


    <?php include 'dispmapdetails.php'?>

  </body>


</html>
<!DOCTYPE html>
<?php include 'qtconn.php'?>
<html>
<head>
<style>

.btde {
    background-color: rgb(0, 60, 255);
    border-radius: 12px;
    color: gold;
    font-size: 18px;
    cursor: pointer;
    position: fixed;
    left: 900px;
    top: 400px;
    height: 36px;
    width: 150px;
    padding: 0px;
    margin: 0px;
    border: none;
    outline: none;
  }
  
  
  
  .btde:hover {
    background-color: rgb(0, 34, 134);
  } 
  
  .h1{
    text-align: center;
  }
  
  body{   
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
            margin: 0;
            padding: 0; }
  .t1{
    font-size: 25px;
    font-weight: normal;
  }

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
    position: absolute;
    left: 0px;
    top: 200px;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8; 
    font-size: 12px;
    color:black;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
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
  top: 300px;
 

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


  
</style>

<style>
<?php include 'darkmode.css'; ?>
</style>

<script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>


</head>




<body>


        
    


    

<?php

session_start();

     
        

$_SESSION['page_load']=0;


$rmn=$_POST['roomno'];



  include ("banner.php");

  $query =mysqli_query( $conn,"SELECT qtname,addr,qtplace,foodsrv,price FROM qtlist where no='".$rmn."'AND bookstatus='NO'  ");
  $result=$query;
 

 if(mysqli_num_rows($result)==0)
{
    echo " INVALID CENTER NUMBER OR ROOM UNAVAILABLE PLEASE TRY AGAIN WITH AVAILABLE CENTER NUMBER";
} 

 else{
   $seven=7;
   $frtn=14;
   $twet=28;
  $data = mysqli_fetch_assoc($query);
  $rent=$data["price"];
  $qtname=$data["qtname"];
  $addr=$data["addr"];
  $fsrv=$data["foodsrv"];
  echo "<h1 class=h1>CLICK TO CONFIRM PAYMENT</h1>";
  echo"<br>";
  echo "<t1 class=t1>YOU HAVE SELECTED: </t1>";
  echo ' 
<div class="table-wrapper">
<table class="fl-table">
<thead>
<tr>

<th>CENTER NAME</th>
<th>ADDRESS</th>
<th>SERVES FOOD</th>
<th>RENT(PER DAY)</th>
</tr>
</thead>
<tbody>
 

<tr>
            <td>'.$qtname.'</td>
            <td>'.$addr.'</td>
            <td>'.$fsrv.'</td>
            <td>Rs '.$rent.'</td>
</tr>

</tbody>
 </table>
</div>

<div class="select">
      <select name="slct" id="slct" onchange=setday(this.value)>
        <option selected disabled >Choose Number of Days</option>
        <option value= "'.$seven.'"> 7-Days</option>
        <option value= "'.$frtn.'"> 14-Days</option>
        <option value= "'.$twet.'"> 28-Days</option>

        </select>
        </div> 
        

        <form method="post" action="confirmpay.php" id=myform>
 <input type="hidden" name="day" id="day"  value=>
 <input type="hidden"  name="roomn" value='.$rmn.'>

 <button onclick=redi()  class="btde"><i class="fas fa-rupee-sign"></i> Click To Pay</button> 
    </form>
';
 }
 ?>
 
 
 <span class="err"><?php echo isset($dayerr)?"*".$dayerr:'';?></span>




    <script>
    function setday(value)
    {   var day;
         day=value; 
         document.getElementById("day").value=day;
    
    }</script>
<button onclick=darkmode() hidden class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
 
    
  <script src="darkmode.js"></script>



  <?php $conn->close();
?>

</body>

 
</html>
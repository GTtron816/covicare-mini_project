<?php include 'dbconloc.php'?>
<!DOCTYPE html>
<html>



    <head>
    
    
    <style>

*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;}
   

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
    top: 600px;
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


</style>
    
    </head>











    <body>




    <?php

$query = mysqli_query($conn,"SELECT id,place,newinfections,curinf,totalinfections,newcured,cured,containment FROM infection where id= '".$chk."'");
   
$data = mysqli_fetch_assoc($query);

   

$place=$data["place"];
$newinf=$data["newinfections"];
$curinf=$data["curinf"];
$totinf=$data["totalinfections"];
$newcure=$data["newcured"];
$cured=$data["cured"];
$contzo=$data["containment"];
                    

echo '


<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            
        <th>PLACE</th>
        <th>NEW INFECTION</th>
        <th>CURRENTY INFECTED</th>
        <th>TOTAL INFECTION</th> 
        <th>NEWLY CURED</th>
        <th>CURED</th>
        <th>CONTAINMENT ZONE</th>
        </tr>
        </thead>
        <tbody>
       
        <tr>
        <td>'.$place.'</td>
        <td>'.$newinf.'</td>
        <td>'.$curinf.'</td>
        <td>'.$totinf.'</td>
        <td>'.$newcure.'</td>
        <td>'.$cured.'</td>
        <td>'.$contzo.'</td>
        </tr>
     
        </tbody>
    </table>
</div>


';





?>







    </body>
</html>
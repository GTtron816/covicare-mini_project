<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['valid']))
{
    header('Location: login.php');
} 

?> 
<style>
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
<body>
<button onclick="location.href = 'logout2.php'" id="Log-Out" class="btre"><i class="fas fa-sign-out-alt"></i> Log-Out</button>

</body>
</html>
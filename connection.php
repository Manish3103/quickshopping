<?php
$server="localhost";
$user="root";
$password="";
$database="quickshop";
$cn=mysqli_connect($server,$user,$password,$database);
if(!$cn)
{
    echo '<br>'.mysqli_connect_errno;
    echo '<br>'.mysqli_connect_error;
}
?>

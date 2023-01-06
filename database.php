<?php
$server="localhost";
$user="root";
$password="manish@3103";
$cn=mysqli_connect($server,$user,$password);
if ($cn)
{
$query="create database quickshop";
$sq=mysqli_query($cn,$query);
if($sq)
{
    echo 'database create';
}
else {
    echo '<br>'.mysqli_error($cn);
    echo '<br>'.mysqli_errno($cn);
}
}
else {
    echo '<br>'.mysqli_connecy_error();
    echo '<br>'.mysqli_connecy_errno();
}
?>
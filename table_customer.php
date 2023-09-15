
<?php
include"connection.php";
$query="CREATE TABLE `customer` (
    `cid` INT(10) NOT NULL,
    `name` varchar(30) NOT NULL,
    `email` varchar(60) NOT NULL,
    `password` varchar(30) NOT NULL,
    `phone` varchar(14) NOT NULL
  )";
$sq=mysqli_query($cn,$query);
if($sq)
{
	echo'table created';
}
else
{
	echo'table not created';
	echo'<br>'.mysqli_errno($cn);
	
}
?>
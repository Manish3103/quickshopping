
<?php
include"connection.php";
$query="
CREATE TABLE `bill` (
  `bid` int(8) NOT NULL,
  `pid` int(8) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` int(8) NOT NULL,
  `amt` int(8) NOT NULL
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
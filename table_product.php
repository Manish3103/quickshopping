
<?php
include"connection.php";
$query="CREATE TABLE `product` (
    `pid` int(10) NOT NULL,
    `Product_type` varchar(30) NOT NULL,
    `Product_name` varchar(30) NOT NULL,
    `Quantity` int(10) NOT NULL,
    `Price` int(10) NOT NULL,
    `product_detail` varchar(200) NOT NULL,
    `Photo` varchar(200) NOT NULL
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
<?php
session_start();

?>
<?php
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	include"connection.php";
	$query="delete from product where pid='".$pid."'";
	$sq=mysqli_query($cn,$query);
	if($sq)
	{
		header("location:ad-product-dsp.php");
	}
	else
	{
		echo mysqli_error($cn);
	}
}

?>
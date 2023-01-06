<?php
session_start();
?>
<?php
if(isset($_GET['cid']))
{
	$cid=$_GET['cid'];
	include"connection.php";
	$query="delete from customer where cid='".$cid."'";
	$sq=mysqli_query($cn,$query);
	if($sq)
	{
		header("location:ad-customer.php");
	}
	else
	{
		echo mysqli_error($cn);
	}
}
else
{
	header("location:user.php");
}
?>
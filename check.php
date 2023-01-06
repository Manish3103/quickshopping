<?php
session_start();
include("connection.php");
if(isset($_POST['ls']))
{
	$lid=$_POST['lid'];
	$lp=$_POST['lp'];


	
	if(($lid=='manish@gmail.com') and ( $lp=='test'))
	{
		$_SESSION['aname']=$m['aname'];
		header("location:ad-customer.php");
	}
	else {
		$query="select * from customer where email='$lid' and password='$lp'";
		$sq=mysqli_query($cn,$query);
		$m= mysqli_fetch_array($sq);
		if(is_array($m))
		{
			$_SESSION['name']=$m['name'];
			header("location:index.php");
		}
		else {
		
			
			echo '<script> alert(" wrong password ")</script>';
			
			
		}
	}
}
else {
	
	if(isset ($_POST['s']))
	{
	$n=$_POST['n'];
	$id=$_POST['id'];
	$p=$_POST['p'];
	$ph=$_POST['ph'];
   
	$query="insert into customer (name,email,password,phone) values('$n','$id','$p','$ph')";
	$sq=mysqli_query($cn,$query);
	if($sq)
	{
		echo '<script> alert("Thanks for registration")</script>';
		header("location:index.php");
	}
	else
			{
				echo'<br>'.mysqli_error($cn);
			}
	   
	}
}

?>

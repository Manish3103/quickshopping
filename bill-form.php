<?php session_start(); 

if(!isset($_SESSION['name']))
{
header("location:index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
<?php include 'navbar.php' ?>  

<style>
#f{margin-top:90px;margin-left:10px;}
</style>
<script>
   function cal(){
 var qty= document.getElementById("qq").value;
 var price= document.getElementById("price").value;
 
 document.getElementById("amt").value=  (qty*price);
  
   }
 
</script>

<?php 
include"connection.php";
$query="select * from product where pid='".$_GET['id']."'";
$sq=mysqli_fetch_array(mysqli_query($cn,$query));	


?>
	<form  id="f" action="" method="post"> 
		customer name:<input type="text" name="cid" value="<?php echo @$_SESSION['name']; ?>" readonly> <br><br>
		product id:<input type="text" name="pid" value="<?php echo $sq['pid']; ?>" readonly> <br><br>
		product per unit rate:<input type="text" name="price" id="price" value="<?php echo $sq['Price']; ?>" readonly> <br><br>
		
		choose quantity : 
		<select name="qq" id="qq" onchange="cal()">
			<?php 
			for($i=0;$i<=$sq['Quantity'];$i++)
			{
				echo '<option value="'.$i.'">'.$i.'</option>'; 
			}
			?>
		</select> <br><br>
		
		Amount:- <input type="text" name="amt" id="amt" readonly > 
		<br><br>
		<input type="submit" name="ss">
	</form>




<?php


	if(isset($_POST['ss']))
	{
		if($_POST['amt']>0)
		{
include("connection.php");
$pid=$_GET['id'];
$cid=$_SESSION['name'];
$quantity=$_POST['qq'];
$price=$_POST['price'];
$amt=$_POST['amt'];

$query22="INSERT INTO `bill` (`pid`, `cid`, `quantity`, `price`, `amt`) VALUES ('$pid', '$cid', '$quantity', '$price', '$amt')";
$sq2=mysqli_query($cn,$query22);
            
			
            if($sq2)
			{
				
				echo '<script> alert(" Thank you  your bill generate ")</script>';
				
				
			}
			else
			{
				
				echo'<br>'.mysqli_errno($cn);
				
			}
							
							
				
		}
		else
		{
			echo '<script> alert("select quantity")</script>';
		}
	}


?>
<?php include 'footer.php' ?>
 
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
 

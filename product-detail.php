<?php session_start(); ?>
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
.container{width:100%;}
.row {
    position: relative;
    padding-top: 50px;
   
}
.m{width: 460px;padding:5px;margin-top:30px;
 box-sizing: border-box; 
 display: inline-table;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition:1s;
  }
 
.aa{left:0%;width:100%;top:0%;overflow:hidden;}

 .aa img{width:100%; height:370px;box-sizing:border-box;}

.add_to_cart{background-color:orange;width:41%;padding:15px;float:left;text-align:center;z-index:1;}

.buy_now{background-color:orange;color:white;width:41%;padding:15px;float:left;margin-left:4%;text-align:center;}

.b{position:relative;top:-70%;left:86%;color:red;font-family:sans-serif;text-align:center;}

.rs{color:gray;}
</style>
<div class="container"> 
	<div class="row">
		<?php
		include"connection.php";
		$query="select * from product where pid='".$_GET['pid']."'";
		$sq=mysqli_fetch_array(mysqli_query($cn,$query));	
		
		if(($sq)>0)
		{
				?>
				
				<div class="col-md-6">
						<div class="m">
							<div class="aa">
							<img src="<?php echo $sq['Photo'];?>" height="100%" width="100%">
							</div>
						</div>
						<div class="b">
								<?php echo $sq['Product_name'];?>
								<span class="rs">
								<br>Rs=<?php echo $sq['Price'];?>
								</span>
								<br><?php echo $sq['product_detail'];?>
							</div>
							
							<div class="add_to_cart">
							<a href="bill_form.php" style="color:white;">ADD TO CART</a>
							</div>
							
							<div class="buy_now">
							<a href="bill-form.php?id=<?php echo $sq['pid'];?>" style="color:white;">BUY NOW</a>
							</div>
							
					</div>
					
		<?php 		
		}
			
		else
		{
			echo'<br>'.mysqli_error($cn);
		}
		?>
		
	</div>
</div>
<?php include 'footer.php'?>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
 
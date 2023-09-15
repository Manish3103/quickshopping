<?php
session_start();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Quick-shopping</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="ad-customer.php">User <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ad-product-dsp.php">product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ad-product-form.php">add product</a>
      </li>
      
	  <li class="nav-item">
        <a class="nav-link" href="ad-bill.php">All bill</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php
$pn=$pnw=$q=$qw=$p=$pw=$pd=$pdw=$ph=$phw='';

function productnamecheck()
{
	$pn=trim($_POST['pn']);
	$pnc='/^[a-zA-Z ]*$/';
	if(preg_match($pnc,$pn) && strlen($pn)>0)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function Quantitycheck()
{
	$q=trim($_POST['q']);
	$qc='/^[0-9]*$/';
	if(preg_match($qc,$q) && strlen($q)>0)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function Pricecheck()
{
	$p=trim($_POST['p']);
	$pc='/^[0-9]*$/';
	if(preg_match($pc,$p) && strlen($p)>0)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function product_detailcheck()
{
	$pd=trim($_POST['pd']);
	$pdc='/^[a-zA-Z0-9 ,]{1,100}$/';
	if(preg_match($pdc,$pd) && strlen($pd)>0)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function Photocheck()
{
	
	$ph=$_FILES['ph']['name'];
	$l=strlen($ph);
	$p=strpos($ph,'.');
	$ext=substr($ph,$p+1,$l-1);
	
	$ar=array('jpg','jpeg','png','bmp','gif','jfif','Chrome HTML Document','webp');
	if(in_array($ext,$ar))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


if(isset($_POST['s']))
{
	
	if(productnamecheck()=='y')
	{
		$pn=$n=trim($_POST['pn']);
	}
	else
	{
		$pnw="***check name***";
	}
	
	if(Quantitycheck()=='y')
	{
		$q=trim($_POST['q']);
	}
	else
	{
		$qw="***check email***";
	}
	

	
	if(Pricecheck()=='y')
	{
		$p=trim($_POST['p']);
	}
	else
	{
		$pw="***check phone***";
	}
	
	if(product_detailcheck()=='y')
	{
		$pd=trim($_POST['pd']);
	}
	else
	{
		$pdw="***check address***";
	}
	if(Photocheck()=='y')
	{
		$ph=$_FILES['ph']['name'];
		$tmp=$_FILES['ph']['tmp_name'];
		$f='image/'.uniqid().$ph;
	}
	else
	{
		$phw="***check photo***";
	}
	
	
	if(productnamecheck()=='y' && Quantitycheck()=='y' && Pricecheck()=='y' &&
	product_detailcheck()=='y' && Photocheck()=='y')
	
	{	
	$pt=$_POST['pt'];
		include"connection.php";
		$query="insert into product(Product_type,Product_name,Quantity,Price,product_detail,Photo)
		values('".$pt."','".$pn."','".$q."','".$p."','".$pd."','".$f."')";
		$sq=mysqli_query($cn,$query);
		if($sq)
		{
		move_uploaded_file($tmp,$f);
		echo '<script> alert("Thanks for add item")</script>';
		echo "<meta http-equiv='refresh' content='0'>";
	 
		$pn=$pnw=$q=$qw=$p=$pw=$pd=$pdw=$ph=$phw=$pt='';
		}
		else
		{
			echo '<br>'.mysqli_error($cn);
		}
		
	
	}
	else
	{
		echo '<script> alert("enter your form first plz")</script>';
	}


}
?>


<form action="" method="POST" enctype="multipart/form-data">
Product_type:-	<select name="pt">
				<option>pantry</option>
				<option>bakery</option>
				<option>sell</option>
				</select>
<br><br>
Product-name:-<input type="text" name="pn" value="<?php echo $pn; ?>">
<span><?php echo $pnw; ?></span>
<br><br>
Quantity:-<input type="text" name="q" value="<?php echo $q; ?>">
<span><?php echo $qw; ?></span>
<br><br>
Price:-<input type="text" name="p" value="<?php echo $p; ?>">
<span><?php echo $pw; ?></span>
<br><br>
product_detail:-<input type="text" name="pd" value="<?php echo $pd; ?>">
<span><?php echo $pdw; ?></span>
<br><br>
Photo:-<input type="file" name="ph" value="<?php echo $ph; ?>">
<span><?php echo $phw; ?></span>
<br><br>
<input type="submit" name="s"><br><br>
</form>
	
<?php
include"connection.php";
$query="select * from product";
$sq=mysqli_query($cn,$query);
if($sq)
{
	if(mysqli_fetch_array($sq)>0)
	{
		$sq=mysqli_query($cn,$query);
		echo'<table border="2">
		<tr bgcolor="lime">
		<th>pid</th>
		<th>Product_name</th>
		<th>Product_type</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>product_detail</th>
		<th>Photo</th>
		</tr>';
		while($r=mysqli_fetch_array($sq))
		{
			echo'<tr bgcolor="white">
			<th>'.$r['pid'].'</th>
			<th>'.$r['Product_name'].'</th>
			<th>'.$r['Product_type'].'</th>
			<th>'.$r['Quantity'].'</th>
			<th>'.$r['Price'].'</th>
			<th>'.$r['product_detail'].'</th>
			<th><img src="'.$r['Photo'].'" height="100" width="100"></th>
			</tr>';
		}
		echo '</table>';
	}
	else
	{
		echo 'no record found';
	}
}
else
{
	echo'<br>'.mysqli_error($cn);
}
?>
<?phpsession_start();?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Quick shoping</a>
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
if(isset($_SESSION['aid']))
{
	header("location:user.php");
}
?>
<?php
include"connection.php";
$query="select * from customer";
$sq=mysqli_query($cn,$query);
if($sq)
{
	if(mysqli_fetch_array($sq)>0)
	{
		$sq=mysqli_query($cn,$query);
		echo'<table border="2">
		<tr bgcolor="lime">
		<th>cid</th>
		<th>name</th>
		<th>email</th>
		<th>password</th>
		<th>phone</th>
		<th>update | Delete</th>
		
		</tr>';
		while($r=mysqli_fetch_array($sq))
		{
			$cid=$r['cid'];
			echo'<tr bgcolor="white">
			<th>'.$r['cid'].'</th>
			<th>'.$r['name'].'</th>
			<th>'.$r['email'].'</th>
			<th>'.$r['password'].'</th>
			<th>'.$r['phone'].'</th>
			<th><a href="">update</a> | <a href="ad-customer-del.php?cid='.$cid.'">Delete</a></th>
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

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <a class="navbar-brand text-white" href="index.php">Quick Shoping</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="pantry.php">Pantry <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="cosmetic.php">Cosmetic
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="bakery.php">Bakery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.php">contact
                    </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" style="width: 120px; text-align:center;background-color:transparent;border:none;color:white;" type="text" value="<?php echo @$_SESSION['name']; ?>">
                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="mx-2">
             
                <button class="btn btn-danger"><a href="logout.php" class="text-white">logout</a></button>

            </div>
        </div>
    </nav>

    

    <!--sign-in Modal -->
    <div class="modal fade" id="sign-inModal" tabindex="-1" aria-labelledby="sign-inModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sign-inModalLabel">Sign in</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="check.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name='lid'
                                aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name='lp'>
                            
                        </div>

                        <button type="submit" class="btn btn-primary" name='ls' >Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#signupModal">New costomer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <!-- singupModal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="check.php" method="POST">

                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Enter name" name="n">
                            </div>
                        </div>
                        <br>
                        <div class="phone-no">
                            <input type="text" class="form-control" placeholder="Enter phone no" name="ph">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="id"
                                aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Conform Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="p">
                        </div>
                        <button type="submit" class="btn btn-primary" name="s">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <?php
include"connection.php";
$query="select *from bill where cid='".$_SESSION['name']."'";
$sq=mysqli_query($cn,$query);
if($sq)
{
    if(mysqli_fetch_array($sq)>0)
	{
		$sq=mysqli_query($cn,$query);
		echo '<table border="2"> <tr bgcolor="cyan">
		<th> bid </th><th> cid </th> <th> pid </th> <th> price </th><th> quantity </th> 
		<th> amt </th> 
		</tr>';
		while($r=mysqli_fetch_array($sq))
		{
		
			echo'<tr><th>	'.$r['bid'].'</th>
						<th>	'.$r['cid'].'</th>
						<th>	'.$r['pid'].'</th>
						<th>	'.$r['price'].'</th>
						<th>	'.$r['quantity'].'</th>
						<th>	'.$r['amt'].'</th>
			
			</tr>';
		}
		echo'</table>';
	}
	else
	{
		echo '<h1> no user found </h1>';
	}
}
else {
    echo '<br>'.mysqli_error($cn);
}

?>

</div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row text-white" style="background-color: black;">
            <div class="col-12 col-md">
                <img class="mb-2" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                <small class="d-block mb-3 text-muted">© 2017-2020</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>
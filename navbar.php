
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <a class="navbar-brand text-white" href="index.php">Quick Shoping</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="pantry.php">Pantry <span class="sr-only">(current)</span></a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link text-white" href="bakery.php">Bakery
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="contact.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        contact
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="contact.php">contact</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="user-bill.php">Bill</a>

                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" style="width: 120px; text-align:center;background-color:transparent;border:none;color:white;" type="text" value="<?php echo @$_SESSION['name']; ?>">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="mx-2">
                <?php
                if(!isset($_SESSION['name']))
                {
                echo'<button class="btn btn-danger" data-toggle="modal" data-target="#sign-inModal">
                    Sign in</button>';
                } 
                  
                ?>
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
                            <input type="email" class="form-control" id="exampleInputEmail1" name='lid' aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name='lp'>

                        </div>

                        <button type="submit" class="btn btn-primary" name='ls'>Submit</button>
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
                            <input type="text" maxlength="10" class="form-control" placeholder="Enter phone no" name="ph">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
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
                </div>
            </div>
        </div>
    </div>
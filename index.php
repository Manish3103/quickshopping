<?php session_start(); 
// if(isset($_SESSION['name']))
// {
// header("location:index.php");
// }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
    <title>Hello, world!</title>
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="istyle.css">



</head>

<body>
  <?php include 'navbar.php' ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="slider\bakery.jfif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cake</h5>
                    <p>We serve fresh every day</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="slider\pantry.jfif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pantry product</h5>
                    <p>The best online grocery store in India. Quick-shoping is an online supermarket for all your daily needs.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="slider\3.jfif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cosmetic product</h5>
                    <p> Shop for Beauty products online at best prices in India. </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12">
                <img src="3product-style\21brand.jfif" CLASS="my-5 p-4" width="30%" height="550px" alt="...">
                <img src="3product-style\22brand.jfif" CLASS="my-5 p-4" width="30%" height="550px" alt="...">
                <img src="3product-style\23brand.jfif" CLASS="my-5 p-4" width="30%" height="550px" alt="...">

            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 my-5">
        <div class="col mb-4 my-5">
            <div class="card">
                <img src="discount-product\1.jpg" class="card-img-top" alt="...">

            </div>
        </div>
        <div class="col mb-4 my-5">
            <div class="card">
                <img src="discount-product\2.jpg" class="card-img-top" alt="...">

            </div>
        </div>

    </div>



    <div class="container my-5">
    <div class="col-md-12 .auto">
    <h3 CLASS="my-5" style="text-align:center; color:red;">  EVERYDAY SELL </h3>
    </div>
        <div class="row row-cols-1 row-cols-md-4">

            <?php
            include "connection.php";
            $query = "select *from product where product_type='sell'";
            $sq = mysqli_query($cn, $query);
            if ($sq) {
                if (mysqli_fetch_array($sq) > 0) {
                    $sq = mysqli_query($cn, $query);
                    while ($r = mysqli_fetch_array($sq)) {
            ?>
                        <div class="col mb-4">
                            <a href="product-detail.php?pid=<?php echo $r['pid']; ?>">
                                <div class="card h-100">
                                    <img src="<?php echo $r['Photo']; ?>" class="card-img-top" alt="..." style="height:180px">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $r['Product_name']; ?></h5>
                                        <h5 class="card-title"><?php echo $r['Price']; ?></h5>
                                        <p class="card-text"><?php echo $r['product_detail']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

            <?php
                    }
                } else {
                    echo 'no reocord found';
                }
            } else {
                echo '<br>' . mysqli_error($cn);
            }
            ?>
        </div>
    </div>


    <hr>
    
    <div class="fluid-container">
        <div class="container"><h2 style="text-align:center;">Bakery</h2></div>
        <div class="cake" id="main-content">
            <?php
            include "connection.php";
            $query = "select *from product where product_type='bakery'";
            $sq = mysqli_query($cn, $query);
            if ($sq) {
                if (mysqli_fetch_array($sq) > 0) {
                    $sq = mysqli_query($cn, $query);
                    while ($r = mysqli_fetch_array($sq)) {
            ?>
              <a href="product-detail.php?pid=<?php echo $r['pid']; ?>">
                        <div class="m-con">
                            <img src="<?php echo $r['Photo']; ?>" alt="no load">
                            <div class="text">
                                <span>
                                    <h3><?php echo $r['Product_name']; ?></h3>
                                    <h2><?php echo $r['Price']; ?></h2>
                                </span>
                            </div>
                        </div>
                    </a>
            <?php
                    }
                } else {
                    echo 'no reocord found';
                }
            } else {
                echo '<br>' . mysqli_error($cn);
            }
            ?>
        </div>
    </div>
    </hr>

    <hr>
    
    <div class="fluid-container">
        <div class="container"><h2 style="text-align:center;">pantry</h2></div>
        <div class="cake" id="main-content">
            <?php
            include "connection.php";
            $query = "select *from product where product_type='genral'";
            $sq = mysqli_query($cn, $query);
            if ($sq) {
                if (mysqli_fetch_array($sq) > 0) {
                    $sq = mysqli_query($cn, $query);
                    while ($r = mysqli_fetch_array($sq)) {
            ?>
              <a href="product-detail.php?pid=<?php echo $r['pid']; ?>">
                        <div class="m-con">
                            <img src="<?php echo $r['Photo']; ?>" alt="no load">
                            <div class="text">
                                <span>
                                    <h3><?php echo $r['Product_name']; ?></h3>
                                    <h2><?php echo $r['Price']; ?></h2>
                                </span>
                            </div>
                        </div>
                    </a>
            <?php
                    }
                } else {
                    echo 'no reocord found';
                }
            } else {
                echo '<br>' . mysqli_error($cn);
            }
            ?>
        </div>
    </div>
    </hr>
   
    

   <?php include 'footer.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- 
      <script src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
-->
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>


 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

    <script>
        $('.cake').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>

</body>

</html>

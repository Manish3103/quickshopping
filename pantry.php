<?php session_start();?>
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
<?php include 'navbar.php'?>

<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        
        <?php
                include "connection.php";
                $query = "select *from product where product_type='genral'";
                $sq = mysqli_query($cn, $query);
                if ($sq) {
                    if (mysqli_fetch_array($sq) > 0) {
                        $sq = mysqli_query($cn, $query);
                        while ($r = mysqli_fetch_array($sq)) {
        ?>
                <div class="col" >
                    <a href="product-detail.php?pid=<?php echo $r['pid']; ?>">
                            <div class="card">
                                <img src="<?php echo $r['Photo']; ?>" alt="no load" style="height:220px">
                                <div class="card-body">
                                <h5 class="card-title"><?php echo $r['Product_name'];?></h5>
                                                    <h5 class="card-title"><?php echo $r['Price'];?></h5>
                                                    <p class="card-text"><?php echo $r['product_detail'];?></p>
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


   <?php include 'footer.php' ?>
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
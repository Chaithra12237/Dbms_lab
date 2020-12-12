<?php
ob_start();
session_start();
include 'db.php';
/*if($_SESSION['b_id']){
     echo"";
}   */  
$b_id = $_GET['b_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <header>
       <div class="container p-md-0">
            <div class="row">
                <div class="col-12">
                    <img src="images/hotelbooking.jpg" alt="logo" class="img-fluid imglogo">
                </div>
            </div>
       </div>
    </header>
    <section>
        <div class="container bg_sec rounded mb-5">
            <div class="row">
                <div class="col-12">             
                    <div class="text_clr p-4">
                    
                        <hr class="bg-secondary">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Payment details</label>
                    
                            </div>
                            <div class="form-group">
                                <label>Card number</label>
                                <input type="number" class="form-control" name="card_num" required>
                            </div>
                            <div class="form-group">
                                <label>cvc :</label>
                                <input type="number" class="form-control" name="cvc"required>
                            </div>
                            <div class="form-group">
                                <label>Expiration date:</label>
                                <input type="date" class="form-control" name="exp" required>
                            </div>

           

                            <a href="index.php"><span class="text-primary">Back To Home</span></a>
                            <button class="btn btn-primary float-right" type="submit" name="book">Book Now</button>
                            <p id="demo"></p>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
if(isset($_POST['book'])){

    $card_num=$_POST['card_num'];
    $cvc=$_POST['cvc'];
    $exp=$_POST['exp'];
    $qry1="INSERT INTO `payments`(`card_number`,`b_id`, `cvc`, `expiration`) VALUES('$card_num','$b_id','$cvc','$exp');";
    $run=mysqli_query($conn,$qry1);
    $b_id=$_GET['b_id'];
    
    if(!$run){
        ?><script>document.getElementById("demo").innerHTML = "Booking is not Done";</script>
        <?php
    }
    else{


       echo "<script> alert('Your Booking id is:$b_id');</script>";
        }
    }

?>
 

    <script src="jquery-3.5.1.slim.min.js"></script>
<script src="popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
include('db.php');
$type=$_GET['roomtype'];

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
                        <h3 class="text-center">Book Now: <?php echo $type; ?></h3>
                        <hr class="bg-secondary">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Check In :</label>
                                <input type="date" class="form-control" name="in" required>
                            </div>
                            <div class="form-group">
                                <label>Check Out :</label>
                                <input type="date" class="form-control" name="out" required>
                            </div>
                            <div class="form-group">
                                <label>Enter Your Full Name :</label>
                                <input type="text" class="form-control" name="name"required>
                            </div>
                            <div class="form-group">
                                <label>Enter Your Phone Number :</label>
                                <input type="tel" class="form-control" name="phone" required minlength="9" maxlength="13">
                            </div>      
           
           <button class="btn btn-primary float-right" type="submit"  name="payment">Go to payment</button>
<!-- onclick="document.location='payment.php'" -->
                            <a href="index.php"><span class="text-primary">Back To Home</span></a>
                            
                            <p id="demo"></p>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
if(isset($_REQUEST['payment'])){
    $in=$_POST['in'];
    $out=$_POST['out'];
    $fname=$_POST['name'];
    $tel=$_POST['phone'];
    $qry="INSERT INTO `book`(`category`, `checkin`, `checkout`, `name`, `phone`, `status`) VALUES ('$type','$in','$out','$fname','$tel','True');";
    
    $run=mysqli_query($conn,$qry);
    if(!$run){ ?>
        <script>document.getElementById("demo").innerHTML = "Add is not Done";</script>
<?php
    }
    else{ ?>
        
        <script>document.getElementById("demo").innerHTML = "Add is successful";
        </script>
<?php

        $select_query = "SELECT * FROM `book` WHERE `name`='$fname' AND `phone`='$tel'";
        $query = mysqli_query($conn,$select_query);
        if(!$query){
            echo 'No Records';
        }else{
            while($row=mysqli_fetch_assoc($query)){
                $b_id=$row['b_id'];
            }
        }
        
    header("Location: payment.php?b_id=$b_id&type=$type");
    }

    
} ?>

    <script src="jquery-3.5.1.slim.min.js"></script>
<script src="popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
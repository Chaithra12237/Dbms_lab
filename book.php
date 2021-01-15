<?php
include('db.php');
$type=$_GET['roomtype'];
$in=$_GET['in'];
$out=$_GET['out'];
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
                        <h3 class="text-center">Book Now: </h3>
                        <hr class="bg-secondary">
                        <form action="" method="post">
                            
                            <div class="form-group">
                                <label>Enter Your Full Name :</label>
                                <input type="text" class="form-control" name="name"required>
                            </div>
                            <div class="form-group">
                                <label>Enter Your Phone Number :</label>
                                <input type="tel" class="form-control" name="phone" required minlength="10" maxlength="13">
                            </div>   
                            <div class="form-group">
                                <label>Enter Your email  :</label>
                                <input type="email" class="form-control" name="email"required>

                            </div>
                            <div class="form-group">
                                <label>Enter Your Address :</label>
                                <textarea class="form-control" name="address" rows="4" cols="5"required></textarea>
                            </div>   
                            <div class="form-group">
                                <label>Enter Number of rooms :</label>
                                <input type="text" class="form-control" name="room" required>
                            </div>  
           
           <button class="btn btn-primary float-right" type="submit"  name="book"> Book & Go to payment</button>

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
if(isset($_REQUEST['book'])){
    $fname=$_POST['name'];
    $tel=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $room=$_POST['room'];

    
    $qry="INSERT INTO `book`(`category`, `name`,`checkin`,`checkout`,`phone`,`email`,`address`, `room`, `status`) VALUES ('$type','$fname','$in','$out','$tel','$email','$address','$room','True');";
    
    $run=mysqli_query($conn,$qry);
    if(!$run){ ?>
        <script>document.getElementById("demo").innerHTML = "Booking is not Done";</script>
<?php
    }
    else{//<script>document.getElementById("demo").innerHTML = "Booking is successful";
        //</script> 
        ?>
        
        
        }

        <?php
        $select= "SELECT `numroom` FROM `add_room` where roomtype='$type'";
        
        
        $run=mysqli_query($conn,$select);
        while($row=mysqli_fetch_assoc($run)){
            $numroom=$row['numroom'];}
        if($run){
            if($numroom<$room)
            {
                echo "<script> alert('$room rooms not available');</script>";
            
            }
            else
            {
                $qry="UPDATE `add_room` SET `numroom`=$numroom-$room where roomtype='$type'" ;
               $runs=mysqli_query($conn,$qry);
            
        
        ?>
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

    }}
}?>


    <script src="jquery-3.5.1.slim.min.js"></script>
<script src="popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
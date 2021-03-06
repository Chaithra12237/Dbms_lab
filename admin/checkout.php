<?php
        include('../db.php');
        session_start();
        if($_SESSION['id']){
             echo "";
        }
        else
        {
            header('location:admin-login.php');
        }        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>
    <header class="mx-lg-5 mx-md-4">       
        <img src="../images/hotelbooking.jpg" alt="logo" class="img-fluid imglogo">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md pt-0">
            <button class="navbar-toggler" type="button"data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    
                    <li class="navbar-item active">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
            <div class="social">
                <a class="pr-3" href="facebook.com"><img src="../images/facebook.png" alt=""></a>
                <a href="facebook.com" class="pr-3"><img src="../images/twitter.png" alt=""></a>
                <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>

            </div>
        </nav>
    </header>
    <section>
        <div class="container mb-5">
            <?php
            $date=date("Y-m-d");
                $qry="SELECT * FROM `book` WHERE `checkout`= '$date'";
                $run=mysqli_query($conn,$qry);
                if(mysqli_num_rows($run)>0){
                    while($data=mysqli_fetch_assoc($run)){
                        ?><div class="row mt-3">
                    <div class="col-9">
                        <div class="bg p-4 rounded width_cont">
                        <h5 class="text_clr"><?php echo $data['category'];?></h5>
                            <hr class="bg-white">
                            <div class="content">
                                <p>Check In: <?php echo $data['checkin'];?></p>
                                <p>Check Out: <?php echo $data['checkout'];?></p>
                                <p>Name: <?php echo $data['name'];?></p>
                                <p>Category: <?php echo $data['category'];?></p>
                                <p>Phone No.: <?php echo $data['phone'];?></p>
                                <p>No. of room: <?php echo $data['room'];?></p>

                                <p>Booking Condition: <?php echo $data['status'];?></p>
                            </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                        <a href="checkout.php?check=<?php echo $data['category']; ?>&room=<?php echo $data['room'];?>&b_id=<?php echo $data['b_id']; ?>" class="btn btn-primary ">Checkout</a>
                        </div>
                    
                    </div>
                  <?php  }
                }
                else{
                    echo "No Rooms";
                }?>
                    <?php
                    if(isset($_GET['check'])){
                        $category=$_GET['check'];
                        $room=$_GET['room'];
                        $b_id=$_GET['b_id'];
                        echo $category;
                        $select= "SELECT `numroom` FROM `add_room` where `roomtype`='$category'";
                        $run=mysqli_query($conn,$select);
                        while($row=mysqli_fetch_assoc($run)){
                            $numroom=$row['numroom'];}
                        if($run){
                    
                            $qry="UPDATE `add_room` SET `numroom`=$numroom+$room where `roomtype`='$category'" ;
                            $runs=mysqli_query($conn,$qry);
                            if($runs){
                            
                                $qry1="DELETE FROM `book` WHERE `b_id`='$b_id' ";
                                $run1=mysqli_query($conn,$qry1);
                                if($run1){
                                    header('location:checkout.php');
                                }
                                
                            }
                        

                    }
                }
                    ?>
                            <?php
                        

            ?>
        </div>
    </section>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
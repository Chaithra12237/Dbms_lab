<?php
ob_start();
session_start();
include 'db.php';
/*if($_SESSION['b_id']){
     echo"";
}   */  
$b_id = $_GET['b_id'];
$type =$_GET['type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#dt').change(function(){
			
				if($('#dt').val()<"<?php echo date('Y-m-d'); ?>"){ 
					alert('Invalid Date');
					$('#dt').val('');
				}
				});
    
    }); 
</script>
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
                                <label>Name on Card:</label>
                                <input type="text" class="form-control" name="names" required>
                            </div>
                            <div class="form-group">
                                <label>Card number</label>
                                <input type="tel" class="form-control" name="card_num" required minlength="16" maxlength="16">
                            </div>
                            <div class="form-group">
                                <label>cvc :</label>
                                <input type="tel" class="form-control" name="cvc"required minlength="3" maxlength="3">
                            </div>
                            <div class="form-group">
                                <label>Expiration date:</label>
                                <input type="date" class="form-control" name="exp" id="dt" required>
                            </div>
                            
           

                            <a href="index.php"><span class="text-primary">Back To Home</span></a>&nbsp; &nbsp;
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
    $name=$_POST['names'];
    $card_num=$_POST['card_num'];
    $cvc=$_POST['cvc'];
    $exp=$_POST['exp'];
    $qry1="INSERT INTO `payments`(`names`,`card_number`,`b_id`, `cvc`, `expiration`) VALUES('$name','$card_num','$b_id','$cvc','$exp');";
    $run=mysqli_query($conn,$qry1);
    $b_id=$_GET['b_id'];
    
    if(!$run){
        ?><script>document.getElementById("demo").innerHTML = "Booking is not Done";</script>
        <?php
    }
    else{

        header("Location: print_app.php?b_id=$b_id&type=$type");
       //echo "<script> alert('Your Booking id is:$b_id');</script>";
        }
    }

?>
 

    <script src="jquery-3.5.1.slim.min.js"></script>
<script src="popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
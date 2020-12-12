<?php
ob_start();
session_start();
include 'db.php';
/*if($_SESSION['b_id']){
     echo"";
}   */  
//$b_id = $_GET['b_id'];
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
                                <label>Cancel booking</label>
                    
                            </div>
                            <div class="form-group">
                                <label>Enter your booking id</label>
                                <input type="number" class="form-control" name="b_id" required>
                            </div>
                            
                            <a href="index.php"><span class="text-primary">Back To Home</span></a>
                            <button class="btn btn-primary float-right" type="submit" name="delete">Cancel</button>
                            <p id="demo"></p>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
if(isset($_POST['delete'])){
    $b_id=$_POST['b_id'];
$qry="DELETE FROM `book` WHERE `b_id`='$b_id'";
$run=mysqli_query($conn,$qry);
if(!$run){
    ?><script>document.getElementById("demo").innerHTML = "Update is not Done";</script><?php
 }
else{
    ?><script>document.getElementById("demo").innerHTML = "Update is successful";
    //window.open('editbook.php','_self')
    </script>
    <?php
}
}

?>
 

    <script src="jquery-3.5.1.slim.min.js"></script>
<script src="popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
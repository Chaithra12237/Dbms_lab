
<?php session_start();
?>
<?php 
include('db.php');
$b_id=$_GET['b_id'];
$type=$_GET['type'];
?>

<style>
.pro-div{
    margin-left:100px;
    margin-top:0px;
  width:100%;
   height:90%;
   padding:50px;
   padding-top:150px;
   text-align:center;
}

.newtable{
margin-left:20px;
margin-right:20px;
}
.newtable td{
color:black;
}
.se{
	margin-left:20px;
color:black;
}
h1{
  color:#2E4053;
  font-weight:bold;
  text-shadow:black 5px;
  margin-left:0px;
}
.div-main{
	float:center;
  
 
   border-radius: 12px;
   margin-top:0px;
   margin-left:300px;
   width:60%;
   padding:50px;
   height:500px;
   color:black;
  
   
}
.pat-div{
    margin-bottom:20px;
    margin-left:200px;
    margin-top:20px;
}
.pat{
    margin-top:50px;
}
table td,tr{
  font-size:20px;
}
.t{
  border-color:blue;
  border-radius:12px;
  padding:30px 60px;
 
  text-decoration: none;
  color:black;
  
}
.t:hover{
 
  cursor: pointer;
}
a{
  text-decoration: none;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<div class="pro-div">
<?php

    //$b_id = $_GET['b__id'];

    //$ar=mysqli_query( "SELECT * FROM book  WHERE b_id=$b_id");
    



  ?>

<div class="div-main">
<form method="post" >



		<table >
        <?php  
        $b_id= $_GET['b_id'];
        $q="SELECT * FROM  `book` WHERE `b_id`=$b_id";
        $fetch = mysqli_query($conn,$q);
        while($qw = mysqli_fetch_assoc($fetch))
        { ?>
          
			
			
     
      <tr>
      <th><div class="pat-div">  <u>Booking_Details</u></th><th></div></th>
      </tr>
      <tr><td></td></tr>
     <div class="pat"> <tr>
     
     <th>Booking id :</th>
     <td><?php  echo $qw['b_id']; ?></td>
     </tr>
    <th>Name :</th>
     <td ><?php  echo $qw[ 'name'];?> </td>
     </tr>
     <tr>
     <th>Category :</th>
     <td><?php  echo $qw['category']; ?></td>
     </tr>
     <tr>
     <th>No: of Room :</th>
     <td><?php  echo $qw['room']; ?></td>
     </tr>
     <tr>
     <th>Contact :</th>
              <td ><?php  echo $qw['address'].'  <br>  '.$qw['email'].'  <br>  '.$qw['phone']; ?> </td>
              </tr>
     <tr>
              <th>checkout Date :</th>
              <?php $sr=date('d-m-Y',strtotime($qw['checkout'])); ?>
                        <td ><?php  echo $sr;?> </td>
                        </tr>
                        <tr>
                        <th>Checkin date:</th>
                        <?php $tr=date('d-m-Y',strtotime($qw['checkin'])); ?>
 			        	<td ><?php  echo $tr;?>  </td>
               </tr>
     <tr>
     
     <?php  
        $type= $_GET['type'];
        $qry="SELECT * FROM  `add_room` WHERE `roomtype`='$type'";
        $fetch1 = mysqli_query($conn,$qry);
        while($row = mysqli_fetch_assoc($fetch1))
        { ?> 
<tr>
     <th>Paid :</th>
     <td><?php  echo $row['price']*$qw['room']; ?></td>
     </tr>
<?php } ?> 

<tr>
  <td><a href="index.php"><label class="t">CANCEL</label></a>
  
</td>
<td><button class="t" onclick="window.print()" >PRINT</button></td>
</tr>
<?php } ?> 


        

		
		</table>
	</form>
    </div>
</div>

</div>



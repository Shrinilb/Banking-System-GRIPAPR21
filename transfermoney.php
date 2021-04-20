<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/userstyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

.navbar
{
    width:100%;
    white-space:nowrap;
    background-color: #800033;
}
a:hover:not(.active) {
  background-color:   #4d001f;
}

.main_div
{
    width:100%;
    height:100vh;
    background-image:linear-gradient(to left, #800033,#b30047,#e6005c,#ff1a75,#ff4d94,#ff80b3);
 
}
   input
  {
      margin-top:10px;
      width:230px;
      height:40px;
      border-radius:5px;
      outline:none;
  }
 ::placeholder
 {
     padding:10px;
     color:black;
 }
button
{
    color:#800033;
    background:white;
    border-color:#800033;
   padding: 14px 20px;
  cursor: pointer;
  width: 100%;
    
}
button:hover
 {
     color:white;
     background:#4CAF50;
     border:none;
     opacity:0.8;
 }


 </style>
</head>
<body>
<div class="main_div">
 
     <div class="navbar navbar-expand-md">
   
      <a href="#" class="navbar-brand font-weight-bold text-white text-center">BANK</a>
      <button class="navbar-toggler text-white " type="button" data-toggle="collapse" data-target="#collapsenavbar">
      <span class="navbar-toggler-icon" style="background:white;"></span>
      </button>
     
       <div class="collapse navbar-collapse text-center" id="collapsenavbar">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a href="index.php" class="nav-link text-white">HOME</a></li>
              <li class="nav-item">
                  <a href="viewcustomers.php" class="nav-link text-white">CUSTOMER DETAILS</a></li>
              <li class="nav-item">
                  <a href="transfermoney" class="nav-link text-white"></a></li>
              <li class="nav-item">
                  <a href="#" class="nav-link text-white"></a></li>    
               </ul>
        </div>
     </div>


     <div class="container">
        <div class="row">

          <div class="col-sm-4">
              <div class="card text-center" style="margin-top:76px;background-color:#800033;border-radius:10px;color:white" >
              <form method="POST">  
                                              
 <?php
include 'connection.php';
$ids=$_GET['idtransfer'];
$showquery="select * from `users` where id=($ids) ";
$showdata=mysqli_query($con,$showquery);
if (!$showdata) {
  printf("Error: %s\n", mysqli_error($con));
  exit();
}
$arrdata=mysqli_fetch_array($showdata);

?> 
                     
                    <div class="card-body">
                     
                    <h3>SENDER DETAILS</h3>
                  

                        <img src="10.png" style="width:150px;height:90px;"><br>
                        <label>NAME</label>
                        <input type="text"  name="name1" value="<?php echo $arrdata['name']; ?>" required placeholder="ENTER THE NAME"/><br><br>
                        <label>EMAIL</label>
                        <input type="text" name="email1" value="<?php echo $arrdata['email']; ?>" required placeholder="ENTER THE EMAIL-ID"/><br><br>
                        <label>AMOUNT</label>
                        <input type="text" name="amount1" value="" style="width:210px;" required placeholder="ENTER THE AMOUNT"/><br><br>
                        
                    </div>

               </div>
          </div>
           
          <div class="col-sm-4">
              <div class="card text-center" style="margin-top:77px;height:380px;">
                   <div class="card-body">
                   <img src="6.png" style="width:250px;height:220px;margin-top:40px;">
                   <button  name="submit">PROCEED TO PAY</button>
                  </div>
             </div>
          </div>

          <div class="col-sm-4">
                <div class="card text-center" style="margin-top:76px;background-color:#800033;border-radius:10px;color:white">
                   
                   <div class="card-body">
                   <h3>RECEIVER DETAILS</h3>
                        <img src="10.png" style="width:150px;height:90px;"><br>
                        <label>NAME</label>
                        <input type="text"  name="name2" value="" required placeholder="ENTER THE NAME"/><br><br>
                        <label>EMAIL</label>
                        <input type="text" name="email2" value="" required placeholder="ENTER THE EMAIL-ID"/><br><br>
                   
                 
                    
                   </div>

               </div>
          </div>

       </div>
       
    </div>
</div>
</form> 
<?php

include 'connection.php';

if(isset($_POST['submit']))
{
    
  
    $Sender_name=$_POST['name1'];
    $Sender_email=$_POST['email1'];
    $Sender=$_POST['amount1'];
    $Receiver_name=$_POST['name2'];
    $Receiver_email=$_POST['email2'];
     
  

    $ids=$_GET['idtransfer'];
    $senderquery="select * from `users` where id=$ids ";
    $senderdata=mysqli_query($con,$senderquery);
  
    if (!$senderdata) {
     printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $arrdata=mysqli_fetch_array($senderdata);

    //receiverquery
    $receiverquery="select * from `users` where email='$Receiver_email' ";
    $receiver_data=mysqli_query($con,$receiverquery);
   
    if (!$receiver_data) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $receiver_arr=mysqli_fetch_array($receiver_data);
    $id_receiver=$receiver_arr['id'];


    if($arrdata['balance'] >= $Sender)
    {
      $decrease_sender=$arrdata['balance'] - $Sender;
      $increase_receiver=$receiver_arr['balance'] + $Sender;
       $query="UPDATE `users` SET `id`=$ids,`balance`= $decrease_sender  where `id`=$ids ";
       $rec_query="UPDATE`users` SET `id`=$id_receiver,`balance`= $increase_receiver where  `id`=$id_receiver ";
       $res= mysqli_query($con,$query);
       $rec_res= mysqli_query($con,$rec_query);
      // $res_receiver=mysqli_query($con,$query_receiver);
       if($res && $rec_res)
      {
       ?>
       <script>
       swal("Done!", "Transaction Successful!", "success");
        </script> 
    
      <?php
   
      }
      else
      {
      ?>
           <script>
       swal("Error!", "Error Occured!", "error");
        </script> 

      <?php
      
      }
    }
  

  else
 {
  ?>
    <script>
       swal("Insufficient Balance", "Transaction Not  Successful!", "warning");
        </script> 
  <?php
   
 }
 
}
?>





</body>
</html>
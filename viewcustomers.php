<html>
<head>
<title></title>
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
    height:100%;
    background-image:linear-gradient(to left, #800033,#b30047,#e6005c,#ff1a75,#ff4d94,#ff80b3);
   
}
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
   
}
.display_table
{
    width:1250px;
    height:0px;
    display:flex;
    flex-direction:column;
    justify-content: center;
    text-align:center;
}
.center_div
{
    background-size:100%;
    padding:10px 0 0 0;
    box-shadow:0 10px 20px 0 rgba(0,0,0,0.03);
    border-radius:10px;
    margin-left:50px;
    margin-top:-560px;
}
h1
{
    text-decoration: underline;
    font-family: "Lucida Console", "Courier New", monospace;
    font-size:18px;
    color: #ffffff;
    text-align:center;
    margin-top:-20px;
    margin-bottom:20px;
}
table
{
    border-collapse:collapse;
    background-color:black;
    box-shadow:0 10px 20px 0 rgba(0,0,0,0.03);
    border-radius: 5px;
    border-collapse:collapse;
    table-layout:fixed;
    opacity:0.7;
    color: #ffffff;
    font-weight:bold;
    margin:auto;
}
th,td
{
  border:1px solid  #ffffff;
  border-collapse: collapse;
  font-family: Arial, Helvetica, sans-serif;
  padding:8px 30px;
  text-align:center;
  opacity:0.9;
  color: #ffffff ; 
}
th{
    text-transform:uppercase;
    font-weight:500;
}
td
{
    font-size:13px;
}
tr:hover {background-color:#ff80b3;}


</style>
</head>
<body>
<div class="main_div">
 
     <div class="navbar navbar-expand-md">
   
      <a href="#" class="navbar-brand font-weight-bold text-white text-center">VIA BANK</a>
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
                  <a href="viewcustomers.php" class="nav-link text-white"></a></li>
              <li class="nav-item">
                  <a href="#" class="nav-link text-white">REACH US</a></li>    
               </ul>
        </div>
     </div>
     <img src="14.png" class="img-fluid" width="150" height="105" margin="10px"><br><br><br>
     <img src="15.png" class="img-fluid" width="150" height="105" margin="10px"><br><br><br>
     <img src="16.png" class="img-fluid" width="150" height="105" margin="10px">
           
          <div class="display_table">
                 <div class="center_div">
                <div class="table-responsive">
                    <table>
                    <thead>
                     <tr>
                     <th>ID</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                       <th>BALANCE</th>
                    
                      <th colspan="2">TRANSFER</th>
                    </tr>
                    </thead>
                   <tbody>
                  </div>
                  
          <?php
          include 'connection.php';
          $selectquery = "select * from users";
          $query = mysqli_query($con,$selectquery);
          $numofrows = mysqli_num_rows($query);

           while($res = mysqli_fetch_array($query))
          {
            ?>
               <tr>
               <td><?php  echo $res['id']; ?></td>
               <td><?php echo $res['name']; ?></td>
               <td><?php echo $res['email']; ?></td>
               <td><?php echo $res['balance']; ?></td>
              <td><a href="transfermoney.php?idtransfer=<?php  echo $res['id']; ?>" ><img src="13.png" style="width:20px;height:20px;"></a></td>
               </tr>
             <?php
          }
           ?>


</tbody>
</table>
</div>

</div>

</div>
 </div>

</body>
</html>


    




















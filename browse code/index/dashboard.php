<?php
    session_start();
    $AdminName = $_SESSION['AdminName'];
?>
<?php
$con=mysqli_connect("localhost", "root", "", "career");
    if(mysqli_connect_error()){
        echo "cannot conncet";
    }
$tableName = "register";

// Count the records
$sql = "SELECT COUNT(*) FROM $tableName";
$result = mysqli_query($con, $sql);

// Get the count (assuming a single row returned)
$rowCount = mysqli_fetch_row($result)[0];
?>
<?php
$tableName = "contact";

// Count the records
$sql = "SELECT COUNT(*) FROM $tableName";
$result = mysqli_query($con, $sql);

// Get the count (assuming a single row returned)
$rowcount = mysqli_fetch_row($result)[0];
?>
<?php
$tableName = "jobCompany";

// Count the records
$sql = "SELECT COUNT(*) FROM $tableName";
$result = mysqli_query($con, $sql);

// Get the count (assuming a single row returned)
$count = mysqli_fetch_row($result)[0];
?>
<?php
$tableName = "adminLogin";

// Count the records
$sql = "SELECT COUNT(*) FROM $tableName";
$result = mysqli_query($con, $sql);

// Get the count (assuming a single row returned)
$rows = mysqli_fetch_row($result)[0];
?>
<!DOCTYPE html>
<html ng-app="myMod">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            font-family:'Helvetica Neue';
            margin: 0;
            padding: 0;
            background: rgb(213, 223, 242);
            background: linear-gradient(to bottom rights rgba(223, 233, 254, 0.677) 6%,rgba(62,78,96,1) 100%);
            background-size: 100% ;
            background-repeat: no-repeat;
            background-position: cover;
            backdrop-filter: blur(15px);
        }
        .col-3 {
             height: 660px;
             position: fixed;
             top: 0;
             left: 0;
             background-color: #1f3245;
             padding-top: 15px;
             text-align: center;
             list-style-type: none;
             color:white;
             width:300px;
        }
        .adminname{
            color: #ffff00;
            text-align: center;
            margin-bottom: 30px;
            font-size:40px;
        }
        .col-3 ul {
            list-style-type: none;
            padding: 0px;
            font-size: 22px;
            
        }
        .col-3 ul li {
            padding: 9px;
            text-align: center;
        }
        .col-3 ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }
        .col-3 ul li a:hover {
            background-color: rgb(213, 223, 242);
            padding: 2px;
            color:#1f3245;
        }
        #content {
            margin-left: 230px;
            padding: 20px;
        }
        hr{
            width:220px;
        }
        .custom-btn {
            width: 100px;
            height: 40px;
            color:#1f3245 ;
            border-radius: 5px;
            padding: 10px 25px;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            outline: none;
            filter: drop-shadow(2px 2px 1px rgb(22, 21, 25));
            text-align:center;
        }
        .btn-2 {
            background: #ffff00;
            background: linear-gradient(0deg, #ffff00 0%, #ffff00 100%);
            border: none;
        }
        .btn-2:before {
            height: 0%;
            width: 2px;  
        }
        .adpic{
            width: 180px;
            height: 150px;
            filter: drop-shadow(5px 5px 2px rgb(22, 21, 25));
            margin-top: -25px;
        }
        span{
            font-size:20px;
        }
        .ill1{
          width:300px;
          height:300px;
          margin-left:640px;
          margin-top:-280px;
        }
        .hr{
          color:#1f3245;
          width:970px;
          height:20px;
          margin-top:-8px;
        }
        .svg1{
          margin-top:-30px;
          filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
        }
        .svg2{
          margin-top:-20px;
          filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
        }
        .h3{
          margin-top:-20px;
        }
        .count{
            display: flex;
        }
        .register{
          width:200px;
          height:110px;
          background-color:#1f3245;
          border-radius:25px;
          color:white;
          text-align:center;
          margin-left:40px;
          filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
        }
        .contact{
          width:200px;
          height:110px;
          background-color:#1f3245;
          border-radius:25px;
          color:white;
          text-align:center;
          filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
        }
        .job{
          width:200px;
          height:110px;
          background-color:#1f3245;
          border-radius:25px;
          color:white;
          text-align:center;
          margin-left:40px;
          filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
        }
        .admin{
          width:200px;
          height:110px;
          background-color:yellow;
          border-radius:25px;
          color:#1f3245;
          text-align:center;
          filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
        }
        .ill2{
          width:500px;
          height:400px;
          margin-left:480px;
          margin-top:-330px;
          filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">  
      <div class="col-3">
        <!-- Navigation Links -->
        <h1 class="adminname"><?php echo $AdminName;?> <br> Here! &#128521;</h1><hr>
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link active" href="#" id="link1">Registered History</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#" id="link2">Contact Reached</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#" id="link3">Job/Company Info</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="link4">User Profile Data</a>
          </li> 
        </ul>
        <img class="adpic" src="img/Admin-cuate.png" alt=""><br>
              <a href="adminlogout.php"><button class="custom-btn btn-2" name="submit"><b>LOGOUT</b></button></a>
      </div>
      <div class="col-10" id="content">
        <h1>Dashboard handles  &#128075;</h1>
        <div class="adminlogo">
           <svg class="svg1" width="200" height="200" >
            <clipPath id="circleClip">
               <circle cx="100" cy="100" r="70" stroke="black"  stroke-width="3" />
            </clipPath>
             <image href="img\Afterclap.png" x="0" y="0" width="190" height="190" clip-path="url(#circleClip)" />
          </svg>
           <svg class="svg2" width="200" height="200">
            <clipPath id="circleClip">
               <circle cx="100" cy="100" r="70" stroke="black"  stroke-width="3"  />
            </clipPath>
             <image href="img\Afterclap-1.png" x="0" y="0" width="190" height="190" clip-path="url(#circleClip)" />
           </svg>
          <h3 class="h3"> &nbsp; &nbsp; &nbsp; &nbsp;Admin 1 &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;Admin 2</h3> 
        </div>
          <img class="ill1" src="img\dashpic.png" alt="">
          <hr class="hr">
        <div class="count">
          <div class="admin">
              <br>
                <h5> No.of Admin: <?php echo $rows; ?></h5>
                <h6>Curently using by: <br><?php echo $AdminName;?></h6>
            </div>
            <div class="register">
              <br>
                <h5> No.of Registers:</h5>
                <h1><?php echo $rowCount; ?> </h1>
            </div>
          </div>
          <br>
          <div class="count"> 
          <div class="contact">
              <br>
                <h5>Contact Reached:</h5>
                <h1><?php echo $rowcount; ?> </h1>
            </div>
            <div class="job">
              <br>
                <h5>Application Listed:</h5>
                <h1><?php echo $count; ?> </h1>
            </div>
            </div>
            <img  class="ill2" src="img\Statistics-rafiki (1).png" alt="">
      </div>
    </div>
  </div>

   <script>
    // JavaScript to load content using AJAX
    $(document).ready(function(){
      $("#link1").click(function(){
        loadContent("registerHistory.php");
      });
      $("#link2").click(function(){
        loadContent("contactReached.php");
      });
      $("#link3").click(function(){
        loadContent("jobData.php");
      });
      $("#link4").click(function(){
        loadContent("userData.php");
      });
    });

    function loadContent(url) {
        url = url + "?t=" + timestamp; // Append timestamp to URL as query string
        var timestamp = new Date().getTime(); // Get a unique timestamp
        console.log("Loading URL:", url);
        $.ajax({
  url: url,
  success: function(data){
    $("#content").html(data);
  },
  error: function(jqXHR, textStatus, errorThrown) {
    // Handle the error here
    $("#content").html("Error loading content.");
    console.error("Error:", textStatus, errorThrown); // Log specific error details
  }
});

    }
  </script>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
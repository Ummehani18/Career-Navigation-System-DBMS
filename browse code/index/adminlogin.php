<?php
session_start();
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $AdminName = $_POST['AdminName'];
    $AdminPassword = $_POST['AdminPassword'];
    $conn = new mysqli('localhost','root','','career');
     if ($conn->connect_error) {
         die('Connection Failed:' . $conn->connect_error);
     }
     $query = "SELECT * FROM adminLogin WHERE AdminName = '$AdminName' AND AdminPassword = '$AdminPassword'";
     $result = $conn->query($query);
     if($result->num_rows == 1){
      $_SESSION['AdminName'] = $AdminName;
      echo "<script>";
      echo "alert('Login successful!')";
      echo "</script>";
      header('location:dashboard.php');
     }
     else{
      echo "<script>";
      echo "alert('Invalid information provided')";
      echo "</script>";
     }
     $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-login</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
         body {
            font-family:  'Helvetica Neue';
            margin: 0;
            padding: 0;
            background: rgb(213, 223, 242);
            background: linear-gradient(to bottom rights rgba(223, 233, 254, 0.677) 6%,
             rgba(62,78,96,1) 100%);
            background-size: 100% ;
            background-repeat: no-repeat;
            background-position: cover;
            backdrop-filter: blur(15px);
        }
        .container{
            background: rgba(25, 15, 205, 0.53);
            border-radius: 16px;
            backdrop-filter: blur(15.8px);
            -webkit-backdrop-filter: blur(15.8px);
            border: 1px solid rgba(135, 32, 246, 0.49);
            width: 370px;
            height: 380px;
            padding: 20px;
            color: rgb(18, 17, 17);
            background-image: linear-gradient(to  bottom ,#25aae1,#9cbcf3,#04befe,#7dadf5);
            text-align: center;
            margin-left:550px ;
            font-size: 16px;
            margin-top: -240px;  
            filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));  
        }
        .input input{
            font-size: 22px;
            background-color: inherit;
            outline: none;
            border: none;
            border-bottom: 1px solid black;

        }
        ::placeholder{
            color: #6f8389;
            font-style: oblique;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }
        .input{
            font-size: 22px;
        }
        .container h3{
            font-size: 28px;
        }
        .bottom img{
            width: 150px;
            height: 100px;
            filter: none;
        }
        .custom-btn {
            width: 130px;
            height: 40px;
            color: #fff;
            border-radius: 5px;
            padding: 10px 25px;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            outline: none;
            filter: drop-shadow(2px 2px 1px rgb(22, 21, 25));
        }
        .btn-2 {
            background: #004dff;
            background: linear-gradient(0deg, #004dff 0%, #004dff 100%);
            border: none;
        }
        .btn-2:before {
            height: 0%;
            width: 2px;
            
        }
        img{
            width: 600px;
            height: 350px;
            margin-top: 50px;
        }
        .ill1{
            width: 400px;
            height: 270px;
            margin-left: 1040px;
            margin-top: -170px
        }
        .container img{
            width: 160px;
            height: 90px;
            filter: drop-shadow(5px 5px 2px rgb(22, 21, 25));
            margin-top: -25px;
        }
        .error{
          color:#ff0001;
          font-size:18px;
        }
        .input [Type="text"]
        {
           width: 260px; 
           border-bottom: 1px solid black;
           background-color: inherit;
        }
        .input [Type="password"]
        {
           width: 230px; 
           border-bottom: 1px solid black;
           background-color: inherit;
        }
        a{
            
            text-decoration: none;
        }
    </style>
</head>
<body>
    <img src="img/admin login.png" alt="">
    <div class="container">
        <h3>Sign in</h3><br>
        <img src="img/signup-illustration (5).png" alt=""><br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <div class="input">
               Name:
               <input type="text" name="AdminName" id="" placeholder="AdminName"><br><br>
               Password:
               <input type="password" name="AdminPassword" id="" placeholder="Password"><br><br>
            </div>
         <button class="custom-btn btn-2" name="submit">Sign in</button><br><br>
         Go back to <a href="index.html">Home</a>
       </div> 
       </form>
       <img class="ill1" src="img/admin login(1).png" alt="">
</body>
</html>
<?php

?>

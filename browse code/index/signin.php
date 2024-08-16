<?php
session_start();
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $UserName = $_POST['UserName'];
    $UserPassword = $_POST['UserPassword'];

    $conn = new mysqli('localhost','root','','career');
     if ($conn->connect_error) {
         die('Connection Failed:' . $conn->connect_error);
     }
     $query = "SELECT * FROM register WHERE UserName = '$UserName' AND UserPassword = '$UserPassword'";
     $result = $conn->query($query);
     if($result->num_rows == 1){
      $_SESSION['UserName'] = $UserName;
      header('location:newProfile.php');
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
    <title>sign-up/login</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        body{
            font-family:  'Helvetica Neue';
            margin: 0;
            padding: 0;
            background: rgb(213, 223, 242);
            background: linear-gradient(to bottom rights rgba(223, 233, 254, 0.677) 6%, rgba(62,78,96,1) 100%);
            background-size: 100% ;
            background-repeat: no-repeat;
            background-position: cover;
            backdrop-filter: blur(15px);
        }
        .ill1 img{
            width: 510px;
            height: 300px;
            margin-top: -20px;
            margin-left: -50px;
        }
        .ill3 img{
            width: 410px;
            height: 450px;
            margin-top: -140px;
            margin-left:1000px;
        }
        .container{
            background: rgba(25, 15, 205, 0.53);
            border-radius: 16px;
            backdrop-filter: blur(15.8px);
            -webkit-backdrop-filter: blur(15.8px);
            border: 1px solid rgba(135, 32, 246, 0.49);
            width: 370px;
            height: 430px;
            padding: 20px;
            color: rgb(18, 17, 17);
            background-image: linear-gradient(to  bottom ,#25aae1,#9cbcf3,#04befe,#7dadf5);
            text-align: center;
            margin-left:550px ;
            font-size: 16px;
            margin-top: -460px;  
            filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));  
        }
        .container img{
            width: 80px;
            height: 140px;
            filter: drop-shadow(5px 5px 2px rgb(22, 21, 25));
            margin-top: -25px;
        }
        .ill2 img{
            width: 370px;
            height: 350px;
            margin-top: -260px;
            margin-left: 100px;
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
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="ill1">
        <img src="img/signup-illustration (2).png" alt="">
    </div>
    <div class="ill3">
        <img src="img/signup-illustration (3).png" alt="">
    </div>
    <div class="container">
     <h3>Sign in</h3><br>
     <img src="img/sign in.png" alt=""><br><br>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="input">
            Name:
            <input type="text" name="UserName" id="" placeholder="Username"><br><br>
             Password:
            <input type="password" name="UserPassword" id="" placeholder="Password"><br><br>
      </div>
      <button class="custom-btn btn-2" name="submit">Sign in</button>
      </form>
      <p> Go back to <a href="index.html">Home</a></p>
    </div> 
    <div class="ill2">
        <img src="img/signup-illustration.png" alt="">
    </div> 
    
    
</body>
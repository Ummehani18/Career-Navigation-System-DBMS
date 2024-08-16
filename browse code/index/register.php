<?php
$nameErr = $emailErr = $phoneErr = $passwordErr = "";
$Name = $Email = $Phone = $Password ="";
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(empty($_POST['UserName'])){
    $nameErr = "Name is required";
  }
  else{
    $UserName = input_data($_POST['UserName']);
    if(!preg_match("/^[a-zA-Z\s]*$/",$UserName)){
      $nameErr = "Only alphabets and white Space are allowed";
    }
  }
  if(empty($_POST['UserEmail'])){
    $emailErr = "Email is required";
  }
  else{
    $UserEmail = input_data($_POST['UserEmail']);
    if(!filter_var($UserEmail,FILTER_VALIDATE_EMAIL)){
      $emailErr ="Invalid email format";
    }
  }
  if(empty($_POST['UserPhone'])){
    $phoneErr = "Phone number is required";
  }
  else{
    $UserPhone = input_data($_POST['UserPhone']);
    if(!preg_match("/^[0-9]*$/",$UserPhone)){
      $phoneErr = "Only numeric value is allowed";
    }
    if(strlen($UserPhone)!=10){
      $phoneErr = "Phone number must caintain 10 digits";
    }
  }
  if(empty($_POST['UserPassword'])){
    $passwordErr = "Enter your password.";
  }
  else{
    $UserPassword = input_data($_POST['UserPassword']);
    if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8}/",$UserPassword)){
      $passwordErr = "Password require:8 char long, atleast one digit and special character.";
    }
  }
  $userId = uniqid();
}
function input_data($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
if($nameErr == "" && $emailErr == "" && $phoneErr == "" && $passwordErr == ""){
$conn = new mysqli('localhost', 'root', '', 'career');
  if ($conn->connect_error) {
      die('Connection Failed:' .$conn->connect_error);
  }
  $stmt = $conn->prepare("INSERT INTO register(userId, UserName, UserEmail, UserPhone, UserPassword) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssis",$userId, $UserName, $UserEmail, $UserPhone, $UserPassword);
  $stmt->execute();
      if(isset($_POST['submit'])){
      echo "<script>";
      echo "alert('You have successfully register!')";
      echo "</script>";
      header('location:signin.php');
    }
  $stmt->close();
  $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-up/login</title>
    <link rel="icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="registerphp.css">
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
            width: 500px;
            height: 500px;
            margin-top: -140px;
            margin-left:970px;
        }
        .container{
            background: rgba(25, 15, 205, 0.53);
            border-radius: 16px;
            backdrop-filter: blur(15.8px);
            -webkit-backdrop-filter: blur(15.8px);
            border: 1px solid rgba(135, 32, 246, 0.49);
            width: 400px;
            height: 590px;
            padding: 20px;
            color: rgb(18, 17, 17);
            background-image: linear-gradient(to  bottom ,#25aae1,#9cbcf3,#04befe,#7dadf5);
            text-align: center;
            margin-left:550px ;
            font-size: 16px;
            margin-top: -590px;  
            filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));  
        }
        .container img{
            width: 100px;
            height: 100px;
            filter: drop-shadow(5px 5px 2px rgb(22, 21, 25));
            margin-top: -25px;
        }
        .ill2 img{
            width: 370px;
            height: 350px;
            margin-top: -440px;
            margin-left: 100px;
        }
        .input input{
            font-size: 20px;
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
            font-size: 20px;  
        }
        .input [Type="email"]
        {
           width: 260px; 
           border-bottom: 1px solid black;
           background-color: inherit;
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
        .input [Type="tel"]
        {
           width: 185px; 
           border-bottom: 1px solid black;
           background-color: inherit;
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
        .error{
          color:#ff0001;
          font-size:18px;
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
     <h3>Create an Account</h3><br>
     <img src="img/signup-illustration (4).png" alt=""><br><br>
     <form  id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <div class="input">
             Name:
             <input type="text" name="UserName" id="name" placeholder="Username"><br>
             <span class="error"><?php echo $nameErr;?></span><br><br>
             Email: 
             <input type="email" name="UserEmail" id="email" placeholder="yours@gmail.com"><br>
             <span class="error"><?php echo $emailErr;?></span><br><br>
             Phone Number: 
             <input type="tel" name="UserPhone" id="phone" placeholder="123-456-7890" ><br>
             <span class="error"><?php echo $phoneErr;?></span><br><br>
             Password:
             <input type="password" name="UserPassword" id="password" placeholder="Password"><br>
             <span class="error"><?php echo $passwordErr;?></span><br><br>
            </div>
            <button class="custom-btn btn-2" name="submit">Sign up</button>
      </form>
      <p>Already have an account? <a href="signin.php">Sign in</a> <br>
      Go back to <a href="index.html">Home</a>
      </p>
      
    </div> 
    <div class="ill2">
        <img src="img/signup-illustration.png" alt="">
    </div>
    
</body>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $ConMessage = $_POST['ConMessage'];
    

    $conn = new mysqli('localhost','root','','career');
     if ($conn->connect_error) {
         die('Connection Failed:' . $conn->connect_error);
     }
     if(empty($Fname) || empty($Lname) || empty($Email) || empty($Phone) || empty($ConMessage)) {
    // Redirect back to contact form
     header("Location: contact-us.php");
     exit(); 
}
     $stmt = $conn->prepare("INSERT INTO contact(Fname,Lname,Email,Phone,ConMessage) VALUES (?, ?, ?, ?, ?)");
     $stmt->bind_param("sssis", $Fname, $Lname, $Email, $Phone, $ConMessage);
     $stmt->execute();
      if(isset($_POST['submit'])){
      echo "<script>";
      echo "alert('Thanks you for contacting us! we will respond you within 24 hours.')";
      echo "</script>";
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
    <title>Contact-us</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        body {
            font-family:  'Helvetica Neue';
            margin: 0;
            padding: 0;
            background: hsl(219, 53%, 89%);
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
            width: 870px;
            height: 500px;
            padding: 20px;
            color: rgb(18, 17, 17);
            background-image: linear-gradient(to  bottom ,#25aae1,#9cbcf3,#04befe,#7dadf5);
            margin-left:300px ;
            font-size: 16px;
            margin-top: 50px;  
            filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));  
        }
        .container img{
            width: 450px;
            height: 450px;
            filter: drop-shadow(5px 5px 1px rgb(22, 21, 25));
            margin-top: -100px;
            margin-right: 10px; 
        }
        .input input{
            font-size: 18px;
            background-color: inherit;
            outline: none;
            border: none;
            margin-bottom: 8px;
        }
        .input [Type="email"]
        {
           width: 290px; 
           border-bottom: 1px solid black;
           background-color: inherit;
           
        }
        .input [Type="text"]
        {
           width: 250px; 
           border-bottom: 1px solid black;
           background-color: inherit;
           
        }
        .input [Type="tel"]
        {
           width: 287px; 
           border-bottom: 1px solid black;
           background-color: inherit;
        }
        .input #Message{
            width: 269px;
            border-bottom: 1px solid black;
            background-color: inherit;
        }
        ::placeholder{
            background-color: inherit;
            font-style: oblique;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }
        .input{
            font-size: 20px;
            margin-top: -400px;
            margin-left: 450px;
            background-color: inherit;
        }
        .container h3{
            font-size: 30px;
            margin-left: 560px;
        }
        .container p{
            font-size: 18px;
            margin-left: 510px;
            margin-top: -40px;
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
        .footer {
            background-color: #1f3245;
            padding: 20px;
            color: #fcf9f9;
            margin-top: 50px;
            line-height: 22px;
            font-size: 18px;
        }
        .icon img{
            padding: 0px;
            cursor: pointer;
            width: 25px;
            height: 25px;
        }
        .icon{
            margin-left: 1350px;
            margin-top: 10px;
        }
        .move{
            margin-left: 10px;
            margin-top: -40px;
            font-size: 16px;  
        }
        .footer p{
            text-align: center;
            margin-top: -70px;
        }
        a{
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="contact">
    <div class="container">
        <h3>Contact Us</h3><br><br>
        <p>Feel free to drop us a line below!</p><br><br>
        <img src="img/Call center-cuate.png" alt=""><br><br>
        <form  id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="input">
                First Name:
                <input type="text" name="Fname" id="" placeholder="Firstname"><br><br>
                Last Name:
                <input type="text" name="Lname" id="" placeholder="Lastname"><br><br>
                Email: 
                <input type="email" name="Email" id="Email" placeholder="yours@gmail.com"><br><br>
                Phone:
                <input type="text" name="Phone" id="Phone" placeholder="+91123-456-7890"><br><br>
                Message:
                <input type="text" name="ConMessage" id="Message" placeholder="Enter your message"><br><br>
                <button class="custom-btn btn-2" name="submit">Submit</button>
            </div>
         </form>
    </div>
    <div class="footer">
        <div class="icon">
             <img src="img/facebook icon.png" alt="">     <img src="img/in icon.png" alt="">     <img src="img/twitter icon.png" alt="">     <img src="img/insta icon.png" alt="">
        </div>
        <div class="move">
            <a  href="index.html">HOME</a><br>
            <a  href="Resources.html">RESOURCES</a><br>
            <a  href="contact-us.php">CONTACT US</a><br>
        </div>
        <p> Career Pilot <br>&copy;2024 Career Navigation System.All rights reserved.</p>
    </div>
</div>
</body>
</html>
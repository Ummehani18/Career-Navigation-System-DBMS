<?php
$con=mysqli_connect("localhost", "root", "", "career");
    if(mysqli_connect_error()){
        echo "cannot conncet";
    }
function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}
function redirect($url, $message){
    $_SESSION['message']=$message;
    header('Location:',$url);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-Board</title>
    <link rel="icon" type="image/png" href="logo.png">
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
        header {
            background-color: #1f3245;
            padding:45px;
            color: white;
        }
        .upper{
            margin-left: 360px;
            margin-top: 9.5px;
        }
        .nav a{
            
            padding: 12px ;
            font-size: 18px;
            margin-left: 550px;
            color: white;
        }
        .nav{
            margin-top: -45px;
            margin-left: 400px;
            color: white;
        }
        .nav a:hover{
            background-color:hsl(219, 53%, 89%) ;
        }
        a{
            color: inherit;
            text-decoration: none;
        }
        .img{
            height: auto; /*logo*/
            position: absolute;
            top: 0;
            left: 0;
        }
        .img img {
            height: 90px;
            width: 160px;
            margin-top: 5px;
            margin-left:30px;
            
        }
        h1{
            text-align:center;
        }
        p{
            text-align:center;
        }
        .hr1{
            width:1100px;
            border-color:#1f3245;
        }
        .hr2{
            width:1100px;
        }
        table {
           
            width: 900px; 
            margin-top: 20px; 
            font-family: arial, sans-serif;
            margin-left:530px;
            margin-top:-510px;
            
        }       
        th{
            background-color:  #ffc40c; /* Light gray background */
            padding: 10px 15px; /* Padding for readability */
            border: none; /* Gray border */
            text-align: center; /* Align text to the left */
            color:#1f3245; /* Bold text for emphasis */
            border-radius:10px;
        }       
        td{
            padding: 10px 15px; /* Padding for readability */
            border: none; /* Gray border */
            text-align: center; /* Align text to the left by default */
        }  
        button{
            background-color:#1f3245;
            border-radius:5px;
            height:30px;
            border:none;
            cursor:pointer;
            color:white;
        }.footer {
            background-color: #1f3245;
            padding: 20px;
            color: #fcf9f9;
            margin-top: 170px;
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
        .sideimg{
            width:600px;
            height:600px;
            margin-top:-90px;
            filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
            margin-left:-40px;
        }
        .table{
            
        }
    </style>
</head>
<body>
    <header>
        <div class="img">
            <img src="logo.png" alt=""><br>
            <div class="upper">
                <div class="nav">
                    <a href="index.html">BACK TO HOME</a>
                </div>
           </div>
        </div>
    </header>
    <h1>JOB OPENINGS</h1>
    <p>Apply now!</p>
    <hr>
    <img  class="sideimg" src="job hunt-cuate.png" alt="">
    <div class="display">
        <div id="job">
                <table class="table" >
                    <thead>
                    <tr>
                        <th>Company</th>
                        <th>Job Role</th>
                        <th>Job Location</th>
                        <th>Apply Now!</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result=getAll("jobcompany");
                        if(mysqli_num_rows($result)>0){
                            foreach($result as $item ){
                                ?>
                                    <tr>
                                    <td><?=$item['companyName']?></td>
                                    <td><?=$item['jobRole']?></td>
                                    <td><?=$item['location']?></td>
                                    <td><button><a href="<?= $item['link'] ?>">Apply Now!</a></button></td>
                                </tr>
                        <?php
                                }
                            }
                            else{
                                echo "no records found ";
                            }
                        ?>
                    </tbody>
                </table>
         </div>                  
    </div>
    <div class="footer">
        <div class="icon">
             <img src="facebook icon.png" alt="">     <img src="in icon.png" alt="">     <img src="twitter icon.png" alt="">     <img src="insta icon.png" alt="">
        </div>
        <div class="move">
            <a  href="index.html">HOME</a><br>
            <a  href="Resources.html">RESOURCES</a><br>
            <a  href="contact-us.html">CONTACT US</a><br>
        </div>
        <p> Career Pilot <br>&copy;2024 Career Navigation System.All rights reserved.</p>
    </div>
</body>
</html> 
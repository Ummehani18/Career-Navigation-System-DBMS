<?php
$con=mysqli_connect("localhost", "root", "", "career");
if(mysqli_connect_error()){
    echo "cannot conncet";
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $companyName = $_POST['companyName'];
    $jobRole = $_POST['jobRole'];
    $location= $_POST['location'];
    $link = $_POST['link'];
    $jobId=uniqid();

    $con = new mysqli('localhost','root','','career');
     if ($con->connect_error) {
         die('Connection Failed:' . $con->connect_error);
     }
     $stmt = $con->prepare("INSERT INTO jobCompany(jobId, companyName, jobRole,location, link) VALUES (?, ?, ?, ?, ?)");
     $stmt->bind_param("sssss", $jobId, $companyName, $jobRole, $location, $link);
     $stmt->execute();
      if(isset($_POST['submit'])){
      echo "<script>";
      echo "alert('Data Inserted Successfully.')";
      echo "</script>";
    }
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
    <title>jobData</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .input input{
            font-size: 22px;
            background-color: inherit;
            outline: none;
            border: none;
            border-bottom: 1px solid black;
            color:white;
        } 
        .input [Type="text"]
        {
           width: 230px; 
           border-bottom: 1px solid black;
           background-color: inherit;
        }
        .input [Type="number"]
        {
           width: 300px; 
           border-bottom: 1px solid black;
           background-color: inherit;
        }
        ::placeholder{
            color: #6f8389;
            font-style: oblique;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }
        input{
            font-size: 22px;
            background-color: inherit;
            outline: none;
            border: none;
            border-bottom: 1px solid black;
        }
        form{
            line-height: 1.8;
            font-size:20px;
            color:white;
            text-align:center;
            
        }
        .addJob{
            background-color:#1f3245;
            border:1px solid black;
            border-radius:10px;
            width:800px;
            padding:10px;

        }
        .addbtn{
            color:white;
            background-color:blue;
            border-radius:5px;
            border:none;
            width:80px;
            height:30px;
            font-size:16px;
        }  
        table {
            border-collapse: collapse;
            width: 100%; 
            margin-top: 10px; 
            font-family: arial, sans-serif;
            border-radius:10px;
        }       
        th{
            background-color:  #1f3245; /* Light gray background */
            padding: 10px 15px; /* Padding for readability */
            border: 1px solid  #1f3245; /* Gray border */
            text-align: center; /* Align text to the left */
            color:white; /* Bold text for emphasis */
        }       
        td{
            padding: 10px 15px; /* Padding for readability */
            border: 1px solid  #1f3245; /* Gray border */
            text-align: center; /* Align text to the left by default */
        }   
    </style>
</head>
<body>
    <h2>Job Boards</h2>
    <div class="addJob">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <div class="input">
             Company Name:
             <input type="text" placeholder="Company name" name="companyName">
             Role:
             <input type="text" placeholder="Job Role"  name="jobRole"><br>
             Location:
             <input type="text" placeholder="Location" name="location">
             Link to Register:
             <input type="url" placeholder="Link to join" name="link">
         </div>
         <button type="submit" class="addbtn">ADD</button>
      </form>
    </div>
    <table class="table" >
         <thead>
         <tr>
             <th>Company</th>
             <th>Job Role</th>
             <th>Job Location</th>
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
    <script>
          function loadContent(url) {
        url = url + "?t=" + timestamp; // Append timestamp to URL as query string
        var timestamp = new Date().getTime(); // Get a unique timestamp
        console.log("Loading URL:", url);
    });
    </script>
</body>
</html>
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
if (isset($_POST['delete_con_btn'])) {
    $delete_id = mysqli_real_escape_string($con, $_POST['delete_id']);  // Sanitize input
  
    $delete_query = "DELETE FROM contact WHERE userId='$delete_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        echo "<script>";
        echo "alert('Deleted Successful.')";
        echo "</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contactReached</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
         table {
            border-collapse: collapse;
            width: 100%; 
            margin-top: 20px; 
            font-family: arial, sans-serif;
            
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
        .view{
            color:white;
            background-color:blue;
            border-radius:5px;
            border:none;
            width:70px;
            height:25px;
            font-size:16px;
        } 
    </style>
</head>
<body>
    <h2>Contact Reached</h2>
         <table class="table" >
             <thead>
             <tr>
                 <th>Fname</th>
                 <th>Lname</th>
                 <th>Phone Number</th>
                 <th>Message</th>
                 <th>Delete</th>
             </tr>
             </thead>
             <tbody>
                 <?php
                 $result=getAll("contact");
                 if(mysqli_num_rows($result)>0){
                     foreach($result as $item ){
                  ?>
                      <tr>
                      <td><?=$item['Fname']?></td>
                      <td><?=$item['Lname']?></td>
                      <td><?=$item['Phone']?></td>
                      <td><?=$item['ConMessage']?></td>
                      <td>
                      <form action="" method="POST"> 
                          <input type="hidden" name="delete_id" value="<?= $item['userId']; ?>">
                          <button type="submit" class="view" name="delete_con_btn">VIEWED</button>
                      </form>
                      </td>
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

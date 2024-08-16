<?php
    session_start();
    $UserName = $_SESSION['UserName'];
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "career";

$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $UserPhone = $_POST['UserPhone'];
    $UserEmail = $_POST['UserEmail'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $UserLanguage = $_POST['UserLanguage'];
    $UserState = $_POST['UserState'];
    $Country = $_POST['Country'];
    $Gender = isset($_POST['Gender']) ? $_POST['Gender'] : '';
    $College = $_POST['College'];
    $Degree = $_POST['Degree'];
    $PassYear = $_POST['PassYear'];
    $CGPA = $_POST['CGPA'];
    $Domain = $_POST['Domain'];
    $JobLocation = $_POST['JobLocation'];
    $LinkedIn = $_POST['LinkedIn'];
    $Github = $_POST['Github'];

    $stmt = $con->prepare("INSERT INTO profile (Fname, Lname, UserPhone, UserEmail, DateOfBirth, UserLanguage, UserState, Country, Gender, College, Degree, PassYear, CGPA, Domain, JobLocation, LinkedIn, Github) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute();
    $stmt->bind_param("ssssssssssssdssss", $Fname, $Lname, $UserPhone, $UserEmail, $DateOfBirth, $UserLanguage, $UserState, $Country, $Gender, $College, $Degree, $PassYear, $CGPA, $Domain, $JobLocation, $LinkedIn, $Github);
    exit(); 
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Profile</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        body {
            font-family:  'Helvetica Neue';
            margin: 0;
            padding: 0;
            background-color: #1f3245;
            background-size: 100% ;
            background-repeat: no-repeat;
            background-position: cover;
            backdrop-filter: blur(15px);
        }
        .container{
            font-family: Cambria, Cochin, Georgia, Times;
            background: hsl(219, 53%, 89%);
            background: linear-gradient(to bottom rights rgba(223, 233, 254, 0.677) 6%,rgba(62,78,96,1) 100%);
            background-size: 100% ;
            border-radius: 16px;
            backdrop-filter: blur(15.8px);
            -webkit-backdrop-filter: blur(15.8px);
            border: 2px solid rgba(7, 3, 11, 0.909);
            width: 900px;
            height: 850px;
            padding: 20px;
            color: #121111;
            margin-left:290px;
            font-size: 16px;
            margin-top: -160px;  
            filter: drop-shadow(5px 5px 8px rgb(22, 21, 25));
            
        }
        .adpic{
            width:270px;
            height:270px;
            margin-left: 8px;
            margin-top:-100px;
        }
        .adpic2{
            width:240px;
            height:240px;
            margin-left:15px;  
        }
        .adpic3{
            width:220px;
            height:220px; 
            margin-top:-60px;
            margin-left:-15px;
        }
        .adpic4{
            width:200px;
            height:200px; 
            margin-top:-60px;
            margin-left:-15px;
        }
        .headline{
            font-size: 38px;
            text-align: center;
            color: hsl(219, 53%, 89%);
            margin-top: -10px;
        }
        .username{
            color:#1f3245;
            text-align: center;
            margin-top:-200px;
            font-size:45px;
            margin-left:-150px;
            font-family: Cambria, Cochin, Georgia, Times;
        }
        .line{
            border-bottom:1px #1f3245 solid;
            width:690px;
            margin-left:190px;
            margin-top:-40px;
        }
        form{
            line-height: 1.8;
        }
        ::placeholder{
            color: #6f8389;
            font-style: oblique;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }
        .Personal{
            font-size:30px;
            color:#808080;
            margin-left:190px;
        }
        .PData form{
            margin-left:190px;
            font-size:22px;
        }
        .input input{
            font-size: 20px;
            background-color: inherit;
            outline: none;
            border: none;
        }
        .input select{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            background-color: inherit;
            outline: none;
            border: none;
            border-bottom: 1px solid #5ea8f3 ;
            width:237px;
            color: #6f8389;
        }
        .input select option{
            color: #121111;
        }
        .input [Type="email"]
        {
           width: 267px; 
           border-bottom: 1px solid #5ea8f3;
           background-color: inherit;
        }
        .input [Type="text"]
        {
           width: 222px; 
           border-bottom: 1px solid #5ea8f3;
           background-color: inherit;
        }
        .input [Type="date"]
        {
           width: 212px; 
           border-bottom: 1px solid #5ea8f3;
           background-color: inherit;
           font-size:16px;
        }
        .input [Type="tel"]
        {
           width: 175px; 
           border-bottom: 1px solid #5ea8f3;
           background-color: inherit;
        }
        .Professional{
            font-size:30px;
            color:#808080;
            margin-left:190px;
        }
        .Pralign{
            margin-left:190px;
            font-size:22px;
            margin-top:-165px;
            line-height:1.8;
        }
        .PrData [Type="text"]
        {
           width: 210px; 
           border-bottom: 1px solid #5ea8f3;
           background-color: inherit;
        }
        .PrData select{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            background-color: inherit;
            outline: none;
            border: none;
            border-bottom: 1px solid #5ea8f3 ;
            width:180px;
            color: #6f8389;
        }
        .input input[Type="file"]
        {
            width:280px;
            border:1.5px solid #5ea8f3;
            height:24px;
            border-radius:5px;
            padding:3px;
            color: #6f8389;
            font-style: oblique;
            font-family: Arial, Helvetica, sans-serif;
        }
        input::file-selector-button{
            border:1px solid black;
            border-radius:3px;
            background:#213EE6;
            color:white;
            font-size:15px;
        }

        .Social{
            font-size:30px;
            color:#808080;
            margin-left:190px;
            line-height:1.5;
        }
        .MediaLinks img{
            width:35px;
            height:35px;
        }
        .MediaLinks [Type="url"]
        {
           width: 300px; 
           border-bottom: 1px solid #5ea8f3;
           background-color: inherit;
        }
        .MediaLinks input{
            border:none;
            outline:none;
        }
        .MediaLinks{
            line-height:2.0;
            margin-left:190px;
            margin-top:-150px;
        }
        .MediaLinks form{
            line-height:2.0;
        }
        button{
            background-color:#213EE6;
            border-radius:5px;
            color:white;
            width:80px;
            height:35px;
            border:none; 
            font-size:18px;
        }
        .Buttonalign{
            margin-left:790px;
        }
        .footer {
            background-color: hsl(219, 53%, 89%);
            padding:30px;
            color:#1f3245;
            margin-top: 50px;
            line-height: 22px;
            font-size: 18px;
            text-align:center;
        }
        .move{
            margin-left: 10px;
            font-size: 18px;  
        }
        a{
            color: inherit;
            text-decoration: none;
            padding-left:40px;
        }
    </style>
</head>
<body>
    <br><br>
    <h1 class="headline">Edit your Profile and Shine!</h1>
    <img class="adpic" src="img/Profile data-cuate.png" alt="">
    <form action=""></form>
    <div class="container">
        <img class="adpic2" src="img/Profile data-amico.png" alt=""> 
        <p class="username"><b>User Name:</b> <?php echo $UserName;?> </p><div class="line"></div>
        <br><br>
        <span class="Personal">Personal Details </span><br>
        <div class="PData form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                <!--Personal Data-->
                <div class="input">
                    First Name: <input type="text" name="Fname"  placeholder="first name"> &nbsp; 
                    Last Name: <input type="text" name="Lname" placeholder="Last Name"><br>
                    Contact Number: <input type="Tel" name="UserPhone" placeholder="Contact Number">&nbsp; 
                    Email: <input type="email" name="UserEmail" placeholder="yours@gmail.com"><br>
                    Date of Birth: <input type="date" name="DateOfBirth" placeholder="Date Of Birth">&nbsp;
                    Language: <select name="UserLanguage">
                                    <option value=''></option>
                                    <option value="">Language</option>
                                    <option value="Kannada">Kannada</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Tulu">Tulu</option>
                                    <option value="Malayalam">Malayalam</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Urdu">Urdu</option>
                                    <option value="Konkani">Konkani</option>
                              </select> &nbsp;
                    <br>
                    State:
                    <select class="states" name="UserState">
                        <option value=""></option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Country:
                    <select class="country" name="Country">
                        <option value=""></option>
                        <option value="India">India</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="China">China</option>
                        <option value="Iran">Iran</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Canada">Canada</option>
                        <option value="Australia">Australia</option>
                        <option value="New Zealand">New Zealand</option>
                    </select>
                    <br>
                    Gender: <input type="text" name="Gender"value=""> &nbsp; 
                </div> 
        </div><br><br>
        <!--Professional Data-->
        <span class="Professional">Professional Details</span><br>
         <img class="adpic3" src="img/Profile data-rafiki.png" alt="">
        <div class="PrData form">
            <div class="Pralign">
            <div class="input">
                Institution: <input type="text" name="College" placeholder="College/University"> &nbsp;
                Field Of Study: <input type="Text" name="Degree" Placeholder="Degree"><br>
                Year of Graduation: <input type="text" name="PassYear" placeholder="Paass Year"> &nbsp;&nbsp;
                CGPA: <input type="text" name="CGPA" placeholder="cgpa(0.0)" ><br>
                Feild of Interest: <input type="text" name="Domain" placeholder="Domain"> &nbsp; 
                Job Location: 
                <select class="JobLocation" name="JobLocation">
                        <option value=''></option>
                        <option value="Bengaluru">Bengaluru</option>
                        <option value="Hyderabad">Hyderabad</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Mysuru">Mysuru</option>
                        <option value="Mangaluru">Mangaluru</option>
                </select><br>
            </div>
            </div>
        </div><br><br>
        <!--Media Links-->
        <span class="Social">Add Your Social Links </span><br>
        <img  class="adpic4"src="img/Mention-amico.png" alt="">
        <div class="MediaLinks">
                <div class="input">
                    <img class="icon1" src="img/icons8-linkedin-24.png" alt=""><b>:</b>
                    <input type="text" name="LinkedIn" placeholder="LinkedIn" ><br>
                    <img class="icon4" src="img/icons8-github-30.png" alt=""><b>:</b>
                    <input type="text" name="Github" placeholder="Github"><br>
                </div>
        </div><br><br>
        <div class="Buttonalign"><button name="submit">SUBMIT</button></div>
    </form>  
</div>
    <div class="footer">
        <div class="move">
            <a  href="index.html">HOME</a>
            <a  href="article.html">ARTICLE</a>
            <a  href="service-menu.html">MENU OF SERVICES</a>
            <a  href="contact-us.php">CONTACT US</a>
        </div>
    </div>
</body>
</html>

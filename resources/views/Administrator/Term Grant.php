<?php
ob_start();
session_start();
include "../php files/db_connection.php";

if (empty($_SESSION['Username'] && $_SESSION['Password']) || $_SESSION['Username'] != 'Director@njsmti') {        
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: ../Login/Login.php'));
    }
//Input fields validation
if(isset($_POST['Logout'])){
    session_destroy();
    header( 'location: ../Login/Login.php');
}
if(isset($_POST['Change_Password'])){
    $_SESSION['Login_type'] = 'Director';
    $_SESSION['Username'];
    header( 'location: Change Password.php');
}
if(isset($_POST['Change_Email'])){
    $_SESSION['Login_type'] = 'Director';
    $_SESSION['Username'];
    header( 'location: Change Email.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJSMTI</title>
<link rel="icon" type="image/x-icon" href="../../Images/Header&Footer/favicon.jpg">
    
    <link rel="stylesheet" href="../CSS Files/headerNmenuNfooter.css">
    <link rel="stylesheet" href="../CSS Files/Admin_Welcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .disclaimer{
            display: none;
        }
        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
   /* Add media query for mobile view */
@media (max-width: 768px) {
    /* Hide the regular navbar links */
    .navbar a {
        display: none;
    }
    
    /* Style for the hamburger icon */
    .navbar .icon {
        display: block;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
    
    /* Style for the hamburger icon bars */
    .navbar .icon .bar {
        width: 25px;
        height: 3px;
        background-color: black;
        margin: 6px 0;
        background-color: white;
        border: 2px solid black;
    }
    
    /* Show the links when hamburger icon is clicked */
    .navbar.show a {
        display: block;
        padding: 15px;
        text-align: center;
        color: black;
        text-decoration: none;
        border-bottom: 1px solid #ccc;
    }
    
    /* Styling for the active link */
    .navbar.show a.active {
        background-color: lightgray;
    }

    .navbar {
        height: 60px; /* Adjust the height as needed */
        overflow: hidden;
        transition: height 0.3s ease;
    }

    /* Show the full menu when the hamburger icon is clicked */
    .navbar.show {
        height: auto;
        background-color: white;
        z-index: 1000;
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        display: block;
    }
}
</style>
<script>
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('show');
}
</script>
</head>
<body>
    
    <header id="header">
        <center>
            <img src="../../Images/Header&Footer/NJSMTI.png" alt="img"> 
        </center>
        </header>
        <section id="Logged_in_sec">
        <div id="Logged_in">
            <img src="../../Images/Login/Logged_in.jpg"><br>
          <?php
            echo "<small>";
        echo $_SESSION['Username']; 
 echo "</small>";
         ?>
         
<form method="POST">
 <br><input type='Submit' name='Logout' Value='Logout' id='Logout' style="color: white;
    background-color: black; cursor: pointer; border-radius: 15.9px; font-size: 13.4px; font-weight: 400;"> &nbsp; &nbsp; <input type="Submit" name="Change_Password" Value="Change Password" id="Change_Password" style="color: white;
    background-color: black; cursor: pointer; border-radius: 15.9px; font-size: 13.4px; font-weight:  400;"> &nbsp;&nbsp; <input type="Submit" name="Change_Email" Value="Change Email" id="Change Email" style="color: white;
    background-color: black; cursor: pointer; border-radius: 15.9px; font-size: 13.4px; font-weight:  400;">
</form>
<center><h1 style='color: white; background-color: green; border-radius: 29px; padding-bottom: 4.2px;'>Director Desk</h1></center>
<div class="navbar">
    <div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
    <a href="Welcome.php">HOME</a>
    <a href="Upload_files.php">Upload Files</a>
    <a href="Manage_files.php">Manage files</a>
    <a href="Post new Announcements.php">Do Announcements</a>
     <a href="Add_Faculties.php">Add Faculties</a>
     <a href="Remove Faculties.php">Remove Faculties</a>
    <a href="Students Data.php">Students data</a>
    <a href="Term Grant.php" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Term-Grant</a>
    <a href="Fees Info.php">Recieve Fees</a>
    <a href="Remove Students.php">Remove Students</a>
    <a href="Manage_Queries.php">Manage Queries</a>
    <a href="Upload Press.php">Upload Press</a>
</div>
</section>

<main>
    <hr>
        <center><h2 style='color: white; background-color: red; border-radius: 29px; padding-bottom: 4.2px;'>Term-Grant</h2></center>
    <center>
        <div style='background-color: skyblue; display: inline-block; border-radius: 15px; width: 92%; padding: 9px;'>
        <form action="" method="POST">
        <input style="height: 29.8px; width: 51%;" type="number" name="Enrollment_No" placeholder="Enter Enrollment No*" id="Enrollment_No"><br><br>
        <input type="submit" value="Search" name="Search" id='see' style="font-size: 19.9px; color: black; background-color: white;" class="see">
        </form>
        <br>
        <?php
        $Count = 0;
        $Count2 = 0;
        
        if(!empty($_POST['Enrollment_No']) and isset($_POST['Search'])){
         $_SESSION['Enrollment_No'] = $_POST['Enrollment_No'];
         $Enrollment_No = $_POST['Enrollment_No'];
    $sql = "SELECT *FROM `Student Registration` WHERE Enrollment_No='$Enrollment_No'";
    $check = mysqli_query($conn, $sql);
    while($Match = $check->fetch_assoc())
    {
        $Course = $Match['Course'];
        if($Enrollment_No == $Match['Enrollment_No']){?>
        <div style="display: inline-block; text-align: left; color: white; background-color: blue; padding: 9px; border-radius: 29px;">
            <h4 style="display: inline;">SPU ID : </h4><h5 style="display : inline; color: yellow;"><?php echo $Match['Enrollment_No']; ?></h5><br>
            <h4 style="display : inline;">Student's Name : </h4><h5 style="display : inline; color: yellow;"><?php echo $Match['Name']; ?></h5><br>
            <h4 style="display : inline;">Course : </h4><h5 style="display : inline; color: yellow;"><?php echo $Match['Course']; ?></h5><br>
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;"><?php echo $Match['Semester']; ?></h5><br>
            <h4 style="display : inline;">Mobile : </h4><h5 style="display : inline; color: yellow;"><?php echo $Match['Mobile']; ?></h5><br>
            <h4 style="display : inline;">Email : </h4><h5 style="display : inline; color: yellow;"><?php echo $Match['Email']; ?></h5>
            </div>
        <?php
        $Count = 1;
        }
    }
        }
        if(isset($_POST['Search']) && $Count != 1){
            echo "<h4 style='color: red;'>Enter Valid Enrollment_No.</h4>";
        }
        if(isset($_POST['Search']) && $Count == 1){
            $Enrollment_No = $_POST['Enrollment_No'];
        $sql = "SELECT Course,Semester FROM `Student Registration` WHERE Enrollment_No ='$Enrollment_No'";
        $check = mysqli_query($conn, $sql);
        while($Match = $check->fetch_assoc()){
            if($Match['Semester'] != 'Sem-4'){
        ?>
        <form action="" method="POST">
        <p>
        <select name="Class" style="height: 29.4px; width: 51%;" required>
            <option selected>Select a Class</option>
            <?php
             if($Match['Course'] == 'MCA' && $Match['Semester'] != 'Sem-4'){?>
            <option value="Sem-1">MCA Sem-1</option>
            <option value="Sem-2">MCA Sem-2</option>
            <option value="Sem-3">MCA Sem-3</option>
            <option value="Sem-4">MCA Sem-4</option>
            <?php
            $Count2 = 1;
             }
             else if($Match['Course'] == 'MBA' && $Match['Semester'] != 'Sem-4')
             {
             ?>
            <option value="Sem-1">MBA Sem-1</option>
            <option value="Sem-2">MBA Sem-2</option>
            <option value="Sem-3">MBA Sem-3</option>
            <option value="Sem-4">MBA Sem-4</option>
            <?php
            $Count2 = 1;
             }
        }
        else{
                 echo "<h4 style='color: red;'>Student : $Enrollment_No already in Last Semester(Sem-4).</h4>";
             }
        }
        
        if($Count2 == 1){
            ?>
        </select><p>
        <input type="submit" value="Transfer" name="Change" id='see' style="font-size: 19.9px; color: black; background-color: white; border-radius: 29px;" class="see">
        </div>
        <?php
        }
        }
        ?>
        </center>
        <p>
        <center>
       <?php
       $Count = 0;
       if(!empty($_POST['Class']) and isset($_POST['Change'])){
           $Enrollment_No = $_SESSION['Enrollment_No'];
           $Class = $_POST['Class'];
              $sql = "UPDATE `Student Registration` SET Semester='$Class' WHERE Enrollment_No=$Enrollment_No";
              mysqli_query($conn, $sql);
              echo "<h4 style='color: green;'>$Enrollment_No`s Semester is Changed Successfully.</h4>";
        $sql = "SELECT Course,Email FROM `Student Registration` WHERE Enrollment_No ='$Enrollment_No'";
        $check = mysqli_query($conn, $sql);
        while($Match = $check->fetch_assoc()){
            $Course = $Match['Course'];
            $to = $Match['Email'];
            $Subject = "Term Grant Confirmation";
            $Message = "Hiii ".$Enrollment_No .",\nYour Semester is Changed Successfully.\nYour Course : $Course \nYour Current Semester : $Class";
            mail($to, $Subject, $Message);
        }
        echo "<script>window.location='Fees Info.php'</script>";
       }
    ?>
</form>
</main>
<hr>
<?php
include('footer.php');
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJSMTI Placement Cell</title>
    <link rel="icon" type="image/x-icon" href="{{asset('Images/Header&Footer/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/headerNmenuNfooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        .disclaimer{
            display: none;
        }
    #As:hover{
        color: red;
    }

    #Developer_Page{
        color: white; 
        font-size: 19.5px; 
        font-family: Arial,San-Serif; 
        background-color: RGB(219, 112, 18); 
        padding: 9.6px; 
        display: inline; 
        text-decoration: none; 
        border-radius: 29.4px;
    }
    #Developer_Page:hover{
        background-color: yellow;
        color: blue;
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
            <img src="{{asset('Images/Header&Footer/NJSMTI.png')}}" alt="img"> 
        </center>
       <div style='background-color: yellow; text-align: center; padding-top: 5px; padding-bottom: 1px;'><a href="{{url('')}}/login"><img id="Login" src="{{asset('Images/Login/Login.png')}}"></a></div>
        {{-- <div style='background-color: lightblue;; text-align: center; padding-top: 15px; padding-bottom: 11.9px;'>
        <a href="https://savjani-college.000webhostapp.com/College%20Web/php%20files/Developer%20Page.php" style="text-decoration: none;"><h5 id="Developer_Page">See The Developer Page</h5></a></div> --}}
        </header>
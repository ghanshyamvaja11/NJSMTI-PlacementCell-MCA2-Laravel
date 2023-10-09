<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJSMTI Placement Cell</title>
<link rel="icon" type="image/x-icon" href="{{asset('Images/Header&Footer/favicon.jpg')}}">
    
    <link rel="stylesheet" href="{{asset('css/headerNmenuNfooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/Forgot_Password.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .disclaimer{
        display: none;
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
        </header>
<nav class="navbar">
<div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
    <a href="{{url('')}}/">HOME</a>
    <a href="{{url('')}}/registration">Registration</a>
    <a href="{{url('')}}/contactus">Contact us</a>
</nav>
<main>
    @if (isset($error))
    <center><h1 style="color: red; font-size: 15.9px;">{{$error}}</h1></center>
    @endif
    @error('Login_type')
                <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
            @enderror
             @error('Username')
                <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
            @enderror
    <section>
        <p>
        <center>
        <form action="{{url('')}}/forgotpassword" method="POST">
            @csrf
            <fieldset>
            <legend>Forgot Password</legend>
<center><img src="{{asset('Images/Login/Logged_in.jpg')}}" style='background-color: white; height: 96px; width: 95px; border-radius: 59px;'></center>
                <p>
            <select name="Login_type" id="Login_type" required>
                <option value="" selected>Select Login Type</option>
                 <option value="Administrator">Administrator</option>
                <option value="Company">Company</option>
                <option value="Student">Student</option>
            </select><p>
            <input type="text" name="Username" id="Username" placeholder="Enter Username *" required><br><br>
            <center><input type="submit" name="Check" value="Check" id="Check"></center>
            </fieldset>
        </form>
    </section>
</main>
<hr>
@include('Layout.footer');
</body>
</html>

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Forgot Password ";

  // Set the voice to be used (optional)
  var voices = window.speechSynthesis.getVoices();
  
// Find a male voice
  var maleVoice = voices.find(function(voice) {
    return voice.name.includes('Male');
  });

  // Set the male voice (if found), otherwise use the first available voice
  message.voice = maleVoice || voices[0];


  // Set other options (optional)
  message.volume = 1; // Range from 0 to 1
  message.rate = 1; // Range from 0.1 to 10
  message.pitch = 1; // Range from 0 to 2

  // Speak the text
  window.speechSynthesis.speak(message);
} else {
  console.log('Speech synthesis not supported');
}
// window.location.href = "";
}
Speech();
    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJSMTI Placement Cell</title>
<link rel="icon" type="image/x-icon" href="../../Images/Header&Footer/favicon.jpg">
    
    <link rel="stylesheet" href="{{asset('css/headerNmenuNfooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/Contact us.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
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
        <div style='background-color: yellow; text-align: center; padding-top: 5px; padding-bottom: 1px;'><a href="{{url('')}}/login"><img id="Login" src='{{asset('Images/Login/Login.png')}}'></a></div>
        </header>
<div class="navbar">
    <div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
    <a href="{{url('/')}}">HOME</a>
    <a href="{{url('')}}/registration">Registration</a>
    <a href="{{url('')}}/contactus" style="color: yellow;  background-color: black; font-weight: bolder; border: 2px solid white; border-radius: 29px;">Contact us</a>
</div>
<main>
    @if (isset($Success))
    <center><h4 style="color: green;">{{$Success}}</h4></center>     
    @endif
    <section>
        <div id="sec">
        <div id="Address">
        <h1>Corporate Address</h1>
        <h2>N.J.Sonecha Mgmt. & Tech. Institute</h2>
        <div class="address">
        <strong class="address">Veraval - Junagadh Highway,</strong><br>
        <strong class="address">Opp. Realiance Petrol Pump,</strong><br>
        <strong class="address">At: Chanduvav Tal : Veraval,</strong><br>
        <strong class="address">District: Gir-Somnath (Gujarat).</strong><br>
        </div>
            <div class="Contact">
            <strong><span id="phone">Phone:</span> +91-9913664603 +91-9624584775</strong><br><br>
            <strong><span id="Email">Email:</span> <input type="email" name="email" id="email" value="directornjsmti11@gmail.com" disabled></strong><br>
            <strong><span id="Email">Email:</span> <input type="email" name="email" id="email" value="dwivediji80@yahoo.co.in" disabled></strong><br>
            <strong><span id="Email">Email:</span> <input type="email" name="email" id="email" value="njsonecha@rediffmail.com" disabled></strong><br>
            </div>
        <a href="https://www.youtube.com/@n.j.sonechamanagementandte774/featured" class="fa fa-youtube"></a>&nbsp;&nbsp;
        <a href="https://www.facebook.com/people/Njsmti-Chanduvav/pfbid02M2m4Q6tu2swrq1RNB85BMFJJS8HDZHTp9SC7kshKdFEQcULbZ7fdDFCaisSMWGz8l/" class="fa fa-facebook"></a> 
        </div>&nbsp;&nbsp;
    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7451.4181098379!2d70.333908!3d20.964196!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bfd324900000001%3A0xcbf6d904f72f2294!2sNarandas%20Jethalal%20Sonecha%20Management%20%26%20Technical%20Institute!5e0!3m2!1sen!2sin!4v1692177918580!5m2!1sen!2sin" style="border: 4px solid blue;" allowfullscreen="0" loading="fast" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<p>
<p>
    
    <section>
        <center><h2 style="background-color: transparent; color: red; display: inline;">OR</h2></center>
        <br>
    <center>
        <form action="{{url('')}}/contactus" method="POST">
            @csrf
            <fieldset>
            <legend>Contact Form</legend>
            <input type="text" name="name" id="name" placeholder="Enter Your Name *" required><br><br>
            <input type="email" name="email" id="email2" placeholder="Enter Your Email *" required><br><br>
            <select name="query_type" id="query" required>
                <option value="" selected>Select Query Type</option>
                <option value="Admission">Admission Related</option>
                <option value="Any Complaint">Any Complaint</option>
                <option value="Exam">Exam Related</option>
                <option value="Scholarship">Scholarship Related</option>
                <option value="Library">Library Related</option>
                <option value="Computer Lab">Computer lab Related</option>
            </select><br><br>
            <textarea name="description" id="description" cols="20" rows="5" placeholder="describe Your Query in detail *"></textarea><br>
            <center><input type="submit" name="submit" value="Submit" id="Submit"></center>
            </fieldset>
        </form>
    </section>

    @if(isset($Confirm))
            <script>
         if ('speechSynthesis' in window) {
  const synth = window.speechSynthesis;
  
  const text = "Thank you for Contacting us..";

  // Create a SpeechSynthesisUtterance instance
  const utterance = new SpeechSynthesisUtterance(text);
  
  // Speak the text
  synth.speak(utterance);
} else {
  // Browser doesn't support speech synthesis
  alert('Speech synthesis not supported');
}
</script>
@endif
<hr>
@include('Layout.footer')
</body>
</html>
@if(isset($Success))
<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Your Query is Submitted Successfully.";

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
@else
<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Contact Us";

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
@endif
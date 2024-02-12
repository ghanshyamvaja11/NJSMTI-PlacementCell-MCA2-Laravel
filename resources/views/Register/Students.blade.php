<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJSMTI Placement Cell</title>
<link rel="icon" type="image/x-icon" href="{{asset('Images/Header&Footer/favicon.jpg')}}">
    
    <link rel="stylesheet" href="{{asset('css/headerNmenuNfooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/Admin_Welcome.css')}}">
     <link rel="stylesheet" href="{{asset('css/Register.css')}}">
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
        <section id="Logged_in_sec">
<div class="navbar">
    <div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
    <a href="{{url('')}}/">HOME</a>
    <a href="{{url('')}}/login">login</a>
    <a href="{{url('')}}/contactus">Contact us</a>
</div>
</section>

<main>
     @if (isset($success))

        <center><h4 style="color: green; font-size: 15.9px;">{{$success}}</h4></center>
     @endif
    @error('Enrollment_No')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('name')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('course')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('mobile')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('email')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('password')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror

    @if (isset($AccountExists))
        <center><h4 style="color: red; font-size: 15.9px;">{{$AccountExists}}</h4></center>
    @endif
    <section>
        <p>
        <center>
        <form action="{{url('')}}/register/student" method="POST">
            @csrf
            <fieldset>
            <legend>Student Registration</legend>
<center><img src="{{asset('Images/Login/Logged_in.jpg')}}" style='background-color: white; height: 96px; width: 95px; border-radius: 59px;'></center>
                <p>
                <input type="number" id="Enrollment_No" class="fields" placeholder="Enter Your Enrollment No *" name="Enrollment_No" inputmod="numeric" required /><br><br>
                <input type="text" id="name" class="fields" placeholder="Enter Your Name *" name="name" required><br><br>
                <select name="course" id="course" class="fields" required>
                    <option selected>Select Your Course</option>
                    <option value="MCA Sem-1">MCA Sem-1</option>
                    <option value="MCA Sem-2">MCA Sem-2</option>
                    <option value="MCA Sem-3">MCA Sem-3</option>
                    <option value="MCA Sem-4">MCA Sem-4</option>
                    <option value="MBA Sem-1">MBA Sem-1</option>
                    <option value="MBA Sem-2">MBA Sem-2</option>
                    <option value="MBA Sem-3">MBA Sem-3</option>
                    <option value="MBA Sem-4">MBA Sem-4</option>
                </select><br>
            <input type="Number" name="mobile" id="mobile" placeholder="Enter Your Mobile Number *" class="fields" required><br>
            
  <input type="email" name="email" id="email" placeholder="Enter Your Email *" class="fields" required><br><br>
  
            <input type="password" name="password" id="Password" placeholder="Enter Your Password *" class="fields" required><br>
            <input type="password" name="password_confirmation" id="Password" placeholder="Confirm Password *" class="fields" required><br><br>
            <center><input type="submit" name="Register" value="Register" id="Register"></center>
        </form>
    </section>
</main>
<hr>
@include('Layout.footer')
</body>
</html>

    @if (isset($success))
<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Thank you" + <?php echo json_encode($Name); ?> + "for registering yourself on N.J. Sonecha Management and Technical Institute's Placement Cell.";

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
  message.text="Student Registration";

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
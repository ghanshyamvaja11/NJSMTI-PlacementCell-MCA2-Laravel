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
    <link rel="stylesheet" href="{{asset('css/Admin_Welcome.css')}}">
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
        .see:hover{
            background-color: green;
            color: white;
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
        <div id="Logged_in">
            <img src="{{asset('Images/Login/Logged_in.jpg')}}"><br>
            <small>
        {{$UserId}}
 </small>
@include('Administrator.AdminDesk')
<div class="navbar">
    <div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
    <a href="{{url('')}}/administrator">HOME</a>
    <a href="{{url('')}}/administrator/company" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Companies Data</a>
    <a href="{{url('')}}/administrator/students">Students data</a>
    <a href="{{url('')}}/administrator/company/manage">Manage Companies</a>
    <a href="{{url('')}}/administrator/students/manage">Manage Students</a>
    <a href="{{url('')}}/administrator/placement/register">Placement</a>
    <a href="{{url('')}}/administrator/event/create">Event</a>
</div>
</section>
<main>
    @if(isset($Success))
    <center><h4 style="color: green;">{{$Success}}</h4></center>
    @endif
    <section>
    <center>
        @if(isset($query) and count($query) > 0)
        <table border=2>
            <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Query</th>
            </tr>
            <tr>
            @foreach($query as $query)
            <td>{{$query->Name}}</td>
            <td>$query->email</td>
            <td><a href="/administrator/query/{{$query->email}}"><button style="color: white; background: green; border: 2px solid black; border-radius: 6px;">Solve</button></a></td>
            </tr>
            @endforeach
        @endif
        @if(isset($User) and count($User) > 0)
        <form action="{{url('')}}/solvequery" method="POST">
            @csrf
            <fieldset>
            <legend>Solve Queries</legend>
            <input type="text" name="name" id="name" value="{{$User->Name}}" readonly required><br><br>
            <input type="email" name="email" id="email2" value="{{$User->email}}" readonly required><br><br>
            <select name="query_type" id="query" readonly required>
                <option value="{{$User->Query_Type}}" selected>{{$User->Query_Type}}</option><br><br>
                </select>
            <textarea name="description" id="description" cols="20" rows="5" placeholder="describe Your Query in detail *" readonly>{{$User->description}}</textarea><br>
                        <textarea name="reply" id="description" cols="20" rows="5" placeholder="Send Query Reply to User *"></textarea></textarea><br>
            <center><input type="submit" name="submit" value="Submit" id="Submit"></center>
            </fieldset>
        </form>
        @endif
    </section>
    
    @if(isset($Success))
            <script>
         if ('speechSynthesis' in window) {
  const synth = window.speechSynthesis;
  
  const text = "Email is Sent To the User.";

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
  message.text="Solve Queries";

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
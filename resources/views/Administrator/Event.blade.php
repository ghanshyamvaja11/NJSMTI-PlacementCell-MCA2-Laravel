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

.btndlt:hover{
    background: red;
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
    <a href="{{url('')}}/administrator/company">Companies Data</a>
    <a href="{{url('')}}/administrator/students">Students data</a>
    <a href="{{url('')}}/administrator/company/manage">Manage Companies</a>
    <a href="{{url('')}}/administrator/students/manage">Manage Students</a>
    <a href="{{url('')}}/administrator/placement/register">Placement</a>
    <a href="{{url('')}}/administrator/event/create" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Event</a>
    <a href="{{url('')}}/administrator/solvequery">Solve Queries</a>
</div>
</section>

<main>
    @error('EventId')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('Name')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('Date')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('Description')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    <section>
        <p>
        <center>
            @if (isset($EventExists))
                <center><h4 style="color: red; font-size: 15.9px;">{{$EventExists}}</h4></center>
            @endif
             @if (isset($success))
                <center><h4 style="color: green; font-size: 15.9px;">{{$success}}</h4></center>
            @endif
            @if (isset($delete))
                <center><h4 style="color: red; font-size: 15.9px;">{{$delete}}</h4></center>
            @endif
        <form action="{{url('')}}/administrator/event/create" method="POST">
            @csrf
            <fieldset>
            <legend>Event Announcement</legend>
<center><img src="{{asset('Images/Login/Logged_in.jpg')}}" style='background-color: white; height: 96px; width: 95px; border-radius: 59px;'></center>
                <p>
                <input type="text" id="EventId" class="fields" placeholder="Enter Event Id*" name="EventId" required /><br><br>
                <input type="text" id="Name" class="fields" placeholder="Enter Event Name*" name="Name" required><br><br>
            <span style="font-size: 19.5px;">Event Date : </span>    
  <input type="date" name="EventDate" id="EventDate" class="fields" style="width: 155px;" required><br><br>
            <textarea name="Description" id="description" cols="32" rows="5" placeholder="write desciption about event*" style="resize: none;"></textarea><br>
            <center><input type="submit" name="Register" value="Create" id="Register"></center>
        </form>
    </section>

    @if ($noofevents == 0)
    
    @else
    <center>
        <h1 style="color: white; background: blue; border-radius: 29px; font-size: 24.9px;">Available Events</h1>
        <table>
            <tr>
                <th style="color: blue;">Event_Id</th>
                <th style="color: blue;">Name</th>
                <th style="color: blue;">Date</th>
                <th style="color: blue;">Delete Event</th>
            </tr>
            @foreach ($events as $event)
            <tr>
            <th>{{$event->EventId}}</th>
                <th>{{$event->Name}}</th>
                <th>{{date("F j, Y", strtotime($event->Date))}}</th>
                <th><a href="{{url('')}}/administrator/event/delete/{{$event->EventId}}"><button style="color: white; background: red; cursor: pointer; border-radius: 19.5px;" class="btndlt">Delete</button></a></th>
            </tr>
            @endforeach
        </table>
    </center>
    @endif

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
  message.text="Event Is Created succesfully.";

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

@if (isset($delete))

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Event Is deleted succesfully.";

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
  message.text="Event";

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
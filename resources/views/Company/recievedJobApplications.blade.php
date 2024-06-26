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
        <div id="Logged_in">
            <img src="{{asset('Images/Login/Logged_in.jpg')}}"><br>
            <small>
        {{$UserId}}
 </small>
@include('Company.CompanyDesk')
<div class="navbar">
    <div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
    <a href="{{url('')}}/company">HOME</a>
    <a href="{{url('')}}/company/jobposting">Post new Job</a>
    <a href="{{url('')}}/company/managejobpostings">Manage Jobs</a>
    <a href="{{url('')}}/company/jobapplications" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Job Applications</a>
    <a href="{{url('')}}/company/events">Events</a>
</div>
</section>

<main>
    <center>
        <h1 style="color: white; background: blue; border-radius: 29px; font-size: 24.9px;">Recieved Job Applications</h1>
        <hr>
   @if ($applications->isEmpty())
    <h4 style="color: blue;">no data available yet.</h4>
    @else
            @php
                $first = true;
            @endphp
            @foreach ($applications as $application)
            @if ($first == true)
            <table>
            <tr>
                <th style="color: blue;">Application_Id</th>
                <th style="color: blue;">Student_Id</th>
                <th style="color: blue">Job_Id</th>
                <th style="color: blue;">Application_Date</th>
                <th style="color: blue;">Show_Profile</th>
            </tr>
            {{$first = false}}                
            @endif
            <tr>
            <th>{{$application->ApplicationId}}</th>
                <th>{{$application->StudentId}}</th>
                <th>{{$application->JobId}}</th>
                <th>{{date("F j, Y", strtotime($application->ApplicationDate))}}</th>
                <!--<th>{{$application->Status}}</th>-->
                <th><a href="{{url('')}}/company/jobposting/show/{{$application->StudentId}}"><button style="color: white; background: green; cursor: pointer; border-radius: 19.5px;" class="btndlt">Show</button></a></th>
               <!--@if ($application->Status != ("Y" || "N"))-->
               <!-- <th><a href="{{url('')}}/company/jobposting/proceed/{{$application->ApplicationId}}"><button style="color: white; background: green; cursor: pointer; border-radius: 19.5px;" class="btndlt">Proceed</button></a></th>-->
                <!--<th><a href="{{url('')}}/company/jobposting/reject/{{$application->ApplicationId}}"><button style="color: white; background: red; cursor: pointer; border-radius: 19.5px;" class="btndlt">Reject</button></a></th>-->
                <!--@endif-->
            </tr>
            @endforeach
        </table>
    </center>
    @endif
</main>
<hr>
@include('Company.footer')
</body>
</html>

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Recieved job Application";

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
        <div id="Logged_in">
            <img src="{{asset('Images/Login/Logged_in.jpg')}}"><br>
            <small>
        {{$UserId}}
 </small>
@include('Company.CompanyDesk')
<div class="navbar">
    <div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
    <a href="{{url('')}}/company">HOME</a>
    <a href="{{url('')}}/company/jobposting">Post new Job</a>
    <a href="{{url('')}}/company/managejobpostings">Manage Jobs</a>
    <a href="{{url('')}}/company/jobapplications" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Job Applications</a>
    <a href="{{url('')}}/company/events">Events</a>
</div>
</section>

<main>
    <center>
        <h1 style="color: white; background: blue; border-radius: 29px; font-size: 24.9px;">Recieved Job Applications</h1>
        <hr>
   @if ($applications->isEmpty())
    <h4 style="color: blue;">no data available yet.</h4>
    @else
            @php
                $first = true;
            @endphp
            @foreach ($applications as $application)
            @if ($first == true)
            <table>
            <tr>
                <th style="color: blue;">Application_Id</th>
                <th style="color: blue;">Student_Id</th>
                <th style="color: blue">Job_Id</th>
                <th style="color: blue;">Application_Date</th>
                <th style="color: blue;">Show_Profile</th>
            </tr>
            {{$first = false}}                
            @endif
            <tr>
            <th>{{$application->ApplicationId}}</th>
                <th>{{$application->StudentId}}</th>
                <th>{{$application->JobId}}</th>
                <th>{{date("F j, Y", strtotime($application->ApplicationDate))}}</th>
                <!--<th>{{$application->Status}}</th>-->
                <th><a href="{{url('')}}/company/jobposting/show/{{$application->StudentId}}"><button style="color: white; background: green; cursor: pointer; border-radius: 19.5px;" class="btndlt">Show</button></a></th>
               <!--@if ($application->Status != ("Y" || "N"))-->
               <!-- <th><a href="{{url('')}}/company/jobposting/proceed/{{$application->ApplicationId}}"><button style="color: white; background: green; cursor: pointer; border-radius: 19.5px;" class="btndlt">Proceed</button></a></th>-->
                <!--<th><a href="{{url('')}}/company/jobposting/reject/{{$application->ApplicationId}}"><button style="color: white; background: red; cursor: pointer; border-radius: 19.5px;" class="btndlt">Reject</button></a></th>-->
                <!--@endif-->
            </tr>
            @endforeach
        </table>
    </center>
    @endif
</main>
<hr>
@include('Company.footer')
</body>
</html>

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Recieved job Application";

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
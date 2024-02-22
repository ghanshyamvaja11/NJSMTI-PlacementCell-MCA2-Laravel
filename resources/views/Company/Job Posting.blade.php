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
    <a href="{{url('')}}/company/jobposting" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Post new Job</a>
    <a href="{{url('')}}/company/managejobpostings">Manage Jobs</a>
    <a href="{{url('')}}/company/jobapplications">Job Applications</a>
    <a href="{{url('')}}/company/events">Events</a>
</div>
</section>

<main>
    @error('JobId')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('CompanyId')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('Position')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('Description')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('Salary')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('Requirement')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror
    @error('ApplicationDeadline')
        <center><h4 style="color: red; font-size: 15.9px;">{{$message}}</h4></center>
    @enderror

    @if (isset($JobExists))
        <center><h4 style="color: red; font-size: 15.9px;">{{$JobExists}}</h4></center>
    @endif
    @if (isset($Delete))
        <center><h4 style="color: red; font-size: 15.9px;">{{$Delete}}</h4></center>
    @endif
        @if (isset($success))

        <center><h4 style="color: green; font-size: 15.9px;">{{$success}}</h4></center>
        @endif
    <section>
        <p>
        <center>
        <form action="{{url('')}}/company/jobposting" method="POST">
            @csrf
            <fieldset>
            <legend>Job Posting</legend>
<center><img src="{{asset('Images/Login/Logged_in.jpg')}}" style='background-color: white; height: 96px; width: 95px; border-radius: 59px;'></center>
                <p>
                <input type="number" id="Job_Id" class="fields" placeholder="Enter Your Job Id*" name="JobId" inputmod="numeric" required /><br><br>
                <input type="text" id="CompanyId" class="fields" value="{{$UserId}}" name="CompanyId" readonly required><br><br>
            <input type="text" name="Position" id="Position" placeholder="Enter Position*" class="fields" required><br><br>
            <input type="text" name="Field" id="Field" placeholder="Enter Field for ex. IT, Finance, etc.." class="fields" required><br><br>
  <input type="text" name="Description" id="Description" placeholder="Enter Job Description*" class="fields" required><br><br>
  
            <input type="number" name="Salary" id="Salary" placeholder="Enter Salary*" class="fields" required><br><br>
            <textarea name="Requirement" id="Requirement" cols="32" rows="5" placeholder="Enter Requirements*" style="resize: none;" required></textarea><br><br>
            <span style="font-size: 15.9px; color: white;">Application Deadline : </span>    
  <input type="date" name="ApplicationDeadline" id="ApplicationDeadline" class="fields" style="width: 105px;" required><br>
            <center><input type="submit" name="Register" value="Post new Job" id="Register"></center>
        </form>
    </section>
    
    @if (isset($success))

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="New Job is Posted Successfully.";

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
        <center><h4 style="color: red; font-size: 15.9px;">{{$delete}}</h4></center>

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Job is Deleted Successfully.";

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
  message.text="Job Posting";

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

    @if ($jobs->isEmpty())
    
    @else
    <center>
        <h1 style="color: white; background: blue; border-radius: 29px; font-size: 24.9px;">Available Jobs</h1>
        <table>
            <tr>
                <th style="color: blue;">Job_Id</th>
                <th style="color: blue;">Position</th>
                <th style="color: blue;">Field</th>
                <th style="color: blue;">Application_Deadline</th>
                <th style="color: blue;">Delete_Job</th>
            </tr>
            @foreach ($jobs as $job)
            <tr>
            <th>{{$job->JobId}}</th>
                <th>{{$job->Position}}</th>
                <th>{{$job->Field}}</th>
                <th>{{date("F j, Y", strtotime($job->ApplicationDeadline))}}</th>
                <th><a href="{{url('')}}/company/jobs/delete/{{$job->JobId}}"><button style="color: white; background: green; cursor: pointer; border-radius: 19.5px;" class="btndlt">Delete</button></a></th>
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
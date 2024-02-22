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
.label{
    width: 29px;
}

input[type="submit"]:hover{
    background: blue;
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
@include('Student.StudentDesk')
<div class="navbar">
    <div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
    <a href="{{url('')}}/student">HOME</a>
    <a href="{{url('')}}/student/jobs" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Jobs</a>
    <a href="{{url('')}}/student/events">Events</a>
    <a href="{{url('')}}/student/applies">Applies</a>
    <a href="{{url('')}}/student/uploadresume">Upload Resume</a>
    <a href="{{url('')}}/student/updateprofile" >Update Profile</a>
</div>
</section>

<main>
    <center>
    <h1 style="color: white; background: blue; border-radius: 29px; font-size: 24.9px;">Job Information</h1>
    </center>
    <h4 style="font-size: 15.9px; color: blue;">Your Id : <span style="font-weight: bold; color: black;">{{$UserId}}</span></h4>
    <h4 style="font-size: 15.9px; color: blue;">Job Publisher : <span style="font-weight: bold; color: black;">{{$CompanyId->Name}}</span></h4>
    <h4 style="font-size: 15.9px; color: blue;">Job Id : <span style="font-weight: bold; color: black;">{{$jobs->JobId}}</span></h4>
    <h4 style="font-size: 15.9px; color: blue;">Position : <span style="font-weight: bold; color: black;">{{$jobs->Position}}</span></h4>
    <h4 style="font-size: 15.9px; color: blue;">Field : <span style="font-weight: bold; color: black;">{{$jobs->Field}}</span></h4>
    <h4 style="font-size: 15.9px; color: blue;">Description : <span style="font-weight: bold; color: black;"><br>{{$jobs->Description}}</span></h4>
    <h4 style="font-size: 15.9px; color: blue;">Salary : <span style="font-weight: bold; color: black;">{{$jobs->Salary}}</span></h4>
    <h4 style="font-size: 15.9px; color: blue;">Requirements : <span style="font-weight: bold; color: black;"><br>{{$jobs->Requirement}}</span></h4>
    <h4 style="font-size: 15.9px; color: blue;">Application Deadline : <span style="font-weight: bold; color: black;">{{$jobs->ApplicationDeadline}}</span></h4>
    <form action="{{url('')}}/student/jobs/apply/{{$UserId}}/{{$jobs->JobId}}" method="GET">
            @csrf
            {{-- <fieldset> --}}
            {{-- <legend>Job Information</legend> --}}
            <div style="display: none;">
                <p>
                <div id="lable"><label style="color: white; font-weight: bold;" for="StudentId">Your Id : </label></div><input type="text" id="StudentId" class="fields" name="StudentId" value="{{$UserId}}" readonly required /><br><br>
                <div id="lable"><label style="color: white; font-weight: bold;" for="CompanyId">Job Publisher : </label></div><input type="text" id="CompanyId" class="fields" name="CompanyId" value="{{$CompanyId->Name}}" readonly required /><br><br>
                <div id="lable"><label style="color: white; font-weight: bold;" for="JobId">Job Id : </label></div><input type="number" id="JobId" class="fields" name="JobId" inputmod="numeric" value="{{$jobs->JobId}}" readonly required /><br><br>
            <div id="lable"><label style="color: white; font-weight: bold;" for="Position">Position : </label></div><input type="text" name="Position" id="Position" class="fields" value="{{$jobs->Position}}" readonly required><br><br>
            <div id="lable"><label style="color: white; font-weight: bold;" for="Field">Field : </label></div><input type="text" name="Field" id="Field" class="fields" value="{{$jobs->Field}}" readonly required><br><br>
  <div id="lable"><label style="color: white; font-weight: bold;" for="Description">Description : </label></div><input type="text" name="Description" id="Description" class="fields" value="{{$jobs->Description}}" readonly required><br><br>
            <div id="lable"><label style="color: white; font-weight: bold;" for="Salary">Salary : </label></div><input type="number" name="Salary" id="Salary" class="fields" value="{{$jobs->Salary}}" readonly required><br><br>
            <div id="lable"><label style="color: white; font-weight: bold;" for="Requirement">Requirement : </label></div><textarea name="Requirement" id="Requirements" cols="32" rows="5" style="resize: none;" readonly required>{{$jobs->Requirement}}</textarea><br><br>
            <label style="color: white; font-weight: bold;" for="ApplicationDeadline">Application Deadline</label>    
  <input type="date" id="ApplicationDeadline" name="ApplicationDeadline" class="fields" style="width: 105px;" value="{{$jobs->ApplicationDeadline}}" readonly required><br><br>
  </div>
  @if (!isset($applied))
      <center><input type="submit" style="color: white; background: green; font-size: 29px; border-radius: 15.9px;" name="submit" value="Apply"></center>
  @else
  <center><h4 style="color: green;">Applied</h4></center>
  @endif
        </form>
</main>
<hr>
@include('Student.footer')
</body>
</html>

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Job Information";

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
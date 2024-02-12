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
    <link rel="stylesheet" href="{{asset('css/Manage_queries.css')}}">
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
    <a href="{{url('')}}/administrator/students/manage" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Manage Students</a>
    <a href="{{url('')}}/administrator/placement/register">Placement</a>
    <a href="{{url('')}}/administrator/event/create">Event</a>
    <a href="{{url('')}}/administrator/solvequery">Solve Queries</a>
</div>
</section>

<main>
    <center><h1 style="color: white; background: blue; border-radius: 29px; font-size: 24.9px;">Manage Students</h1></center>
    <hr>
    <center>
        <div id="sec">
        @if (isset($deletestudent))
        @error('StudentId')
            <h4 style='color: red'>{{$message}}</h4>
        @enderror
            <h4 style='color: red'>Student : <span style='color: green;'>{{$StudentId}}</span> is Deleted Succesfully.</h4>
        @endif
        @if (isset($studentnotfoundindatabase))
        @error('StudentId')
            <h4 style='color: red'>{{$message}}</h4>
        @enderror
            <h4 style='color: red'>Student : <span style='color: green;'>{{$StudentId}}</span> is not found in our database.</h4>
        @endif
        @if (isset($deleteclass))
        @error('Class')
            <h4 style='color: red'>{{$message}}</h4>
        @enderror
            <h4 style='color: red'>Class : <span style='color: green;'>{{$deleteclass}}</span> is Deleted Succesfully.</h4>
        @endif
        @if (isset($classnotfoundindatabase))
        @error('Class')
            <h4 style='color: red'>{{$message}}</h4>
        @enderror
            <h4 style='color: red'>Class : <span style='color: green;'>{{$Class}}</span> is not found in our database.</h4>
        @endif
        <div id="form">
            <br>
        <h4 style="color: white; background-color: red; display: inline; padding: 4.9px; border-radius: 29.9px;">Delete by Enrollment Number</h4><br><br>
        <form action="{{url('')}}/administrator/student/manage/enrollment" Method='POST'>
            @csrf
            <center>
        <input type='Text' placeholder='Enter Students`s Enrollment No *' id="SPUID" name="StudentId" style="width: 54%; height: 19.9px;"> &nbsp; &nbsp;
        <input type='submit' value='Delete' id="solved" name="Delete">
           </form>
           <br><br>
           <h4 style="color: white; background-color: red; display: inline; padding: 4.9px; border-radius: 29.9px;">Delete Whole Class</h4>
           <br><br>
        <form action="{{url('')}}/administrator/student/manage/class" Method='POST'>
            @csrf
            <center>
        <Select name="Class" style="width: 54%; height: 29.8px;">
            <option Selected>Select class</option> 
            <option value="MCA Sem-4">MCA Sem-4</option>
            <option value="MBA Sem-4">MBA Sem-4</option>
            </Select>
            &nbsp; &nbsp;
        <input type='submit' value='Delete' id="solved" name="DeleteClass">
        <br><br>
           </form>
           </div>
           </center>
           </div>
           </center>
           <p>
</main>
<hr>
@include('Administrator.footer')
</body>
</html>

@if (isset($deletestudent) || isset($StudentId) || isset($studentnotfoundindatase))

@else
<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Manage Student";

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
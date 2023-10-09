<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJSMTI</title>
<link rel="icon" type="image/x-icon" href="{{asset('Images/Header&Footer/favicon.jpg')}}">
    
    <link rel="stylesheet" href="{{asset('css/headerNmenuNfooter.css')}}">
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
    <a href="{{url('')}}/administrator/company">Companies Data</a>
    <a href="{{url('')}}/administrator/students"  style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Students data</a>
    <a href="{{url('')}}/administrator/company/manage">Manage Companies</a>
    <a href="{{url('')}}/administrator/students/manage">Manage Students</a>
    <a href="{{url('')}}/administrator/placement/register">Placement</a>
    <a href="{{url('')}}/administrator/event/create">Event</a>
</div>
</section>

<main>
     <center> <center><h1 style="color: white; background: blue; border-radius: 29px; font-size: 24.9px;">Manage Student data</h1></center></center>
        <hr>
        @if (isset($StudentId))
        @error('StudentId')
            <h4 style='color: red'>{{$message}}</h4>
        @enderror
        @endif

        @if (isset($Class))
        @error('Class')
            <h4 style='color: red'>{{$message}}</h4>
        @enderror
        @endif

        <br>
        <center><h4 style='color: white; background-color: green; border-radius: 29px; padding: 9px; padding-bottom: 9.2px; display: inline;'>Search by Enrollment No</h4></center><br>
    <center>
        <div style='background-color: skyblue; display: inline-block; border-radius: 15px; width: 92%; padding: 9px;' id="pathSelection">
    <form action="{{url('')}}/administrator/students/find/enrollment" method="POST">
        @csrf
        <input type="number" id="SPU_ID" name="StudentId" placeholder="Enter Student's Enrollment No" style='height: 29px;'><p>
        <input type="submit" value="Search" name="see" id='see' style="font-size: 19.9px; color: black; background-color: white;" class="see">
        </div>
        
        </center>
        <p>
        <center>

@if (isset($StudentId))
        @if (isset($student))
        <div style="display: inline-block; text-align: left; color: white; background-color: blue; padding: 9px; border-radius: 29px;">
            <h4 style="display: inline;">Enrollment No : </h4><h5 style="display : inline; color: yellow;">{{$StudentId}}</h5><br>
            <h4 style="display : inline;">Student's Name : </h4><h5 style="display : inline; color: yellow;">{{$student->Name}}</h5><br>
            <h4 style="display : inline;">Course : </h4><h5 style="display : inline; color: yellow;">{{$student->Program}}</h5><br>
            @if ($student->Program == "MCA Sem-1")
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;">1</h5>
            @elseif ($student->Program == "MCA Sem-2")
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;">2</h5>
             @elseif ($student->Program == "MCA Sem-3")
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;">3</h5>
            @elseif($student->Program == "MCA Sem-4")
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;">4</h5>
            @elseif ($student->Program == "MBA Sem-1")
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;">1</h5>
            @elseif ($student->Program == "MBA Sem-2")
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;">2</h5>
             @elseif ($student->Program == "MBA Sem-3")
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;">3</h5>
            @else
            <h4 style="display : inline;">Current Semester : </h4><h5 style="display : inline; color: yellow;">4</h5>
            @endif
            <br>
            <h4 style="display : inline;">Mobile : </h4><h5 style="display : inline; color: yellow;">{{$student->Mobile}}</h5><br>
            <h4 style="display : inline;">Email : </h4><h5 style="display : inline; color: yellow;">{{$student->Email}}</h5>
            </div>
            @else
         <h4 style='color: red'>Student : <span style='color: green;'>{{$StudentId}}</span> is not found in Our database. Enter Valid StudentId.</h4>
@endif
    @endif
</form>
<hr>
<br>
<center><h4 style='color: white; background-color: green; border-radius: 29px; padding: 9px; padding-bottom: 9.2px; display: inline;'>Search Whole Class</h4></center><br>
<center>
        <div style='background-color: skyblue; display: inline-block; border-radius: 15px; width: 92%; padding: 9px;' id="pathSelection">
    <form action="{{url('')}}/administrator/students/find/class" method="POST">
        @csrf
        <select name="Class" style="height: 29.4px; width: 51%;" required>
            <option selected>Select a Class</option>
            <option value="MCA Sem-1">MCA Sem-1</option>
            <option value="MCA Sem-2">MCA Sem-2</option>
            <option value="MCA Sem-3">MCA Sem-3</option>
            <option value="MCA Sem-4">MCA Sem-4</option>
        
            <option value="MBA Sem-1">MBA Sem-1</option>
            <option value="MBA Sem-2">MBA Sem-2</option>
            <option value="MBA Sem-3">MBA Sem-3</option>
            <option value="MBA Sem-4">MBA Sem-4</option>
        </select><p>
        <input type="submit" value="Search" name="see2" id='see' style="font-size: 19.9px; color: black; background-color: white;" class="see">
        </div>
        
        </center>

        <p>
            @if (isset($Class))
            @if (isset($Students) and count($Students) > 0)
        <center>
    <table border=2>
            <tr>
            <th>StudentId</th>
            <th>Student's Name</th>
            <th>Mobile No</th>
            <th>Email</th>
            </tr>
@foreach ($Students as $student)    
    <tr>
    <td>{{$student->StudentId}}</td>
    <td>{{$student->Name}}</td>
    <td>{{$student->Mobile}}</td>
    <td>{{$student->Email}}</td>
    </tr>
@endforeach      
        </table>
        @else
         <h4 style='color: red'><span style='color: green;'>{{$Class}}</span> Students are not found in Our database.</h4>
            @endif
        @endif
</form>
<p>
@include('Administrator.footer')
</body>
</html>

@if (isset($StudentId) || isset($Class))

@else
<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Students Data";

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
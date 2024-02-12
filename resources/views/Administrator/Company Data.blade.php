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
    <a href="{{url('')}}/administrator/solvequery">Solve Queries</a>
</div>
</section>

<main>
    <hr>
        <center><h1 style="color: white; background: blue; border-radius: 29px; font-size: 29.29px;">Company Data</h1></center>
        <hr>
        @if (isset($CompanyId))
        @error('Company')
            <h4 style='color: red'>{{$message}}</h4>
        @enderror
        @endif

        @if (isset($Industry))
        @error('Industry')
            <h4 style='color: red'>{{$message}}</h4>
        @enderror
        @endif

        <br>
        <center><h4 style='color: white; background-color: green; border-radius: 29px; padding: 9px; padding-bottom: 9.2px; display: inline;'>Search by CIN</h4></center><br>
    <center>
        <div style='background-color: skyblue; display: inline-block; border-radius: 15px; width: 92%; padding: 9px;' id="pathSelection">
    <form action="{{url('')}}/administrator/company/find/cin" method="POST">
        @csrf
        <input type="text" id="SPU_ID" name="CIN" placeholder="Enter Company's CIN" style='height: 29px;'><p>
        <input type="submit" value="Search" name="see" id='see' style="font-size: 19.9px; color: black; background-color: white;" class="see">
        </div>
        
        </center>
        <p>
        <center>

@if (isset($CompanyId))
        @if (isset($company))
        <div style="display: inline-block; text-align: left; color: white; background-color: blue; padding: 9px; border-radius: 29px;">
            <h4 style="display: inline;">CIN : </h4><h5 style="display : inline; color: yellow;">{{$company->CompanyId}}</h5><br>
            <h4 style="display : inline;">Company's Name : </h4><h5 style="display : inline; color: yellow;">{{$company->Name}}</h5><br>
            @if ($company->Program == "IT")
            <h4 style="display : inline;">Industry : </h4><h5 style="display : inline; color: yellow;">Information Technology</h5>
            @else
            <h4 style="display : inline;">Industry : </h4><h5 style="display : inline; color: yellow;">Businness</h5>
            @endif
            <br>
            <h4 style="display : inline;">Email : </h4><h5 style="display : inline; color: yellow;">{{$company->Email}}</h5><br>
            <h4 style="display : inline;">Location : </h4><h5 style="display : inline; color: yellow;">{{$company->Location}}</h5>
            </div>
            @else
         <h4 style='color: red'>CIN : <span style='color: green;'>{{$CompanyId}}</span> is not found in Our database. Enter Valid CIN.</h4>
    @endif
    @endif
</form>
<hr>
<br>
<center><h4 style='color: white; background-color: green; border-radius: 29px; padding: 9px; padding-bottom: 9.2px; display: inline;'>Search by Industry</h4></center><br>
<center>
        <div style='background-color: skyblue; display: inline-block; border-radius: 15px; width: 92%; padding: 9px;' id="pathSelection">
    <form action="{{url('')}}/administrator/company/find/industry" method="POST">
        @csrf
        <select name="Industry" style="height: 29.4px; width: 51%;" required>
            <option selected>Select an Industry</option>
            <option value="IT">Information Technology</option>
            <option value="Business">Business</option>
        </select><p>
        <input type="submit" value="Search" name="see2" id='see' style="font-size: 19.9px; color: black; background-color: white;" class="see">
        </div>
        
        </center>

        <p>

        @if (isset($companies))
            @if (count($companies) > 0)
        <center>
    <table border=2>
            <tr>
            <th>CIN</th>
            <th>Company's Name</th>
            <th>Email</th>
            <th>Industry</th>
            <th>Location</th>
            </tr>
@foreach ($companies as $company)    
@php $Industry = $company->Industry @endphp
    <tr>
    <td>{{$company->CompanyId}}</td>
    <td>{{$company->Name}}</td>
    <td>{{$company->Email}}</td>
    <td>{{$company->Industry}}</td>
    <td>{{$company->Location}}</td>
    </tr>
@endforeach      
        </table>
@else
         <h4 style='color: red'><span style='color: green;'>{{$Industry}} Industry</span> Companies are not found in Our database.</h4>
    @endif
 @endif
</form>
<p>
@include('Administrator.footer')
</body>
</html>

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Company Data";

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
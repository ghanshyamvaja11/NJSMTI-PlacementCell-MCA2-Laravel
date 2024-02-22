<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJSMTI Placement Cell</title>
    <link rel="icon" type="image/x-icon" href="{{asset('Images/Header&Footer/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/headerNmenuNfooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        .disclaimer{
            display: none;
        }
    #As:hover{
        color: red;
    }

    #Developer_Page{
        color: white; 
        font-size: 19.5px; 
        font-family: Arial,San-Serif; 
        background-color: RGB(219, 112, 18); 
        padding: 9.6px; 
        display: inline; 
        text-decoration: none; 
        border-radius: 29.4px;
    }
    #Developer_Page:hover{
        background-color: yellow;
        color: blue;
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
.Companies{
    height: 20%;
    width: 20%;
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
       <div style='background-color: yellow; text-align: center; padding-top: 5px; padding-bottom: 1px;'><a href="{{url('')}}/login"><img id="Login" src="{{asset('Images/Login/Login.png')}}"></a></div>
           <div style='background-color: lightblue;; text-align: center; padding-top: 15px; padding-bottom: 11.9px;'>
        <a href="https://ghanshyamvaja.000webhostapp.com" style="text-decoration: none;"><h5 id="Developer_Page">See The Developer Page</h5></a></div>
        </header>
<div class="navbar">
    <!-- Add this inside the <nav class="navbar"> ... </nav> block -->
<div class="icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>

    <a href="{{url('')}}" style="color: yellow;  background-color: black; font-weight: bolder; border: 2px solid white; border-radius: 29px;">HOME</a>
    <a href="{{url('')}}/registration">Registration</a>
    <a href="{{url('')}}/contactus">Contact us</a>
</div>

<main>
    <section>
        <div id="Motive">
            <center>
            <img src="{{asset('Images/Home/Campus.jpg')}}" alt="Campus">
            <!--</center>-->
            <marquee direction="left">
                <h6>Welcome to our College Placement Cell! Your gateway to a world of opportunities awaits. Explore, connect, and embark on your journey to a successful career with us.</h6>
            </marquee>
        </div>
    </section>
    <hr>
    
    <section>
        <div id="BKNMU">
            <h1>Affiliated With GTU</h1>
            <img src="{{asset('Images/Home/GTU.jpg')}}" alt="BKNMU">
        </div>
        <div id="BKNMU_div">
            <br>
            <a target="_Blank" href="https://www.gtu.ac.in/"><input type="button" value="Click Here to Know More About GTU" id="BknmuBtn"></a>
        </div>
    </section>
    <hr>
    
@if(isset($Placement))
<section>
    <div id="BKNMU">
        <h1>Placements</h1>
        <marquee id="Placement">
            @foreach($Placement as $data)
            <div style="display: inline-block; text-align: left; color: white; background-color: blue; padding: 9px; border-radius: 29px;">
                <h4 style="display: inline;">Placement Id : </h4><h5 style="display : inline; color: yellow;">{{$data->PlacementId}}</h5><br>
                <h4 style="display : inline;">Student Enrollment : </h4><h5 style="display : inline; color: yellow;">{{$data->StudentId}}</h5><br>
                <h4 style="display : inline;">Student Name : </h4><h5 style="display : inline; color: yellow;">
                    @foreach($Student as $student)
                    @if($student->StudentId == $data->StudentId)
                    {{$student->Name}}
                    @endif
                    @endforeach
                </h5><br>
                <h4 style="display : inline;">Course : </h4><h5 style="display : inline; color: yellow;">
                    @foreach($Student as $student)
                    @if($student->StudentId == $data->StudentId)
                    {{$student->Program}}
                    @endif
                    @endforeach
                </h5><br>
                <h4 style="display : inline;">Salary Offered : </h4><h5 style="display : inline; color: yellow;">{{$data->SalaryOffered}}</h5><br>
                <h4 style="display : inline;">Offered by : </h4><h5 style="display : inline; color: yellow;">
                    @foreach($Job as $job)
                    @if($data->JobId == $job->JobId)
                    @foreach($Company as $company)
                    @if($company->CompanyId == $job->CompanyId)
                    {{$company->Name}}
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                </h5><br>
                <h4 style="display : inline;">Company Id : </h4><h5 style="display : inline; color: yellow;">
                    @foreach($Job as $job)
                    @if($data->JobId == $job->JobId)
                    @foreach($Company as $company)
                    @if($company->CompanyId == $job->CompanyId)
                    {{$company->CompanyId}}
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                </h5><br>
                <h4 style="display : inline;">Date Placed : </h4><h5 style="display : inline; color: yellow;">{{$data->DatePlaced}}</h5><br>
            </div>
            @endforeach
        </marquee>
    </div>
</section>
@endif

    <section>
        <div id="BKNMU">
                <h1>Companies</h1>
            <!--</center>-->
            <marquee direction="left">
                <img src="{{asset('Images/Companies/Img1.jpg')}}" class="Comapnies" alt="img1">
                <img src="{{asset('Images/Companies/Img2.jpg')}}" class="Comapnies" alt="img2">
                <img src="{{asset('Images/Companies/Img3.jpg')}}" class="Comapnies" alt="img3">
                <img src="{{asset('Images/Companies/Img4.jpg')}}" class="Comapnies" alt="img4">
                <img src="{{asset('Images/Companies/Img5.jpg')}}" class="Comapnies" alt="img5">
                <img src="{{asset('Images/Companies/Img6.jpg')}}" class="Comapnies" alt="img6">
            </marquee>
        </div>
    </section>
    <hr>
    
    <section>
        <div id="Video-Gallary">
            <center>
            <h1>Video Gallary</h1>
            <iframe src="https://www.youtube.com/embed/ZVSzZyn79y8"></iframe>
            &nbsp;
            </center>
        </div>    
    </section>
    <hr>

    <section>
        <div id="Principal">
        <center>
            <img src="{{asset('Images/Home/Director/Director.jpg')}}" alt="Director's images">
            <marquee direction="left" scrollamount="6" height="40" width="200">
            <h4>Director of NJSMTI : Prof.(Dr.) K. C. Dwivedi</h4>
            </marquee>
        </center>
        </div>
    </section>
    <hr>

</main>
@include('Layout.footer')

<script>
    document.addEventListener('click', function(event) {
        var marquee = document.getElementById('Placement');
        var isClickInsideMarquee = marquee.contains(event.target);

        if (!isClickInsideMarquee) {
            marquee.start();
        } else {
            marquee.stop();
        }
    });
    
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Hi, Thank you for visiting N.J. Sonecha Placement Cell.";

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
</body>
</html>
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
</style>
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
</section>

<main>
<section>
    <a href="{{url('')}}/student/jobs"><img src="{{asset('Images/Icons/img9.jpg')}}" class="imgs" alt=""></a>
    <a href="{{url('')}}/student/events"><img src="{{asset('Images/Icons/img1a.jpg')}}" class="imgs" alt=""></a>
    <a href="{{url('')}}/student/applies"><img src="{{asset('Images/Icons/img10.jpg')}}" class="imgs" alt=""></a>
    <a href="{{url('')}}/student/uploadresume"><img src="{{asset('Images/Icons/img11.jpg')}}" class="imgs" alt=""></a>
    <a href="{{url('')}}/student/updateprofile"><img src="{{asset('Images/Icons/img69.jpg')}}" class="imgs" alt=""></a>
</section>
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
  message.text="Welcome To Student Homepage";

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
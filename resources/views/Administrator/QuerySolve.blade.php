<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJSMTI</title>
    <link rel="icon" type="image/x-icon" href="{{asset('Images/Header&Footer/favicon.jpg')}}">
    <link rel="stylesheet" href="{{asset('css/headerNmenuNfooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/Contact us.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/Admin_Welcome.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .disclaimer {
            display: none;
        }
        @media (max-width: 768px) {
            .navbar a {
                display: none;
            }
            .navbar .icon {
                display: block;
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
            }
            .navbar .icon .bar {
                width: 25px;
                height: 3px;
                background-color: black;
                margin: 6px 0;
                background-color: white;
                border: 2px solid black;
            }
            .navbar.show a {
                display: block;
                padding: 15px;
                text-align: center;
                color: black;
                text-decoration: none;
                border-bottom: 1px solid #ccc;
            }
            .navbar.show a.active {
                background-color: lightgray;
            }
            .navbar {
                height: 60px;
                overflow: hidden;
                transition: height 0.3s ease;
            }
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
            <small>{{$UserId}}</small>
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
                <a href="{{url('')}}/administrator/event/create">Event</a>
                <a href="{{url('')}}/administrator/solvequery" style="color: white; background-color: red; font-weight: bolder; border: 2px solid white; border-radius: 29.9px;">Solve Queries</a>
            </div>
        </div>
    </section>
    <main>
        <center><h1 style="color: white; background: blue; border-radius: 29px; font-size: 24.9px;">Solve Queries</h1></center>
        <hr>
        <h4 style="color: blue;">no data available yet.</h4>
        <section>
            <center>
                @if(isset($query) and count($query) > 0)
                <table border=2>
                    <tr>
                        <th>Email</th>
                        <th>Query</th>
                    </tr>
                    @foreach($query as $singleQuery)
                    <tr>
                        <td>{{$singleQuery->Email}}</td>
                        <td><a href="/administrator/query/{{$singleQuery->Email}}"><button style="color: white; background: green; border: 2px solid black; border-radius: 6px;">Solve</button></a></td>
                    </tr>
                    @endforeach
                </table>
                @endif
                @if(isset($User))
                <form action="{{url('')}}/administrator/solvequery" method="POST">
                    @csrf
                    <fieldset>
                        <legend>Solve Query</legend>
                        <center><input type="text" name="name" id="name" value="{{$User->name}}" readonly required><br><br>
                        <input type="email" name="email" id="email2" value="{{$User->Email}}" readonly required><br><br>
                        <select name="query_type" id="query" readonly required>
                            <option value="{{$User->Query_Type}}" selected>{{$User->Query_Type}}</option><br><br>
                        </select>
                        <textarea name="description" id="description" cols="20" rows="5" placeholder="describe Your Query in detail *" readonly>{{$User->description}}</textarea><br>
                        </center>
                        <center><input type="submit" name="submit" value="Solved" id="Submit"></center>
                    </fieldset>
                </form>
                <br>
                </section>
                </main>
                @endif
                @if(isset($Success))
                <script>
                if ('speechSynthesis' in window) {
                    const synth = window.speechSynthesis;
                    const text = "Email is Sent To the User.";
                    const utterance = new SpeechSynthesisUtterance(text);
                    synth.speak(utterance);
                } else {
                    alert('Speech synthesis not supported');
                }
                </script>
                @endif
                @if(isset($Success))
                @else
                <script>
                function Speech() {
                    if ('speechSynthesis' in window) {
                        var message = new SpeechSynthesisUtterance();
                        message.text = "Solve Queries";
                        var voices = window.speechSynthesis.getVoices();
                        var maleVoice = voices.find(function(voice) {
                            return voice.name.includes('Male');
                        });
                        message.voice = maleVoice || voices[0];
                        message.volume = 1;
                        message.rate = 1;
                        message.pitch = 1;
                        window.speechSynthesis.speak(message);
                    } else {
                        console.log('Speech synthesis not supported');
                    }
                }
                Speech();
                </script>
                @endif
<hr>
                @include('Administrator.footer')
</body>
</html>
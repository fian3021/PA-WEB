<?php
    require 'config.php';

    session_start();
    if(!isset($_SESSION['login'])){
        echo "
        <script>
            alert('Akses ditolak, silahkan login dulu');
            document.location.href = 'user_login.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="style.css">
    <title>M-Posyandu</title>
</head>
<body>
    <!-- NAVIGATION BAR -->
    <nav>
        <div class="icon">
            <h3>M-Posyandu</h3>
        </div>
        <ul class="menu-1">
            <li><a href="homeUser.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="form_feedback.php">Feedback</a></li>
        </ul>
        <ul class="menu-2">
            <li><a href="profil.php">Profil</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- MAIN-CONTENT -->
    <div class="main-content">
        <!-- CONTENT 1 -->
        <div class="content-1">
            <ul align="center">
                <h1>M-Posyandu</h1>
                <li class="text2"><br>Pendataan imunisasi anak di Posyandu dengan sistem online</li>
            </ul>
            <ul>
                <img src="https://cdn-icons-png.flaticon.com/512/6205/6205025.png" width="250px">
            </ul>
        </div>
        <!-- CONTENT 2 -->
        <div class="content-2">
            <ul align="center">
                <li class="text1"><br>About M-Posyandu<br></li>
                <li class="text2">
                <br><br>Dengan adanya website M-Posyandu ini diharapkan <br>
                    dapat membantu para orang tua dalam pemberian atau penentuan <br>
                    imunisasi si anak, dengan begitu anak bisa mendapatkan <br> 
                    imunisasi yang tepat sesuai dengan usianya.<br><br><br><br>
                </li>
            </ul>
        </div>
        <!-- CONTENT 3 -->
        <div id="features" class="content-3">
            <ul align="center">
                <li class="text1">Features<br><br></li>
                <li class="text3">
                    <p>
                        <a href="formUser.php"><img src="https://cdn-icons-png.flaticon.com/512/684/684831.png"></a>
                        <a href="formUser.php">Pendataan Profile <br> Anak</a>
                    </p>
                    <p>
                        <a href="lihat_data.php"><img src="https://cdn-icons-png.flaticon.com/512/2822/2822676.png"></a>
                        <a href="lihat_data.php">Lihat Data</a>
                    </p>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- FOOTER -->
    <!-- CONTACT -->
    <div id="contact" class="contact">
        <ul align="center">
            <li class="info">
                <h2>M-Posyandu</h2>
                <p>Pendataan imunisasi <br>anak di Posyandu <br>dengan sistem online</p>
            </li>
            <li class="sosmed">
                <h2>Follow Us</h2>
                <a href="" title="Facebook">
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968764.png" width="40px">
                </a>
                <a href="" title="Instagram">
                    <img src="https://cdn-icons-png.flaticon.com/512/3955/3955024.png" width="40px">
                </a>
                <a href="" title="Twiter">
                    <img src="https://cdn-icons-png.flaticon.com/512/3670/3670151.png" width="40px">
                </a>
            </li>
            <li>
                <h2>Contact</h2>
                <p> 
                    Ilham (+62 857-5165-8952) <br>
                    Fiana (+62 821-5065-8726) <br>
                    Fira (+62 831-5351-7731) <br>
                </p>
            </li>
        </ul>
    </div>
    <footer>
        <p align="center">© 2022 designed by development's M-Posyandu. All Rights Reserved</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
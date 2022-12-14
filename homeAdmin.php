<?php
    require "config.php";

    session_start();
    if(!isset($_SESSION['loginAdmin'])){
        echo "
        <script>
            alert('Akses ditolak, silahkan login dulu');
            document.location.href = 'admin_login.php';
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
    <link rel="stylesheet" href="style2.css">
    <title>Admin Page M-Posyandu</title>
</head>
<body>
    <!-- NAVIGATION BAR -->
    <nav>
        <div class="icon">
            <h3>M-Posyandu</h3>
        </div>
        <ul class="menu-1">
            <li><a href="homeAdmin.php">Home</a></li>
            <li><a href="about_admin.html">About</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
        <ul class="menu-2">
            <li><a href="profil_admin.php">Profil</a></li>
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
                <li class="text1">Administrator Page<br>M-Posyandu</li>
            </ul>
            <ul>
                <img src="https://cdn-icons-png.flaticon.com/512/3284/3284615.png" width="350px">
            </ul>
        </div>
        <!-- CONTENT 2 -->
        <div id="features" class="content-2">
            <ul align="center">
                <li class="text1">Features<br><br></li>
                <li class="text3">
                    <p>
                        <a href="lihatdata_admin.php"><img src="https://cdn-icons-png.flaticon.com/512/684/684831.png"></a>
                        <a href="lihatdata_admin.php">Data Imunisasi<br> Anak</a>
                    </p>
                    <p>
                        <a href="editdata_admin.php"><img src="https://cdn-icons-png.flaticon.com/512/833/833275.png"></a>
                        <a href="editdata_admin.php">Mengubah Data<br> Imunisasi</a>
                    </p>
                </li>
            </ul>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p align="center">?? 2022 designed by development's M-Posyandu. All Rights Reserved</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
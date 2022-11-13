<?php
    require 'config.php';

    session_start();
    // if(!isset($_SESSION['login'])){
    //     echo "
    //     <script>
    //         alert('Akses ditolak, silahkan login dulu');
    //         document.location.href = 'user_login.php';
    //     </script>";
    // }else{
        $user = $_SESSION['username'];  
        
        $feed = mysqli_query($db, "SELECT * FROM feedback_table");
    // }
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
            <li><a href="features.php">Features</a></li>
            <li><a href="#contact">Contact</a></li>
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
        <!-- PROFIL -->
        <div class="feedback">
            <h2 align="center">Hasil Feedback</h2>
            <?php
                $i = 1;
                while($row = mysqli_fetch_array($feed)){
            ?>
            <table>
                <tr>
                    <td><?=$row['tanggal'];?></td>
                </tr>
                <tr colspan="2" align="left">
                    <td><?=$user;?> : <?=$row['feedback'];?></td>
                </tr>
            </table>
            <?php
                $i++;
                }
            ?>
        </div>
    </div>
    
    <!-- FOOTER -->
    <footer>
        <p align="center">© 2022 designed by development's M-Posyandu. All Rights Reserved</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
<?php
    require 'config.php';

    $result = mysqli_query($db, "SELECT * FROM data_anak");
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
            <li><a href="#bottom">Contact</a></li>
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
        <div class="lihat_data">
            <table>
                <?php
                    $row = mysqli_fetch_array($result);  
                ?>
                <tr>
                    <td>Nama Anak</td>
                    <td>: <?=$row['nama_anak']?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: <?=$row['tanggal_lahir']?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?=$row['jenis_kelamin']?></td>
                </tr>
                <tr>
                    <td>Tinggi Badan</td>
                    <td>: <?=$row['tinggi']?></td>
                </tr>
                <tr>
                    <td>Berat Badan</td>
                    <td>: <?=$row['berat']?></td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>: <?=$row['nama_ibu']?></td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td>: <?=$row['nama_ayah']?></td>
                </tr>
                <tr>
                    <td>Jenis Imunisasi</td>
                    <td><?=$row['imunisasi']?></td>
                </tr>
                
            </table>
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
                <a href="" title="WhatsApp">
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968841.png" width="40px">
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
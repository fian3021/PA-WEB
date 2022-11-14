<?php
    require "config.php";
    
    session_start();
    if(!isset($_SESSION['loginAdmin'])){
        echo "
        <script>
            alert('Akses ditolak, silahkan login dulu');
            document.location.href = 'admin_login.php';
        </script>";
    }else{
        $ID_admin = $_SESSION['ID_admin'];
        $kode = $_SESSION['kode'];
        $user = $_SESSION['username'];  
        $tgl_regis = $_SESSION['tanggal_regis'];

    }
    
    $result = mysqli_query($db, "SELECT * FROM data_admin WHERE kode = '$kode'");
    
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
            <li><a href="homeAdmin.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="homeAdmin.php#features">Features</a></li>
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
        <!-- PROFIL -->
        <div class="profil">
            <h2>Profil Admin</h2>
            <?php
                $row = mysqli_fetch_array($result);
            ?>
            <table>
                <tr>
                    <td>Username</td>
                    <td>: <?=$user;?></td>
                </tr>
                <tr>
                    <td>Kode Admin</td>
                    <td>: <?=$row['kode']?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: <?=$row['nama']?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?=$row['gender']?></td>
                </tr>
                <tr colspan="2">
                    <td>Tanggal Register</td>
                    <td>: <?=$tgl_regis;?></td>
                </tr>
            </table>
        </div>
    </div>
    
    <!-- FOOTER -->
    <footer>
        <p align="center">© 2022 designed by development's M-Posyandu. All Rights Reserved</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
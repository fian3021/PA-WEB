<?php
    require "config.php";

    session_start();
    if(!isset($_SESSION['loginAdmin'])){
        echo "
        <script>
            alert('Akses ditolak, silahkan login dulu');
            document.location.href = 'admin_login.php';
        </script>";
    } else {
        $result = mysqli_query($db, "SELECT * FROM data_anak");
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
        <!-- CONTENT 1 -->
        <div class="lihatdata">
            <h2>Data Imunisasi Anak</h2>
            <?php 
            if(isset($_GET['cari'])){
                $search = $_GET['search'];
            }
            ?>
            <ul class="cari">
                <form action="lihatdata_admin.php" method="get">
                    <input class="search" type="text" name="search" placeholder="Cari nama anak...">	
                    <input class="button" type="submit" name="cari" value="Cari">		
                </form>
            </ul>
            <table border="1">
                <tr align="center">
                    <th>No</th>
                    <th>ID User</th>
                    <th>Waktu</th>
                    <th>Nama Anak</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Nama Ibu</th>
                    <th>Nama Ayah</th>
                    <th>Foto Anak</th>
                    <th>Jenis Imunisasi</th>
                    <th>ACTION</th>
                </tr>
                <?php
                    if(isset($_GET['cari'])){
                        $search = $_GET['search'];
                        $result = mysqli_query($db, "SELECT * FROM data_anak WHERE nama_anak LIKE '%".$search."%'");
                    }else{
                        $result = mysqli_query($db, "SELECT * FROM data_anak");
                    }
                    $anak = [];
                    $i=1;
                    while($row = mysqli_fetch_assoc($result)){
                        $anak[] = $row;
                ?>
                <tr align="center">
                    <td><?=$i;?></td>
                    <td><?=$row['ID_user']?></td>
                    <td><?=$row['tanggal_isi']?></td>
                    <td><?=$row['nama_anak']?></td>
                    <td>
                        <?php
                            $lahir = new DateTime($row['tanggal_lahir']);
                            $hari_ini = new DateTime();
                            $usia = $hari_ini->diff($lahir);
                            echo $usia->y; echo " Tahun";
                        ?>
                    </td>
                    <td><?=$row['jenis_kelamin']?></td>
                    <td><?=$row['tinggi']?> cm</td>
                    <td><?=$row['berat']?> kg</td>
                    <td><?=$row['nama_ibu']?></td>
                    <td><?=$row['nama_ayah']?></td>
                    <td><img src="Foto_Anak/<?=$row['foto_anak']?>" alt="" width="80px"></td>
                    <td><?=$row['imunisasi']?></td>
                    <td class="add"><a href="tambah.php?ID=<?=$row['ID']?>"><b>Tambah</b></a></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
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
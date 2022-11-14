<?php
    require 'config.php';

    session_start();
    if(!isset($_SESSION['loginAdmin'])){
        echo "
        <script>
            alert('Akses ditolak, silahkan login dulu');
            document.location.href = 'admin_login.php';
        </script>";
    }else{
        // Menangkap id dari url yang dikirimkan
        if(isset($_GET['ID'])){
            $id = $_GET['ID'];
        };

        // Tampilkan value inputan dari id
        $result = mysqli_query($db, 
            "SELECT * FROM data_anak WHERE ID='$id'");
        $row = mysqli_fetch_array($result);
        if(isset($_POST['submit'])){
            $imunisasi = $_POST['imunisasi'];

            $query = "UPDATE data_anak SET
            imunisasi = '$imunisasi'
            WHERE ID = '$id'";
            $result = $db->query($query); 
            
            if($result){
                echo "
                    <script>
                        alert('Perubahan Data Berhasil Disimpan');
                        document.location.href = 'lihatdata_admin.php';
                    </script>           
                ";
            }else{
                echo "
                    <script>
                        alert('Perubahan Data Gagal');
                    </script>           
                ";
            }
        }
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
        <!-- FORM PENGISIAN DATA ANAK -->
        <div class="tambah">
            <h2 align="center">Pendataan Jenis Imunisasi Anak:</h2>
            <table>
                <tr>
                    <td>ID User</td>
                    <td>: <?=$row['ID_user']?></td>
                </tr>
                <tr>
                    <td>Nama Anak</td>
                    <td>: <?=$row['nama_anak']?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?=$row['jenis_kelamin']?></td>
                </tr>
                <tr>
                    <td>Usia</td>
                    <td>: 
                        <?php
                            $lahir = new DateTime($row['tanggal_lahir']);
                            $hari_ini = new DateTime();
                            $usia = $hari_ini->diff($lahir);
                            echo $usia->y; echo " Tahun";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tinggi Badan Anak</td>
                    <td>: <?=$row['tinggi']?> cm</td>
                </tr>
                <tr>
                    <td>Berat Badan Anak</td>
                    <td>: <?=$row['berat']?> kg</td>
                </tr>
                <form action="" method="post" enctype="multipart/form-data">
                <tr>
                    <?php
                    if($usia->y <= 1){
                    ?>
                    <td>
                        <label>Jenis Imunisasi Untuk Anak Usia 0 - 1 Tahun</label>
                    </td>
                    <td>
                        <label><input type="radio" name="imunisasi" value="BCG" /> BCG</label>
                        <label><input type="radio" name="imunisasi" value="Polio" /> Polio</label>
                        <label><input type="radio" name="imunisasi" value="Hepatitis B" /> Hepatitis B</label>
                        <label><input type="radio" name="imunisasi" value="HiB" /> HiB</label>
                        <label><input type="radio" name="imunisasi" value="DPT" /> DPT</label>
                        <label><input type="radio" name="imunisasi" value="Rotavirus" /> Rotavirus</label>
                        <label><input type="radio" name="imunisasi" value="PVC" /> PVC</label>
                        <label><input type="radio" name="imunisasi" value="Campak" /> Campak</label>
                    </td>
                    <?php
                    } else if($usia->y > 1 && $usia->y <= 4){
                    ?>
                    <td>
                        <label>Jenis Imunisasi Untuk Anak Usia 1 - 4 Tahun</label>
                    </td>
                    <td>
                        <label><input type="radio" name="imunisasi" value="DPT" /> DPT</label>
                        <label><input type="radio" name="imunisasi" value="Polio" /> Polio</label>
                        <label><input type="radio" name="imunisasi" value="HiB" /> HiB</label>
                        <label><input type="radio" name="imunisasi" value="PVC" /> PVC</label>
                        <label><input type="radio" name="imunisasi" value="MMR" /> MMR</label>
                        <label><input type="radio" name="imunisasi" value="Tifoid" /> Tifoid</label>
                        <label><input type="radio" name="imunisasi" value="Hepatitis A" /> Hepatitis A</label>
                        <label><input type="radio" name="imunisasi" value="Varisela" /> Varisela</label>
                        <label><input type="radio" name="imunisasi" value="Influenza" /> Influenza</label>
                    </td>
                    <?php
                    } else if($usia->y >= 5 && $usia->y <= 12){
                    ?>
                    <td>
                        <label>Jenis Imunisasi Untuk Anak Usia 5 - 12 Tahun</label>
                    </td>
                    <td>
                        <label><input type="radio" name="imunisasi" value="DPT" /> DPT</label>
                        <label><input type="radio" name="imunisasi" value="Polio" /> Polio</label>
                        <label><input type="radio" name="imunisasi" value="PVC" /> PVC</label>
                        <label><input type="radio" name="imunisasi" value="MMR" /> MMR</label>
                        <label><input type="radio" name="imunisasi" value="Campak" /> HiB</label>
                        <label><input type="radio" name="imunisasi" value="Tifoid" /> Tifoid</label>
                        <label><input type="radio" name="imunisasi" value="Hepatitis A" /> Hepatitis A</label>
                        <label><input type="radio" name="imunisasi" value="Varisela" /> Varisela</label>
                        <label><input type="radio" name="imunisasi" value="Influenza" /> Influenza</label>
                    </td>
                    <?php
                    } else if($usia->y >= 12 && $usia->y <= 18){
                    ?>
                    <td>
                        <label>Jenis Imunisasi Untuk Anak Usia 0 - 18 Tahun</label>
                    </td>
                    <td>
                        <label><input type="radio" name="imunisasi" value="TT" /> TT</label>
                        <label><input type="radio" name="imunisasi" value="Hepatitis B" /> Hepatitis B</label>
                        <label><input type="radio" name="imunisasi" value="PVC" /> PVC</label>
                        <label><input type="radio" name="imunisasi" value="MMR" /> MMR</label>
                        <label><input type="radio" name="imunisasi" value="Tifoid" /> Tifoid</label>
                        <label><input type="radio" name="imunisasi" value="Hepatitis A" /> Hepatitis A</label>
                        <label><input type="radio" name="imunisasi" value="Varisela" /> Varisela</label>
                        <label><input type="radio" name="imunisasi" value="Influenza" /> Influenza</label>
                        <label><input type="radio" name="imunisasi" value="HPV" /> HPV</label>
                    </td>
                    <?php
                    } else {
                    ?>
                    <td>
                        <label>Jenis Imunisasi</label>
                    </td>
                    <td>
                        <label><input type="radio" name="imunisasi" value="Tidak Ada" /> Tidak Ada</label>
                    </td>
                    <?php
                    }
                    ?>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" class="btn" value="Tambah" />
                    </td>
                </tr>
                </form>
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
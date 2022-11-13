<?php
    require 'config.php';

    session_start();
    if(!isset($_SESSION['login'])){
        echo "
        <script>
            alert('Akses ditolak, silahkan login dulu');
            document.location.href = 'user_login.php';
        </script>";
    }else{
        $ID_user = $_SESSION['ID_user'];

        date_default_timezone_set("Asia/Singapore");
        if(isset($_POST['submit'])){
            $nama_anak = $_POST['nama-anak'];
            $gender = $_POST['jenis_kelamin'];
            $tgl_lahir = $_POST['tanggal-lahir'];
            $tinggi = $_POST['tinggi-badan'];
            $berat = $_POST['berat-badan'];
            $nama_ibu = $_POST['nama-ibu'];
            $nama_ayah = $_POST['nama-ayah'];
            $gambar = $_FILES['foto_anak']['name'];
            $waktu = implode(" ", $_POST['isi']);
            
            $x = explode('.', $gambar);
            $ekstensi = strtolower(end($x));
            $foto_anak = "$nama_anak.$ekstensi";
            
            $tmp = $_FILES['foto_anak']['tmp_name'];

            if(move_uploaded_file($tmp, "Foto_Anak/".$foto_anak)){
                $query = "INSERT INTO data_anak (ID_user, nama_anak, jenis_kelamin, tanggal_lahir, tinggi, berat, nama_ibu, nama_ayah, foto_anak, tanggal_isi) 
                            VALUES ('$ID_user', '$nama_anak', '$gender','$tgl_lahir','$tinggi', '$berat', '$nama_ibu', '$nama_ayah', '$foto_anak', '$waktu')";
                $result = $db->query($query); 
                
                if($result){
                    echo "
                        <script>
                            alert('Pengisian Data Berhasil');
                            document.location.href = 'homeUser.php';
                        </script>           
                    ";
                }else{
                    echo "
                        <script>
                            alert('Pengisian Data Gagal');
                        </script>           
                    ";
                }
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
        <!-- FORM PENGISIAN DATA ANAK -->
        <div class="form-user">
            <h2 align="center">Form Pendaftaran Imunisasi Anak:</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <label>Nama Anak</label>
                        </td>
                        <td>
                            <input type="text" name="nama-anak" placeholder=" Masukkan Nama Anak..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Jenis Kelamin</label>
                        </td>
                        <td>
                            <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" /> Laki-Laki</label>
                            <label><input type="radio" name="jenis_kelamin" value="Perempuan" /> Perempuan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tanggal Lahir</label>
                        </td>
                        <td>
                            <input type="date" name="tanggal-lahir"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tinggi Badan Anak</label>
                        </td>
                        <td>
                            <input type="number" name="tinggi-badan" placeholder=" Masukkan Tinggi..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Berat Badan Anak</label>
                        </td>
                        <td>
                            <input type="number" name="berat-badan" placeholder=" Masukkan Berat..." />
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>
                            <label>Nama Ibu</label>
                        </td>
                        <td>
                            <input type="text" name="nama-ibu" placeholder=" Masukkan Nama Ibu..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nama Ayah</label>
                        </td>
                        <td>
                            <input type="text" name="nama-ayah" placeholder=" Masukkan Nama Ayah..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Foto Anak </label>
                        </td>
                        <td>
                            <br>
                            <input type="file" name="foto_anak">
                            <!-- <span class="button">Pilih File</span> -->
                            <br><br>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="isi[]" value=<?=date("D")?>>
                            <input type="hidden" name="isi[]" value=<?=date("d/m/Y")?>>
                            <input type="hidden" name="isi[]" value=<?=date("H:i")?>><br><br>
                            <input type="submit" name="submit" class="submit" value="Simpan" />
                        </td>
                    </tr>
                </table>
            </form>
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
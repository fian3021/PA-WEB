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
        $username = $_SESSION['user'];

        date_default_timezone_set("Asia/Singapore");
        if(isset($_POST['submit_feedback'])){
            $feedback = $_POST['feedback'];
            $tgl_feedback = implode(" ", $_POST['feed']);
            
            $query = "INSERT INTO feedback_table (ID_user, username, feedback, tanggal) 
                        VALUES ('$ID_user', '$username', '$feedback', '$tgl_feedback')";
            $result = $db->query($query); 
            
            if($result){
                echo "
                    <script>
                        alert('Feedback Berhasil Dikirim');
                        document.location.href = 'form_feedback.php';
                    </script>           
                ";
            }else{
                echo "
                    <script>
                        alert('Feedback Gagal Dikirim');
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
            <li><a href="homeUser.php#features">Features</a></li>
            <li><a href="homeUser.php#contact">Contact</a></li>
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
        <!-- CONTENT 4 -->
        <div class="content-4">
            <div class="feedback">
                <h2 align="center">FORM FEEDBACK</h2>
                <form action="" method="post" >
                    <table>
                        <tr>
                            <td><input type="text" name="feedback" placeholder="Masukkan Komentar / Kritik / Saran "/></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="feed[]" value=<?=date("D")?>>
                                <input type="hidden" name="feed[]" value=<?=date("d/m/Y")?>>
                                <input type="hidden" name="feed[]" value=<?=date("H:i")?>>
                                <input type="submit" name="submit_feedback" class="submit" value="Kirim" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
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
<?php
    session_start();
    require "config.php";

    if(isset($_POST['loginAdmin'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM akun-admin WHERE username='$user' OR email='$user'";
        $result = $db->query($sql);

        // cek akun ada atau ngga
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $username = $row['username'];

            // cek password valid atau ngga
            if(password_verify($password, $row['pass'])){
                $_SESSION['login'] = true;

                echo "
                    <script>
                        alert('Selamat Datang $username');
                        document.location.href = 'homeAdmin.php';
                    </script>";
            }else{
                echo "
                    <script>
                        alert('Gagal login! Username/Password Salah');
                    </script>";
            }
        }else{
            echo "
                <script>
                    alert('Username tidak terdaftar, silahkan register!');
                    document.location.href = 'regis.php';
                </script>";
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
    <link rel="stylesheet" href="admin_login.css">
    <title>M-Posyandu</title>
</head>
<body>
    <nav>
        <div class="icon">
            <h3>M-Posyandu</h3>
        </div>
    </nav>
    <div class = "content">
        <h1>LOGIN ADMIN</h1>
        <form id = "login-form" action = "" method = "post">
            <div class = "txt_field">
                <label>Username</label>
                <input type = "text" name = "user" title="Masukkan Username">
            </div>
            <div class = "txt_field">
                <label>Password</label>
                <input type = "password" name = "password" title="Masukkan Password">
            </div>
            <input type = "submit" name = "loginAdmin" value = "Login">
        </form>
        <p> Belum Memiliki Akun?
            <a href = "regis.php">Register</a>
        </p>
    </div>
</body>
</html>
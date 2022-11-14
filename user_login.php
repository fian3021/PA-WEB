<?php

    require 'config.php';

    if (isset($_POST['login'])){
        $user = $_POST ['user'];
        $password = $_POST ['password'];

        $sql = "SELECT * FROM akun_user WHERE username='$user' OR email = '$user'";
        $result = $db->query($sql);

        if (mysqli_num_rows($result)> 0){
            $row = mysqli_fetch_array($result);
            $username = $row['username'];

            //valid or not
            if (password_verify($password, $row ['psw'])){
                session_start();
                $_SESSION['login'] = True;
                $_SESSION['ID_user'] = $row['ID_user'];
                $_SESSION['username'] = $user;
                $_SESSION['tanggal_regis'] = $row['tgl_regis'];

                echo "<script>
                        alert ('selamat datang $username');
                        document.location.href='homeUser.php';
                    </script>";
            } else {
                echo "<script>
                        alert ('username dan password salah');
                    </script>";
            }
        }else echo "<script>
                alert ('username tidak terdaftar, silahkan registrasi');
                document.location.href='user_register.php';
            </script>";
    }
?>
    

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="login_register.css">
         
</head>
<body>
    
    <div class="container">
        <div class="formslogin">
            <div class="form login">
                <span class="title">User Login</span>

                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" name="user" placeholder="Username atau Email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="Password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="login" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Belum memiliki akun?
                        <a href="user_register.php" class="text signup-link">Register Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

        <script src="script.js"></script>

</body>
</html



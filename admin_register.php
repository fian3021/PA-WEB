<?php 
    require 'config.php';

    if((isset($_POST['regis']))){
        $email = $_POST['email'];
        $username = $_POST ['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        //cek username udah digunakan atau belum
        $sql = "SELECT * FROM akun_admin WHERE username = '$username'";
        $user = $db->query($sql);

        if(mysqli_num_rows($user) > 0 ){
            echo "<script>
                    alert('username telah digunakan, silahkan gunakan username yang lain')
                <script>";
        }else{
            //cek konfirmasi password 
            if($password == $konfirmasi){
                
                $password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO akun_user (email, username, psw)
                    VALUES ('$email', '$username', '$password')";
                $result = $db->query($query);

                if($result){
                    echo "<script>
                            alert('Registrasi Berhasil')
                        </script>";
                }else {
                    echo "<script>
                            alert('Registrasi Gagal coba lagi')
                        </script>";
                }
            }else {
                echo "<script>
                        alert('konfirmasi password salah')
                    </script>";
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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="login_register2.css">
    <title>Register Admin M-Posyandu</title>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Admin Register</span>

                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" name="username"placeholder="Enter your name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="konfirmasi" class="password" placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name = "regis" value="Register">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="admin_login.php" class="text login-link">Login Now</a>
                    </span>
                </div>
                </form>

            </div>
        </div>
    </div>

        <script src="script.js"></script>

</body>
</html
<?php 
    require 'config.php';

    date_default_timezone_set("Asia/Singapore");
    if((isset($_POST['regis']))){
        $email = $_POST['email'];
        $username = $_POST ['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        $tgl_regis = implode(" ", $_POST['reg']);

        //cek username udah digunakan atau belum
        $sql = "SELECT * FROM akun_user WHERE username = '$username'";
        $user = $db->query($sql);

        if(mysqli_num_rows($user) > 0 ){
            echo "<script>
                    alert('username telah digunakan, silahkan gunakan username yang lain')
                <script>";
        }else{
            //cek konfirmasi password 
            if($password == $konfirmasi){
                
                $password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO akun_user (email, username, psw, tanggal_regis)
                    VALUES ('$email', '$username', '$password', '$tgl_regis')";
                $result = $db->query($query);

                if($result){
                    echo "<script>
                            alert('Registrasi Berhasil')
                            document.location.href='user_login.php';
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
    <link rel="stylesheet" href="login_register.css">
         
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">User Register</span>

                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" name="username"placeholder="Masukkan Username" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Masukkan Email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Masukkan Password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="konfirmasi" class="password" placeholder="Konfirmasi Password" required>
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
                        <input type="hidden" name="reg[]" value=<?=date("D")?>>
                        <input type="hidden" name="reg[]" value=<?=date("d/m/Y")?>>
                        <input type="hidden" name="reg[]" value=<?=date("H:i")?>>
                        <input type="submit" name = "regis" value="Register">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="user_login.php" class="text login-link">Login Now</a>
                    </span>
                </div>
                </form>

            </div>
        </div>
    </div>

        <script src="script.js"></script>

</body>
</html
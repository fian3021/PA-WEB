<?php 
    include "config.php";

    date_default_timezone_set("Asia/Singapore");
    if((isset($_POST['regis']))){
        $kode = $_POST['kode'];
        $email = $_POST['email'];
        $username = $_POST ['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        $tgl_regis = implode(" ", $_POST['regA']);

        // cek kode admin
        $kd = "SELECT * FROM data_admin WHERE kode = '$kode'";
        $code = $db->query($kd);

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
                if(mysqli_num_rows($code) > 0 ){
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $query = "INSERT INTO akun_admin (kode, email, username, psw, tanggal_regis)
                        VALUES ('$kode', '$email', '$username', '$password', '$tgl_regis')";
                    $result = $db->query($query);

                    if($result){
                        echo "<script>
                                alert('Registrasi Berhasil')
                                document.location.href='admin_login.php';
                            </script>";
                    }else {
                        echo "<script>
                                alert('Registrasi Gagal coba lagi')
                            </script>";
                    }
                }else{
                    echo "<script>
                            alert ('kode admin tidak terdaftar, tidak bisa registrasi');
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
                        <input type="text" name="kode"placeholder="Masukkan Kode Admin" required>
                        <i class="uil uil-user"></i>
                    </div>
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
                    </div>

                    <div class="input-field button">
                        <input type="hidden" name="regA[]" value=<?=date("D")?>>
                        <input type="hidden" name="regA[]" value=<?=date("d/m/Y")?>>
                        <input type="hidden" name="regA[]" value=<?=date("H:i")?>>
                        <input type="submit" name = "regis" value="Register">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Sudah Memiliki Akun?
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
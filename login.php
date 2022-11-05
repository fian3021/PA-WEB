<?php
    session_start();
    require "config.php";

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM akun WHERE Username='$user' OR Email='$user'";
        $result = $db->query($sql);

        // cek akun ada atau ngga
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $username = $row['Username'];

            // cek password valid atau ngga
            if(password_verify($password, $row['Pass'])){
                $_SESSION['login'] = true;

                echo "
                    <script>
                        alert('Selamat Datang $username');
                        document.location.href = 'index.php';
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
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <!-- NAVIGATION BAR -->
    <div class="fContainer">
        <nav>
            <ul class="logo">
                <a href="/"><img src="logo-02.png" alt="logo"></a>
            </ul>
        </nav>
    </div>
    <!-- NAVIGATION BAR END -->

    <!-- MAIN CONTENT -->
        <!-- FORM LOGIN -->
        <div class="content">
            <h1>LOGIN ADMIN</h1>
            <form id="login-form" action="" method="post">
                <div class="txt_field">
                    <label>Username</label>
                    <input type="text" name = "user">
                </div>
                <div class="txt_field">
                    <label>Password</label>
                    <input type="password" name = "password">
                </div>
                <input type="submit" name = "login" value="Login">
            </form>
            <p>Belum memiliki akun?
                <a href="regis.php">Register</a>
            </p>
        </div>
    <!-- MAIN CONTENT END -->
    
</body>
</html>
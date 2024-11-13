<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #23243a;
    }

    .login {
        position: relative;
        padding: 20px;
        color: white;
        width: 380px;
        height: 420px;
        background: #1c1c1c;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
    }

    h2 {
        color: #fff;
        font-weight: 500;
        text-align: center;
        letter-spacing: 0.1em;
    }

    input[type="text"],
    input[type="password"] {
        position: relative;
        width: auto;
        padding: 20px 10px 10px;
        background: whitesmoke;
        outline: none;
        box-shadow: none;
        color: #23242a;
        margin: 2px 0px 10px 1px;
        font-size: 25px;
    }

    input[type="submit"] {
        display: inline-block;
        padding: 10px 30px;
        background: yellow;
        border: 2px solid yellow;
        border-radius: 40px;
        box-shadow: 0 0 10px yellow;
        font-size: 16px;
        color: #1f242d;
        font-weight: 600;
    }

    input[type="submit"]:hover {
        background: red;
        border: 2px solid red;
        color: white;
        box-shadow: none;
    }
    .login form label {

        left: 0;
        padding: 20px 10px 10px;
        pointer-events: none;
        color: white;
        font-size: 20px;

    }
</style>

<body>
    <div class="login">
        <h2>Log-In</h2>
        <form action="" method="post">
            <label>Masukkan Nama</label>
            <input type="text" name="a" id="nama" required>
            <br>

                <label>Masukkan Password</label>
                <input type="password" name="b" id="password" required>

            <br>
            <input type="submit" value="Log-In" name="ok">
            <?php
            session_start(); #varsent /Isi kurung adalah Parameter seperti ada notif habis sesi waktu Parameter untuk menentukan waktunya
            if (isset($_POST['ok'])) {
                $nama = $_POST['a'];
                $password = $_POST['b'];
                $_SESSION['a'] = $nama;
                $_SESSION['b'] = $password;
                $_SESSION['ok'] = true;

                if ($nama == "admin1" && $password == "111") {
                    header("location:login.php");
                } elseif ($nama == "admin2" && $password == "222") {
                    header("location:grade.php");
                } elseif ($nama == "admin3" && $password == "333"){
                    header ("location:tabelmakanan.php");
                } elseif($nama == "admin4" && $password == "444"){
                    header("location:for.php");
                } else {
                    echo "<h2>Gunakan Akun Yang Terdaftar</h2>";
                }
            }
            ?>
        </form>
    </div>


</body>

</html>
<?php
session_start();

if (!isset($_SESSION['ok'])) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai</title>
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

    h1,
    h2,
    h3 {
        color: #fff;
        font-weight: 500;
        text-align: center;
        margin-bottom: 25px;
    }

    input[type="number"] {
        position: relative;
        width: auto;
        padding: 20px 10px 10px;
        background: whitesmoke;
        outline: none;
        box-shadow: none;
        color: #23242a;
        margin: 2px 0px 10px 1px;
        font-size: 25px;
        text-align: center;
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


    <?php
    session_start();




    if (!isset($_SESSION['ok'])) {
        header("location:login.php");
        exit();
    }

    if (isset($_POST['kirim'])) {
        $nilai = $_POST['angka'];

        if ($nilai == "100") {
            $grade = "A+";
        } elseif ($nilai >= "95") {
            $grade = "A";
        } elseif ($nilai >= "90") {
            $grade = "B+";
        } elseif ($nilai >= "85") {
            $grade = "B";
        } elseif ($nilai >= "80") {
            $grade = "C+";
        } elseif ($nilai >= "75") {
            $grade = "C";
        } else {
            $grade = "F";
        }
    }

    ?>

    <div class="login">
        <h2>Nilai Untuk Dapur Makan</h2>
        <form action="" method="post">

            <label>Masukkan Nilai</label>
            <input type="number" name="angka">
            <input type="submit" name="kirim" value="Melihat Grade">

            <h3>Grade Nilai Anda : </h3>
            <h1 style="color: red;"><?php if (isset($_POST['angka'])) {
                                        echo $grade;
                                    } ?></h1>

        </form>
    </div>
</body>

</html>

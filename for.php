<?php
session_start();

if (!isset($_SESSION['ok'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #23243a;
        font-family: Arial, sans-serif;
    }

    .forcss {
        position: relative;
        padding: 20px;
        color: white;
        width: 500px;
        height: auto;
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
    .forcss form label {

        left: 0;
        padding: 20px 10px 10px;
        pointer-events: none;
        color: white;
        font-size: 20px;

    }

    table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 1em;
    font-family: Arial, sans-serif;
    }

table th, table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f4f4f4;
    color: #333;
    text-transform: uppercase;
    letter-spacing: 0.1em;
}



table tr td {
    color: #555;
    background-color: whitesmoke;
}

</style>


<body>
    <div class="forcss">

    <?php
    if (isset($_POST['data'])) {
        $jumlah = $_POST['jumlahdata'];
    ?>

        <form action="" method="post">
            <input type="hidden" name="jumlahdata" value="<?php echo $jumlah?>">
            <h2>Kumpulan Data</h2>
            <?php for ($i = 1; $i <= $jumlah; $i++) { ?>
                <h3>Data Ke <?php echo $i ?></h3>
                <label <?php echo $i ?>>Masukkan Nama</label>
                <input type="text" name="nama<?php echo $i ?>">
                <br>
                <label <?php echo $i ?>>Masukkan Umur</label>
                <input type="number" name="umur<?php echo $i ?>">
            <?php } ?>
            <input type="submit" name="perulangan" value="Cetak Data">
        </form>
    <?php
    } elseif (isset($_POST['perulangan'])) {
        $jumlah = $_POST['jumlahdata'];
    ?>
        <h2>Hasil Data</h2>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
            </tr>
            <?php for ($i = 1; $i <= $jumlah; $i++) { ?>
            <tr>
                
                    <td><?php echo $i; ?></td>
                    <td><?php echo $_POST['nama' . $i]; ?></td>
                    <td><?php echo $_POST['umur' . $i]; ?></td>
            </tr>
        <?php }
            } else { ?>
        </table>

        



    </div>
    <form action="" method="post" style="position: absolute;
        padding: 20px;
        color: white;
        width: 500px;
        height: auto;
        background: #1c1c1c;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;">
            <label>Masukkan Jumlah Data Yang Akan Di Masukkan : </label>
            <input type="number" min="1" name="jumlahdata"><br>
            <input type="submit" name="data" value="Kirim">
        </form>
    <?php } ?>
    
</body>

</html>
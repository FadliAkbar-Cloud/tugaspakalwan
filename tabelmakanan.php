<?php
session_start();

if (!isset($_SESSION['ok'])) {
    header("location: login.php");
}
//=> iki koyok KEY AND VALUE
$hargamenu = [
    'Soto' => 10000,
    'Rawon' => 15000,
    'Nasi Goreng' => 12000,
    'Tumpeng' => 55000
];

$totalsemua = 0;

if (!isset($_SESSION['pesanan'])) {
    // LEK SENG IKI [] IKU ENGKOK KEISI TEKAN SENG ISOR IKU SENG ['pesanan']
    $_SESSION['pesanan'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // MEK GAWE NGERESET TABEL SENG TAU DI ISI 
    $_SESSION['pesanan'] = [];


    if (isset($_POST['menu']) && is_array($_POST['menu'])) {
        foreach ($_POST['menu'] as $index => $menu) {
            if (isset($hargamenu[$menu]) && isset($_POST['porsi'][$index])) {
                $porsi = intval($_POST['porsi'][$index]);
                $totalpermenu = $hargamenu[$menu] * $porsi;
                $_SESSION['pesanan'][$menu] = [
                    'harga' => $hargamenu[$menu],
                    'porsi' => $porsi,
                    'total_harga' => $totalpermenu
                ];
            }
        }
    }
}

foreach ($_SESSION['pesanan'] as $item) {
    $totalsemua += $item['total_harga'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #23243a;
    }

    .isi {
        position: relative;
        padding: 20px;
        color: white;
        width: 100%;
        height: 100vh;
        background: #1c1c1c;
        border-radius: 8px;
        overflow: hidden;

    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    input[type='submit'] {
        width: 25%;
        float: right;
        padding: 10px;
        background: greenyellow;
        border: 2px solid greenyellow;
        border-radius: 40px;
        box-shadow: 0 0 10px greenyellow;
        font-size: 16px;
    }

    input[type='submit']:hover {
        background: red;
        border: 2px solid red;
        color: white;
        box-shadow: none;

    }

    button {
        display: inline-block;
        padding: 10px 30px;
        background: greenyellow;
        border: 2px solid greenyellow;
        border-radius: 40px;
        box-shadow: 0 0 10px greenyellow;
        font-size: 16px;
        color: #1f242d;
        font-weight: 600;
    }

    button:hover {
        background: red;
        border: 2px solid red;
        color: white;
        box-shadow: none;
    }
</style>

<body>
    <div class="isi">

        <form action="" method="POST">
            <h2 style="text-align: center;">Menu Makanan Di Dapur Makanan</h2>
            <table class="table" border="solid 1px">
                <tr>
                    <th>No</th>
                    <th>Pilih</th>
                    <th>Menu Makanan</th>
                    <th>Porsi</th>
                    <th>Total Harga</th>
                </tr>
                <tr>
                    <!-- condition ? value_if_true : value_if_false; OPERATOR TERNARY 
                 DISINI TIDAK ADA IF YO GARA GARA IKU LEK OPERATOR TERNARY IKU SINGKAT E IF ELSE
                 TEROS SENG  MENU[] IKU ENGKOK MELBU NDEK ARRAY 
                 AMBEK CHECKED IKU ATRIBUT E CHECKBOX 
                 TEROS FUNGSINE number_format IKU GAWE MEMFORMAT ANGKA CEK KETOK DADI RUPIAH GUDUK 20000 -->
                    <td>1</td>
                    <td><input type="checkbox" name="menu[]" value="Soto" <?php echo isset($_SESSION['pesanan']['Soto']) ? 'checked' : ''; ?>></td>
                    <td>Soto</td>
                    <td><input type="number" min="1" name="porsi[]" value="<?php echo isset($_SESSION['pesanan']['Soto']) ? $_SESSION['pesanan']['Soto'] : 1; ?>"></td>
                    <td>Rp <?php echo isset($_SESSION['pesanan']['Soto']) ? number_format($_SESSION['pesanan']['Soto']['total_harga'], 0, ',', '.') : '0'; ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><input type="checkbox" name="menu[]" value="Rawon" <?php echo isset($_SESSION['pesanan']['Rawon']) ? 'checked' : ''; ?>></td>
                    <td>Rawon</td>
                    <td><input type="number" min="1" name="porsi[]" value="<?php echo isset($_SESSION['pesanan']['Rawon']) ? $_SESSION['pesanan']['Rawon'] : 1; ?>"></td>
                    <td>Rp <?php echo isset($_SESSION['pesanan']['Rawon']) ? number_format($_SESSION['pesanan']['Rawon']['total_harga'], 0, ',', '.') : '0'; ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><input type="checkbox" name="menu[]" value="Nasi Goreng" <?php echo isset($_SESSION['pesanan']['Nasi Goreng']) ? 'checked' : ''; ?>></td>
                    <td>Nasi Goreng</td>
                    <td><input type="number" min="1" name="porsi[]" value="<?php echo isset($_SESSION['pesanan']['Nasi Goreng']) ? $_SESSION['pesanan']['Nasi Goreng'] : 1; ?>"></td>
                    <td>Rp <?php echo isset($_SESSION['pesanan']['Nasi Goreng']) ? number_format($_SESSION['pesanan']['Nasi Goreng']['total_harga'], 0, ',', '.') : '0'; ?></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><input type="checkbox" name="menu[]" value="Tumpeng" <?php echo isset($_SESSION['pesanan']['Tumpeng']) ? 'checked' : ''; ?>></td>
                    <td>Tumpeng</td>
                    <td><input type="number" min="1" name="porsi[]" value="<?php echo isset($_SESSION['pesanan']['Tumpeng']) ? $_SESSION['pesanan']['Tumpeng'] : 1; ?>"></td>
                    <td>Rp <?php echo isset($_SESSION['pesanan']['Tumpeng']) ? number_format($_SESSION['pesanan']['Tumpeng']['total_harga'], 0, ',', '.') : '0'; ?></td>
                </tr>
                <tr>
                    <td colspan="5"><input type="submit" value="Pesan"></td>
                </tr>
            </table>
        </form>
        <?php if ($totalsemua > 0): ?>
            <h3 style="font-weight: bold; font-size: 25px; color: green;">Total Harga : -Rp <?php echo number_format($totalsemua, 0, ',', '.'); ?></h3>
            <h4>Menu Yang Di Pesan : </h4>
            <ul>
                <?php foreach ($_SESSION['pesanan'] as $menu => $item) : ?>
                    <li><?php echo $menu . ' <br>Jumlah Porsi : ' . $item['porsi'] . ' <br>Rp ' . number_format($item['total_harga'], 0, ',', '.'); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
        <div class="pembayaran">
            <a href=""><button>Bayar</button></a>
            <a href=""><button>Bayar Urunan</button></a>
        </div>
    </div>
</body>

</html>
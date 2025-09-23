<html>

<head>

    <meta charset="UTF-8">

    <title>Program Parkir Kendaraan</title>

</head>

<body>

    <h2>Program Parkir Kendaraan</h2>

    <form method="post">
        <label for="">Plat Nomor :</label>
        <input type="text" name="PlatNo"> <br><br>
        <label for="jenis">jenisKendaraan:</label>
        <select name="jenisKendaraan" id="jenis">
            <option value="">-- Pilih jenis Kendaraan --</option>
            <option value="motor">Motor</option>
            <option value="mobil">Mobil</option>
            <option value="bus">Bus</option>
        </select>
        <br><br>


        <label>lama parkir dalam jam :</label>

        <input type="number" name="periode" required><br><br>


        <button type="submit">Hitung Total Bayar</button>

    </form>

    <hr>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jenisKendaraan = $_POST["jenisKendaraan"];

        $hargaparkir = 0;

        $PlatNo = $_POST["PlatNo"];

        $lamaParkir = $_POST["periode"];

        $diskon = 0;

        switch ($jenisKendaraan) {
            case "motor":
                $hargaparkir = 2000;
                break;
            case "mobil":
                $hargaparkir = 5000;
                break;
            case "bus":
                $hargaparkir = 10000;
                break;

            default:
                $hargaparkir = 0;
                break;
        }

        if ($lamaParkir > 10) {

            $diskon = 0.10; // Diskon 10%
    
        } else {

            $diskon = 0;
    
        }

        $hargaTotal = $hargaparkir * $lamaParkir * (1 - $diskon);

        echo "<h3>Detail Pembelian</h3>";
        echo "<p>Jenis Plat :" . $PlatNo . "</p>";

        echo "<p>jenis kendaraan :" . $jenisKendaraan . "</p>";

        echo "<p>Harga Parkir: Rp " . number_format($hargaparkir, 0, ',', '.') . "</p>";

        echo "<p>Lama parkir: " . $lamaParkir . "</p>";

        if ($diskon > 0) {

            echo "<p>Diskon: " . ($diskon * 100) . "%</p>";

        } else {

            echo "<p>Tidak ada diskon, parkir 10+ jam untuk mendapatkan diskon .</p>";
        }


        echo "<p><b>Total Bayar: Rp " . number_format($hargaTotal, 0, ',', '.') . "</b></p>";

    }

    ?>

</body>

</html>
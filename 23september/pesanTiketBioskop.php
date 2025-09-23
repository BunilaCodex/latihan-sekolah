<html>

<head>

    <meta charset="UTF-8">

    <title>Program Pemesanan Tiket Bioskop</title>

</head>

<body>

    <h2>Program Pemesanan Tiket Bioskop</h2>

    <form method="post">
        <label for="produk">pilih harga tiket:</label>
        <select name="tiket" id="produk">
            <option value="">-- pilih tiket --</option>
            <option value="2D">2D</option>
            <option value="3D">3D</option>
            <option value="IMAX">IMAX</option>
        </select>
        <br><br>


        <label>Jumlah Beli: </label>

        <input type="number" name="jumlahBeli" required><br><br>


        <button type="submit">Hitung Total</button>

    </form>

    <hr>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $hargaTiket = 0;

        $tiket = $_POST["tiket"];

        $jumlahBeli = $_POST["jumlahBeli"];

        $diskon = 0;

        switch ($tiket) {
            case "2D":
                $hargaTiket =40000;
                break;
            case "3d":
                $hargaTiket = 600000;
                break;
            case "IMAX":
                $hargaTiket = 100000;
                break;
            default:
            $hargaTiket = 0;
            break;
        }
        
        if ($jumlahBeli >= 5) {

            $diskon = 0.20; // Diskon 20%
    
        } else if ($jumlahBeli >= 3) {

            $diskon = 0.10; // Diskon 10%
    
        }

        $hargaTotal = $hargaTiket * $jumlahBeli * (1 - $diskon);

        echo "<h3>Detail Pembelian</h3>";
        echo "<p>jenis tiket :" . $tiket . "</p>";

        echo "<p>Harga tiket: Rp " . number_format($hargaTiket, 0, ',', '.') . "</p>";

        echo "<p>Jumlah tiket: " . $jumlahBeli . "</p>";

        if ($diskon > 0) {

            echo "<p>Diskon: " . ($diskon * 100) . "%</p>";

        } else {

            echo "<p>Tidak ada diskon, Beli 3+ tiket untuk mendapatkan diskon .</p>";
        }


        echo "<p><b>Total Bayar: Rp " . number_format($hargaTotal, 0, ',', '.') . "</b></p>";

    }

    ?>

</body>

</html>

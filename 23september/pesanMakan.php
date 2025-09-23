<html>

<head>

    <meta charset="UTF-8">

    <title>Program Pemesanan Tiket Bioskop</title>

</head>

<body>

    <h2>Program Pemesanan Tiket Bioskop</h2>

    <form method="post">
        <label for="">
            Masukkan Nama :
        </label>
        <input type="text" name="pelanggan"> <br><br>
        <label for="menu">pilih Makanan:</label>
        <select name="menu" id="menu">
            <option value="">-- Pilih Menu --</option>
            <option value="NasiGoreng">Nasi Goreng</option>
            <option value="MieAyam">Mie Ayam</option>
            <option value="soto">Soto</option>
            <option value="Bakso">Bakso</option>
        </select>
        <br><br>


        <label>Jumlah Porsi: </label>

        <input type="number" name="jumlahBeli" required><br><br>


        <button type="submit">Hitung Total</button>

    </form>

    <hr>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["pelanggan"];

        $hargaMenu = 0;

        $Menu = $_POST["menu"];

        $jumlahPorsi = $_POST["jumlahBeli"];

        $diskon = 0;

        switch ($Menu) {
            case "NasiGoreng":
                $hargaMenu = 15000;
                break;
            case "MieAyam":
                $hargaMenu = 12000;
                break;
            case "Soto":
                $hargaMenu = 20000;
                break;
            case "Bakso":
                $hargaMenu = 20000;

            default:
                $hargaMenu = 0;
                break;
        }

        if ($jumlahPorsi >= 10) {

            $diskon = 0.25; // Diskon 20%
    
        } else if ($jumlahPorsi >= 5) {

            $diskon = 0.15; // Diskon 10%
    
        }

        $hargaTotal = $hargaMenu * $jumlahPorsi * (1 - $diskon);

        echo "<h3>Detail Pembelian</h3>";
        echo "<p>Nama Konsumen :" . $nama . "</p>";

        echo "<p>jenis Makanan :" . $Menu . "</p>";

        echo "<p>Harga Makanan: Rp " . number_format($hargaMenu, 0, ',', '.') . "</p>";

        echo "<p>Jumlah Porsi: " . $jumlahPorsi . "</p>";

        if ($diskon > 0) {

            echo "<p>Diskon: " . ($diskon * 100) . "%</p>";

        } else {

            echo "<p>Tidak ada diskon, Beli 5+ Makanan untuk mendapatkan diskon .</p>";
        }


        echo "<p><b>Total Bayar: Rp " . number_format($hargaTotal, 0, ',', '.') . "</b></p>";

    }

    ?>

</body>

</html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Program Pemesanan Tiket Transportasi</title>

</head>

<body>

    <h2>Program Pemesanan Tiket Transportasi</h2>

    <form method="post">
        <label for=""> Nama Penumpang :</label>
        <input type="text" name="NamaPenumpang"> <br><br>
        <label for="jenis">jenisKendaraan:</label>
        <select name="jenistransportasi" id="jenis">
            <option value="">-- Pilih jenis transportasi --</option>
            <option value="Kereta">Kereta</option>
            <option value="Pesawat">Pesawat</option>
            <option value="Kapal">Kapal</option>
            <option value="Bus">Bus</option>
        </select>
        <br><br>


        <label>jumlah tiket :</label>

        <input type="number" name="jumlahTiket" required><br><br>


        <button type="submit">Hitung Total Bayar</button>

    </form>

    <hr>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $NamaPenumpang = $_POST["NamaPenumpang"];

        $jenisTransportasi = $_POST["jenistransportasi"];

        $hargatiket = 0;

        $jumlahTiket = $_POST["jumlahTiket"];

        $diskon = 0;

        switch ($jenisTransportasi) {
            case "Kereta":
                $hargatiket = 200000;
                break;
            case "Pesawat":
                $hargatiket = 1000000;
                break;
            case "bus":
                $hargatiket = 10000;
                break;
            case"Kapal":
                $hargatiket = 5000000;

            default:
                $hargatiket = 0;
                break;
        }

        if ($jumlahTiket >= 3) {

            $diskon = 0.15; // Diskon 15%
    
        } else {

            $diskon = 0;
    
        }

        $hargaTotal = $hargatiket * $jumlahTiket * (1 - $diskon);

        echo "<h3>Detail Pembelian</h3>";
        echo "<p>Nama Penumpang :" . $NamaPenumpang . "</p>";

        echo "<p>jenis kendaraan :" . $jenisTransportasi . "</p>";

        echo "<p>Harga tiket: Rp " . number_format($hargatiket, 0, ',', '.') . "</p>";

        echo "<p>jumlah Tiket: " . $jumlahTiket . "</p>";

        if ($diskon > 0) {

            echo "<p>Diskon: " . ($diskon * 100) . "%</p>";

        } else {

            echo "<p>Tidak ada diskon, beli 3+ jam untuk mendapatkan diskon .</p>";
        }


        echo "<p><b>Total Bayar: Rp " . number_format($hargaTotal, 0, ',', '.') . "</b></p>";

    }

    ?>

</body>

</html>
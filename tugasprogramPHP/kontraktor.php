<!DOCTYPE html>
<html>
<head>
    <title>Hitung Gaji Mingguan</title>
</head>
<body>
    <h2>Hitung Gaji Mingguan Pekerja</h2>
    <form method="post">
        <input type="submit" name="hitung" value="Hitung Gaji">
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $gaji_per_7jam = 50000;
        $hari_kerja = 5;
        $jam_per_hari = 7;

        $gaji_pokok = $gaji_per_7jam * $hari_kerja;

        // Lembur
        $lembur1 = 2; // hari pertama
        $lembur2 = 3; // hari kedua
        $biaya_lembur_perjam = 20000;

        $total_lembur = ($lembur1 + $lembur2) * $biaya_lembur_perjam;

        $total_gaji = $gaji_pokok + $total_lembur;

        echo "<h3>Total gaji minggu ini: Rp " . number_format($total_gaji, 0, ',', '.') . "</h3>";
    }
    ?>
</body>
</html>

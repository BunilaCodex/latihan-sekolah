<!DOCTYPE html>
<html>
<head>
    <title>Hitung Tabungan Bulanan</title>
</head>
<body>
    <h2>Hitung Tabungan Bulanan</h2>
    <form method="post">
        Tabungan Awal: <input type="number" name="awal" required><br><br>
        Persentase Bunga (%): <input type="number" name="bunga" required><br><br>
        Biaya Administrasi: <input type="number" name="admin" required><br><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $awal = $_POST['awal'];
        $bunga = $_POST['bunga'];
        $admin = $_POST['admin'];

        $hasil = $awal + ($awal * ($bunga / 100)) - $admin;

        echo "<h3>Tabungan bulan ini: Rp " . number_format($hasil, 0, ',', '.') . "</h3>";
    }
    ?>
</body>
</html>

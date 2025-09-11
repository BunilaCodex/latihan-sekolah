<!DOCTYPE html>
<html>
<head>
    <title>Rental Mobil</title>
</head>
<body>
    <h2>Hitung Biaya Rental Mobil</h2>
    <form method="post">
        Lama sewa (hari): <input type="number" name="hari" required><br><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hari = $_POST['hari'];
        $sewa_perhari = 300000;
        $sopir_perhari = 150000;
        $asuransi = 50000;

        $total = ($sewa_perhari + $sopir_perhari) * $hari + $asuransi;

        echo "<h3>Total biaya sewa: Rp " . number_format($total, 0, ',', '.') . "</h3>";
    }
    ?>
</body>
</html>

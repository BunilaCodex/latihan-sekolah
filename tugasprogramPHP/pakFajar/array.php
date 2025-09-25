<?php
// Jika data siswa sudah dikirim
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    echo "<h2>Data Siswa:</h2>";
    foreach ($nama as $i => $n) {
        echo "Siswa " . ($i + 1) . ": <br>";
        echo "Nama: " . htmlspecialchars($n) . "<br>";
        echo "Kelas: " . htmlspecialchars($kelas[$i]) . "<br>";
        echo "Jurusan: " . htmlspecialchars($jurusan[$i]) . "<br><br>";
    }
    echo "<a href=''>Kembali</a>";
    exit;
}

// Ambil input jumlah siswa
$jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Siswa</title>
</head>
<body>
    <h2>Form Input Data Siswa</h2>

    <?php if ($jumlah <= 0): ?>
        <!-- Tahap 1: User masukkan jumlah siswa (input angka) -->
        <form method="post">
            <label for="jumlah">Masukkan jumlah siswa:</label>
            <input type="number" name="jumlah" id="jumlah" min="1" required>
            <button type="submit">Buat Form</button>
        </form>
    <?php else: ?>
        <!-- Tahap 2: Tampilkan form data siswa sesuai jumlah -->
        <form method="post">
            <?php for ($i = 1; $i <= $jumlah; $i++): ?>
                <fieldset style="margin-bottom:15px;">
                    <legend>Siswa <?= $i ?></legend>
                    <label>Nama:</label>
                    <input type="text" name="nama[]" required><br><br>
                    
                    <label>Kelas:</label>
                    <input type="text" name="kelas[]" required><br><br>
                    
                    <label>Jurusan:</label>
                    <input type="text" name="jurusan[]" required>
                </fieldset>
            <?php endfor; ?>
            <button type="submit">Kirim Data</button>
        </form>
    <?php endif; ?>
</body>
</html>

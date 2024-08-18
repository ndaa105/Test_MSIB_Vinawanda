<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lokasi Baru</title>
</head>
<body>
    <h1>Tambah Lokasi Baru</h1>
    <form action="<?= base_url('proyek/simpanLokasi'); ?>" method="post">
        <label for="nama">Nama Lokasi:</label><br>
        <input type="text" id="nama" name="nama"><br><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="<?= base_url('proyek'); ?>">Kembali ke Daftar Proyek dan Lokasi</a>
</body>
</html>

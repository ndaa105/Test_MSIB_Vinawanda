<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Lokasi</title>
</head>
<body>
    <h1>Edit Lokasi</h1>
    <form action="<?= base_url('proyek/updateLokasi/'.$lokasi['id']); ?>" method="post">
        <label for="nama">Nama Lokasi:</label><br>
        <input type="text" id="nama" name="nama" value="<?= $lokasi['namaLokasi']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="<?= base_url('proyek'); ?>">Kembali ke Daftar Proyek dan Lokasi</a>
</body>
</html>

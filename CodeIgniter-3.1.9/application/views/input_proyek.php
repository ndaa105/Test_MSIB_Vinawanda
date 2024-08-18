<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Proyek Baru</title>
</head>
<body>
    <h1>Tambah Proyek Baru</h1>
    <form action="<?= base_url('proyek/simpanProyek'); ?>" method="post">
        <label for="nama">Nama Proyek:</label><br>
        <input type="text" id="nama" name="nama"><br><br>
        
        <label for="lokasi_id">Lokasi:</label><br>
        <select id="lokasi_id" name="lokasi_id">
            <?php 
                $apiUrlLokasi = "http://localhost:8080/lokasi";
                $responseLokasi = file_get_contents($apiUrlLokasi);
                $data['lokasi'] = json_decode($responseLokasi, true); 
                foreach($data['lokasi'] as $key => $l): ?>
                    <option value="<?= $l['id']; ?>"><?= $l['namaLokasi']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="<?= base_url('proyek'); ?>">Kembali ke Daftar Proyek dan Lokasi</a>
</body>
</html>

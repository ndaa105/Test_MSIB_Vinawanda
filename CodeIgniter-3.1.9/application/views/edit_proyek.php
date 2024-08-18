<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Proyek</title>
</head>
<body>
    <h1>Edit Proyek</h1>
    <form action="<?= base_url('proyek/updateProyek/'.$proyek['id']); ?>" method="post">
        <label for="nama">Nama Proyek:</label><br>
        <input type="text" id="nama" name="nama" value="<?= $proyek['namaProyek']; ?>"><br><br>
        
        <label for="lokasi_id">Lokasi:</label><br>
        <select id="lokasi_id" name="lokasi_id">
            <?php 
                $apiUrlLokasi = "http://localhost:8080/lokasi";
                $responseLokasi = file_get_contents($apiUrlLokasi);
                $data['lokasi'] = json_decode($responseLokasi, true); 
                foreach($data['lokasi'] as $key => $l): ?>
                <option value="<?= $l['id']; ?>" <?= $proyek['lokasi']['id'] == $l['id'] ? 'selected' : ''; ?>>
                    <?= $l['namaLokasi']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="<?= base_url('proyek'); ?>">Kembali ke Daftar Proyek dan Lokasi</a>
</body>
</html>

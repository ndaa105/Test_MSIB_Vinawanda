<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Proyek dan Lokasi</title>
</head>
<body>
    <h1>Daftar Proyek</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Proyek</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
        <?php if(!empty($proyek)): ?>
            <?php foreach($proyek as $key => $p): ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $p['namaProyek']; ?></td>
                    <td><?= $p['lokasi']['namaLokasi']; ?></td>
                    <td>
                        <a href="<?= base_url('proyek/editProyek/'.$p['id']); ?>">Edit</a> |
                        <a href="<?= base_url('proyek/hapusProyek/'.$p['id']); ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Tidak ada data proyek yang ditemukan.</td>
            </tr>
        <?php endif; ?>
    </table>

    <h2>Daftar Lokasi</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Lokasi</th>
            <th>Aksi</th>
        </tr>
        <?php if(!empty($lokasi)): ?>
            <?php foreach($lokasi as $key => $l): ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $l['namaLokasi']; ?></td>
                    <td>
                        <a href="<?= base_url('proyek/editLokasi/'.$l['id']); ?>">Edit</a> |
                        <a href="<?= base_url('proyek/hapusLokasi/'.$l['id']); ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Tidak ada data lokasi yang ditemukan.</td>
            </tr>
        <?php endif; ?>
    </table>
    
    <a href="<?= base_url('proyek/tambahProyek'); ?>">Tambah Proyek</a> |
    <a href="<?= base_url('proyek/tambahLokasi'); ?>">Tambah Lokasi</a>
</body>
</html>

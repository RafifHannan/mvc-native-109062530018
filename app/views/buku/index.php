<?php
$pesan = [
    'created' => ['success', 'Data buku berhasil ditambahkan.'],
    'updated' => ['success', 'Data buku berhasil diperbarui.'],
    'deleted' => ['success', 'Data buku berhasil dihapus.'],
    'error'   => ['error',   'Operasi gagal. Periksa kembali data Anda, mungkin kode buku sudah terdaftar.']
];
$status = $_GET['status'] ?? null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="toolbar">
            <h2>Daftar Buku</h2>
            <a href="index.php?page=buku&action=create" class="btn btn-primary">+ Tambah Buku</a>
        </div>

        <?php if ($status && isset($pesan[$status])): ?>
            <div class="alert alert-<?= $pesan[$status][0] ?>">
                <?= htmlspecialchars($pesan[$status][1]) ?>
            </div>
        <?php endif; ?>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $b): ?>
                    <tr>
                        <td><?= htmlspecialchars($b['kode_buku']) ?></td>
                        <td><?= htmlspecialchars($b['judul']) ?></td>
                        <td><?= htmlspecialchars($b['penulis']) ?></td>
                        <td><span class="badge"><?= (int) $b['tahun_terbit'] ?></span></td>
                        <td>
                            <a href="index.php?page=buku&action=edit&id=<?= (int) $b['id'] ?>" class="btn-edit">Edit</a>
                            <form method="post" action="index.php?page=buku&action=delete" onsubmit="return confirm('Hapus data ini?')">
                                <input type="hidden" name="id" value="<?= (int) $b['id'] ?>">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
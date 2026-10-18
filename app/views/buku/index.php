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
    <title>Daftar Buku</title>
</head>
<body>
    <h2>Daftar Buku</h2>

    <?php if ($status && isset($pesan[$status])): ?>
        <p style="color: <?= $pesan[$status][0] === 'success' ? 'green' : 'red' ?>;">
            <?= htmlspecialchars($pesan[$status][1]) ?>
        </p>
    <?php endif; ?>

    <a href="index.php?page=buku&action=create">Tambah Data</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($buku as $b): ?>
        <tr>
            <td><?= htmlspecialchars($b['kode_buku']) ?></td>
            <td><?= htmlspecialchars($b['judul']) ?></td>
            <td><?= htmlspecialchars($b['penulis']) ?></td>
            <td><?= (int) $b['tahun_terbit'] ?></td>
            <td>
                <a href="index.php?page=buku&action=edit&id=<?= (int) $b['id'] ?>">Edit</a>
                <form method="post"
                      action="index.php?page=buku&action=delete"
                      style="display:inline"
                      onsubmit="return confirm('Hapus data ini?')">
                    <input type="hidden" name="id" value="<?= (int) $b['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
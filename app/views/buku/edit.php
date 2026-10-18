<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="toolbar">
            <h2>Edit Buku</h2>
        </div>

        <form method="post" action="index.php?page=buku&action=update">
            <input type="hidden" name="id" value="<?= (int) $buku['id'] ?>">

            <label>Kode Buku</label>
            <input type="text" name="kode_buku"
                   value="<?= htmlspecialchars($buku['kode_buku']) ?>" required>

            <label>Judul</label>
            <input type="text" name="judul"
                   value="<?= htmlspecialchars($buku['judul']) ?>" required>

            <label>Penulis</label>
            <input type="text" name="penulis"
                   value="<?= htmlspecialchars($buku['penulis']) ?>" required>

            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" min="1000" max="2100"
                   value="<?= (int) $buku['tahun_terbit'] ?>" required>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="index.php?page=buku" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
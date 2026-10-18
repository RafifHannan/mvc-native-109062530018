<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <div class="container">
        <div class="toolbar">
            <h2>Tambah Buku</h2>
        </div>

        <form method="post" action="index.php?page=buku&action=store">
            <label>Kode Buku</label>
            <input type="text" name="kode_buku" required>

            <label>Judul</label>
            <input type="text" name="judul" required>

            <label>Penulis</label>
            <input type="text" name="penulis" required>

            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" min="1000" max="2100" required>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=buku" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
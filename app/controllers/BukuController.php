<?php
class BukuController
{
    public function __construct(private Buku $model) {}

    public function index(): void
    {
        $buku = $this->model->getAll();
        require __DIR__ . '/../views/buku/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../views/buku/create.php';
    }

    public function store(): void
    {
        $data = $this->validateInput($_POST);

        try {
            $this->model->insert($data);
            $this->redirect('created');
        } catch (PDOException $e) {
            // Kode buku ganda akan memicu error UNIQUE di database
            $this->redirect('error');
        }
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $buku = $this->model->findById($id);

        if (!$buku) {
            http_response_code(404);
            exit('Data buku tidak ditemukan.');
        }

        require __DIR__ . '/../views/buku/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $data = $this->validateInput($_POST);

        try {
            $this->model->update($id, $data);
            $this->redirect('updated');
        } catch (PDOException $e) {
            $this->redirect('error');
        }
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $this->model->delete($id);
        $this->redirect('deleted');
    }

    private function validateInput(array $input): array
    {
        $data = [
            'kode_buku'    => trim($input['kode_buku'] ?? ''),
            'judul'        => trim($input['judul'] ?? ''),
            'penulis'      => trim($input['penulis'] ?? ''),
            'tahun_terbit' => (int) ($input['tahun_terbit'] ?? 0)
        ];

        if ($data['kode_buku'] === '' || $data['judul'] === ''
            || $data['penulis'] === '' || $data['tahun_terbit'] === 0) {
            exit('Kode buku, judul, penulis, dan tahun terbit wajib diisi.');
        }

        return $data;
    }

    private function redirect(string $status): void
    {
        header('Location: index.php?page=buku&status=' . $status);
        exit;
    }
}
?>
<?php
ob_start();
class Role extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Hak Akses';
        $data['role'] = $this->model('role_model')->getAllRole();

        $this->view('templates/header', $data);
        $this->view('role/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Hak Akses';
        $data['role'] = $this->model('role_model')->getRoleById($id);

        $this->view('templates/header', $data);
        $this->view('role/detail', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Hak Akses';
        $data['role'] = $this->model('role_model')->getRoleById($id);

        $this->view('templates/header', $data);
        $this->view('role/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_submit()
    {
        if ($this->model('role_model')->updateDataRole($_POST) > 0) {
            Flasher::flash('Berhasil', 'diubah');
            header('Location: ' . ROUTE_URL . '/role'); // apabila role berhasil diupdate
            exit;
        } else {
            Flasher::flash('Gagal', 'diubah');
            header('Location: ' . ROUTE_URL . '/role'); // apabila role gagal diupdate 
            exit;
        }
    }

    public function create()
    {
        $data['judul'] = 'Add Hak Akses';

        $this->view('templates/header', $data);
        $this->view('role/create');
        $this->view('templates/footer');

        if ($this->model('role_model')->tambahDataRole($_POST) > 0) {
            Flasher::flash('Berhasil', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/role'); // apabila role berhasil ditambahkan
            exit;
        } else {
            Flasher::flash('Gagal', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/role'); // apabila role gagal ditambahkan 
            exit;
        }
    }

    public function hapus($idAkses)
    {
        if ($this->model('role_model')->hapusDataRole($idAkses) > 0) {
            Flasher::flash('Berhasil', 'dihapus');
            header('Location: ' . ROUTE_URL . '/role'); // apabila role berhasil dihapus
            exit;
        } else {
            Flasher::flash('Gagal', 'dihapus');
            header('Location: ' . ROUTE_URL . '/role'); // apabila role gagal dihapus
        }
    }
}

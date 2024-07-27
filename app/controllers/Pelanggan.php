<?php
ob_start();
class Pelanggan extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Pelanggan';
        $data['pelanggan'] = $this->model('pelanggan_model')->getAllPelanggan();

        $this->view('templates/header', $data);
        $this->view('pelanggan/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Pelanggan';
        $data['pelanggan'] = $this->model('pelanggan_model')->getPelangganById($id);

        $this->view('templates/header', $data);
        $this->view('pelanggan/detail', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Pelanggan';
        $data['pelanggan'] = $this->model('pelanggan_model')->getPelangganById($id);

        $this->view('templates/header', $data);
        $this->view('pelanggan/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_submit()
    {
        if ($this->model('pelanggan_model')->updateDataPelanggan($_POST) > 0) {
            Flasher::flash('Berhasil', 'diubah');
            header('Location: ' . ROUTE_URL . '/pelanggan'); // apabila pelanggan berhasil diupdate
            exit;
        } else {
            Flasher::flash('Gagal', 'diubah');
            header('Location: ' . ROUTE_URL . '/pelanggan'); // apabila pelanggan gagal diupdate 
            exit;
        }
    }

    public function create()
    {
        $data['judul'] = 'Add Pelanggan';

        $this->view('templates/header', $data);
        $this->view('pelanggan/create', $data);
        $this->view('templates/footer');

        if ($this->model('pelanggan_model')->tambahDataPelanggan($_POST) > 0) {
            Flasher::flash('Berhasil', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/pelanggan'); // apabila pelanggan berhasil ditambahkan
            exit;
        } else {
            Flasher::flash('Gagal', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/pelanggan'); // apabila pelanggan gagal ditambahkan 
            exit;
        }
    }

    public function hapus($idPelanggan)
    {
        if ($this->model('pelanggan_model')->hapusDataPelanggan($idPelanggan) > 0) {
            Flasher::flash('Berhasil', 'dihapus');
            header('Location: ' . ROUTE_URL . '/pelanggan'); // apabila pelanggan berhasil dihapus
            exit;
        } else {
            Flasher::flash('Gagal', 'dihapus');
            header('Location: ' . ROUTE_URL . '/pelanggan'); // apabila pelanggan gagal dihapus
        }
    }
}

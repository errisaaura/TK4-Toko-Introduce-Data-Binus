<?php
ob_start();
class PaketPenjualan extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Paket Penjualan';
        $data['paket_penjualan'] = $this->model('paket_penjualan_model')->getPaketPenjualan();

        $this->view('templates/header', $data);
        $this->view('paketPenjualan/index', $data);
        $this->view('templates/footer');
    }

    // public function index()
    // {
    //     $data['judul'] = 'List Paket Penjualan';
    //     $data['paket_penjualan'] = $this->model('paket_penjualan_model')->getAllPaketPenjualan();

    //     $this->view('templates/header', $data);
    //     $this->view('paketPenjualan/index', $data);
    //     $this->view('templates/footer');
    // }

    // public function detail($id)
    // {
    //     $data['judul'] = 'Detail Paket Penjualan';
    //     $data['paket_penjualan'] = $this->model('paket_penjualan_model')->getPaketPenjualanById($id);

    //     $this->view('templates/header', $data);
    //     $this->view('paketPenjualan/detail', $data);
    //     $this->view('templates/footer');
    // }

    // public function edit($id)
    // {
    //     $data['judul'] = 'Edit Paket Penjualan';
    //     $data['paket_penjualan'] = $this->model('paket_penjualan_model')->getPaketPenjualanById($id);

    //     $this->view('templates/header', $data);
    //     $this->view('paketPenjualan/edit', $data);
    //     $this->view('templates/footer');
    // }

    // public function edit_submit()
    // {
    //     if ($this->model('paket_penjualan_model')->updateDataPaketPenjualan($_POST) > 0) {
    //         Flasher::flash('Berhasil', 'diubah');
    //         header('Location: ' . ROUTE_URL . '/paketPenjualan'); // apabila paket_penjualan berhasil diupdate
    //         exit;
    //     } else {
    //         Flasher::flash('Gagal', 'diubah');
    //         header('Location: ' . ROUTE_URL . '/paketPenjualan'); // apabila paket_penjualan gagal diupdate 
    //         exit;
    //     }
    // }

    // public function create()
    // {
    //     $data['judul'] = 'Add Paket Penjualan';

    //     $this->view('templates/header', $data);
    //     $this->view('paketPenjualan/create');
    //     $this->view('templates/footer');

    //     if ($this->model('paket_penjualan_model')->tambahDataPaketPenjualan($_POST) > 0) {
    //         Flasher::flash('Berhasil', 'ditambahkan');
    //         header('Location: ' . ROUTE_URL . '/paketPenjualan'); // apabila paket_penjualan berhasil ditambahkan
    //         exit;
    //     } else {
    //         Flasher::flash('Gagal', 'ditambahkan');
    //         header('Location: ' . ROUTE_URL . '/paketPenjualan'); // apabila paket_penjualan gagal ditambahkan 
    //         exit;
    //     }
    // }

    // public function hapus($idPaketPenjualan)
    // {
    //     if ($this->model('paket_penjualan_model')->hapusDataPaketPenjualan($idPaketPenjualan) > 0) {
    //         Flasher::flash('Berhasil', 'dihapus');
    //         header('Location: ' . ROUTE_URL . '/paketPenjualan'); // apabila paket_penjualan berhasil dihapus
    //         exit;
    //     } else {
    //         Flasher::flash('Gagal', 'dihapus');
    //         header('Location: ' . ROUTE_URL . '/paketPenjualan'); // apabila paket_penjualan gagal dihapus
    //     }
    // }
}

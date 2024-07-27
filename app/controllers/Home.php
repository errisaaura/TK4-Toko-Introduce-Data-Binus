<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        // $data['nama'] = $this->model('user_model')->getUser();
        $data['analytic'] = $this->model('dashboard_model')->getAnalytic();
        $data['kombinasi'] = $this->model('dashboard_model')->getProductCombination();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}

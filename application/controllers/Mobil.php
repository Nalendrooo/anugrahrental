<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('userModel');
        $this->load->model('accessModel');
        $this->load->model('mobilModel');
    }

    public function index()
    {

        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');


        $data['title'] = 'Daftar Mobil';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['mobil_merek'] = $this->mobilModel->getMerek();
        $data['mobil'] = $this->mobilModel->getMobilReady();

        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('mobil/daftar-mobil', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function sewa_mobil($mobil_id)
    {

        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');


        $data['title'] = 'Form Sewa Mobil';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['data_mobil'] = $this->mobilModel->getMobilByMobilID($mobil_id);

        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('mobil/form-sewa-mobil', $data);
        $this->load->view('templates/master/footer_master');
    }




    public function pilih_metode_pembayaran()
    {

        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');

        $data['title'] = 'Pilih Metode Pembayaran Sewa';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);

        $mobil_id = $this->input->post('mobil_id');
        $data['data_mobil'] = $this->mobilModel->getMobilByMobilID($mobil_id);

        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('mobil/pilih-metode-pembayaran', $data);
        $this->load->view('templates/master/footer_master');
    }
}

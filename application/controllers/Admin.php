<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('adminModel');
        $this->load->model('accessModel');
    }
    public function index()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');

        $data['title'] = 'Dashboard';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);

        // foreach ($data['menu'] as $sm) :
        //     $menu_id =  $sm['menu_id'];
        // endforeach;
        // $data['sub_menu'] = $this->adminModel->getSubMenuUser($menu_id);


        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/master/footer_master');
    }
}

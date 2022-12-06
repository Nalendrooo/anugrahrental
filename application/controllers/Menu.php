<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('accessModel');
        $this->load->model('menuModel');
    }
    public function index()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');

        $data['title'] = 'Menu Management';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['user_menu'] = $this->menuModel->getMenu();
        $data['user_sub_menu'] = $this->menuModel->getSubMenu();


        // $data['list_access_menu'] = $this->menuModel->getAccessMenu();





        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('menu/menu-management', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function addMenu()
    {
        $rules =
            [
                [
                    'field' => 'menu_for',
                    'label' => 'Menu_for',
                    'rules' => 'required'
                ]
            ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data gagal ditambahkan! Data kosong!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('menu');
        } else {
            $data_masuk = [
                'menu_for' => $this->input->post('menu_for'),
            ];

            $data['user_menu'] = $this->menuModel->saveMenu($data_masuk);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('menu');
        }
    }

    public function editMenu()
    {
        $rules =
            [
                [
                    'field' => 'menu_for',
                    'label' => 'Menu_for',
                    'rules' => 'required'
                ]
            ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data gagal diupdate! Data kosong!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('menu');
        } else {

            $where = $this->input->post('menu_id');
            $data_masuk = [
                'menu_for' => $this->input->post('menu_for'),
            ];


            $this->menuModel->updateMenu($where, $data_masuk);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diupdate!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('menu');
        }
    }

    public function deleteMenu($menu_id)
    {
        $where =  $menu_id;
        $this->menuModel->deleteMenu($where);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
        );
        redirect('menu');
    }


    public function addSubMenu()
    {
        $rules = [
            [
                'field' => 'menu_id',
                'label' => 'Menu_id',
                'rules' => 'required',
            ],
            [
                'field' => 'title_menu',
                'label' => 'Title_menu',
                'rules' => 'required',
            ],
            [
                'field' => 'url_menu',
                'label' => 'Url_menu',
                'rules' => 'required',
            ],
            [
                'field' => 'icon_menu',
                'label' => 'Icon_menu',
                'rules' => 'required',
            ]
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data gagal ditambahkan! Data kosong!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('menu');
        } else {
            $is_active = $this->input->post('is_active') == "on" ? 1 : 2;
            $data_masuk = [
                'menu_id' => $this->input->post('menu_id'),
                'title_menu' => $this->input->post('title_menu'),
                'url_menu' => $this->input->post('url_menu'),
                'icon_menu' => $this->input->post('icon_menu'),
                'is_active' => $is_active
            ];

            $this->menuModel->saveSubMenu($data_masuk);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('menu');
        }
    }

    public function editSubMenu()
    {
        $rules =
            [
                [
                    'field' => 'menu_id',
                    'label' => 'Menu_id',
                    'rules' => 'required',
                ],
                [
                    'field' => 'title_menu',
                    'label' => 'Title_menu',
                    'rules' => 'required',
                ],
                [
                    'field' => 'url_menu',
                    'label' => 'Url_menu',
                    'rules' => 'required',
                ],
                [
                    'field' => 'icon_menu',
                    'label' => 'Icon_menu',
                    'rules' => 'required',
                ]
            ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data gagal diupdate! Data kosong!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('menu');
        } else {

            $is_active = $this->input->post('is_active') == "on" ? 1 : 2;
            $data_masuk = [
                'menu_id' => $this->input->post('menu_id'),
                'title_menu' => $this->input->post('title_menu'),
                'url_menu' => $this->input->post('url_menu'),
                'icon_menu' => $this->input->post('icon_menu'),
                'is_active' => $is_active
            ];
            $where = $this->input->post('sub_menu_id');

            $this->menuModel->updateSubMenu($where, $data_masuk);


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diupdate!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );

            redirect('menu');
        }
    }

    public function deleteSubMenu($sub_menu_id)
    {
        $where =  $sub_menu_id;
        $this->menuModel->deleteSubMenu($where);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
        );
        redirect('menu');
    }
}

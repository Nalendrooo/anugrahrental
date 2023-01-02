<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('userModel');
        $this->load->model('accessModel');
        $this->load->model('mobilModel');
        $this->load->model('customerModel');
        $this->load->model('paymentModel');
        $this->load->model('sewaModel');
    }

    public function index()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');


        $data['title'] = 'Dashboard';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['list_all_customer'] = $this->customerModel->getAllCustomer();
        $data['list_merek'] = $this->mobilModel->getMerek();
        $data['list_all_mobil'] = $this->mobilModel->getAllMobil();

        // foreach ($data['menu'] as $sm) :
        //     $menu_id =  $sm['menu_id'];
        // endforeach;
        // $data['sub_menu'] = $this->adminModel->getSubMenuUser($menu_id);


        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function list_all_mobil()
    {

        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');

        $data['title'] = 'Daftar Semua Mobil';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['all_mobil'] = $this->mobilModel->getAllMobil();
        $data['merek'] = $this->mobilModel->getMerek();

        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('user/list-all-mobil', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function tambah_mobil_baru()
    {
        $rules = [
            [
                'field' => 'nama_mobil',
                'label' => 'Nama_mobil',
                'rules' => 'required',
                'errors' =>
                [
                    'required' => 'Nama mobil tidak boleh kosong!'
                ]

            ],
            [
                'field' => 'warna_mobil',
                'label' => 'Warna_mobil',
                'rules' => 'required',
                'errors' =>
                [
                    'required' => 'Warna mobil tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'tahun_mobil',
                'label' => 'Tahun_mobil',
                'rules' => 'required|trim|integer',
                'errors' =>
                [
                    'required' => 'Tahun mobil tidak boleh kosong!',
                    'integer' => 'Tahun mobilhanya berisi angka!',
                ]
            ],
            [
                'field' => 'kapasitas_mobil',
                'label' => 'Kapasitas_mobil',
                'rules' => 'required|trim|integer',
                'errors' =>
                [
                    'required' => 'Kapasitas mobil tidak boleh kosong!',
                    'integer' => 'Kapasitas mobil hanya berisi angka!',
                ]
            ],

            [
                'field' => 'harga_sewa_mobil',
                'label' => 'Harga_sewa_mobil',
                'rules' => 'required|trim|integer',
                'errors' =>
                [
                    'required' => 'Harga sewa mobil tidak boleh kosong!',
                    'integer' => 'Harga sewa mobil hanya berisi angka!',
                ]
            ],
            [
                'field' => 'nopol_mobil',
                'label' => 'Nopol_mobil',
                'rules' => 'required',
                'errors' =>
                [
                    'required' => 'Nopol tidak boleh kosong!',
                ]
            ],
            [
                'field' => 'pemilik_mobil',
                'label' => 'Pemilik_mobil',
                'rules' => 'required',
                'errors' =>
                [
                    'required' => 'Nama pemilik tidak boleh kosong!',
                ]
            ],
            [
                'field' => 'is_active',
                'label' => 'Is_active',
                'rules' => 'required|trim',
                'errors' =>
                [
                    'required' => 'Is active harus dipilih!',
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <b class="text-danger">Data gagal ditambahkan!</b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><br>
                '   . form_error('nama_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('warna_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('tahun_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('kapasitas_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('harga_sewa_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('nopol_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('pemilik_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('is_active', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . '</div>'
            );
            redirect('user/list_all_mobil');
        } else {
            $nama_mobil = $this->input->post('nama_mobil');
            $is_active = $this->input->post('is_active') == "on" ? 1 : 0;
            $driver_mobil = $this->input->post('driver_mobil') == "tersedia" ? 1 : 0;
            $data_masuk = [
                'nama_mobil' => $nama_mobil,
                'merek_id' => number_format($this->input->post('merek_id')),
                'kapasitas_mobil' => number_format($this->input->post('kapasitas_mobil')),
                'warna_mobil' => $this->input->post('warna_mobil'),
                'tahun_mobil' => $this->input->post('tahun_mobil'),
                'tipe_mobil' => $this->input->post('tipe_mobil'),
                'status_mobil' => $this->input->post('status_mobil'),
                'driver_mobil' => $driver_mobil,
                'harga_sewa_mobil' => $this->input->post('harga_sewa_mobil'),
                'nopol_mobil' => $this->input->post('nopol_mobil'),
                'image_mobil' => 'default.jpg',
                'pemilik_mobil' => $this->input->post('pemilik_mobil'),
                'is_active' => $is_active
            ];

            $this->mobilModel->insertMobil($data_masuk);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mobil <b>' . $nama_mobil . '</b> berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('user/list_all_mobil');
        }
    }

    public function edit_mobil()
    {
        $rules = [
            [
                'field' => 'nama_mobil',
                'label' => 'Nama_mobil',
                'rules' => 'required',
                'errors' =>
                [
                    'required' => 'Nama mobil tidak boleh kosong!'
                ]

            ],
            [
                'field' => 'warna_mobil',
                'label' => 'Warna_mobil',
                'rules' => 'required',
                'errors' =>
                [
                    'required' => 'Warna mobil tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'tahun_mobil',
                'label' => 'Tahun_mobil',
                'rules' => 'required|trim|integer',
                'errors' =>
                [
                    'required' => 'Tahun mobil tidak boleh kosong!',
                    'integer' => 'Tahun mobilhanya berisi angka!',
                ]
            ],
            [
                'field' => 'kapasitas_mobil',
                'label' => 'Kapasitas_mobil',
                'rules' => 'required|trim|integer',
                'errors' =>
                [
                    'required' => 'Kapasitas mobil tidak boleh kosong!',
                    'integer' => 'Kapasitas mobil hanya berisi angka!',
                ]
            ],

            [
                'field' => 'harga_sewa_mobil',
                'label' => 'Harga_sewa_mobil',
                'rules' => 'required|trim|integer',
                'errors' =>
                [
                    'required' => 'Harga sewa mobil tidak boleh kosong!',
                    'integer' => 'Harga sewa mobil hanya berisi angka!',
                ]
            ],
            [
                'field' => 'nopol_mobil',
                'label' => 'Nopol_mobil',
                'rules' => 'required',
                'errors' =>
                [
                    'required' => 'Nopol tidak boleh kosong!',
                ]
            ],
            [
                'field' => 'pemilik_mobil',
                'label' => 'Pemilik_mobil',
                'rules' => 'required',
                'errors' =>
                [
                    'required' => 'Nama pemilik tidak boleh kosong!',
                ]
            ],
            [
                'field' => 'is_active',
                'label' => 'Is_active',
                'rules' => 'required|trim',
                'errors' =>
                [
                    'required' => 'Is active harus dipilih!',
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <b class="text-danger">Data gagal ditambahkan!</b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><br>
                '   . form_error('nama_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('warna_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('tahun_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('kapasitas_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('harga_sewa_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('nopol_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('pemilik_mobil', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . form_error('is_active', '<small class="text-danger pl-3">', '</small>') . '<br>'
                    . '</div>'
            );
            redirect('user/list_all_mobil');
        } else {
            $where = $this->input->post('mobil_id');
            $nama_mobil = $this->input->post('nama_mobil');
            $is_active = $this->input->post('is_active') == "on" ? 1 : 0;
            $driver_mobil = $this->input->post('driver_mobil') == "tersedia" ? 1 : 0;
            $data_masuk = [
                'nama_mobil' => $nama_mobil,
                'merek_id' => number_format($this->input->post('merek_id')),
                'kapasitas_mobil' => number_format($this->input->post('kapasitas_mobil')),
                'warna_mobil' => $this->input->post('warna_mobil'),
                'tahun_mobil' => $this->input->post('tahun_mobil'),
                'tipe_mobil' => $this->input->post('tipe_mobil'),
                'status_mobil' => $this->input->post('status_mobil'),
                'driver_mobil' => $driver_mobil,
                'harga_sewa_mobil' => $this->input->post('harga_sewa_mobil'),
                'nopol_mobil' => $this->input->post('nopol_mobil'),
                'image_mobil' => 'default.jpg',
                'pemilik_mobil' => $this->input->post('pemilik_mobil'),
                'is_active' => $is_active
            ];

            $this->mobilModel->updateMobil($where, $data_masuk);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mobil <b>' . $nama_mobil . '</b> berhasil diupdate!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('user/list_all_mobil');
        }
    }

    public function list_mobil_ready()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');

        $data['title'] = 'Daftar Mobil Tersedia';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['mobil_active'] = $this->mobilModel->getMobilActive();

        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('user/list-mobil-ready', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function list_mobil_booking()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');


        $data['title'] = 'Daftar Mobil Dibooking';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);


        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('user/list-mobil-booking', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function list_mobil_sewa()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');


        $data['title'] = 'Daftar Mobil Disewa';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['list_mobil_disewa'] = $this->sewaModel->getSewaByCustomer();

        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('user/list-mobil-sewa', $data);
        $this->load->view('templates/master/footer_master');
    }


    public function pembayaran()
    {

        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');


        $data['title'] = 'Pembayaran';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['deposit'] = $this->paymentModel->getDeposit();
        $data['list_all_sewa'] = $this->sewaModel->getAllSewa();


        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('user/pembayaran', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function setujui_pembayaran_sewa($sewa_id, $mobil_id)
    {
        $this->paymentModel->updateSetujuPembayaranSewa($sewa_id);
        $this->mobilModel->updateMobilDisewa($mobil_id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pembayaran sewa customer berhasil disetujui!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
        );
        redirect('user/list_mobil_sewa');
    }


    public function detail_bukti_pembayaran($customer_id)
    {

        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');


        $data['title'] = 'Detail Bukti Pembayaran';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['detail_deposit'] = $this->paymentModel->getDepositCustomerByID($customer_id);


        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('user/deposit/detail-bukti-pembayaran', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function setuju_pembayaran($customer_id)
    {

        $this->paymentModel->updateSetujuDeposit($customer_id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Deposit customer berhasil disetujui!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
        );
        redirect('user/pembayaran');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('customerModel');
        $this->load->model('accessModel');
        $this->load->model('paymentModel');
        $this->load->model('sewaModel');
    }

    public function index()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');
        $user_id_session = $this->session->userdata('user_id');

        // if ($role_session == 1) {
        //     redirect('admin');
        // } else if ($role_session == 2) {
        //     redirect('user');
        // } else if ($role_session == 3) {
        //     redirect('customer');
        // };

        $data['title'] = 'Profile';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['customer'] = $this->customerModel->getCustomerByUserID($user_id_session);
        $data['deposit'] = $this->paymentModel->getDepositByUserID($user_id_session);

        if ($data['customer'] < 1) {
            redirect('customer/form_data_diri');
        }

        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('customer/my-profile', $data);
        $this->load->view('templates/master/footer_master');
    }

    public function form_data_diri()
    {

        $rules =
            [

                [
                    'field' => 'alamat_customer',
                    'label' => 'Alamat_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Alamat tidak boleh kosong!',
                    ]
                ],
                [
                    'field' => 'kecamatan_customer',
                    'label' => 'Kecamatan_customer',
                    'rules' => 'required|alpha',
                    'errors' =>
                    [
                        'required' => 'Kecamatan tidak boleh kosong!',
                        'alpha' => 'Kecamatan tidak boleh berisi karakter spesial atau angka!',
                    ]
                ],
                [
                    'field' => 'kota_customer',
                    'label' => 'Kota_customer',
                    'rules' => 'required|alpha',
                    'errors' =>
                    [
                        'required' => 'Kabupaten / Kota tidak boleh kosong!',
                        'alpha' => 'Kabupaten / Kota tidak boleh berisi karakter spesial atau angka!',
                    ]
                ],
                [
                    'field' => 'jenis_kelamin_customer',
                    'label' => 'Jenis_kelamin_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Kabupaten / Kota tidak boleh kosong!',
                    ]
                ],
                [
                    'field' => 'nomor_hp_customer',
                    'label' => 'Nomor_hp_customer',
                    'rules' => 'required|integer',
                    'errors' =>
                    [
                        'required' => 'Nomor HP tidak boleh kosong!',
                        'integer' => 'Nomor HP hanya boleh berisi angka!',
                    ]
                ],
                [
                    'field' => 'status_pekerjaan_customer',
                    'label' => 'Status_pekerjaan_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Status pekerjaan tidak boleh kosong!',
                    ]
                ],
                [
                    'field' => 'pekerjaan_sekarang_customer',
                    'label' => 'pekerjaan_sekarang_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Pekerjaan|sekarang tidak boleh kosong!',
                    ]
                ],
                [
                    'field' => 'sosmed_customer',
                    'label' => 'sosmed_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Sosmed tidak boleh kosong!',
                    ]
                ],
            ];

        $this->form_validation->set_rules($rules);

        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');
        $user_id_session = $this->session->userdata('user_id');
        $username_session = $this->session->userdata('username');

        $customer = $this->customerModel->getCustomerByUserID($user_id_session);
        if ($customer > 0) {
            redirect('customer');
        }

        $data['title'] = 'Profile';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/master/header_master', $data);
            $this->load->view('templates/master/topbar_master');
            $this->load->view('templates/master/sidebar_master', $data);
            $this->load->view('customer/form-data-diri', $data);
            $this->load->view('templates/master/footer_master');
        } else {
            $data_masuk = [
                'nama_customer' => $username_session,
                'user_id' => $user_id_session,
                'email_customer' => $email_session,
                'alamat_customer' => $this->input->post('alamat_customer'),
                'kecamatan_customer' => $this->input->post('kecamatan_customer'),
                'kota_customer' => $this->input->post('kota_customer'),
                'jenis_kelamin_customer' => $this->input->post('jenis_kelamin_customer'),
                'nomor_hp_customer' => $this->input->post('nomor_hp_customer'),
                'status_pekerjaan_customer' => $this->input->post('status_pekerjaan_customer'),
                'pekerjaan_sekarang_customer' => $this->input->post('pekerjaan_sekarang_customer'),
                'sosmed_customer' => $this->input->post('sosmed_customer'),
                'foto_diri_customer' => 'default.jpg',
                'foto_ktp_customer' => 'default.jpg',
                'foto_sim_customer' => 'default.jpg',
            ];

            $this->customerModel->saveCustomer($data_masuk);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Hai, <b>' . $username_session . '</b>! Selamat datang di <b>Anugrah Rental Jaya</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
            );

            redirect('customer');
        }
    }

    public function ubah_data_diri()
    {
        $rules =
            [

                [
                    'field' => 'alamat_customer',
                    'label' => 'Alamat_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Alamat tidak boleh kosong!',
                    ]
                ],
                [
                    'field' => 'kecamatan_customer',
                    'label' => 'Kecamatan_customer',
                    'rules' => 'required|alpha',
                    'errors' =>
                    [
                        'required' => 'Kecamatan tidak boleh kosong!',
                        'alpha' => 'Kecamatan tidak boleh berisi karakter spesial atau angka!',
                    ]
                ],
                [
                    'field' => 'kota_customer',
                    'label' => 'Kota_customer',
                    'rules' => 'required|alpha',
                    'errors' =>
                    [
                        'required' => 'Kabupaten / Kota tidak boleh kosong!',
                        'alpha' => 'Kabupaten / Kota tidak boleh berisi karakter spesial atau angka!',
                    ]
                ],
                [
                    'field' => 'jenis_kelamin_customer',
                    'label' => 'Jenis_kelamin_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Kabupaten / Kota tidak boleh kosong!',
                    ]
                ],
                [
                    'field' => 'nomor_hp_customer',
                    'label' => 'Nomor_hp_customer',
                    'rules' => 'required|integer',
                    'errors' =>
                    [
                        'required' => 'Nomor HP tidak boleh kosong!',
                        'integer' => 'Nomor HP hanya boleh berisi angka!',
                    ]
                ],
                [
                    'field' => 'status_pekerjaan_customer',
                    'label' => 'Status_pekerjaan_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Status pekerjaan tidak boleh kosong!',
                    ]
                ],
                [
                    'field' => 'pekerjaan_sekarang_customer',
                    'label' => 'pekerjaan_sekarang_customer',
                    'rules' => 'required|trim',
                    'errors' =>
                    [
                        'required' => 'Pekerjaan|sekarang tidak boleh kosong!',
                    ]
                ],
                [
                    'field' => 'sosmed_customer',
                    'label' => 'sosmed_customer',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Sosmed tidak boleh kosong!',
                    ]
                ],
            ];
        $this->form_validation->set_rules($rules);

        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');
        $user_id_session = $this->session->userdata('user_id');
        $username_session = $this->session->userdata('username');

        $data['title'] = 'Ubah Data Diri';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['customer'] = $this->customerModel->getCustomerByUserID($user_id_session);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/master/header_master', $data);
            $this->load->view('templates/master/topbar_master');
            $this->load->view('templates/master/sidebar_master', $data);
            $this->load->view('customer/ubah-data-diri', $data);
            $this->load->view('templates/master/footer_master');
        } else {

            $where = $this->input->post('customer_id');
            $data_masuk = [
                'nama_customer' => $username_session,
                'user_id' => $user_id_session,
                'email_customer' => $email_session,
                'alamat_customer' => $this->input->post('alamat_customer'),
                'kecamatan_customer' => $this->input->post('kecamatan_customer'),
                'kota_customer' => $this->input->post('kota_customer'),
                'jenis_kelamin_customer' => $this->input->post('jenis_kelamin_customer'),
                'nomor_hp_customer' => $this->input->post('nomor_hp_customer'),
                'status_pekerjaan_customer' => $this->input->post('status_pekerjaan_customer'),
                'pekerjaan_sekarang_customer' => $this->input->post('pekerjaan_sekarang_customer'),
                'sosmed_customer' => $this->input->post('sosmed_customer'),
                'foto_diri_customer' => 'default.jpg',
                'foto_ktp_customer' => 'default.jpg',
                'foto_sim_customer' => 'default.jpg',
            ];

            $this->customerModel->updateCustomer($where, $data_masuk);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Hai, <b>' . $username_session . '</b>! Data berhasil diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
            );

            redirect('customer');
        }
    }

    public function form_pembayaran_deposit()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');
        $user_id_session = $this->session->userdata('user_id');

        $data['title'] = 'Form Pembayaran Deposit';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['customer'] = $this->customerModel->getCustomerByUserID($user_id_session);

        $rules =
            [
                [
                    'field' => 'jenis_pembayaran_deposit',
                    'label' => 'Jenis_pembayaran_deposit',
                    'rules' => 'required|trim',
                    'errors' =>
                    [
                        'required' => 'Pilih salah satu metode pembayaran!'
                    ]
                ]
            ];

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/master/header_master', $data);
            $this->load->view('templates/master/topbar_master');
            $this->load->view('templates/master/sidebar_master', $data);
            $this->load->view('customer/deposit/form-pembayaran-deposit', $data);
            $this->load->view('templates/master/footer_master');
        } else {
            $data_masuk = [
                'user_id' => $user_id_session,
                'jenis_pembayaran_deposit' => $this->input->post('jenis_pembayaran_deposit'),
                'bukti_pembayaran_deposit' => 'bukti_pembayaran.jpg',
                'status_deposit' => 0,
                'updated_at' => date("d-m-Y"),
                'created_at' => date("d-m-Y")
            ];

            $this->paymentModel->insertNewDeposit($data_masuk);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Terimakasih telah melakukan pembayaran deposit! Tunggu 1x24 jam untuk diverifikasi oleh admin
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
            );

            redirect('customer');
        }
    }

    public function sewa_mobil()
    {

        $data_masuk = [
            'user_id' => $this->input->post('user_id'),
            'mobil_id' => $this->input->post('mobil_id'),
            'email' => $this->input->post('email_cust'),
            'handphone' => $this->input->post('handphone'),
            'lokasi_pengambilan' => $this->input->post('lokasi_pengambilan'),
            'lama_sewa' => $this->input->post('lama_sewa'),
            'waktu_pengambilan' => $this->input->post('waktu_pengambilan'),
            'sewa_driver' => $this->input->post('sewa_driver'),
            'total_pembayaran' => $this->input->post('total_pembayaran'),
            'metode_pembayaran_sewa' => $this->input->post('metode_pembayaran_sewa'),
            'bukti_pembayaran_sewa' => 'bukti_pembayaran.jpg',
            'status_sewa' => 0
        ];

        $this->sewaModel->insertNewSewa($data_masuk);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Verifikasi penyewaan maksimal 1 jam! Mohon tunggu!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );

        redirect('customer');
    }

    public function mobil_disewa()
    {
        $email_session = $this->session->userdata('email');
        $role_session = $this->session->userdata('role');
        $user_id_session = $this->session->userdata('user_id');

        $data['title'] = 'Mobil Disewa';
        $data['user'] = $this->authModel->getUserBySession($email_session);
        $data['menu'] = $this->accessModel->getUserAccessMenuByRole($role_session);
        $data['list_disewa'] = $this->sewaModel->getDisewaByUserID($user_id_session);

        $this->load->view('templates/master/header_master', $data);
        $this->load->view('templates/master/topbar_master');
        $this->load->view('templates/master/sidebar_master', $data);
        $this->load->view('customer/sewa/mobil_sewa', $data);
        $this->load->view('templates/master/footer_master');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('authModel');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()
	{

		if ($this->session->userdata('role') == 1) {
			redirect('admin');
		} else if ($this->session->userdata('role') == 2) {
			redirect('user');
		} else if ($this->session->userdata('role') == 3) {
			redirect('customer');
		};
		$rules =
			[
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|trim|valid_email',
					'errors' =>
					[
						'requied' => 'Email tidak boleh kosong!',
						'valid_email' => 'Email tidak valid!',
					]
				],
				[
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required|trim|min_length[8]',
					'errors' =>
					[
						'required' => 'Password tidak boleh kosong!',
						'matches' => 'Password tidak cocok!',
						'min_length' => 'Password minimal 8 karakter!',
					]
				]

			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {

			$data['title'] = 'Login';
			$this->load->view('templates/master/header_master', $data);
			$this->load->view('auth/form-login');
			$this->load->view('templates/master/footer_master');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->authModel->getUserByEmail($email);

		if (!$user) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email belum terdaftar ! </div>');
			redirect('auth');
		}

		if ($user['is_active'] == 1) {
			if (md5($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'role' => $user['role'],
					'user_id' => $user['user_id'],
					'username' => $user['username']
				];
				$this->session->set_userdata($data);
				if ($user['role'] == 1) {
					redirect('admin');
				} else if ($user['role'] == 2) {
					redirect('user');
				} else {
					redirect('customer');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah ! </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun belum diaktivasi ! </div>');
			redirect('auth');
		}
	}

	public function registration()
	{

		$rules =
			[
				[
					'field' => 'first_name',
					'label' => 'First_name',
					'rules' => 'required|trim|alpha',
					'errors' =>
					[
						'required' => 'Nama tidak boleh kosong!',
						'alpha' => 'Nama tidak boleh berisi karakter spesial atau angka!',
					]
				],
				[
					'field' => 'last_name',
					'label' => 'Last_name',
					'rules' => 'required|trim|alpha',
					'errors' =>
					[
						'required' => 'Nama tidak boleh kosong!',
						'alpha' => 'Nama tidak boleh berisi karakter spesial atau angka!',
					]
				],
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|trim|valid_email|is_unique[user.email]',
					'errors' =>
					[
						'required' => 'Email tidak boleh kosong!',
						'is_unique' => 'Email sudah terdaftar!',
						'valid_email' => 'Email tidak valid!'
					]
				],
				[
					'field' => 'password1',
					'label' => 'Password1',
					'rules' => 'required|trim|min_length[8]|matches[password2]',
					'errors' =>
					[
						'required' => 'Password tidak boleh kosong!',
						'matches' => 'Password tidak cocok!',
						'min_length' => 'Passoword minimal 8 karakter!'
					]
				],
				[
					'field' => 'password2',
					'label' => 'Password2',
					'rules' => 'required|trim',
					'errors' =>
					[
						'required' => 'Password tidak boleh kosong!'
					]
				]

			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration';
			$this->load->view('templates/master/header_master', $data);
			$this->load->view('auth/form-register');
			$this->load->view('templates/master/footer_master');
		} else {
			$email = $this->input->post('email');
			$data = [
				'username' => htmlspecialchars($this->input->post('first_name', true)) . " " .  htmlspecialchars($this->input->post('last_name', true)),
				'password' => md5($this->input->post('password1')),
				'email' => htmlspecialchars($email, true),
				'user_image' => 'default.jpg',
				'role' => '3',
				'is_active' => '0',
				'updated_at' => date("Y-d-m H:i:s"),
				'created_at' => date("Y-d-m H:i:s")
			];

			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];


			$this->authModel->insertUser($data);
			$this->authModel->insertToken($user_token);

			$this->_sendEmail($token, 'verify');
			$this->notifSuccess('create');
		}
	}

	private function _sendEmail($token, $type)
	{
		$email = $this->input->post('email');
		$username = htmlspecialchars($this->input->post('first_name', true)) . " " .  htmlspecialchars($this->input->post('last_name', true));
		$config =
			[
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_user' => '111@gmail.com',
				'smtp_pass' => 'password',
				'smtp_port' => 465,
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n",

			];
		$this->load->library('email', $config);

		$this->email->from('danalif074@gmail.com', 'Anugrah Rental Jaya');
		$this->email->to($email);

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('
			<div class="wrapper" style="width: 100%; height: 100%; border: 1px; border-radius: 50px; background: rgb(255,255,255);        
			background: linear-gradient(90deg, rgba(255,255,255,1) 10%, rgba(75,231,255,1) 100%); position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 30px;">
                <div class="content" style="margin: 30px; padding-top: 70px; padding-bottom: 70px;">
                
                        <h2>Hai, ' . $username . '</h2>
                
                        <div class="deskripsi" style=" margin-top: 20px;">
                            <form action="" style="margin-top: 0;">
                                <p><h4>Kamu baru saja mendaftar member di <i>Anugrah Rental Jaya</i>. 
								Silakan klik <a href="' . base_url('auth/verify?email=' . $email . '&token=' . urlencode($token)) . '"> disini</a> untuk aktivasi akun anda.</h4></p>
                                
                            </form>
                        </div> 
                        <div class="text-right" style="text-align: right; ">

							<h3>Tertanda :</h3>
                            <h3><a href="' . base_url('landing_page') . '" style="text-decoration: none; color:blue">Anugrah Rental Jaya</a></h3>
                        </div>
                </div>
            </div>
            ');
		} else if ($type == 'forgot') {
			$this->email->subject('Forgot Password');
			$this->email->message('
			<div class="wrapper" style="width: 100%; height: 100%; border: 1px; border-radius: 50px; background: rgb(255,255,255);        
			background: linear-gradient(90deg, rgba(255,255,255,1) 10%, rgba(75,231,255,1) 100%); position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 30px;">
                <div class="content" style="margin: 30px; padding-top: 70px; padding-bottom: 70px;">
                
                        <h2>Hai, ' . $username . '</h2>
                
                        <div class="deskripsi" style=" margin-top: 20px;">
                            <form action="" style="margin-top: 0;">
                                <p><h4>Untuk mengganti password akun member anda di <i>Anugrah Rental Jaya</i>. 
								Silakan klik <a href="' . base_url('auth/resetpassword?email=' . $email . '&token=' . urlencode($token)) . '"> disini</a> untuk mengganti password anda.</h4></p>
                                
                            </form>
                        </div> 
                        <div class="text-right" style="text-align: right; ">
          
                            <h3>Tertanda :</h3>
                            <h3><a href="' . base_url('landing_page') . '" style="text-decoration: none; color:blue">Anugrah Rental Jaya</a></h3>
                        </div>
                </div>
            </div>
			');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		};
	}

	public function notifSuccess($type)
	{
		$data['title'] = 'Check your email';
		$data['type'] = $type;
		$data['email'] = $this->input->post('email');
		if ($data['email'] == null) {
			redirect('auth');
		}

		if ($this->session->userdata('email')) {
			redirect('user');
		};

		$this->load->view('templates/auth/header', $data);
		$this->load->view('auth/notif_success', $data);
		$this->load->view('templates/auth/footer');
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->authModel->getUserByEmail($email);
		if ($user) {
			$user_token = $this->authModel->getUserTokenByToken($token);
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

					$this->authModel->updateUserToActive($email);
					$this->authModel->deleteUserTokenByEmail($email);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diaktivasi! Login sekarang!</div>');
					redirect('auth');
				} else {

					$this->authModel->deleteUserByEmail($email);
					$this->authModel->deleteUserTokenByEmail($email);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun gagal diaktivasi! Token expired !</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun gagal diaktivasi! Token tidak valid !</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun gagal diaktivasi! Email salah !</div>');
			redirect('auth');
		}
	}

	public function forgot_password()
	{

		if ($this->session->userdata('email')) {
			redirect('customer');
		};
		$rules =
			[
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|trim|valid_email',
					'errors' =>
					[
						'required' => 'Email tidak boleh kosong',
						'valid_email' => 'Email tidak valid!'
					]
				]
			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth/header', $data);
			$this->load->view('auth/forgot_password');
			$this->load->view('templates/auth/footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->authModel->getUserIsActive($email);

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];
				$this->authModel->insertToken($user_token);

				$this->_sendEmail($token, 'forgot');
				$this->notifSuccess('lost');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email belum terdaftar atau belum diaktivasi ! </div>');
				redirect('auth/forgot_password');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->authModel->getUserByEmail($email);
		if ($user) {

			$user_token = $this->authModel->getUserTokenByToken($token);

			if ($user_token) {

				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->session->set_userdata('reset_email', $email);
					$this->changePassword();
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password gagal direset! Token expired !</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password gagal direset! Token tidak valid !</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password gagal direset! Email salah !</div>');
			redirect('auth');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		};
		$rules =
			[
				[
					'field' => 'password1',
					'label' => 'Password1',
					'rules' => 'required|trim|min_length[8]|matches[password2]',
					'errors' =>
					[
						'required' => 'Password tidak boleh kosong!',
						'min_length' => 'Password minimal 8 karakter!',
						'matches' => 'Password tidak cocok!'
					]
				],
				[
					'field' => 'password2',
					'label' => 'Password2',
					'rules' => 'required|trim',
					'errors' =>
					[
						'required' => 'Password tidak boleh kosong!'
					]
				]

			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth/header', $data);
			$this->load->view('auth/change_password');
			$this->load->view('templates/auth/footer');
		} else {
			$password = md5($this->input->post('password1'));
			$email = $this->session->userdata('reset_email');


			$user = $this->authModel->getUserByEmail($email);
			if ($user['password'] == $password) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak boleh sama seperti sebelumnya !</div>');
				redirect('auth/changePassword');
			}

			$this->authModel->updatePasswordByEmail($password, $email);
			$this->authModel->deleteUserTokenByEmail($email);
			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password sudah direset ! Silakan Login !</div>');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('user_id');

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda telah logout !</div>');
		redirect('auth');
	}
}

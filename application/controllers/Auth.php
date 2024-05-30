<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	protected $title = "KCINS";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('Authorization_Token');
	}
	
	public function index()
	{
		$data['title'] = $this->title;

		if ($this->session->userdata('email')) {
			redirect('dashboard');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login', $data);
		} else {
			// validasinya success
			$this->_login();
		}
	}

	// private function _login()
	// {
	// 	$name = $this->input->post('name');
	// 	$password = $this->input->post('password');
	// 	$user = $this->db->get_where('users', ['username' => $name])->row_array();

	// 	if ($user) {
	// 		//cek password
	// 		if (password_verify($password, $user['password'])) {
	// 			$data = [
	// 				'id' => $user['id'],
	// 				'email' => $user['email'],
    //                                     'name' => $user['name'],
	// 				'role_id' => $user['role_id'],
    //                                     'permissions'=>$user['permissions']
	// 			];
	// 			$this->session->set_userdata($data);
	// 			redirect('dashboard');
	// 		} else {
	// 			$this->session->set_flashdata('message', '<div class="alert alert-danger" 
    //                 role="alert"> Wrong password </div>');
	// 			redirect('auth');
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('message', '<div class="alert alert-danger" 
    //         role="alert"> Email is not registered </div>');
	// 		redirect('auth');
	// 	}
	// }


	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
                $curl_handle = curl_init();
                curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/kcins/api_login');
                curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl_handle, CURLOPT_POST, 1);
                curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
                    'username' => $username,
                    'password' => $password
                ));

                $buffer = curl_exec($curl_handle);
                curl_close($curl_handle);

                $result = json_decode($buffer,true);
                



                if($result['status']==true){
                     $this->session->set_userdata($result['data']);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$result['status'].'</div>');
                    redirect('dashboard');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$result['note'].'</div>');
				redirect('auth');
                }
                
		
	}
//	public function register()
//    {
//        if ($this->session->userdata('email')) {
//            redirect('dashboard');
//        }
//		$data['title'] = $this->title;
//        $this->form_validation->set_rules('name', 'Name', 'required|trim');
//        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
//            'is_unique' => 'This email has already registered!'
//        ]);
//        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
//            'matches' => 'Password Does Not Match!',
//            'min_length' => 'Password Should Be Minimum 5 Characters!'
//        ]);
//        $this->form_validation->set_rules('password2', 'Password', 'required|trim');
//
//        if ($this->form_validation->run() == false) {
//			$this->load->view('auth/register', $data);
//        } else {
//            $data = [
//                'name' => htmlspecialchars($this->input->post('name', true)),
//                'email' => htmlspecialchars($this->input->post('email', true)),
//                'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
//                'role_id' => 2
//
//            ];
//            $this->db->insert('users', $data);
//
//            $this->session->set_flashdata('message', '<div class="alert alert-success" 
//            role="alert"> Congratulation! your account has been created. Please Login</div>');
//            redirect('auth');
//        }
//    }

public function logout()
{
	$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/kcins/api_logout');
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_POST, 1);
			

		   

			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);

			$result = json_decode($buffer,true);
			
			
	$this->session->set_flashdata('message', '<div class="alert alert-success" 
	role="alert"> You have been logout!</div>');
			
			
			if($result[0]=="Logout success!"){
				$this->session->sess_destroy();
	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been logout!</div>');
				
			}
			
			
			redirect(base_url());
			
	
}

public function blocked()
{
	$this->load->view('auth/blocked');
}
}

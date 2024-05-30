<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    require(APPPATH.'/libraries/REST_Controller.php');
    use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->library('Authorization_Token');
		$this->load->model('user_model');
	}

	public function register_post() {

		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		if ($this->form_validation->run() === false) {
			// validation not ok, send validation errors to the view
            $this->response(['Validation rules violated'], REST_Controller::HTTP_OK);
		} else {
			// set variables from the form
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($res = $this->user_model->create_user($username, $email, $password)) {
				// user creation ok
                $token_data['uid'] = $res; 
                $token_data['username'] = $username;
                $tokenData = $this->authorization_token->generateToken($token_data);
                $final = array();
                $final['access_token'] = $tokenData;
                $final['status'] = true;
                $final['uid'] = $res;
                $final['message'] = 'Thank you for registering your new account!';
                $final['note'] = 'You have successfully register. Please check your email inbox to confirm your email address.';
                $this->response($final, REST_Controller::HTTP_OK); 
			} else {
				
				// user creation failed, this should never happen
                $this->response(['There was a problem creating your new account. Please try again.'], REST_Controller::HTTP_OK);
			}
		}
	}
	public function login_post() {
		
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
                        $user = $this->db->get_where('users', ['username' => $username])->row_array();
                        if($username and $password){
                            if ($user) {
                            if((password_verify($password, $user['password']))){
				$data = [
					'id' => $user['id'],
					'email' => $user['email'],
                                        'name' => $user['name'],
					'role_id' => $user['role_id'],
                                        'permissions'=>$user['permissions']
				];
				// user login ok
                $token_data['uid'] = $user['id'];
                $token_data['username'] = $user['name']; 
                $tokenData = $this->authorization_token->generateToken($token_data);
                $final = array();
                $final['access_token'] = $tokenData;
                $final['status'] = true;
                $final['message'] = 'Login success!';
                $final['note'] = 'You are now logged in.';
                $final['data'] = $data;
                $this->response($final, REST_Controller::HTTP_OK); 
                            }
			} else {
                            $final2['status'] = 0;
                $final2['message'] = 'Login Failed!';
                $final2['note'] = 'Wrong username or password.';
				// login failed
                $this->response($final2, REST_Controller::HTTP_OK);
			}
                        }else{
                            $final2['status'] = 0;
                $final2['message'] = 'Login Failed!';
                $final2['note'] = 'Username and Password Required';
				// login failed
                $this->response($final2, REST_Controller::HTTP_OK);
                        }
	}
	public function logout_post() {
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			// user logout ok
            $this->response(['Logout success!'], REST_Controller::HTTP_OK);
	}
	
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller { 

	/**
	 * Initialize controller dependencies, etc.
	 *
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation', 'session'));
		$this->load->helper('url', 'form');
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin
	 *	- or -
	 * 		http://example.com/index.php/admin/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
	$this->load->model('Membership_model');
		
		// Request params
		$action = $this->uri->segment(3); // detail|add|edit|delete

		switch($action)
		{
		case 'login':
				$this->_member_login();
				break;
		case 'logout':
				$this->_member_logout();
				break;
			case 'register':
				$this->_member_register();
				break;
			case 'display':
				$this->_member_display();
				break;
			case 'edit':
				$this->_member_edit();
				break;
			case 'submit':
				$this->_member_submit();
				break;
			case 'delete':
				$this->_member_delete();
				break;
			case 'forget':
				$this->_forget_password();
				break;
			default:
				$this->_member_login();
		}
		
	}

	public function _member_login()
	{
		if($this->input->post()){
		//$this->form_validation->set_rules('user_name', 'Username','trim|required|min_length[2]|max_length[25]|xss_clean');
		//$this->form_validation->set_rules('password', 'Password','trim|required|min_length[6]|max_length[32]|xss_clean');
		
		//if ($this->form_validation->run()){
		$this->load->model('Membership_model');
		$username = $this->input->post('user_name');
		$password = md5($this->input->post('password'));
		$return = $this->Membership_model->validate($username,$password);
		
		if($return){
			$data = array(
				'user_name' => $this->input->post('user_name'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			redirect('admin/index');
		}else{
			redirect(base_url());
		}
	//}
}else{
	$this->load->view('login/login');
}
			
}

public function _member_logout()
	{
		$data = array(
				'user_name' => $this->input->post('user_name'),
				'is_logged_in' => false
			);
			
		$this->session->set_userdata($data);
		redirect(base_url());
	}
	
	public function _member_register()
	{
		
		$data['form'] = array(
			'mode' => 'insert',
			'redirect' => 'user/index/submit'
			);
			
		$data['register'] = $this->Membership_model->create_membership();
			
		$this->load->view('login/register', $data);
	}
	
public function _member_display()
	{
		// View data
		$data = array();
		$membership_id = $this->uri->segment(3);

		$data['membership'] = $this->Membership_model->fetch_memberships();
		$this->load->view('login/display_membership', $data);
	}
	
	public function _member_edit()
	{
		// Request params
		$membership_id = $this->uri->segment(4);

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update',
			'redirect' => 'user/index/submit'
			);

			// Allow for form redisplay variation.
			if ($this->input->post('submit'))
			{
				
				$data['register'] = $this->Membership_model->create_membership();
			}
			else
			{
				
				$data['register'] = $this->Membership_model->fetch_membership($membership_id);
			}
			

			$this->load->view('login/register', $data);
	}
	
public function _member_submit()
	{
		// SET VALIDATION RULES
		$this->form_validation->set_rules('first_name', 'First Name','trim|required|min_length[2]|max_length[100]|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name','trim|required|min_length[2]|max_length[100]|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address','trim|required|min_length[2]|max_length[50]|valid_email|xss_clean');
		$this->form_validation->set_rules('user_name', 'Username','trim|required|min_length[2]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('password', 'Password','trim|required|min_length[6]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('password2', 'Password Confirmation','trim|required|matches[password]|xss_clean');
		//$this->form_validation->set_rules('comment', 'comment', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
		//$this->form_validation->set_error_delimiters('<span>','</span>');
			
		// Form is valid ... process
		if ($this->form_validation->run())
		{
			
			$member = $this->Membership_model->create_membership($this->input->post());
			$member['password'] = md5($this->input->post('password'));

			if ($this->input->post('id')) // we're updating, not inserting.
			{
				$this->Membership_model->update_membership($member);
			}
			else
			{
				$this->Membership_model->insert_membership($member);
			}

			redirect('user/index/'.$member['id']);
		}
			
		// Form is not valid ... redisplay!
		if ($this->input->post('id')) // we're updating, not inserting.
		{
			$this->_member_edit();
		}
		else
		{
			$this->_member_register();
		}
	}
	
public function _member_delete()
	{
		// Request params
		$member_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['member'] = array('id' => $member_id);

			$this->load->view('login/delete', $data);
		}
		else
		{
			$this->Membership_model->delete_membership($member_id);
			redirect('user/index/display');
		}
	}
	
public function _forget_password()
	{
		$data['form'] = array(
			'mode' => 'insert',
			'redirect' => 'user/index/forget'
			);
		
		if($this->input->post()){
			$this->load->helper('string');
			$telephone = $this->input->post('telephone');
			$email = $this->input->post('email');
			
			$password = random_string('alnum',32);
			$link = base_url().'user/index';
			$message = 'This is your New Password: '.$password."\n".'Click Here: '.$link;
			
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				
				$this->email->from('nikericky@gmail.com', 'Admin');
				$this->email->to($email);
				$this->email->subject('Your New Password!!');
				$this->email->message($message);
				
				
				if($this->email->send()){
					echo "<div class=\"alert alert-success\">Your email was sent</div>";
				}else{
					show_error($this->email->print_debugger());
				}
				
			$details = array();
			$membership_id = $this->input->post('user_name');
			
			$details['data'] = $this->Membership_model->fetch_membership_data($membership_id);
			
			$details['data']['password'] = $password;
			
			//print_r($data1);
			$this->Membership_model->update_membership($details['data']);
			
			redirect('user/index');
			
		}
		else
		{
			$data['forget'] = array('telephone'=>'','email'=>'', 'user_name' => '');
		}
		
		$this->load->view('login/forget', $data);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
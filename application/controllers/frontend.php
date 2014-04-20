<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller { 
	
	/**
	 * Initialize controller dependencies, etc.
	 *
	 */
	function __construct()
	{
		parent::__construct();


		
		$this->load->model('Frontend_model');
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		$this->load->model('Booking_model');
		$this->load->library('session');
		/*
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper('url', 'form');
		$this->is_logged_in();*/
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
		
		$this->load->model('Comment_model');
			// Request params
			$action = $this->uri->segment(3); 
		
			switch($action)
			{
				case 'comment_add':
						$data['carousal'] 		= $this->getCarousalInfo();
						$data['service'] 		= $this->getServicesInfo();
						$data['feature'] 		= $this->getFeaturedServicesInfo();
						$data['recent'] 		= $this->getRecentPhotosInfo();
						$data['comment'] 		= $this->getCommentsInfo();
						$data['testimonial'] 	= $this->getTestimonialsInfo();
						$data['comment_body'] 			= $this->_comment_add();
						$data['booking'] 		= $this->getBookingSearch();
						$data['index_page'] 		= '1';
						$data['appointment_page'] 		= '1';
						$data['search_result'] 		= '0';
						$data['register_display'] 		= '0';
						
					break;
				case 'testimonial_add':
						$data['carousal'] 		= $this->getCarousalInfo();
						$data['service'] 		= $this->getServicesInfo();
						$data['feature'] 		= $this->getFeaturedServicesInfo();
						$data['recent'] 		= $this->getRecentPhotosInfo();
						$data['comment'] 		= $this->getCommentsInfo();
						$data['testimonial'] 	= $this->getTestimonialsInfo();
						$data['booking'] 		= $this->getBookingSearch();
						$data['comment_body'] 	= '';
						$data['index_page'] 		= '1';
						$data['appointment_page'] 		= '1';
						$data['search_result'] 		= '0';
						$data['register_display'] 		= '0';
					break;	
				case 'comment_submit':
						$data['carousal'] 		= $this->getCarousalInfo();
						$data['service'] 		= $this->getServicesInfo();
						$data['feature'] 		= $this->getFeaturedServicesInfo();
						$data['recent'] 		= $this->getRecentPhotosInfo();
						$data['comment'] 		= $this->getCommentsInfo();
						$data['testimonial'] 	= $this->getTestimonialsInfo();
						$data['booking'] 		= $this->getBookingSearch();
						$data['comment_body'] 	= '';
						$data['index_page'] 		= '1';
						$data['appointment_page'] 		= '1';
						$data['search_result'] 		= '0';
						$data['register_display'] 		= '0';
						$this->_comment_submit();
					break;
				case 'testimonial_submit':
						$data['carousal'] 		= $this->getCarousalInfo();
						$data['service'] 		= $this->getServicesInfo();
						$data['feature']		= $this->getFeaturedServicesInfo();
						$data['recent'] 		= $this->getRecentPhotosInfo();
						$data['comment'] 		= $this->getCommentsInfo();
						$data['testimonial'] 	= $this->getTestimonialsInfo();
						$data['booking'] 		= $this->getBookingSearch();
						$data['comment_body'] 	= '';
						$data['index_page'] 		= '1';
						$data['appointment_page'] 		= '1';
						$data['search_result'] 		= '0';
						$data['booking_search_display'] = '0';
						$data['register_display'] 		= '0';
						$this->_testimonial_submit();
					break;
				case 'selected_data_submit':
						$data['recent'] 			= $this->getRecentPhotosInfo();
						$data['index_page'] 		= '0';
						$data['appointment_page'] 	= '1';
						$this->_getSelectedData();
						$data['register']       	= $this->getBookingArray();
						$data['register_display'] 	= '1';
						$data['selected_booking']   = $this->getTemporaryBookingData();
				
						
				break;
				case 'appointment':
						$data['recent'] 			= $this->getRecentPhotosInfo();
						$data['index_page'] 		= '0';
						$data['appointment_page'] 		= '1';
						$data['booking'] 			= $this->getBookingSearch();
						$data['booking_result'] 	= $this->_getBookingSearch_submit();
						$data['search_result'] 		= '1';
						$data['register_display'] 	= '0';
						
				break;
				case 'default_appointment':
						$data['recent'] 			= $this->getRecentPhotosInfo();
						$data['index_page'] 		= '0';
						$data['appointment_page'] 	= '1';
						$data['booking'] 			= $this->getBookingSearch();
						$data['search_result'] 		= '0';
						$data['register_display'] 	= '0';
				break;
				case 'confirm_booking_submit':
						$this->_booking_submit();
						
				break;
				default:
						$data['carousal'] 		= $this->getCarousalInfo();
						$data['service'] 		= $this->getServicesInfo();
						$data['feature'] 		= $this->getFeaturedServicesInfo();
						$data['recent'] 		= $this->getRecentPhotosInfo();
						$data['comment'] 		= $this->getCommentsInfo();
						$data['testimonial'] 	= $this->getTestimonialsInfo();
						$data['booking'] 		= $this->getBookingSearch();
						$data['comment_body'] 	= '';
						$data['index_page'] 	= '1';
						$data['appointment_page'] 	= '1';
						$data['search_result'] 		= '0';
						$data['register_display'] 		= '0';
						
			}
		//print_r($data);
		//$data['body'] = $this->load->view('admin/index', $data, true);
		
		$this->load->view('front-end/odelsalon/index', $data);
			
	}
	
	public function getLogoInfo(){
		// Camel Case
		$data = array();
		$this->load->model('Frontend_model');
		
			$data['member_id'] = $this->Frontend_model->getMemberId('admin');
			$data['client_id'] = $this->Frontend_model->getClientId('odel');
		
		$var1 = $data['member_id']['id'];
		$var2 = $data['client_id']['id'];
		
		$data['logo'] = $this->Frontend_model->getLogoArray($var1,$var2);
		
		$this->load->view('front-end/odelsalon/elements/logo', $data);
	}
	
	public function getCarousalInfo(){
		// Camel Case
		$data = array();
		$this->load->model('Frontend_model');
		
			$data['member_id'] = $this->Frontend_model->getMemberId('admin');
			$data['client_id'] = $this->Frontend_model->getClientId('odel');
		
		$var1 = $data['member_id']['id'];
		$var2 = $data['client_id']['id'];
		
		$data['carousal'] = $this->Frontend_model->getCarousalArray($var1,$var2);
		
		return $data['carousal'];
	}
	
	public function getServicesInfo(){
		// Camel Case
		$data = array();
		$this->load->model('Frontend_model');
		
			$data['member_id'] = $this->Frontend_model->getMemberId('admin');
			$data['client_id'] = $this->Frontend_model->getClientId('odel');
		
		$var1 = $data['member_id']['id'];
		$var2 = $data['client_id']['id'];
		
		$data['service'] = $this->Frontend_model->getServicesArray($var1,$var2);
		
		return $data['service'];
	}
public function getFeaturedServicesInfo(){
		// Camel Case
		$data = array();
		$this->load->model('Frontend_model');
		
			$data['member_id'] = $this->Frontend_model->getMemberId('admin');
			$data['client_id'] = $this->Frontend_model->getClientId('odel');
		
		$var1 = $data['member_id']['id'];
		$var2 = $data['client_id']['id'];
		
		$data['feature'] = $this->Frontend_model->getFeaturedServicesArray($var1,$var2);
		
		return $data['feature'];
	}
	
public function getRecentPhotosInfo(){
		// Camel Case
		$data = array();
		$this->load->model('Frontend_model');
		
			$data['member_id'] = $this->Frontend_model->getMemberId('admin');
			$data['client_id'] = $this->Frontend_model->getClientId('odel');
		
		$var1 = $data['member_id']['id'];
		$var2 = $data['client_id']['id'];
		
		$data['recent'] = $this->Frontend_model->getRecentPhotosArray($var1,$var2);
		
		return $data['recent'];
	}
	
public function getCommentsInfo(){
		// Camel Case
		$data = array();
		$this->load->model('Frontend_model');
		
		$data['comment'] = $this->Frontend_model->getCommentsArray();
		
		return $data['comment'];
	}
	
public function getTestimonialsInfo(){
		// Camel Case
		$data = array();
		$this->load->model('Frontend_model');
		
		$data['testimonial'] = $this->Frontend_model->getTestimonialsArray();
		
		return $data['testimonial'];
	}
	
	
public function _comment_add(){
	
		// Camel Case
		$this->load->model('Comment_model');
		
		$data = array();
		
		$data['form'] = array(
			'mode' => 'insert', 
			'redirect' => '/frontend/index/comment_submit'    
			);
			
			// cerate imageupload attribute inside data array and assinging table collumns
			$data['comments'] = $this->Comment_model->make_comments();
			
			// cerate body attribute inside data array and assinging from php bypassing data array($data)
			$data['comment_body'] = $this->load->view('admin/comment_management/comment_form', $data, true);
			
			return $data['comment_body'];
			// calling wraper view with data array include from body
			//$this->load->view('templates/wrapper', $data);
	}
	
public function _comment_submit()
	{
		$data = array();
		//$this->form_validation->set_rules('comment', 'comment','trim|required|min_length[2]|max_length[512]|xss_clean');

		
	    $comments = $this->Comment_model->make_comments($this->input->post());	
	    $comments['status'] = '1';
	    $email_checked = $this->Comment_model->check_customer_email($this->input->post('email'));
		
	    
	     if ($this->input->post('id')) // we're updating, not inserting. $imageupload['id']
			{
				$this->Comment_model->update_comments($comments);
			}
			else
			{
				if($email_checked){
				$last_inserted = $this->Comment_model->insert_comments($comments);
				}
			}
			
		redirect('/frontend/index');

	}
	
public function getBookingSearch()
	{
		// load Admin_model
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		$this->load->model('Booking_model');
		
		// defining data array
		$data = array();
		// create form atrribute and assing a key vale pare
		$data['form'] = array(
			'mode' => 'insert', //form display with insert mode and not assigining Id
			'redirect' => '/frontend/index/appointment'    // to redirect to submit action
			);
			
			$data['service'] = $this->Common_model->make_service();
			$data['dropdown_service'] = $this->Common_model->fetch_common_dropdown('services');
						
			$data['employ'] = $this->Common_model->make_employ();
			$data['dropdown_members'] = $this->Common_model->fetch_membership_dropdown('employ_name');
			
			// cerate imageupload attribute inside data array and assinging table collumns
			$data['booking_search_body'] = $this->Booking_model->get_booking_times();
			// cerate body attribute inside data array and assinging from php bypassing data array($data)
			//$data['booking_search_body'] = $this->load->view('admin/time_allocation/form', $data, true);
			return $data;
			// calling wraper view with data array include from body
			//$this->load->view('templates/wrapper', $data);
		
	}
	
	public function _getBookingSearch_submit()
	{
		$data = array();
		//$this->form_validation->set_rules('roll', 'Roll','trim|required|min_length[2]|max_length[512]|xss_clean');
		//if ($this->form_validation->run())
		//{

	     $data['booking_search_data'] = $this->Booking_model->get_booking_times($this->input->post());

	     $data['available_times'] = $this->Booking_model->fetch_booking_available_times($data['booking_search_data']);
	     //print_r($roll_data);
		 
		 //$this->load->view('booking/booking_search', $data);
		 
		 return $data['available_times'];
		 redirect('/frontend/index/appointment');
		 
		
	}
	
		public function _getSelectedData()
	{
		$data = array();
		// Request params
		$selected_data_id = $this->uri->segment(4);
		
		$fetch_selected_data = $this->Booking_model->fetch_selected_data($selected_data_id);
		
		$service_id = $fetch_selected_data['service_id'];
		$category_id = $fetch_selected_data['category_id']; 
		$service_price = $this->Booking_model->fetch_service_price($service_id,$category_id);
		
		$fetch_selected_data['fixed_price'] = $service_price['price'];
		
		$this->Booking_model->insert_tmp_booking_data($fetch_selected_data);
			
		//print_r($data);
		
	    //redirect('booking/index');
	    
	}
	
	public function getBookingArray()
	{
		
		$this->load->model('Booking_model');
		
		// defining data array
		$data = array();
		// create form atrribute and assing a key vale pare
		$data['form'] = array(
			'mode' => 'insert', //form display with insert mode and not assigining Id
			'redirect' => '/frontend/index/confirm_booking_submit'    // to redirect to submit action
			);
					
			// cerate imageupload attribute inside data array and assinging table collumns
			$data['register'] = $this->Booking_model->get_booking_register_details();
			
			// cerate body attribute inside data array and assinging from php bypassing data array($data)
			//$data['booking_search_body'] = $this->load->view('admin/time_allocation/form', $data, true);
			
			return $data;
	}
	
public function _booking_submit()
	{
		
		$data = array();
		
		$register_like = $this->input->post('status');
	    $get_register_details = $this->Booking_model->get_booking_register_details($this->input->post());	
		$customer_email = $get_register_details['email'];
	    
		if($register_like){
			$this->Booking_model->insert_customer_details($get_register_details);	
			$this->load->helper('string');
			
			$time = time(); 
			$date = date('Y-m-d H:i:s',$time);
			
			$message = 'Thanks for register with us '.$date.': ';
			
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				
				$this->email->from('nikericky13245@gmail.com', 'Admin');
				$this->email->to($customer_email);
				$this->email->subject('Register Confirmation');
				$this->email->message($message);
				
				if($this->email->send()){
					echo "<div class=\"alert alert-success\">Your email was sent</div>";
				}else{
					show_error($this->email->print_debugger());
				}
		}
		
	    $get_temp_booking_details = $this->Booking_model->get_temp_booking_details();
		$temp_booking_id = $get_temp_booking_details['id'];
		
		$time_allocation_row = $this->Booking_model->fetch_time_details($get_temp_booking_details);
		//print_r($time_allocation_row);
		$time_allocation_row['status'] = '1';
		
		$this->Booking_model->update_time_allocation_row($time_allocation_row);
		
	    $this->Booking_model->insert_booking_customer_details($get_register_details);
	    
	    
	    
	    $fetch_customer_id = $this->Booking_model->fetch_customer_id($customer_email);
	    $customer_id = $fetch_customer_id['id'];
	    
	    $confirm_booking_data = $this->Booking_model->confirm_booking_data($customer_id, $get_temp_booking_details);
	    $employ_id = $confirm_booking_data['employ_id'];
	    
	     if ($this->input->post('id')) // we're updating, not inserting. $imageupload['id']
			{
				
				$this->Booking_model->update_booking_register_details();
			}
			else
			{
				$this->Booking_model->insert_booking_register_details($confirm_booking_data);
			}
			
		$this->Booking_model->delete_temp_booking_row($temp_booking_id);
		
			$this->load->helper('string');
			
			$admin_email = $this->Admin_model->fetch_member_email('admin');
			$employ_email = $this->Admin_model->fetch_employ_email($employ_id);
			
			$time = time(); 
			$date = date('Y-m-d H:i:s',$time);
			
			$message = 'This is your Booking on '.$date.': ';
			
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				
				$this->email->from('nikericky13245@gmail.com', 'Admin');
				$this->email->to($customer_email);
				$this->email->cc($employ_email);
				$this->email->Bcc($admin_email);
				$this->email->subject('Booking Confirmed');
				$this->email->message($message);
				
				if($this->email->send()){
					echo "<div class=\"alert alert-success\">Your email was sent</div>";
				}else{
					show_error($this->email->print_debugger());
				}
			
		redirect('/');
	}
	
	public function getTemporaryBookingData()
	{
		
		$data = array();
		// Request params
		$selected_data_id = $this->uri->segment(4);
		
		$data['fetch_selected_data'] = $this->Booking_model->fetch_selected_data_with_name($selected_data_id);
		$data['fetch_service_price'] = $this->Booking_model->fetch_selected_data($selected_data_id);
		
		$service_id = $data['fetch_service_price']['service_id'];
		$category_id = $data['fetch_service_price']['category_id']; 
		$data['fetch_service_price'] = $this->Booking_model->fetch_service_price($service_id,$category_id);
		
		return $data;
	}
	public function  first_level_dropdown_call()
	{
		//echo 'dropdown_call'; 
		$service_id = $this->input->post('service_id');
		
		
		
		$this->load->model('Common_model');
		$data['dropdown_categories'] = $this->Common_model->fetch_common_dropdown('category', $service_id);
			
		
		$this->load->view('templates/second_level_dropdown', $data);
		// This if statement define where it needs to call in feature table
			
			//$data['hairdress'] = $this->Common_model->make_feature();
			//$data['dropdown_hairdress'] = $this->Common_model->fetch_common_dropdown('hairdress');
	
	}
	
public function  second_level_dropdown_call_empty()
	{
		//echo 'dropdown_call' ; 
		$this->load->view('templates/second_level_dropdown_empty');
	
	}
	
}
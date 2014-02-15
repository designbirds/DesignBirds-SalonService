<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller { 

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

		// View data
		$data = array();

		$data['body'] = $this->load->view('admin/index', $data, true);
		$this->load->view('templates/wrapper', $data);
		echo "Hay it works";
	}


	// ------------------------------API for Image upload Module---------------------------------------------/

	// user clicks imageupload link with this url localhost:8080/admin/imageUpload
	// display list of added images without parameter 
	public function imageUpload()
	{
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		
		// Request params
		$action = $this->uri->segment(3); // detail|add|edit|delete
	
		switch($action)
		{
			case 'add':
				$this->_image_add();
				break;
			case 'edit':
				$this->_image_edit();
				break;
			case 'submit':
				$this->_image_submit();
				break;
			case 'delete':
				$this->_image_delete();
				break;
			default:
				$this->_image_list();
		}
	}


	public function _image_list()
	{
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		
		// View data
		$data = array();
		// getting list imageupload table results as an array
		$data['imageupload'] = $this->Admin_model->fetch_image_uploads();


		$data['body'] = $this->load->view('admin/image_upload/index', $data, true);
		$this->load->view('templates/wrapper', $data);
	}

	public function _image_add()
	{
		// load Admin_model
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		
		// defining data array
		$data = array();
		// create form atrribute and assing a key vale pare
		$data['form'] = array(
			'mode' => 'insert', //form display with insert mode and not assigining Id
			'redirect' => 'admin/imageUpload/submit'    // to redirect to submit action
			);
			
			$data['feature'] = $this->Common_model->make_feature();
			$data['dropdown_feature'] = $this->Common_model->fetch_common_dropdown('feature');
			
			
			
			// cerate imageupload attribute inside data array and assinging table collumns
			$data['imageupload'] = $this->Admin_model->make_image_uploade();
			
			// cerate body attribute inside data array and assinging from php bypassing data array($data)
			$data['body'] = $this->load->view('admin/image_upload/form', $data, true);
			
			// calling wraper view with data array include from body
			$this->load->view('templates/wrapper', $data);
	}

	public function _image_edit()
	{
		// Request params
		$image_id = $this->uri->segment(4);

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update', //from display with update mopde and  assigining Id param
			'redirect' => 'admin/imageUpload/submit'
			);

			// Allow for form redisplay variation.
			if ($this->input->post('submit'))
			{
				// We're redisplaying form, but ...
				// We need a Tipster data bean to satisfy compiler, so make an empty one.
				// We don't really need it as will be using data from $_POST array anyway.
				$data['feature'] = $this->Admin_model->make_feature();
				$data['dropdown_feature'] = $this->Common_model->fetch_common_dropdown('feature');
				$data['imageupload'] = $this->Admin_model->make_image_uploade();
			}
			else
			{
				// This is an initial GET request for data,
				// so pull Event data from database.
				$data['feature'] = $this->Admin_model->make_feature();
				$data['dropdown_feature'] = $this->Common_model->fetch_common_dropdown('feature');
				$data['imageupload'] = $this->Admin_model->fetch_image_uploade($image_id);
			}

			$data['body'] = $this->load->view('admin/image_upload/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}
	
	
	public function _image_submit()
	{
		$data = array();
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[2]|max_length[512]|xss_clean');
		if ($this->form_validation->run())
		{
		 
	     $imageupload = $this->Admin_model->make_image_uploade($this->input->post());	
		
	     if ($this->input->post('id')) // we're updating, not inserting. $imageupload['id']
			{
				$this->Admin_model->update_image_uploade($imageupload);
			}
			else
			{
				$last_inserted = $this->Admin_model->insert_image_uploade($imageupload);
			}
			
// =======================image upload======================================

			$lastupdated = date("Y-m-d H:i:s");
			echo ' $lastupdated >>>'.$lastupdated;
			
			$config['upload_path'] = realpath(APPPATH . './content/');
			$config['allowed_types'] = 'gif|jpg|png';
			/*$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			*/
			
			$this->load->library('upload', $config);
			foreach($_FILES as $key => $value)
			{

				if( ! empty($value['name']))
				{
					echo ' name >>>'.$key;

					if ($this->input->post('id')) // we're updating, not inserting.
					{
						$filename = $this->input->post('id').'-'.$key.'-'.strtotime($lastupdated).'.png';

						$config['file_name']  = $filename;

					}
					else
					{
						$filename = $last_inserted.'-'.$key.'-'.strtotime($lastupdated).'.png';

						$config['file_name']  = $filename;

					}
					// Assigning the file name to the file
					$this->upload->initialize($config);
					
					//echo ' filename before >>>'.$filename.'</br>';
					//echo ' >>>'. $this->upload->do_upload($key);
					
					if ( ! $this->upload->do_upload($key))
					{
						$error = array('error' => $this->upload->display_errors());

						$data['body'] = $this->load->view('admin/tipsters/upload_unsuccess', $error);
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());

						foreach($data as $row)
						{
						$file_path = './content/'.$row['file_name'];
						echo ' filename after >>>'.$file_path.'</br>';
						$_POST['image_name'] = $file_path;
						}
					}
				}

			}

			//=====================================end========================================================
			
			
		//redirect('admin/imageUpload');
		}
			
		// Form is not valid ... redisplay!
		if ($this->input->post('id')) // we're updating, not inserting.
		{
			$this->_image_edit();
		}
		else
		{
			$this->_image_add();
		}
		

	}

	public function _image_submit_old()
	{
		
		// SET VALIDATION RULES
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[2]|max_length[512]|xss_clean');
		//$this->form_validation->set_rules('biline', 'biline', 'trim|required|min_length[2]|max_length[256]|xss_clean');
		//$this->form_validation->set_rules('biography', 'biography', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
		//$this->form_validation->set_error_delimiters('<span>','</span>');
			
		// Form is valid ... process
		//if ($this->form_validation->run())
		//{
			//$lastupdated = date("Y-m-d H:i:s");
			//echo ' $lastupdated >>>'.$lastupdated;
			//$_POST['lastupdated'] = $lastupdated;

			//print_r($_POST);
			 //$imageuploader = $this->Admin_model->make_imageuploader($this->input->post())
			//print_r($imageuploader);

			// ($this->input->post('id')) // we're updating, not inserting.
			//{
				//$this->Tips_model->update_tipster($tipster);
			//}
			//else
			//{
				//$last_inserted = $this->Admin_model->insert_imageUploader($imageuploader);
			//}

			// =======================image upload======================================
			//$config['upload_path'] = './content/tipster/';
			//$config['allowed_types'] = 'gif|jpg|png';
			//$config['max_size']	= '100';
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';

			/*
			$this->load->library('upload');
			foreach($_FILES as $key => $value)
			{

				if( ! empty($value['name']))
				{
					//echo ' name >>>'.$key;

					if ($this->input->post('id')) // we're updating, not inserting.
					{
						$filename = $this->input->post('id').'-'.$key.'-'.strtotime($lastupdated).'.png';

						$config['file_name']  = $filename;

					}
					else
					{
						$filename = $last_inserted.'-'.$key.'-'.strtotime($lastupdated).'.png';

						$config['file_name']  = $filename;

					}

					$this->upload->initialize($config);

					//echo ' filename before >>>'.$filename.'</br>';
					if ( ! $this->upload->do_upload($key))
					{
						$error = array('error' => $this->upload->display_errors());

						$data['body'] = $this->load->view('admin/tipsters/upload_unsuccess', $error);
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());

						//foreach($data as $row)
						//{
						//$file_path = 'content/tipster/'.$row['file_name'];
						//echo ' filename after >>>'.$file_path.'</br>';
						//$_POST['photo'] = $file_path;
						//}
					}
				}

			}*/

			//=====================================end========================================================

			//redirect('admin/imageUpload/add');
		//}
			
		// Form is not valid ... redisplay!
		
	}


	public function _image_delete()
	{
		// Request params
		$tipster_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['image_upload'] = array('id' => $tipster_id);

			$data['body'] = $this->load->view('admin/image_upload/delete', $data, true);
			$this->load->view('templates/wrapper', $data);
		}
		else
		{
			$this->Admin_model->delete_image($tipster_id);
			redirect('admin/imageUpload');
		}
	}


	public function  first_level_dropdown_call()
	{
		//echo 'dropdown_call'; 
		$feature_id = $this->input->post('feature_id');
		
		$this->load->model('Common_model');
		// This if statement define where it needs to call in feature table
		if ($feature_id=='1'){
		 $data['dropdown_services'] = $this->Common_model->fetch_common_dropdown('header');
	    }
		else if ($feature_id=='2'){
		 $data['dropdown_services'] = $this->Common_model->fetch_common_dropdown('services');
	    }
		else if ($feature_id=='4'){
		 $data['dropdown_services'] = $this->Common_model->fetch_common_dropdown('events');
	    }	
			//$data['hairdress'] = $this->Common_model->make_feature();
			//$data['dropdown_hairdress'] = $this->Common_model->fetch_common_dropdown('hairdress');
			
		$this->load->view('templates/first_level_dropdown', $data);
	
	
	}
	
	
	public function  second_level_dropdown_call()
	{
		//echo 'dropdown_call' ; 
		$service_id = $this->input->post('service_id');
		
		$this->load->model('Common_model');
		$data['dropdown_categories'] = $this->Common_model->fetch_common_dropdown('category', $service_id);
			
		
		$this->load->view('templates/second_level_dropdown', $data);
	
	}
	
	
	// ==================================Start Feature==========================================/



	public function features()
	{
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		
		// Request params
		$action = $this->uri->segment(3); // detail|add|edit|delete

		switch($action)
		{
			case 'add':
				$this->_feature_add();
				break;
			case 'edit':
				$this->_feature_edit();
				break;
			case 'submit':
				$this->_feature_submit();
				break;
			case 'delete':
				$this->_feature_delete();
				break;
			default:
				$this->_feature_list();
		}
	}


	public function _feature_list()
	{
		// View data
		$data = array();
		$tipster_id = $this->uri->segment(3);

		$data['feature'] = $this->Admin_model->fetch_features();
		$data['body'] = $this->load->view('admin/features/index', $data, true);
		$this->load->view('templates/wrapper', $data);
	}


	public function _feature_add()
	{

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'insert',
			'redirect' => 'admin/features/submit'
			);

			//$this->load->helper('dropdown_helper');
			$data['feature'] = $this->Admin_model->make_feature();
			//$data['dropdown'] = $this->Admin_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/features/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _feature_edit()
	{
		// Request params
		$feature_id = $this->uri->segment(4);

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update',
			'redirect' => 'admin/features/submit'
			);

			// Allow for form redisplay variation.
			if ($this->input->post('submit'))
			{
				// We're redisplaying form, but ...
				// We need a Tipster data bean to satisfy compiler, so make an empty one.
				// We don't really need it as will be using data from $_POST array anyway.
				$data['feature'] = $this->Admin_model->make_feature();
			}
			else
			{
				// This is an initial GET request for data,
				// so pull Event data from database.
				$data['feature'] = $this->Admin_model->fetch_feature($feature_id);
			}
			//print_r($data);

			//$this->load->helper('dropdown_helper');
			//$this->load->model('feature_model');
			//$data['dropdown'] = $this->feature_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/features/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _feature_submit()
	{
		// SET VALIDATION RULES
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[50]|xss_clean');
		//$this->form_validation->set_rules('comment', 'comment', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
		//$this->form_validation->set_error_delimiters('<span>','</span>');
			
		// Form is valid ... process
		if ($this->form_validation->run())
		{
			//$date = $this->input->post("start_year") ."-". $this->input->post("start_month"). "-" .$this->input->post("start_day");
			//$date = date("Y-m-d H:i:s", strtotime($date));

			//$_POST['date'] = $date;
			//print_r($this->input->post());
			$feature = $this->Admin_model->make_feature($this->input->post());
			//print_r($feature);
			//$tips['date'] = $date;


			if ($this->input->post('id')) // we're updating, not inserting.
			{
				$this->Admin_model->update_feature($feature);
			}
			else
			{
				$this->Admin_model->insert_feature($feature);
			}

			redirect('admin/features/'.$feature['id']);
		}
			
		// Form is not valid ... redisplay!
		if ($this->input->post('id')) // we're updating, not inserting.
		{
			$this->_feature_edit();
		}
		else
		{
			$this->_feature_add();
		}
	}


	public function _feature_delete()
	{
		// Request params
		$feature_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['feature'] = array('id' => $feature_id);

			$data['body'] = $this->load->view('admin/features/delete', $data, true);
			$this->load->view('templates/wrapper', $data);
		}
		else
		{
			$this->Admin_model->delete_feature($feature_id);
			redirect('admin/features');
		}
	}

// ==================================Start Service==========================================/



	public function services()
	{
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		
		// Request params
		$action = $this->uri->segment(3); // detail|add|edit|delete

		switch($action)
		{
			case 'add':
				$this->_service_add();
				break;
			case 'edit':
				$this->_service_edit();
				break;
			case 'submit':
				$this->_service_submit();
				break;
			case 'delete':
				$this->_service_delete();
				break;
			default:
				$this->_service_list();
		}
	}


	public function _service_list()
	{
		// View data
		$data = array();
		$tipster_id = $this->uri->segment(3);

		$data['service'] = $this->Admin_model->fetch_services();
		$data['body'] = $this->load->view('admin/services/index', $data, true);
		$this->load->view('templates/wrapper', $data);
	}


	public function _service_add()
	{

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'insert',
			'redirect' => 'admin/services/submit'
			);

			//$this->load->helper('dropdown_helper');
			$data['service'] = $this->Admin_model->make_service();
			//$data['dropdown'] = $this->Admin_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/services/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _service_edit()
	{
		// Request params
		$service_id = $this->uri->segment(4);

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update',
			'redirect' => 'admin/services/submit'
			);

			// Allow for form redisplay variation.
			if ($this->input->post('submit'))
			{
				// We're redisplaying form, but ...
				// We need a Tipster data bean to satisfy compiler, so make an empty one.
				// We don't really need it as will be using data from $_POST array anyway.
				$data['service'] = $this->Admin_model->make_service();
			}
			else
			{
				// This is an initial GET request for data,
				// so pull Event data from database.
				$data['service'] = $this->Admin_model->fetch_service($service_id);
			}
			//print_r($data);

			//$this->load->helper('dropdown_helper');
			//$this->load->model('feature_model');
			//$data['dropdown'] = $this->feature_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/services/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _service_submit()
	{
		// SET VALIDATION RULES
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[50]|xss_clean');
		//$this->form_validation->set_rules('comment', 'comment', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
		//$this->form_validation->set_error_delimiters('<span>','</span>');
			
		// Form is valid ... process
		if ($this->form_validation->run())
		{
			//$date = $this->input->post("start_year") ."-". $this->input->post("start_month"). "-" .$this->input->post("start_day");
			//$date = date("Y-m-d H:i:s", strtotime($date));

			//$_POST['date'] = $date;
			//print_r($this->input->post());
			$service = $this->Admin_model->make_service($this->input->post());
			//print_r($feature);
			//$tips['date'] = $date;


			if ($this->input->post('id')) // we're updating, not inserting.
			{
				$this->Admin_model->update_service($service);
			}
			else
			{
				$this->Admin_model->insert_service($service);
			}

			redirect('admin/services/'.$service['id']);
		}
			
		// Form is not valid ... redisplay!
		if ($this->input->post('id')) // we're updating, not inserting.
		{
			$this->_service_edit();
		}
		else
		{
			$this->_service_add();
		}
	}


	public function _service_delete()
	{
		// Request params
		$service_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['service'] = array('id' => $service_id);

			$data['body'] = $this->load->view('admin/services/delete', $data, true);
			$this->load->view('templates/wrapper', $data);
		}
		else
		{
			$this->Admin_model->delete_service($service_id);
			redirect('admin/services');
		}
	}
	
// ==================================Start Service Category==========================================/



	public function service_category()
	{
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		
		// Request params
		$action = $this->uri->segment(3); // detail|add|edit|delete

		switch($action)
		{
			case 'add':
				$this->_service_category_add();
				break;
			case 'edit':
				$this->_service_category_edit();
				break;
			case 'submit':
				$this->_service_category_submit();
				break;
			case 'delete':
				$this->_service_category_delete();
				break;
			default:
				$this->_service_category_list();
		}
	}


	public function _service_category_list()
	{
		// View data
		$data = array();
		$tipster_id = $this->uri->segment(3);
		
		$data['service_category'] = $this->Admin_model->fetch_service_categories();
		$data['body'] = $this->load->view('admin/service_category/index', $data, true);
		$this->load->view('templates/wrapper', $data);
	}


	public function _service_category_add()
	{

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'insert',
			'redirect' => 'admin/service_category/submit'
			);

			//$this->load->helper('dropdown_helper');
			$data['service_category'] = $this->Admin_model->make_service_category();
			
			$data['service'] = $this->Common_model->make_service();
			$data['dropdown_service'] = $this->Common_model->fetch_common_dropdown('services');

			//$data['dropdown'] = $this->Admin_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/service_category/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _service_category_edit()
	{
		// Request params
		$service_category_id = $this->uri->segment(4);

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update',
			'redirect' => 'admin/service_category/submit'
			);

			// Allow for form redisplay variation.
			if ($this->input->post('submit'))
			{
				// We're redisplaying form, but ...
				// We need a Tipster data bean to satisfy compiler, so make an empty one.
				// We don't really need it as will be using data from $_POST array anyway.
				$data['service'] = $this->Common_model->make_service();
				$data['dropdown_service'] = $this->Common_model->fetch_common_dropdown(('services'));
				$data['service_category'] = $this->Admin_model->make_service_category();
			}
			else
			{
				// This is an initial GET request for data,
				// so pull Event data from database.
				$data['service'] = $this->Common_model->make_service();
				$data['dropdown_service'] = $this->Common_model->fetch_common_dropdown('services');
				$data['service_category'] = $this->Admin_model->fetch_service_category($service_category_id);
			}
			//print_r($data);

			//$this->load->helper('dropdown_helper');
			//$this->load->model('feature_model');
			//$data['dropdown'] = $this->feature_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/service_category/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _service_category_submit()
	{
		// SET VALIDATION RULES
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[50]|xss_clean');
		//$this->form_validation->set_rules('comment', 'comment', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
		//$this->form_validation->set_error_delimiters('<span>','</span>');
			
		// Form is valid ... process
		if ($this->form_validation->run())
		{
			//$date = $this->input->post("start_year") ."-". $this->input->post("start_month"). "-" .$this->input->post("start_day");
			//$date = date("Y-m-d H:i:s", strtotime($date));

			//$_POST['date'] = $date;
			
			$service_category = $this->Admin_model->make_service_category($this->input->post());
			
			// getting the service name to display in index
			$data['service_name'] = $this->Common_model->fetch_service_name($this->input->post('service_id'));
			//print_r($feature);
			//$tips['date'] = $date;

			if ($this->input->post('id')) // we're updating, not inserting.
			{
				$this->Admin_model->update_service_category($service_category);
			}
			else
			{
				$this->Admin_model->insert_service_category($service_category);
			}

			//redirect('admin/service_category/'.$service_category['id']);
			
		}
			
		// Form is not valid ... redisplay!
		if ($this->input->post('id')) // we're updating, not inserting.
		{
			$this->_service_category_edit();
		}
		else
		{
			$this->_service_category_add();
			//print_r($this->input->post());
			//print_r($this->input->post('service_id'));
			//print_r($service_name);
		}
	}


	public function _service_category_delete()
	{
		// Request params
		$service_category_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['service_category'] = array('id' => $service_category_id);

			$data['body'] = $this->load->view('admin/service_category/delete', $data, true);
			$this->load->view('templates/wrapper', $data);
		}
		else
		{
			$this->Admin_model->delete_service_category($service_category_id);
			redirect('admin/service_category');
		}
	}
	
	
	
	
// ------------------------------API for Comment Management Module---------------------------------------------/

public function commentMng()
	{
		$this->load->model('Comment_model');
		// Request params
		$action = $this->uri->segment(3); 
	
		switch($action)
		{
			case 'add':
				$this->_comment_add();
				break;
			case 'edit':
				$this->_comment_edit();
				break;
			case 'submit':
				$this->_comment_submit();
				break;
			case 'delete':
				$this->_comment_delete();
				break;
			default:
				$this->_comment_list();
		}
	}
	
public function _comment_list()
	{
		$this->load->model('Comment_model');

		// View data
		$data = array();
		// getting list imageupload table results as an array
		$data['comments'] = $this->Comment_model->fetch_comments();


		$data['body'] = $this->load->view('admin/comment_management/index', $data, true);
		$this->load->view('templates/wrapper', $data);
	}
	
public function _comment_add()
	{
		
		$this->load->model('Comment_model');
		
		
		$data = array();
		
		$data['form'] = array(
			'mode' => 'insert', 
			'redirect' => 'admin/commentMng/submit'    
			);
			
			// cerate imageupload attribute inside data array and assinging table collumns
			$data['comments'] = $this->Comment_model->make_comments();
			
			// cerate body attribute inside data array and assinging from php bypassing data array($data)
			$data['body'] = $this->load->view('admin/comment_management/comment_form', $data, true);
			
			// calling wraper view with data array include from body
			$this->load->view('templates/wrapper', $data);
	}
	
public function _comment_submit()
	{
		$data = array();
		$this->form_validation->set_rules('comment', 'comment','trim|required|min_length[2]|max_length[512]|xss_clean');
		if ($this->form_validation->run())
		{
		 
	     $comments = $this->Comment_model->make_comments($this->input->post());	
		
	     if ($this->input->post('id')) // we're updating, not inserting. $imageupload['id']
			{
				$this->Comment_model->update_comments($comments);
			}
			else
			{
				$last_inserted = $this->Comment_model->insert_comments($comments);
			}
			
		redirect('admin/commentMng');
		}
			
		// Form is not valid ... redisplay!
		//if ($this->input->post('id')) // we're updating, not inserting.
		//{
		//	$this->_image_edit();
		//}
		//else
		//{
		//	$this->_image_add();
		//}
		

	}
	
public function _comment_edit()
	{
		// Request params
		$comment_id = $this->uri->segment(4);

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update', 
			'redirect' => 'admin/commentMng/submit'
			);

			if ($this->input->post('submit'))
			{
			
				$data['comments'] = $this->Comment_model->make_comments();
			}
			else
			{
				
				$data['comments'] = $this->Comment_model->fetch_editcomments($comment_id);
			}

			$data['body'] = $this->load->view('admin/comment_management/comment_form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}
	
// ==============================================================================/
	public function agencies()
	{
		$this->load->model('Agencies_model');

		// Request params
		$action = $this->uri->segment(3); // detail|add|edit|delete

		switch($action)
		{
			case 'add':
				$this->_agency_add();
				break;
			case 'edit':
				$this->_agency_edit();
				break;
			case 'submit':
				$this->_agency_submit();
				break;
			case 'delete':
				$this->_agency_delete();
				break;
			default:
				$this->_agency_list();
		}
	}


	public function _agency_list()
	{
		$this->load->helper("url");
		$this->load->library("pagination");

		$config = array();
		$config["base_url"] = base_url() . "admin/agencies";
		$config["total_rows"] = $this->Agencies_model->record_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


		// View data
		$data = array();

		$data['agencies'] = $this->Agencies_model->fetch_agencies($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$data['body'] = $this->load->view('admin/agencies/index', $data, true);
		$this->load->view('templates/wrapper', $data);
	}


	public function _agency_add()
	{
		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'insert',
			'redirect' => 'admin/agencies/submit'
			);

			$data['agency'] = $this->Agencies_model->make_agency();
			$data['body'] = $this->load->view('admin/agencies/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _agency_edit()
	{
		// Request params
		$agency_id = $this->uri->segment(4);

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update',
			'redirect' => 'admin/agencies/submit'
			);

			// Allow for form redisplay variation.
			if ($this->input->post('submit'))
			{
				// We're redisplaying form, but ...
				// We need an Agency data bean to satisfy compiler, so make an empty one.
				// We don't really need it as will be using data from $_POST array anyway.
				$data['agency'] = $this->Agencies_model->make_agency();
			}
			else
			{
				// This is an initial GET request for data,
				// so pull Event data from database.
				$data['agency'] = $this->Agencies_model->fetch_agency($agency_id);
			}

			$data['body'] = $this->load->view('admin/agencies/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _agency_submit()
	{
		// SET VALIDATION RULES
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[2]|max_length[512]|xss_clean');
		$this->form_validation->set_error_delimiters('<span>','</span>');
			
		// Form is valid ... process
		if ($this->form_validation->run())
		{


			$lastupdated = date("Y-m-d H:i:s");
			
			$_POST['lastupdated'] = $lastupdated;

			foreach($_FILES as $key => $value)
			{
				if( ! empty($value['name']))
				{
					if (stripos($key, 'icon')!==false)
					{
						$_POST['photo_icon'] = $lastupdated;
					}
					if (stripos($key, 'profile')!==false)
					{
						$_POST['photo_profile'] = $lastupdated;
					}
				}

			}


			$agency = $this->Agencies_model->make_agency($this->input->post());

			if ($this->input->post('id')) // we're updating, not inserting.
			{
				$this->Agencies_model->update_agency($agency);
			}
			else
			{
				$last_inserted = $this->Agencies_model->insert_agency($agency);
			}


			// =======================image upload======================================
			$config['upload_path'] = './content/agencies/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';


			$this->load->library('upload');
			
			foreach($_FILES as $key => $value)
			{

				if( ! empty($value['name']))
				{
					
					if ($this->input->post('id')) // we're updating, not inserting.
					{
						$filename = $this->input->post('id').'-'.$key.'-'.strtotime($lastupdated).'.png';

						$config['file_name']  = $filename;

					}
					else
					{
						$filename = $last_inserted.'-'.$key.'-'.strtotime($lastupdated).'.png';

						$config['file_name']  = $filename;

					}

					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload($key))
					{
						$error = array('error' => $this->upload->display_errors());

						$data['body'] = $this->load->view('admin/agencies/upload_unsuccess', $error);
					}
					else
					{

						$data = array('upload_data' => $this->upload->data());
					
					}
				}

			}

			//=====================================end========================================================

			redirect('admin/agencies');
		}

		// Form is not valid ... redisplay!
		if ($this->input->post('id')) // we're updating, not inserting.
		{
			$this->_agency_edit();
		}
		else
		{
			$this->_agency_add();
		}
	}


	public function _agency_delete()
	{
		// Request params
		$agency_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['agency'] = array('id' => $agency_id);

			$data['body'] = $this->load->view('admin/agencies/delete', $data, true);
			$this->load->view('templates/wrapper', $data);
		}
		else
		{
			$this->Agencies_model->delete_agency($agency_id);
			redirect('admin/agencies');
		}
	}


	
// ==================================Start Service Price==========================================/



	public function service_price()
	{
		$this->load->model('Admin_model');
		$this->load->model('Common_model');
		
		// Request params
		$action = $this->uri->segment(3); // detail|add|edit|delete

		switch($action)
		{
			case 'add':
				$this->_service_price_add();
				break;
			case 'edit':
				$this->_service_price_edit();
				break;
			case 'submit':
				$this->_service_price_submit();
				break;
			case 'delete':
				$this->_service_price_delete();
				break;
			default:
				$this->_service_price_list();
		}
	}


	public function _service_price_list()
	{
		// View data
		$data = array();
		$tipster_id = $this->uri->segment(3);

		$data['service_price'] = $this->Admin_model->fetch_service_prices();
		$data['body'] = $this->load->view('admin/service_price/index', $data, true);
		$this->load->view('templates/wrapper', $data);
	}


	public function _service_price_add()
	{

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'insert',
			'redirect' => 'admin/service_price/submit'
			);
			
			$data['service'] = $this->Common_model->make_service();
			$data['dropdown_service'] = $this->Common_model->fetch_common_dropdown('services');
			
			//$this->load->helper('dropdown_helper');
			$data['service_price'] = $this->Admin_model->make_service_price();
			//$data['dropdown'] = $this->Admin_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/service_price/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _service_price_edit()
	{
		// Request params
		$service_price_id = $this->uri->segment(4);
		$category_data['data'] = $this->Admin_model->fetch_service_price($service_price_id);
		$service_id = $category_data['data']['service_id'];
		
		


		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update',
			'redirect' => 'admin/service_price/submit'
			);

			// Allow for form redisplay variation.
			if ($this->input->post('submit'))
			{
				// We're redisplaying form, but ...
				// We need a Tipster data bean to satisfy compiler, so make an empty one.
				// We don't really need it as will be using data from $_POST array anyway.
				$data['service'] = $this->Common_model->make_service();
				$data['dropdown_service'] = $this->Common_model->fetch_common_dropdown('services');
				$data['service_price'] = $this->Admin_model->make_service_price();
			}
			else
			{
				// This is an initial GET request for data,
				// so pull Event data from database.
				$data['service'] = $this->Common_model->make_service();
				$data['dropdown_service'] = $this->Common_model->fetch_common_dropdown('services'); 
				$data['service_price'] = $this->Admin_model->fetch_service_price($service_price_id);	
			}
			//print_r($data['service_price']);

			//$this->load->helper('dropdown_helper');
			//$this->load->model('feature_model');
			//$data['dropdown'] = $this->feature_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/service_price/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _service_price_submit()
	{
		// SET VALIDATION RULES
		$this->form_validation->set_rules('price', 'price','trim|required|min_length[1]|max_length[50]|xss_clean');
		//$this->form_validation->set_rules('comment', 'comment', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
		//$this->form_validation->set_error_delimiters('<span>','</span>');
			
		// Form is valid ... process
		if ($this->form_validation->run())
		{
			//$date = $this->input->post("start_year") ."-". $this->input->post("start_month"). "-" .$this->input->post("start_day");
			//$date = date("Y-m-d H:i:s", strtotime($date));

			//$_POST['date'] = $date;
			//print_r($this->input->post());
			$service_price = $this->Admin_model->make_service_price($this->input->post());
			//print_r($feature);
			//$tips['date'] = $date;


			if ($this->input->post('id')) // we're updating, not inserting.
			{
				$this->Admin_model->update_service_price($service_price);
			}
			else
			{
				$this->Admin_model->insert_service_price($service_price);
			}

			redirect('admin/service_price/'.$service_price['id']);
		}
			
		// Form is not valid ... redisplay!
		if ($this->input->post('id')) // we're updating, not inserting.
		{
			$this->_service_price_edit();
		}
		else
		{
			$this->_service_price_add();
		}
	}


	public function _service_price_delete()
	{
		// Request params
		$service_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['service'] = array('id' => $service_id);

			$data['body'] = $this->load->view('admin/services/delete', $data, true);
			$this->load->view('templates/wrapper', $data);
		}
		else
		{
			$this->Admin_model->delete_service($service_id);
			redirect('admin/services');
		}
	}
	
	

	// ==============================================================================/
}


/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
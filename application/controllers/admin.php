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
		$this->load->helper('form');
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
		$data['imageupload'] = $this->Admin_model->fetch_imageuploads();


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
			
			
			$data['services'] = $this->Common_model->make_feature();
			$data['dropdown_services'] = $this->Common_model->fetch_common_dropdown('services');
			
			$data['hairdress'] = $this->Common_model->make_feature();
			$data['dropdown_hairdress'] = $this->Common_model->fetch_common_dropdown('hairdress');
			
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
				$data['feature'] = $this->Admin_model->make_tips();
				$data['dropdown'] = $this->Admin_model->fetch_tipsters_dropdown();
				$data['imageupload'] = $this->Admin_model->make_imageuploader();
			}
			else
			{
				// This is an initial GET request for data,
				// so pull Event data from database.
				$data['feature'] = $this->Admin_model->make_tips();
				$data['dropdown'] = $this->Admin_model->fetch_tipsters_dropdown();
				$data['imageupload'] = $this->Admin_model->fetch_imageuploader($image_id);
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
		 
	     $imageupload = $this->Admin_model->make_imageuploader($this->input->post());	
		
	     if ($this->input->post('id')) // we're updating, not inserting. $imageupload['id']
			{
				$this->Admin_model->update_imageuploader($imageupload);
			}
			else
			{
				$last_inserted = $this->Admin_model->insert_imageUploader($imageupload);
			}
			
// =======================image upload======================================

			$lastupdated = date("Y-m-d H:i:s");
			echo ' $lastupdated >>>'.$lastupdated;
			
			$config['upload_path'] = './content/tipster/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			
			$this->load->library('upload');
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

					$this->upload->initialize($config);

					echo ' filename before >>>'.$filename.'</br>';
					echo ' >>>'. $this->upload->do_upload($key);
					
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
						$file_path = '/content/tipster/'.$row['file_name'];
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


	public function _tipster_delete()
	{
		// Request params
		$tipster_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['tipster'] = array('id' => $tipster_id);

			$data['body'] = $this->load->view('admin/tipsters/delete', $data, true);
			$this->load->view('templates/wrapper', $data);
		}
		else
		{
			$this->Tips_model->delete_tipster($tipster_id);
			redirect('admin/tipsters');
		}
	}


	// ============================================================================/



	public function tips()
	{
		// Request params
		$action = $this->uri->segment(3); // detail|add|edit|delete

		switch($action)
		{
			case 'add':
				$this->_tips_add();
				break;
			case 'edit':
				$this->_tips_edit();
				break;
			case 'submit':
				$this->_tips_submit();
				break;
			case 'delete':
				$this->_tips_delete();
				break;
			default:
				$this->_tips_list();
		}
	}


	public function _tips_list()
	{
		// View data
		$data = array();
		$tipster_id = $this->uri->segment(3);

		$tipster = array(
		'tipster' => $tipster_id
		);

		$data['tips'] = $this->Tips_model->fetch_tips($tipster);
		$data['body'] = $this->load->view('admin/tips/index', $data, true);
		$this->load->view('templates/wrapper', $data);
	}


	public function _tips_add()
	{

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'insert',
			'redirect' => 'admin/tips/submit'
			);

			$this->load->helper('dropdown_helper');
			$data['tips'] = $this->Tips_model->make_tips();
			$data['dropdown'] = $this->Tips_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/tips/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _tips_edit()
	{
		// Request params
		$tips_id = $this->uri->segment(4);

		// View data
		$data = array();

		$data['form'] = array(
			'mode' => 'update',
			'redirect' => 'admin/tips/submit'
			);

			// Allow for form redisplay variation.
			if ($this->input->post('submit'))
			{
				// We're redisplaying form, but ...
				// We need a Tipster data bean to satisfy compiler, so make an empty one.
				// We don't really need it as will be using data from $_POST array anyway.
				$data['tips'] = $this->Tips_model->make_tips();
			}
			else
			{
				// This is an initial GET request for data,
				// so pull Event data from database.
				$data['tips'] = $this->Tips_model->fetch_tip($tips_id);
			}
			//print_r($data);

			$this->load->helper('dropdown_helper');
			$this->load->model('Tips_model');
			$data['dropdown'] = $this->Tips_model->fetch_tipsters_dropdown();

			$data['body'] = $this->load->view('admin/tips/form', $data, true);
			$this->load->view('templates/wrapper', $data);
	}


	public function _tips_submit()
	{
		// SET VALIDATION RULES
		$this->form_validation->set_rules('match', 'match','trim|required|min_length[1]|max_length[12]|numeric|xss_clean');
		$this->form_validation->set_rules('comment', 'comment', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
		$this->form_validation->set_error_delimiters('<span>','</span>');
			
		// Form is valid ... process
		if ($this->form_validation->run())
		{
			$date = $this->input->post("start_year") ."-". $this->input->post("start_month"). "-" .$this->input->post("start_day");
			$date = date("Y-m-d H:i:s", strtotime($date));

			$_POST['date'] = $date;

			$tips = $this->Tips_model->make_tips($this->input->post());

			//$tips['date'] = $date;


			if ($this->input->post('id')) // we're updating, not inserting.
			{
				$this->Tips_model->update_tip($tips);
			}
			else
			{
				$this->Tips_model->insert_tip($tips);
			}

			redirect('admin/tips/'.$tips['tipster']);
		}
			
		// Form is not valid ... redisplay!
		if ($this->input->post('id')) // we're updating, not inserting.
		{
			$this->_tips_edit();
		}
		else
		{
			$this->_tips_add();
		}
	}


	public function _tips_delete()
	{
		// Request params
		$tips_id = $this->uri->segment(4);

		if ($this->uri->segment(5) === FALSE)
		{
			$data['tips'] = array('id' => $tips_id);

			$data['body'] = $this->load->view('admin/tips/delete', $data, true);
			$this->load->view('templates/wrapper', $data);
		}
		else
		{
			$this->Tips_model->delete_tip($tips_id);
			redirect('admin/tips');
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


	// ==============================================================================/
}


/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
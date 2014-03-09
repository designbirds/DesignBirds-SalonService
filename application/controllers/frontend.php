<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller { 
	
	/**
	 * Initialize controller dependencies, etc.
	 *
	 */
	function __construct()
	{
		parent::__construct();

		/*$this->load->model('Admin_model');
		$this->load->model('Common_model');
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
			$data = array();

		//$data['body'] = $this->load->view('admin/index', $data, true);
		$this->load->view('front-end/odelsalon/index', $data);
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

   
	// ---------------------------------------------------------------------------/


	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}


	// ---------------------------------------------------------------------------/


	

	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	 function make_feature($data = NULL)
	{
		$features = array(
				'id' => 0,
				'name' => '',
				'description' => '',
		);

		if (empty($data))
		{
			return $features;
		}

		foreach ($features as $k => $v)
		{
			if (isset($data[$k]))
			{
				$features[$k] = $data[$k];
			}
		}

		return $features;
	}
	
	
function make_service($data = NULL)
	{
		$service = array(
				'id' => 0,
				'name' => '',
		);

		if (empty($data))
		{
			return $service;
		}

		foreach ($service as $k => $v)
		{
			if (isset($data[$k]))
			{
				$service[$k] = $data[$k];
			}
		}

		return $service;
	}
	
	 function make_member($data = NULL)
	{
		$members = array(
				'id' => 0,
				'user_name' => ''
				
		);

		if (empty($data))
		{
			return $members;
		}

		foreach ($members as $k => $v)
		{
			if (isset($data[$k]))
			{
				$members[$k] = $data[$k];
			}
		}

		return $members;
	}

	 function make_employ($data = NULL)
	{
		$employ = array(
				'id' => '',
				'first_name' => ''
				
		);

		if (empty($data))
		{
			return $employ;
		}

		foreach ($employ as $k => $v)
		{
			if (isset($data[$k]))
			{
				$employ[$k] = $data[$k];
			}
		}

		return $employ;
	}
	
function make_screen($data = NULL)
	{
		$screens = array(
				'id' => 0,
				'name' => ''
				
		);

		if (empty($data))
		{
			return $screens;
		}

		foreach ($screens as $k => $v)
		{
			if (isset($data[$k]))
			{
				$screens[$k] = $data[$k];
			}
		}

		return $screens;
	}

	public function fetch_membership_dropdown($name, $id=null)
	{
		if ($name == 'member'){
		$table = 'tbl_main_membership';
		if($id){
			$this->db->where('id', $id);
		}
		}elseif ($name == 'member_name'){
		$table = 'tbl_main_membership';
		if($id){
			$this->db->where('id', $id);
		}
		}elseif ($name == 'employ_name'){
		$table = 'tbl_main_employ_details';
		if($id){
			$this->db->where('id', $id);
		}
		}
		
		$query = $this->db->get($table);
	    
		$dropdown = array('-'=> 'Select a '.$name);

		if ($query->num_rows() == 0)
		{
			return $dropdown;
		}
		if($name == 'member'){	
		foreach($query->result_array() as $row)
		{
			$dropdown[$row['id']] = $row['user_name'];
		}
		}elseif($name == 'member_name'){
		foreach($query->result_array() as $row)
		{
			$dropdown[$row['id']] = $row['first_name'];
		}
		}elseif($name == 'employ_name'){
		foreach($query->result_array() as $row)
		{
			$dropdown[$row['id']] = $row['first_name'];
		}
		}

		return ($dropdown);
		
	}	

	public function fetch_common_dropdown($name, $id=null)
	{
		
		if ($name == 'feature'){
		$table = 'tbl_main_features';
	
		} elseif ($name == 'services'){
		$table = 'tbl_main_services';
		if($id){
				$this->db->where('id', $id);
		}
		
		} elseif ($name == 'category'){
		 $table = 'tbl_service_categories';
			$this->db->where('service_id', $id);
	    
		}elseif ($name == 'header'){
		$table = 'tbl_main_header';
		if($id){
			$this->db->where('id', $id);
		}
		
		}elseif ($name == 'events'){
		$table = 'tbl_main_events';
		if($id){
			$this->db->where('id', $id);
		}
		}elseif ($name == 'screen'){
		$table = 'tbl_main_screens';
		if($id){
			$this->db->where('id', $id);
		}
		}
		
		
		$query = $this->db->get($table);
	    
		$dropdown = array('-'=> 'Select a '.$name);

		if ($query->num_rows() == 0)
		{
			return $dropdown;
		}
			
		foreach($query->result_array() as $row)
		{
			$dropdown[$row['id']] = $row['name'];
		}

		return ($dropdown);
	}
	
	public function fetch_service_name($id=null)
	{
	
		$table = 'tbl_main_services';
	
		$query = $this->db->get_where($table, array('id' => $id));

		$service_name = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$service_name['name'] = $row['name'];
		}

		return $service_name;
	}
	


	// ---------------------------------------------------------------------------/

}

/* End of file tips_model.php */
/* Location: ./application/models/tips_model.php */
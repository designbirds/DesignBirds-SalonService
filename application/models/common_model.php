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

		

	public function fetch_common_dropdown($name, $id=null)
	{
	
		$table = 'tbl_main_services';
	
		$query = $this->db->get($table);
	    if($id!=null){
			$this->db->where('id', $id);
	    }
		$dropdown = array('-'=> 'please Select The Service');

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


	// ---------------------------------------------------------------------------/

}

/* End of file tips_model.php */
/* Location: ./application/models/tips_model.php */
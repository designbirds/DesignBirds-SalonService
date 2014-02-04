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




	

	public function fetch_common_dropdown($name,$id=null)
	{
	if ($name=='feature'){
		$table = 'tbl_main_features';
	}else if ($name=='services') {
		$table = 'tbl_main_services';
	} else if ($name=='hairdress'){
		$table = 'tbl_main_hair_dress';
	}
		$query = $this->db->get($table);
	    if($id!=null){
			$this->db->where('id', $id);
	    }
		$dropdown = array('-'=> 'please select a value');

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
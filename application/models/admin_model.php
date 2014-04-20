<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

   
	// ---------------------------------------------------------------------------/


	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

public function fetch_member_id($username)
	{
		$query = $this->db->get_where('tbl_main_membership', array('user_name' => $username));

		$user_id = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$user_id['id'] 				= (integer)$row['id'];
			
		}

		return $user_id;
	}

public function fetch_member_email($username)
	{
		$query = $this->db->get_where('tbl_main_membership', array('user_name' => $username));

		$user_id = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$user_id['id'] 				= (integer)$row['id'];
			$user_id['email'] 				= $row['email'];
			
		}

		return $user_id['email'];
	}
	
public function fetch_employ_email($id)
	{
		$query = $this->db->get_where('tbl_main_employ_details', array('id' => $id));

		$employ_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$employ_details['id'] 				= (integer)$row['id'];
			$employ_details['email'] 			= $row['email'];
			
		}

		return $employ_details['email'];
	}
		
	
public function fetch_client_id($clientname)
	{
		$query = $this->db->get_where('tbl_main_client_details', array('first_name' => $clientname));

		$client_id = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$client_id['id'] 				= (integer)$row['id'];
			
		}

		return $client_id;
	}
	
public function fetch_screen_data($member_id, $screen_id)
	{
		$query = $this->db->get_where('tbl_main_roll_assign', array('member_id' => $member_id, 'screen_id' => $screen_id));

		$roll_data = array();
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$roll_data['status'] 		= $row['status'];
			$roll_data['initial'] = false;
		}else{
			$roll_data['initial'] = true;
			$roll_data['status'] = false;
		}
			return $roll_data;
	
	}
	
	public function permission_check($id){
		$data = array();
		$screen_id = $id;
		$username = $this->session->userdata('user_name');
		$member_id = $this->Admin_model->fetch_member_id($username);
		$data['all'] = $this->Admin_model->fetch_screen_data($member_id['id'],$screen_id);
		$data['initial'] = $data['all']['initial'];
		$data['status'] = $data['all']['status'];
		
		return $data; 
	}
	// ---------------------------------------------------------------------------/


	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_image_uploads()
	{
		
		$this->db->select("tbl_service_images.id as id,tbl_service_images.name as name,tbl_service_images.member_id as member_id,tbl_service_images.description as description,tbl_service_images.service_id as service_id,tbl_service_images.category_id as category_id,tbl_service_images.alt as alt,tbl_service_images.priority as priority,tbl_service_types.name as service_name,tbl_service_categories.name as category_name");
		$this->db->from("tbl_service_images");
		$this->db->join("tbl_main_client_details", "tbl_service_images.client_id = tbl_main_client_details.id");
		$this->db->join("tbl_service_types", "tbl_service_images.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories", "tbl_service_images.category_id = tbl_service_categories.id");
		
		//$table = 'tbl_service_images';
			$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_service_images = array();


			$tbl_service_images['id'] 				= (integer)$row['id'];
			$tbl_service_images['name'] 			= $row['name'];
			$tbl_service_images['service_id'] 		= $row['service_id'];
			$tbl_service_images['service_name'] 	= $row['service_name'];
			$tbl_service_images['category_id'] 		= $row['category_id'];
			$tbl_service_images['category_name'] 	= $row['category_name'];
			$tbl_service_images['description'] 		= $row['description'];
			$tbl_service_images['alt'] 				= $row['alt'];
			$tbl_service_images['member_id'] 		= $row['member_id'];
			$tbl_service_images['priority'] 		= $row['priority'];
			

			$result[] = $tbl_service_images;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_image_uploade($data = NULL)
	{
		$image_uploade = array(
				'id' 			=> '',
				'name' 			=> '',
				'service_id'	=> '',
				'category_id' 	=> '',
				'description' 	=> '',
				'alt' 			=> '',
				'client_id' 	=> '',
				'priority' 		=> '',
				'member_id' 	=> ''
		);

		if (empty($data))
		{
			return $image_uploade;
		}

		foreach ($image_uploade as $k => $v)
		{
			if (isset($data[$k]))
			{
				$image_uploade[$k] = $data[$k];
			}
		}

		return $image_uploade;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_image_uploade($id)
	{
		$query = $this->db->get_where('tbl_service_images', array('id' => $id));

		$image_uploade = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$image_uploade['id'] 				= (integer)$row['id'];
			$image_uploade['name'] 				= $row['name'];
			$image_uploade['service_id'] 		= $row['service_id'];
			$image_uploade['category_id'] 		= $row['category_id'];
			$image_uploade['description'] 		= $row['description'];
			$image_uploade['alt'] 				= $row['alt'];
			$image_uploade['member_id'] 		= $row['member_id'];
			$image_uploade['client_id'] 		= $row['client_id'];
			$image_uploade['priority'] 			= $row['priority'];
			
		}

		return $image_uploade;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_image_uploade($image_upload)
	{
		unset($image_upload['id']); // sanity
		$this->db->insert('tbl_service_images', $image_upload);
		return $this->db->insert_id();
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_image_uploade($image_upload)
	{
		$id = $image_upload['id'];
		$this->db->where('id', $id);
		$this->db->update('tbl_service_images', $image_upload);
	}


	/**
	 * Delete Tipster database record.
	 *
	 * @param id	- numeric id of Tipster record to delete from db.
	 * @return void
	 */
	public function delete_image($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_service_images');
	}

	
	// ---------------------------------------------------------------------------/
	
	
	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_recent_image_uploads()
	{
		
		$this->db->select("tbl_recent_images.id as id,tbl_recent_images.name as name,tbl_recent_images.member_id as member_id,tbl_recent_images.description as description,tbl_recent_images.service_id as service_id,tbl_recent_images.category_id as category_id,tbl_recent_images.alt as alt,tbl_service_types.name as service_name,tbl_service_categories.name as category_name");
		$this->db->from("tbl_recent_images");
		$this->db->join("tbl_main_client_details", "tbl_recent_images.client_id = tbl_main_client_details.id");
		$this->db->join("tbl_service_types", "tbl_recent_images.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories", "tbl_recent_images.category_id = tbl_service_categories.id");
		
		//$table = 'tbl_service_images';
			$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_service_images = array();


			$tbl_service_images['id'] 				= (integer)$row['id'];
			$tbl_service_images['name'] 			= $row['name'];
			$tbl_service_images['service_id'] 		= $row['service_id'];
			$tbl_service_images['service_name'] 	= $row['service_name'];
			$tbl_service_images['category_id'] 		= $row['category_id'];
			$tbl_service_images['category_name'] 	= $row['category_name'];
			$tbl_service_images['description'] 		= $row['description'];
			$tbl_service_images['alt'] 				= $row['alt'];
			$tbl_service_images['member_id'] 		= $row['member_id'];
			

			$result[] = $tbl_service_images;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_recent_image_uploade($data = NULL)
	{
		$image_uploade = array(
				'id' 			=> '',
				'name' 			=> '',
				'service_id'	=> '',
				'category_id' 	=> '',
				'description' 	=> '',
				'alt' 			=> '',
				'client_id' 	=> '',
				'member_id' 	=> ''
		);

		if (empty($data))
		{
			return $image_uploade;
		}

		foreach ($image_uploade as $k => $v)
		{
			if (isset($data[$k]))
			{
				$image_uploade[$k] = $data[$k];
			}
		}

		return $image_uploade;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_recent_image_uploade($id)
	{
		$query = $this->db->get_where('tbl_recent_images', array('id' => $id));

		$image_uploade = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$image_uploade['id'] 				= (integer)$row['id'];
			$image_uploade['name'] 				= $row['name'];
			$image_uploade['service_id'] 		= $row['service_id'];
			$image_uploade['category_id'] 		= $row['category_id'];
			$image_uploade['description'] 		= $row['description'];
			$image_uploade['alt'] 				= $row['alt'];
			$image_uploade['member_id'] 		= $row['member_id'];
			$image_uploade['client_id'] 		= $row['client_id'];
			
		}

		return $image_uploade;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_recent_image_uploade($image_upload)
	{
		unset($image_upload['id']); // sanity
		$this->db->insert('tbl_recent_images', $image_upload);
		return $this->db->insert_id();
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_recent_image_uploade($image_upload)
	{
		$id = $image_upload['id'];
		$this->db->where('id', $id);
		$this->db->update('tbl_recent_images', $image_upload);
	}


	/**
	 * Delete Tipster database record.
	 *
	 * @param id	- numeric id of Tipster record to delete from db.
	 * @return void
	 */
	public function delete_recent_image($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_recent_images');
	}

	
	// ---------------------------------------------------------------------------/
	
	
	
	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_logo_design()
	{
		
		$this->db->select("tbl_logo_design.id as id,tbl_logo_design.name as name,tbl_logo_design.member_id as member_id,tbl_logo_design.client_id as client_id,tbl_main_client_details.first_name as client_name,tbl_main_membership.first_name as member_name");
		$this->db->from("tbl_logo_design");
		$this->db->join("tbl_main_client_details", "tbl_logo_design.client_id = tbl_main_client_details.id");
		$this->db->join("tbl_main_membership", "tbl_logo_design.member_id = tbl_main_membership.id");
	
		//$table = 'tbl_service_images';
			$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_logo_design = array();


			$tbl_logo_design['id'] 				= (integer)$row['id'];
			$tbl_logo_design['name'] 				= $row['name'];
			$tbl_logo_design['client_id'] 			= $row['client_id'];
			$tbl_logo_design['member_id'] 			= $row['member_id'];
			$tbl_logo_design['client_name'] 		= $row['client_name'];
			$tbl_logo_design['member_name'] 		= $row['member_name'];			

			$result[] = $tbl_logo_design;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_logo($data = NULL)
	{
		$logo_design = array(
				'id' 			=> '',
				'name' 			=> '',
				'client_id'	=> '',
				'member_id' 	=> ''
		);

		if (empty($data))
		{
			return $logo_design;
		}

		foreach ($logo_design as $k => $v)
		{
			if (isset($data[$k]))
			{
				$logo_design[$k] = $data[$k];
			}
		}

		return $logo_design;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_logo($id)
	{
		$query = $this->db->get_where('tbl_logo_design', array('id' => $id));

		$logo_design = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$logo_design['id'] 				= (integer)$row['id'];
			$logo_design['name'] 			= $row['name'];
			$logo_design['client_id'] 		= $row['client_id'];
			$logo_design['member_id'] 		= $row['member_id'];
			
		}

		return $logo_design;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_logo($logo_design)
	{
		$client_id = $logo_design['client_id'];
		$member_id = $logo_design['member_id'];
		$name = $logo_design['name'];
		$query = $this->db->get_where('tbl_logo_design', array('member_id' => $member_id, 'client_id' => $client_id));
		
		if($query->num_rows() > 0){
			$id = $logo_design['id'];
			$this->db->where(array('member_id' => $member_id, 'client_id' => $client_id));
			$this->db->update('tbl_logo_design', $logo_design);
		}else {
			unset($logo_design['id']); // sanity
			$this->db->insert('tbl_logo_design', $logo_design);
			return $this->db->insert_id();
		}
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_logo($logo_design)
	{
		$id = $logo_design['id'];
		$this->db->where('id', $id);
		$this->db->update('tbl_logo_design', $logo_design);
	}


	/**
	 * Delete Tipster database record.
	 *
	 * @param id	- numeric id of Tipster record to delete from db.
	 * @return void
	 */
	public function delete_logo($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_logo_design');
	}

	

// ---------------------------------------------------------------------------/
	
	
	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_banner_design()
	{
		
		$this->db->select("tbl_carousal_design.id as id,tbl_carousal_design.name as name,tbl_carousal_design.member_id as member_id,tbl_carousal_design.client_id as client_id,tbl_main_client_details.first_name as client_name,tbl_main_membership.first_name as member_name");
		$this->db->from("tbl_carousal_design");
		$this->db->join("tbl_main_client_details", "tbl_carousal_design.client_id = tbl_main_client_details.id");
		$this->db->join("tbl_main_membership", "tbl_carousal_design.member_id = tbl_main_membership.id");
	
		//$table = 'tbl_service_images';
			$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_carousal_design = array();


			$tbl_carousal_design['id'] 				= (integer)$row['id'];
			$tbl_carousal_design['name'] 				= $row['name'];
			$tbl_carousal_design['client_id'] 		= $row['client_id'];
			$tbl_carousal_design['member_id'] 		= $row['member_id'];
			$tbl_carousal_design['client_name'] 		= $row['client_name'];
			$tbl_carousal_design['member_name'] 		= $row['member_name'];			

			$result[] = $tbl_carousal_design;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_banner($data = NULL)
	{
		$banner_design = array(
				'id' 			=> '',
				'name' 			=> '',
				'client_id'	=> '',
				'member_id' 	=> ''
		);

		if (empty($data))
		{
			return $banner_design;
		}

		foreach ($banner_design as $k => $v)
		{
			if (isset($data[$k]))
			{
				$banner_design[$k] = $data[$k];
			}
		}

		return $banner_design;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_banner($id)
	{
		$query = $this->db->get_where('tbl_carousal_design', array('id' => $id));

		$banner_design = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$banner_design['id'] 				= (integer)$row['id'];
			$banner_design['name'] 				= $row['name'];
			$banner_design['client_id'] 		= $row['client_id'];
			$banner_design['member_id'] 		= $row['member_id'];
			
		}

		return $banner_design;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_banner($banner_design)
	{
		
			unset($banner_design['id']); // sanity
			$this->db->insert('tbl_carousal_design', $banner_design);
			return $this->db->insert_id();
		
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_banner($banner_design)
	{
		$id = $banner_design['id'];
		$this->db->where('id', $id);
		$this->db->update('tbl_carousal_design', $banner_design);
	}


	/**
	 * Delete Tipster database record.
	 *
	 * @param id	- numeric id of Tipster record to delete from db.
	 * @return void
	 */
	public function delete_banner($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_carousal_design');
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
		//print_r($data);
		$features = array(
				'id' 			=> '',
				'name' 			=> '',
				'description' 	=> '',
				'member_id' 	=> ''
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




	/**
	 * Returns list of Features, as stored in DB.
	 *
	 * @return	array	- Features data as array.
	 */
	public function fetch_features()
	{
		$table = 'tbl_main_features';

		$query = $this->db->get($table);
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$feature = array();

			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$feature['id'] 				= (integer)$row['id'];
			$feature['name'] 			= $row['name'];
			$feature['description'] 	= $row['description'];
			$feature['member_id'] 		= $row['member_id'];
			
			$result[] = $feature;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_feature($id)
	{
		$table = 'tbl_main_features';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$feature = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$feature['id'] 			= $row['id'];
			$feature['name'] 		= $row['name'];
			$feature['member_id'] 	= $row['member_id'];
			$feature['description']	= $row['description'];
		}

		return $feature;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to insert into db.
	 * @return void
	 */
	public function insert_feature($feature)
	{
		$table = 'tbl_main_features';
		unset($feature['id']); // sanity
		$this->db->insert($table, $feature);
	}

	/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_feature($feature)
	{
		$table = 'tbl_main_features';
		$id = $feature['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $feature);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_feature($id)
	{
		$table = 'tbl_main_features';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	///////////////////////////////////////////////////////////////////////////////////////
	

	/**
	 * Returns list of Features, as stored in DB.
	 *
	 * @return	array	- Features data as array.
	 */
	public function fetch_services()
	{
		$table = 'tbl_service_types';

		$query = $this->db->get($table);
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$service = array();

			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$service['id'] 				= (integer)$row['id'];
			$service['name'] 			= $row['name'];
			$service['description'] 	= $row['description'];
			$service['member_id'] 		= $row['member_id'];
			$service['status'] 			= $row['status'];
			
			$result[] = $service;
		}

		return $result;
	}
	
	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_service($data = NULL)
	{
		//print_r($data);
		$services = array(
				'id' 			=> '',
				'name' 			=> '',
				'description' 	=> '',
				'member_id' 	=> ''
		);

		if (empty($data))
		{
			return $services;
		}

		foreach ($services as $k => $v)
		{
			if (isset($data[$k]))
			{
				$services[$k] = $data[$k];
			}
		}

		return $services;
	}
	
	public function fetch_service($id)
	{
		$table = 'tbl_service_types';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$service = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$service['id'] 			= $row['id'];
			$service['name'] 		= $row['name'];
			$service['description']	= $row['description'];
			$service['member_id']	= $row['member_id'];
		}

		return $service;
	}
	
/**
	 * Insert Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to insert into db.
	 * @return void
	 */
	public function insert_service($service)
	{
		$table = 'tbl_service_types';
		unset($service['id']); // sanity
		$this->db->insert($table, $service);
	}
	
/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_service($service)
	{
		$table = 'tbl_service_types';
		$id = $service['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $service);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_service($id)
	{
		$table = 'tbl_service_types';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
//////////////////////////////////////////////////////////////////////////////////////	
	
public function fetch_service_categories()
	{
		$table = 'tbl_service_categories';

		$query = $this->db->get($table);
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$service_category = array();

			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$service_category['id'] 				= (integer)$row['id'];
			$service_category['name'] 				= $row['name'];
			$service_category['description'] 		= $row['description'];
			$service_category['service_id'] 		= $row['service_id'];
			$service_category['member_id'] 			= $row['member_id'];
			
			$result[] = $service_category;
		}

		return $result;
	}
	
	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_service_category($data = NULL)
	{
		//print_r($data);
		$service_categories = array(
				'id' 			=> '',
				'name' 			=> '',
				'description' 	=> '',
				'member_id' 	=> '',
				'service_id' 	=> '',
		);

		if (empty($data))
		{
			return $service_categories;
		}

		foreach ($service_categories as $k => $v)
		{
			if (isset($data[$k]))
			{
				$service_categories[$k] = $data[$k];
			}
		}

		return $service_categories;
	}
	
public function fetch_service_category($id)
	{
		$table = 'tbl_service_categories';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$service_category = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$service_category['id'] 			= $row['id'];
			$service_category['name'] 			= $row['name'];
			$service_category['description']	= $row['description'];
			$service_category['service_id']		= $row['service_id'];
			$service_category['member_id']		= $row['member_id'];
		}

		return $service_category;
	}
	
	
/**
	 * Insert Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to insert into db.
	 * @return void
	 */
	public function insert_service_category($service_category)
	{
		$table = 'tbl_service_categories';
		unset($service_category['id']); // sanity
		$this->db->insert($table, $service_category);
	}
	
/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_service_category($service_category)
	{
		$table = 'tbl_service_categories';
		$id = $service_category['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $service_category);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_service_category($id)
	{
		$table = 'tbl_service_categories';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////

public function fetch_service_prices()
	{
		
		$this->db->select("tbl_service_price.id as id,tbl_service_price.price as price,tbl_service_price.description as description,tbl_service_price.service_id as service_id,tbl_service_price.category_id as category_id,tbl_service_price.discount as discount,tbl_service_price.member_id as member_id,tbl_service_types.name as service_name,tbl_service_categories.name as category_name");
		$this->db->from("tbl_service_price");
		$this->db->join("tbl_service_types", "tbl_service_price.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories", "tbl_service_price.category_id = tbl_service_categories.id");
		//$table = 'tbl_service_price';

		$query = $this->db->get();
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$service_price = array();

			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$service_price['id'] 				= (integer)$row['id'];
			$service_price['price'] 			= $row['price'];
			$service_price['description'] 		= $row['description'];
			$service_price['service_id'] 		= $row['service_id'];
			$service_price['service_name'] 		= $row['service_name'];
			$service_price['category_name'] 	= $row['category_name'];
			$service_price['category_id'] 		= $row['category_id'];
			$service_price['member_id'] 		= $row['member_id'];
			$service_price['discount'] 			= $row['discount'];
			
			$result[] = $service_price;
		}

		return $result;
	}

/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	public function make_service_price($data = NULL)
	{
		//print_r($data);
		$service_price = array(
				'id' 			=> '',
				'price' 		=> '',
				'description' 	=> '',
				'service_id' 	=> '',
				'category_id' 	=> '',
				'member_id' 	=> '',
				'discount' 		=> '',
		);

		if (empty($data))
		{
			return $service_price;
		}

		foreach ($service_price as $k => $v)
		{
			if (isset($data[$k]))
			{
				$service_price[$k] = $data[$k];
			}
		}

		return $service_price;
	}

	
public function fetch_service_price($id)
	{
		$table = 'tbl_service_price';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$service_price = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$service_price['id'] 			= $row['id'];
			$service_price['price'] 		= $row['price'];
			$service_price['description']	= $row['description'];
			$service_price['service_id']	= $row['service_id'];
			$service_price['category_id']	= $row['category_id'];
			$service_price['member_id']		= $row['member_id'];
			$service_price['discount']		= $row['discount'];
		}

		return $service_price;
	}
	
	
	
/**
	 * Insert Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to insert into db.
	 * @return void
	 */
	public function insert_service_price($service_price)
	{
		$table = 'tbl_service_price';
		unset($service_price['id']); // sanity
		$this->db->insert($table, $service_price);
	}
	
/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	public function update_service_price($service_price)
	{
		$table = 'tbl_service_price';
		$id = $service_price['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $service_price);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_service_price($id)
	{
		$table = 'tbl_service_price';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////	
	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_customer_details()
	{
		
		$table = 'tbl_customer_details';
			$query = $this->db->get($table);

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_customer_details = array();


			$tbl_customer_details['id'] 						= (integer)$row['id'];
			$tbl_customer_details['first_name'] 				= $row['first_name'];
			$tbl_customer_details['last_name']	 				= $row['last_name'];
			$tbl_customer_details['address'] 					= $row['address'];
			$tbl_customer_details['email'] 	        			= $row['email'];
			$tbl_customer_details['phone_no'] 					= $row['phone_no'];
			$tbl_customer_details['mobile_no'] 					= $row['mobile_no'];
			$tbl_customer_details['member_id'] 					= $row['member_id'];
			$tbl_customer_details['imageupload_status'] 		= $row['imageupload_status'];
			$tbl_customer_details['image_name'] 				= $row['image_name'];
			$tbl_customer_details['event_status'] 				= $row['event_status'];
			$tbl_customer_details['comment_status'] 			= $row['comment_status'];
			

			$result[] = $tbl_customer_details;
		}

		return $result;
	}
	
	

	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_customer_details($data = NULL)
	{
		//print_r($data);
		$tbl_customer_details = array(
				'id' => 0,
				'first_name' => '',
				'last_name' => '',
				'address' => '',
				'email' => '',
				'phone_no' => '',
				'mobile_no' => '',
				'member_id' => '',
				'imageupload_status' => '',
				'image_name' => '',
				'event_status' => '',
				'comment_status' => '',
		);

		if (empty($data))
		{
			return $tbl_customer_details;
		}

		foreach ($tbl_customer_details as $k => $v)
		{
			if (isset($data[$k]))
			{
				$tbl_customer_details[$k] = $data[$k];
			}
		}

		return $tbl_customer_details;
	}



	// ---------------------------------------------------------------------------/


	public function fetch_customer_detail($id)
	{
		$table = 'tbl_customer_details';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$tbl_customer_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$tbl_customer_details['id'] 						= (integer)$row['id'];
			$tbl_customer_details['first_name'] 				= $row['first_name'];
			$tbl_customer_details['last_name']	 				= $row['last_name'];
			$tbl_customer_details['address'] 					= $row['address'];
			$tbl_customer_details['email'] 	        			= $row['email'];
			$tbl_customer_details['phone_no'] 					= $row['phone_no'];
			$tbl_customer_details['mobile_no'] 					= $row['mobile_no'];
			$tbl_customer_details['member_id'] 					= $row['member_id'];
			$tbl_customer_details['imageupload_status'] 		= $row['imageupload_status'];
			$tbl_customer_details['image_name'] 				= $row['image_name'];
			$tbl_customer_details['event_status'] 				= $row['event_status'];
			$tbl_customer_details['comment_status'] 			= $row['comment_status'];
		}

		return $tbl_customer_details;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to insert into db.
	 * @return void
	 */
	public function insert_customer_details($customer_details)
	{
		$table = 'tbl_customer_details';
		unset($customer_details['id']); // sanity
		$this->db->insert($table, $customer_details);
	}

	/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_customer_details($customer_details)
	{
		$table = 'tbl_customer_details';
		$id = $customer_details['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $customer_details);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_customer_details($id)
	{
		$table = 'tbl_customer_details';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	
	///////////////////////////////////////////////////////////////////////////////////////////////	
	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_booking_customer_details()
	{
		
		$table = 'tbl_booking_customers';
			$query = $this->db->get($table);

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_customer_details = array();


			$tbl_customer_details['id'] 						= (integer)$row['id'];
			$tbl_customer_details['first_name'] 				= $row['first_name'];
			$tbl_customer_details['last_name']	 				= $row['last_name'];
			$tbl_customer_details['address'] 					= $row['address'];
			$tbl_customer_details['email'] 	        			= $row['email'];
			$tbl_customer_details['phone_no'] 					= $row['phone_no'];
			$tbl_customer_details['mobile_no'] 					= $row['mobile_no'];
			

			$result[] = $tbl_customer_details;
		}

		return $result;
	}
	
	

	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_booking_customer_details($data = NULL)
	{
		//print_r($data);
		$tbl_customer_details = array(
				'id' => 0,
				'first_name' => '',
				'last_name' => '',
				'address' => '',
				'email' => '',
				'phone_no' => '',
				'mobile_no' => '',
		);

		if (empty($data))
		{
			return $tbl_customer_details;
		}

		foreach ($tbl_customer_details as $k => $v)
		{
			if (isset($data[$k]))
			{
				$tbl_customer_details[$k] = $data[$k];
			}
		}

		return $tbl_customer_details;
	}



	// ---------------------------------------------------------------------------/


	public function fetch_booking_customer_detail($id)
	{
		$table = 'tbl_booking_customers';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$tbl_customer_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$tbl_customer_details['id'] 						= (integer)$row['id'];
			$tbl_customer_details['first_name'] 				= $row['first_name'];
			$tbl_customer_details['last_name']	 				= $row['last_name'];
			$tbl_customer_details['address'] 					= $row['address'];
			$tbl_customer_details['email'] 	        			= $row['email'];
			$tbl_customer_details['phone_no'] 					= $row['phone_no'];
			$tbl_customer_details['mobile_no'] 					= $row['mobile_no'];
		}

		return $tbl_customer_details;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to insert into db.
	 * @return void
	 */
	public function insert_booking_customer_details($customer_details)
	{
		$table = 'tbl_booking_customers';
		unset($customer_details['id']); // sanity
		$this->db->insert($table, $customer_details);
	}

	/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_booking_customer_details($customer_details)
	{
		$table = 'tbl_booking_customers';
		$id = $customer_details['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $customer_details);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_booking_customer_details($id)
	{
		$table = 'tbl_booking_customers';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_employee_details()
	{
		
		$table = 'tbl_main_employ_details';
			$query = $this->db->get($table);

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_employee_details = array();


			$tbl_employee_details['id'] 						= (integer)$row['id'];
			$tbl_employee_details['first_name'] 				= $row['first_name'];
			$tbl_employee_details['last_name'] 					= $row['last_name'];
			$tbl_employee_details['address'] 					= $row['address'];
			$tbl_employee_details['email'] 	        			= $row['email'];
			$tbl_employee_details['telephone'] 					= $row['telephone'];
			$tbl_employee_details['member_id'] 					= $row['member_id'];
			
			$result[] = $tbl_employee_details;
		}

		return $result;
	}
	
	

	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_employee_details($data = NULL)
	{
		//print_r($data);
		$tbl_employee_details = array(
				'id' => 0,
				'first_name' => '',
				'last_name' => '',
				'address' => '',
				'email' => '',
				'telephone' => '',
				'member_id' => ''
		);

		if (empty($data))
		{
			return $tbl_employee_details;
		}

		foreach ($tbl_employee_details as $k => $v)
		{
			if (isset($data[$k]))
			{
				$tbl_employee_details[$k] = $data[$k];
			}
		}

		return $tbl_employee_details;
	}



	// ---------------------------------------------------------------------------/


	public function fetch_employee_detail($id)
	{
		$table = 'tbl_main_employ_details';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$tbl_employee_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$tbl_employee_details['id'] 						= (integer)$row['id'];
			$tbl_employee_details['first_name'] 				= $row['first_name'];
			$tbl_employee_details['last_name'] 					= $row['last_name'];
			$tbl_employee_details['address'] 					= $row['address'];
			$tbl_employee_details['email'] 	        			= $row['email'];
			$tbl_employee_details['telephone'] 					= $row['telephone'];
			$tbl_employee_details['member_id'] 					= $row['member_id'];
		}

		return $tbl_employee_details;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to insert into db.
	 * @return void
	 */
	public function insert_employee_details($employee_details)
	{
		$table = 'tbl_main_employ_details';
		unset($employee_details['id']); // sanity
		$this->db->insert($table, $employee_details);
	}

	/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_employee_details($employee_details)
	{
		$table = 'tbl_main_employ_details';
		$id = $employee_details['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $employee_details);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_employee_details($id)
	{
		$table = 'tbl_main_employ_details';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	
////////////////////////////////////////////////////////////////////////////////

	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_events()
	{
		
		$this->db->select("tbl_service_events.id as id,tbl_service_events.name as name,tbl_service_events.description as description,tbl_service_events.service_id as service_id,tbl_service_events.category_id as category_id,tbl_service_events.offer_price as offer_price,tbl_service_events.start_time as start_time,tbl_service_events.end_time as end_time,tbl_service_events.member_id as member_id,tbl_service_events.phone_status as phone_status,tbl_service_events.email_status as email_status,tbl_service_events.status as status,tbl_service_types.name as service_name,tbl_service_categories.name as category_name");
		$this->db->from("tbl_service_events");
		$this->db->join("tbl_service_types", "tbl_service_events.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories", "tbl_service_events.category_id = tbl_service_categories.id");
		
		
			$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_event_mgnt = array();


			$tbl_event_mgnt['id'] 				= (integer)$row['id'];
			$tbl_event_mgnt['name'] 			= $row['name'];
			$tbl_event_mgnt['service_id'] 		= $row['service_id'];
			$tbl_event_mgnt['service_name'] 	= $row['service_name'];
			$tbl_event_mgnt['category_id'] 		= $row['category_id'];
			$tbl_event_mgnt['category_name'] 	= $row['category_name'];
			$tbl_event_mgnt['description'] 		= $row['description'];
			$tbl_event_mgnt['offer_price'] 		= $row['offer_price'];
			$tbl_event_mgnt['start_time'] 		= $row['start_time'];
			$tbl_event_mgnt['end_time'] 		= $row['end_time'];
			$tbl_event_mgnt['member_id'] 		= $row['member_id'];
			$tbl_event_mgnt['phone_status'] 	= $row['phone_status'];
			$tbl_event_mgnt['email_status'] 	= $row['email_status'];
			

			$result[] = $tbl_event_mgnt;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_event($data = NULL)
	{
		$event_data = array(
				'id' 			=> '',
				'name' 			=> '',
				'service_id'	=> '',
				'category_id' 	=> '',
				'description' 	=> '',
				'offer_price' 	=> '',
				'start_time' 	=> '',
				'end_time' 		=> '',
				'member_id' 	=> '',
				'phone_status' 	=> '',
				'email_status' 	=> '',
		
		);

		if (empty($data))
		{
			return $event_data;
		}

		foreach ($event_data as $k => $v)
		{
			if (isset($data[$k]))
			{
				$event_data[$k] = $data[$k];
			}
		}

		return $event_data;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_event($id)
	{
		$query = $this->db->get_where('tbl_service_events', array('id' => $id));

		$event_data = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$event_data['id'] 				= (integer)$row['id'];
			$event_data['name'] 			= $row['name'];
			$event_data['service_id'] 		= $row['service_id'];
			$event_data['category_id'] 		= $row['category_id'];
			$event_data['description'] 		= $row['description'];
			$event_data['offer_price'] 		= $row['offer_price'];
			$event_data['start_time'] 		= $row['start_time'];
			$event_data['end_time'] 		= $row['end_time'];
			$event_data['member_id'] 		= $row['member_id'];
			$event_data['phone_status'] 	= $row['phone_status'];
			$event_data['email_status'] 	= $row['email_status'];
			
		}

		return $event_data;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_event($event_data)
	{
		unset($event_data['id']); // sanity
		$this->db->insert('tbl_service_events', $event_data);
		return $this->db->insert_id();
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_event($event_data)
	{
		$id = $event_data['id'];
		$this->db->where('id', $id);
		$this->db->update('tbl_service_events', $event_data);
	}


	/**
	 * Delete Tipster database record.
	 *
	 * @param id	- numeric id of Tipster record to delete from db.
	 * @return void
	 */
	public function delete_event($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_service_events');
	}

	
	
	//////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_contents()
	{
		
		$this->db->select("tbl_service_content.id as id,tbl_service_content.small_content as small_content,tbl_service_content.large_content as large_content,tbl_service_content.member_id as member_id,tbl_service_content.image_content as image_content,tbl_service_content.service_id as service_id,tbl_service_content.category_id as category_id,tbl_service_content.status as status,tbl_service_types.name as service_name,tbl_service_categories.name as category_name");
		$this->db->from("tbl_service_content");
		$this->db->join("tbl_service_types", "tbl_service_content.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories", "tbl_service_content.category_id = tbl_service_categories.id");
		
		
			$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_content_mgnt = array();


			$tbl_content_mgnt['id'] 				= (integer)$row['id'];
			$tbl_content_mgnt['service_id'] 		= $row['service_id'];
			$tbl_content_mgnt['service_name'] 		= $row['service_name'];
			$tbl_content_mgnt['category_id'] 		= $row['category_id'];
			$tbl_content_mgnt['category_name'] 		= $row['category_name'];
			$tbl_content_mgnt['small_content'] 		= $row['small_content'];
			$tbl_content_mgnt['large_content'] 		= $row['large_content'];
			$tbl_content_mgnt['image_content'] 		= $row['image_content'];
			$tbl_content_mgnt['member_id'] 			= $row['member_id'];
			$tbl_content_mgnt['status'] 			= $row['status'];
			

			$result[] = $tbl_content_mgnt;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_content($data = NULL)
	{
		$content_data = array(
				'id' 			=> '',
				'service_id'	=> '',
				'category_id' 	=> '',
				'small_content' => '',
				'large_content' => '',
				'image_content' => '',
				'member_id' 	=> '',
				'status' 		=> '',
		
		);

		if (empty($data))
		{
			return $content_data;
		}

		foreach ($content_data as $k => $v)
		{
			if (isset($data[$k]))
			{
				$content_data[$k] = $data[$k];
			}
		}

		return $content_data;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_content($id)
	{
		$query = $this->db->get_where('tbl_service_content', array('id' => $id));

		$content_data = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$content_data['id'] 				= (integer)$row['id'];
			$content_data['service_id'] 		= $row['service_id'];
			$content_data['category_id'] 		= $row['category_id'];
			$content_data['small_content'] 		= $row['small_content'];
			$content_data['large_content'] 		= $row['large_content'];
			$content_data['image_content'] 		= $row['image_content'];
			$content_data['member_id'] 			= $row['member_id'];
			$content_data['status'] 			= $row['status'];
			
		}

		return $content_data;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_content($content_data)
	{
		unset($content_data['id']); // sanity
		$this->db->insert('tbl_service_content', $content_data);
		return $this->db->insert_id();
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_content($content_data)
	{
		$id = $content_data['id'];
		$this->db->where('id', $id);
		$this->db->update('tbl_service_content', $content_data);
	}


	/**
	 * Delete Tipster database record.
	 *
	 * @param id	- numeric id of Tipster record to delete from db.
	 * @return void
	 */
	public function delete_content($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_service_content');
	}

	//////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_rolls()
	{
		
		$this->db->select("tbl_main_roll_assign.id as id,tbl_main_roll_assign.member_id as member_id,tbl_main_roll_assign.screen_id as screen_id,tbl_main_roll_assign.status as status,tbl_main_membership.user_name as user_name,tbl_main_screens.name as screen_name");
		$this->db->from("tbl_main_roll_assign");
		$this->db->join("tbl_main_membership", "tbl_main_roll_assign.member_id = tbl_main_membership.id");
		$this->db->join("tbl_main_screens", "tbl_main_roll_assign.screen_id = tbl_main_screens.id");
		
			$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$roll_data = array();


			$roll_data['id'] 				= (integer)$row['id'];
			$roll_data['member_id'] 		= $row['member_id'];
			$roll_data['user_name'] 		= $row['user_name'];
			$roll_data['screen_id'] 		= $row['screen_id'];
			$roll_data['screen_name'] 		= $row['screen_name'];
			$roll_data['status'] 			= $row['status'];
			

			$result[] = $roll_data;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_roll($data = NULL)
	{
		$roll_data = array(
				'id' 			=> '',
				'member_id'		=> '',
				'screen_id'		=> '',
				'status' 		=> ''
		
		);

		if (empty($data))
		{
			return $roll_data;
		}

		foreach ($roll_data as $k => $v)
		{
			if (isset($data[$k]))
			{
				$roll_data[$k] = $data[$k];
			}
		}

		return $roll_data;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_roll($id)
	{
		$query = $this->db->get_where('tbl_main_roll_assign', array('id' => $id));

		$roll_data = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$roll_data['id'] 				= (integer)$row['id'];
			$roll_data['member_id'] 		= $row['member_id'];
			$roll_data['screen_id'] 		= $row['screen_id'];
			$roll_data['status'] 			= $row['status'];
			
		}

		return $roll_data;
	}
	

	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_roll($roll_data)
	{

		$user_id = $roll_data['member_id'];
		$screen_id = $roll_data['screen_id'];
		$query = $this->db->get_where('tbl_main_roll_assign', array('member_id' => $user_id, 'screen_id' => $screen_id));
		
		if($query->num_rows() > 0){
			unset($roll_data['id']);
			$this->db->where(array('member_id' => $user_id, 'screen_id' => $screen_id));
			$this->db->update('tbl_main_roll_assign', $roll_data);
		}
		else
		{		
		unset($roll_data['id']); // sanity
		$this->db->insert('tbl_main_roll_assign', $roll_data);
		return $this->db->insert_id();
		}
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_roll($roll_data)
	{
		$id = $roll_data['id'];
		$this->db->where('id', $id);
		$this->db->update('tbl_main_roll_assign', $roll_data);
	}


	/**
	 * Delete Tipster database record.
	 *
	 * @param id	- numeric id of Tipster record to delete from db.
	 * @return void
	 */
	public function delete_roll($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_main_roll_assign');
	}
		
	
	
	////////////////////////////////////////////////////////////////////////////////////////////
		

	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_time_allocations()
	{
		
		$this->db->select("tbl_time_allocation.id as id,tbl_time_allocation.member_id as member_id,tbl_time_allocation.employ_id as employ_id,tbl_time_allocation.start_time as start_time,tbl_time_allocation.end_time as end_time,tbl_time_allocation.status as status,tbl_time_allocation.service_id as service_id,tbl_time_allocation.category_id as category_id,tbl_service_types.name as service_name,tbl_service_categories.name as category_name,tbl_main_employ_details.first_name as employ_name");
		$this->db->from("tbl_time_allocation");
		$this->db->join("tbl_main_membership", "tbl_time_allocation.member_id = tbl_main_membership.id");
		$this->db->join("tbl_main_employ_details", "tbl_time_allocation.employ_id = tbl_main_employ_details.id");
		$this->db->join("tbl_service_types","tbl_time_allocation.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories","tbl_time_allocation.category_id = tbl_service_categories.id");
		
			$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$time_allocation_data = array();


			$time_allocation_data['id'] 			= (integer)$row['id'];
			$time_allocation_data['service_id'] 	= $row['service_id'];
			$time_allocation_data['service_name'] 	= $row['service_name'];
			$time_allocation_data['category_id'] 	= $row['category_id'];
			$time_allocation_data['category_name'] 	= $row['category_name'];	
			$time_allocation_data['member_id'] 		= $row['member_id'];
			$time_allocation_data['employ_id'] 		= $row['employ_id'];
			$time_allocation_data['employ_name'] 	= $row['employ_name'];
			$time_allocation_data['start_time'] 	= $row['start_time'];
			$time_allocation_data['end_time'] 		= $row['end_time'];
			$time_allocation_data['status'] 		= $row['status'];
			
			$result[] = $time_allocation_data;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_time_allocation($data = NULL)
	{
		$time_allocation_data = array(
				'id' 				=> '',
				'service_id'		=> '',
				'category_id' 		=> '',
				'member_id' 		=> '',
				'employ_id' 		=> '',
				'start_time' 		=> '',
				'end_time' 			=> '',
				'status' 			=> ''
		
		);

		if (empty($data))
		{
			return $time_allocation_data;
		}

		foreach ($time_allocation_data as $k => $v)
		{
			if (isset($data[$k]))
			{
				$time_allocation_data[$k] = $data[$k];
			}
		}

		return $time_allocation_data;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_time_allocation($id)
	{
		$query = $this->db->get_where('tbl_time_allocation', array('id' => $id));

		$time_allocation_data = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$time_allocation_data['id'] 			= (integer)$row['id'];
			$time_allocation_data['member_id'] 		= $row['member_id'];
			$time_allocation_data['employ_id'] 		= $row['employ_id'];
			$time_allocation_data['service_id'] 	= $row['service_id'];
			$time_allocation_data['category_id'] 	= $row['category_id'];
			$time_allocation_data['start_time'] 	= $row['start_time'];
			$time_allocation_data['end_time'] 		= $row['end_time'];
			$time_allocation_data['status'] 		= $row['status'];
		}

		return $time_allocation_data;
	}
	

	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_time_allocation($time_allocation_data)
	{
		
		$member_id = $time_allocation_data['member_id'];
		$employ_id = $time_allocation_data['employ_id'];
		$start_time = $time_allocation_data['start_time'];
		$end_time = $time_allocation_data['end_time'];

		$start_time_query = $this->db->get_where('tbl_time_allocation', array('start_time' => $start_time, 'member_id' => $member_id, 'employ_id' => $employ_id));
		$end_time_query = $this->db->get_where('tbl_time_allocation', array('end_time' => $end_time, 'member_id' => $member_id, 'employ_id' => $employ_id));
		
		if($start_time_query->num_rows() > 0 && $end_time_query->num_rows() > 0){
			unset($time_allocation_data['id']);
			$this->db->where(array('member_id' => $member_id, 'employ_id' => $employ_id, 'start_time' => $start_time, 'end_time' => $end_time));
			$this->db->update('tbl_time_allocation', $time_allocation_data);
		}
		elseif($start_time_query->num_rows() > 0 || $end_time_query->num_rows() > 0){
			return false;
		}
		else
		{		
		unset($time_allocation_data['id']); // sanity
		$this->db->insert('tbl_time_allocation', $time_allocation_data);
		return $this->db->insert_id();
		}
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_time_allocation($time_allocation_data)
	{
		$id = $time_allocation_data['id'];
		$this->db->where('id', $id);
		$this->db->update('tbl_time_allocation', $time_allocation_data);
	}


	/**
	 * Delete Tipster database record.
	 *
	 * @param id	- numeric id of Tipster record to delete from db.
	 * @return void
	 */
	public function delete_time_allocation($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_time_allocation');
	}
	
	///////////////////////////////////////////////////////////////////////////////////
	
	public function fetch_transaction_details()
	{
		
		
		$this->db->select("tbl_confirm_booking.id as id,tbl_confirm_booking.employ_id as employ_id,tbl_confirm_booking.fixed_price as fixed_price,tbl_confirm_booking.confirm_price as confirm_price,tbl_confirm_booking.customer_id as customer_id,tbl_confirm_booking.status as status,tbl_confirm_booking.start_time as start_time,tbl_confirm_booking.end_time as end_time,tbl_confirm_booking.service_id as service_id,tbl_confirm_booking.category_id as category_id,tbl_service_types.name as service_name,tbl_service_categories.name as category_name,tbl_main_employ_details.first_name as employ_name,tbl_booking_customers.first_name as customer_first_name,tbl_booking_customers.last_name as customer_last_name");
		$this->db->from("tbl_confirm_booking");
		$this->db->join("tbl_main_employ_details", "tbl_confirm_booking.employ_id = tbl_main_employ_details.id");
		$this->db->join("tbl_service_types","tbl_confirm_booking.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories","tbl_confirm_booking.category_id = tbl_service_categories.id");
		$this->db->join("tbl_booking_customers","tbl_confirm_booking.customer_id = tbl_booking_customers.id");
		
		$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$transaction = array();


			$transaction['id'] 						= (integer)$row['id'];
			$transaction['customer_first_name'] 	= $row['customer_first_name'];
			$transaction['customer_last_name'] 		= $row['customer_last_name'];
			$transaction['service_name'] 			= $row['service_name'];
			$transaction['category_name'] 			= $row['category_name'];	
			$transaction['employ_name'] 			= $row['employ_name'];
			$transaction['start_time'] 				= $row['start_time'];
			$transaction['end_time'] 				= $row['end_time'];
			$transaction['fixed_price'] 			= $row['fixed_price'];
			$transaction['confirm_price'] 			= $row['confirm_price'];
			$transaction['status'] 					= $row['status'];
			
			$result[] = $transaction;
		}

		return $result;
	}
	

	public function fetch_transaction_detail($id)
	{
		$this->db->select("tbl_confirm_booking.id as id,tbl_confirm_booking.employ_id as employ_id,tbl_confirm_booking.fixed_price as fixed_price,tbl_confirm_booking.confirm_price as confirm_price,tbl_confirm_booking.customer_id as customer_id,tbl_confirm_booking.status as status,tbl_confirm_booking.start_time as start_time,tbl_confirm_booking.end_time as end_time,tbl_confirm_booking.service_id as service_id,tbl_confirm_booking.category_id as category_id,tbl_service_types.name as service_name,tbl_service_categories.name as category_name,tbl_main_employ_details.first_name as employ_name,tbl_booking_customers.first_name as customer_first_name,tbl_booking_customers.last_name as customer_last_name");
		$this->db->from("tbl_confirm_booking");
		$this->db->join("tbl_main_employ_details", "tbl_confirm_booking.employ_id = tbl_main_employ_details.id");
		$this->db->join("tbl_service_types","tbl_confirm_booking.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories","tbl_confirm_booking.category_id = tbl_service_categories.id");
		$this->db->join("tbl_booking_customers","tbl_confirm_booking.customer_id = tbl_booking_customers.id");
		
		$this->db->where('tbl_confirm_booking.id', $id);
		
		$query = $this->db->get();

		$transaction_detail = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$transaction_detail['id'] 				= (integer)$row['id'];
			$transaction_detail['customer_first_name'] 		= $row['customer_first_name'];
			$transaction_detail['customer_last_name'] 		= $row['customer_last_name'];
			$transaction_detail['employ_name'] 		= $row['employ_name'];
			$transaction_detail['service_name'] 		= $row['service_name'];
			$transaction_detail['category_name'] 		= $row['category_name'];
			$transaction_detail['start_time'] 		= $row['start_time'];
			$transaction_detail['end_time'] 		= $row['end_time'];
			$transaction_detail['fixed_price'] 		= $row['fixed_price'];
			$transaction_detail['confirm_price'] 	= $row['confirm_price'];
			$transaction_detail['status'] 			= $row['status'];
		}

		return $transaction_detail;
	}
	
	function make_booking_transaction($data = NULL)
	{
		$booking_transaction = array(
				'id' 				=> '',
				'confirm_price'		=> '',
				'status'		=> ''
		
		);

		if (empty($data))
		{
			return $booking_transaction;
		}

		foreach ($booking_transaction as $k => $v)
		{
			if (isset($data[$k]))
			{
				$booking_transaction[$k] = $data[$k];
			}
		}

		return $booking_transaction;
	}

	public function insert_booking_transaction($booking_details)
	{
		$table = 'tbl_confirm_booking';
		unset($booking_details['id']); // sanity
		$this->db->insert($table, $booking_details);
	}

	/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_booking_transaction($booking_details)
	{
		$table = 'tbl_confirm_booking';
		$id = $booking_details['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $booking_details);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_booking_transaction($id)
	{
		$table = 'tbl_confirm_booking';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	
	
	////////////////////////////////////////////////////////////////////////////////////////////
	
}

/* End of file tips_model.php */
/* Location: ./application/models/tips_model.php */
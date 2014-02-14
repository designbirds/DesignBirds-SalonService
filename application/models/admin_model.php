<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

   
	// ---------------------------------------------------------------------------/


	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}


	// ---------------------------------------------------------------------------/


	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_image_uploads()
	{
		
		$table = 'tbl_image_upload';
			$query = $this->db->get($table);

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tbl_image_upload = array();


			$tbl_image_upload['id'] 				= (integer)$row['id'];
			$tbl_image_upload['name'] 			= $row['name'];
			$tbl_image_upload['category'] 		= $row['category'];
			$tbl_image_upload['description'] 	= $row['description'];
			$tbl_image_upload['alt'] 			= $row['alt'];
			

			$result[] = $tbl_image_upload;
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
				'category' 		=> '',
				'description' 	=> '',
				'alt' 			=> '',
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
		$query = $this->db->get_where('tbl_image_upload', array('id' => $id));

		$image_uploade = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$image_uploade['id'] 				= (integer)$row['id'];
			$image_uploade['name'] 				= $row['name'];
			$image_uploade['category'] 			= $row['category'];
			$image_uploade['description'] 		= $row['description'];
			$image_uploade['alt'] 				= $row['alt'];
			
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
		$this->db->insert('tbl_image_upload', $image_upload);
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
		$this->db->update('tbl_image_upload', $image_upload);
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
		$this->db->delete('tbl_image_upload');
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
		$table = 'tbl_main_services';

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
				'id' => 0,
				'name' => '',
				'description' => '',
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
		$table = 'tbl_main_services';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$service = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$service['id'] 			= $row['id'];
			$service['name'] 		= $row['name'];
			$service['description']	= $row['description'];
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
		$table = 'tbl_main_services';
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
		$table = 'tbl_main_services';
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
		$table = 'tbl_main_services';
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
				'id' => 0,
				'name' => '',
				'description' => '',
				'service_id' => 0,
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
		
		$this->db->select("tbl_main_service_price.id as id,tbl_main_service_price.price as price,tbl_main_service_price.description as description,tbl_main_service_price.service_id as service_id,tbl_main_service_price.category_id as category_id,tbl_main_service_price.discount as discount,tbl_main_services.name as service_name,tbl_service_categories.name as category_name");
		$this->db->from("tbl_main_service_price");
		$this->db->join("tbl_main_services", "tbl_main_service_price.service_id = tbl_main_services.id");
		$this->db->join("tbl_service_categories", "tbl_main_service_price.category_id = tbl_service_categories.id");
		//$table = 'tbl_main_service_price';

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
				'id' => 0,
				'price' => '',
				'description' => '',
				'service_id' => '',
				'category_id' => '',
				'discount' => 0,
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
		$table = 'tbl_main_service_price';
		
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
		$table = 'tbl_main_service_price';
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
		$table = 'tbl_main_service_price';
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
		$table = 'tbl_main_service_price';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	
	
}

/* End of file tips_model.php */
/* Location: ./application/models/tips_model.php */
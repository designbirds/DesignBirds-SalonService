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
	public function delete_tipster($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tipster');
	}

	
	// ---------------------------------------------------------------------------/


	/**
	 * Create an array of Tipster data, to back or receive form data.
	 *
	 * @param data	- k/v array of data to populate Tipster
	 * @return array
	 */
	function make_tips($data = NULL)
	{
		$tips = array(
				'id' => 0,
				'name' => '',
				'description' => '',
		);

		if (empty($data))
		{
			return $tips;
		}

		foreach ($tips as $k => $v)
		{
			if (isset($data[$k]))
			{
				$tips[$k] = $data[$k];
			}
		}

		return $tips;
	}




	/**
	 * Returns list of Tips, as stored in DB.
	 *
	 * @return	array	- Tips data as array.
	 */
	public function fetch_tips($data = array(), $lastupdate = null)
	{
		$table = 'tip';

		if (! empty($data))
		{
			$this->db->where($data);
		}

		if (! empty($lastupdate))
		{
			$this->db->where('date >=', $lastupdate);
		}

		$query = $this->db->get($table);

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$tip = array();

			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$tip['id'] 		= (integer)$row['id'];
			$tip['tipster'] = (integer)$row['tipster'];
			$tip['match'] 	= (integer)$row['match'];
			$tip['comment'] = $row['comment'];
			$tip['date'] 	= $row['date'];

			$result[] = $tip;
		}

		return $result;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_tip($id)
	{
		$query = $this->db->get_where('tip', array('id' => $id));

		$tip = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$tip['id'] 		= (integer)$row['id'];
			$tip['tipster'] = (integer)$row['tipster'];
			$tip['match'] 	= (integer)$row['match'];
			$tip['comment'] = $row['comment'];
			$tip['date'] 	= $row['date'];

		}

		return $tip;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to insert into db.
	 * @return void
	 */
	public function insert_tip($tip)
	{
		unset($tip['id']); // sanity
		$this->db->insert('tip', $tip);
	}

	/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_tip($tip)
	{
		$id = $tip['id'];
		$this->db->where('id', $id);
		$this->db->update('tip', $tip);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_tip($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tip');
	}


	// ---------------------------------------------------------------------------/


	public function fetch_tipsters_dropdown()
	{
		$table = 'tbl_main_features';
		$query = $this->db->get($table);
	    //$this->db->where('id', $id);

		$dropdown = array();

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
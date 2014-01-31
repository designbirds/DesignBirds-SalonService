<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imageupload_model extends CI_Model {

   
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
	public function fetch_imageuploads()
	{
		
		$table = 'imageupload';
			$query = $this->db->get($table);

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$imageupload = array();


			$imageupload['id'] 				= (integer)$row['id'];
			$imageupload['name'] 			= $row['name'];
			$imageupload['category_id'] 	= $row['category_id'];
			$imageupload['description'] 	= $row['description'];
			$imageupload['alt'] 			= $row['alt'];
			

			$result[] = $imageupload;
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
	function make_imageuploader($data = NULL)
	{
		$imageuploader = array(
				'id' => 0,
				'name' => '',
				'category_id' => '',
				'description' => '',
				'alt' => '',
		);

		if (empty($data))
		{
			return $imageuploader;
		}

		foreach ($imageuploader as $k => $v)
		{
			if (isset($data[$k]))
			{
				$imageuploader[$k] = $data[$k];
			}
		}

		return $imageuploader;
	}


	// ---------------------------------------------------------------------------/


	public function fetch_tipster($id)
	{
		$query = $this->db->get_where('tipster', array('id' => $id));

		$tipster = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$tipster['id'] 				= (integer)$row['id'];
			$tipster['name'] 			= $row['name'];
			$tipster['biline'] 			= $row['biline'];
			$tipster['biography'] 		= $row['biography'];
			$tipster['lastupdated'] 	= $row['lastupdated'];
			$tipster['photo_icon'] 		= $row['photo_icon'];
			$tipster['photo_profile']	= $row['photo_profile'];
	
		}

		return $tipster;
	}


	// ---------------------------------------------------------------------------/


	/**
	 * Insert Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to insert into db.
	 * @return void
	 */
	function insert_imageUploader($imageuploader)
	{
		//unset($imageuploader['id']); // sanity
		$this->db->insert('imageupload', $imageuploader);
		return $this->db->insert_id();
	}

	/**
	 * Update Tipster database record.
	 *
	 * @param tipster	- k/v array of Tipster data to update db.
	 * @return void
	 */
	function update_tipster($tipster)
	{
		$id = $tipster['id'];
		$this->db->where('id', $id);
		$this->db->update('tipster', $tipster);
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
				'tipster' => '',
				'match' => '',
				'comment' => '',
				'date' => '',
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
		$table = 'tipster';
		$query = $this->db->get($table);


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
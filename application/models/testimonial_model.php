<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial_model extends CI_model{
	
public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}
	
///////////////////////////////////////////////////////////////////////////////////////////////	
	public function check_customer_email($check_email)
	{
			$table = 'tbl_customer_details';
		
		$query = $this->db->get_where($table, array('email' => $check_email));

		if ($query->num_rows() > 0)
		{

			return true;
							
		}else{
			
			return false;
		}
	
	}
	

	/**
	 * Returns list of Tipsters, as stored in DB.
	 *
	 * @return	array	- Tipster data as array.
	 */
	public function fetch_testimonials()
	{
		
		$table = 'tbl_testimonial_mgnt';
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
			$tbl_customer_details['testimonial'] 					= $row['testimonial'];
			$tbl_customer_details['email'] 	        			= $row['email'];
			$tbl_customer_details['status'] 					= $row['status'];

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
	function make_testimonials($data = NULL)
	{
		//print_r($data);
		$tbl_customer_details = array(
		
				'id' => 0,
				'testimonial' => '',
				'email' => '',
				'status' => '',
				
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


	public function fetch_testimonial($id)
	{
		$table = 'tbl_testimonial_mgnt';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$tbl_customer_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$tbl_customer_details['id'] 						= (integer)$row['id'];
			$tbl_customer_details['testimonial'] 					= $row['testimonial'];
			$tbl_customer_details['email'] 	        			= $row['email'];
			$tbl_customer_details['status'] 					= $row['status'];
			

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
	public function insert_testimonials($testimonial_details)
	{
		$table = 'tbl_testimonial_mgnt';
		unset($testimonial_details['id']); // sanity
		$this->db->insert($table, $testimonial_details);
	}

	/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_testimonials($testimonial_details)
	{
		$table = 'tbl_testimonial_mgnt';
		$id = $testimonial_details['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $testimonial_details);
	}


	/**
	 * Delete Tip database record.
	 *
	 * @param id	- numeric id of Tip record to delete from db.
	 * @return void
	 */
	public function delete_testimonials($id)
	{
		$table = 'tbl_testimonial_mgnt';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	
	///////////////////////////////////////////////////////////////////////////////////////////////	
	
	
}

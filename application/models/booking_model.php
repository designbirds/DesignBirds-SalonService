<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model {

   
	// ---------------------------------------------------------------------------/


	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}
	
	public function fetch_booking_available_times($data)
	{
		
		$service_id = $data['service_id'];
		$category_id = $data['category_id'];
		$start_time = $data['start_time'];
		$end_time = $data['end_time'];
		
		$this->db->select("tbl_time_allocation.id as id,tbl_time_allocation.employ_id as employ_id,tbl_time_allocation.start_time as start_time,tbl_time_allocation.end_time as end_time,tbl_time_allocation.service_id as service_id,tbl_time_allocation.category_id as category_id,tbl_service_types.name as service_name,tbl_service_categories.name as category_name,tbl_main_employ_details.first_name as employ_name");
		$this->db->from("tbl_time_allocation");
		$this->db->join("tbl_main_employ_details", "tbl_time_allocation.employ_id = tbl_main_employ_details.id");
		$this->db->join("tbl_service_types","tbl_time_allocation.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories","tbl_time_allocation.category_id = tbl_service_categories.id");
		
		$this->db->where('tbl_time_allocation.start_time >=', $start_time);
		$this->db->where('tbl_time_allocation.end_time <=', $end_time);
		$this->db->where('tbl_time_allocation.service_id', $service_id);
		$this->db->where('tbl_time_allocation.category_id', $category_id);
		$this->db->where('tbl_time_allocation.status', '0');
		
		$query = $this->db->get();

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$booking_available_times = array();


			$booking_available_times['id'] 				= (integer)$row['id'];
			$booking_available_times['service_name'] 	= $row['service_name'];
			$booking_available_times['category_name'] 	= $row['category_name'];	
			$booking_available_times['employ_name'] 	= $row['employ_name'];
			$booking_available_times['start_time'] 		= $row['start_time'];
			$booking_available_times['end_time'] 		= $row['end_time'];
			
			$result[] = $booking_available_times;
		}

		return $result;
	}
	
	
	public function fetch_time_details($data)
	{
		
		$service_id = $data['service_id'];
		$category_id = $data['category_id'];
		$start_time = $data['start_time'];
		$end_time = $data['end_time'];
		$employ_id = $data['employ_id'];
		
		$query = $this->db->get_where('tbl_time_allocation', array('service_id' => $service_id,'category_id' => $category_id,'start_time' => $start_time,'end_time' => $end_time,'employ_id' => $employ_id ));

		$time_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$time_details['id'] 			= (integer)$row['id'];
			$time_details['service_id'] 	= $row['service_id'];
			$time_details['category_id'] 	= $row['category_id'];	
			$time_details['employ_id'] 		= $row['employ_id'];
			$time_details['start_time'] 	= $row['start_time'];
			$time_details['end_time'] 		= $row['end_time'];
			$time_details['member_id'] 		= $row['member_id'];
			$time_details['status'] 		= $row['status'];
			
		}

		return $time_details;
	}
	
	function get_booking_times($data = NULL)
	{
		$booking_time = array(
				'id' 				=> '',
				'service_id'		=> '',
				'category_id' 		=> '',
				'employ_id' 		=> '',
				'start_time' 		=> '',
				'end_time' 			=> '',
		
		);

		if (empty($data))
		{
			return $booking_time;
		}

		foreach ($booking_time as $k => $v)
		{
			if (isset($data[$k]))
			{
				$booking_time[$k] = $data[$k];
			}
		}

		return $booking_time;
	}

	
	function get_booking_register_details($data = NULL)
	{
		$booking_register = array(
				'id' 				=> '',
				'first_name'		=> '',
				'last_name' 		=> '',
				'address' 			=> '',
				'email' 			=> '',
				'phone_no' 			=> '',
				'mobile_no' 		=> '',
		
		);

		if (empty($data))
		{
			return $booking_register;
		}

		foreach ($booking_register as $k => $v)
		{
			if (isset($data[$k]))
			{
				$booking_register[$k] = $data[$k];
			}
		}

		return $booking_register;
	}
	
	
public function get_temp_booking_details()
	{
		
		$table = 'tbl_tmp_booking_details';
		$query = $this->db->get($table);

		$booking_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$booking_details['id'] 						= (integer)$row['id'];
			$booking_details['service_id'] 				= $row['service_id'];
			$booking_details['category_id'] 			= $row['category_id'];
			$booking_details['employ_id'] 	        	= $row['employ_id'];
			$booking_details['start_time'] 				= $row['start_time'];
			$booking_details['end_time'] 				= $row['end_time'];
			$booking_details['fixed_price'] 			= $row['fixed_price'];
			
		}

		return $booking_details;
		
			
	}
	
	
function confirm_booking_data($customer_id, $data)
	{
		$booking_register = array(
				'id' 				=> '',
				'service_id'		=> '',
				'category_id' 	=> '',
				'employ_id' 		=> '',
				'start_time' 		=> '',
				'end_time' 			=> '',
				'fixed_price' 		=> '',
				//'confirm_price' 	=> '',
				//'status' 			=> '',
		
		);

		if (empty($data))
		{
			return $booking_register;
		}

		foreach ($booking_register as $k => $v)
		{
			if (isset($data[$k]))
			{
				$booking_register[$k] = $data[$k];
			}
		}
		$booking_register['customer_id'] = $customer_id;
		
		return $booking_register;
	}
	
	
	public function fetch_customer_id($email)
	{
		$query = $this->db->get_where('tbl_booking_customers', array('email' => $email));

		$customer_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$customer_details['id'] 				= (integer)$row['id'];
			
		}

		return $customer_details;
	}
	
	public function fetch_selected_data($id)
	{
		$query = $this->db->get_where('tbl_time_allocation', array('id' => $id));

		$fetch_data = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$fetch_data['id'] 				= (integer)$row['id'];
			$fetch_data['service_id'] 		= $row['service_id'];
			$fetch_data['category_id'] 		= $row['category_id'];
			$fetch_data['start_time'] 		= $row['start_time'];
			$fetch_data['end_time'] 		= $row['end_time'];
			$fetch_data['employ_id'] 		= $row['employ_id'];
			
		}

		return $fetch_data;
	}
	
	public function fetch_selected_data_with_name($id)
	{
		$this->db->select("tbl_time_allocation.id as id,tbl_time_allocation.employ_id as employ_id,tbl_time_allocation.start_time as start_time,tbl_time_allocation.end_time as end_time,tbl_time_allocation.service_id as service_id,tbl_time_allocation.category_id as category_id,tbl_service_types.name as service_name,tbl_service_categories.name as category_name,tbl_main_employ_details.first_name as employ_name");
		$this->db->from("tbl_time_allocation");
		$this->db->join("tbl_main_employ_details", "tbl_time_allocation.employ_id = tbl_main_employ_details.id");
		$this->db->join("tbl_service_types","tbl_time_allocation.service_id = tbl_service_types.id");
		$this->db->join("tbl_service_categories","tbl_time_allocation.category_id = tbl_service_categories.id");
		
		$this->db->where('tbl_time_allocation.id', $id);
		
		$query = $this->db->get();

		$fetch_data = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$fetch_data['id'] 				= (integer)$row['id'];
			$fetch_data['service_name'] 	= $row['service_name'];
			$fetch_data['category_name'] 	= $row['category_name'];
			$fetch_data['start_time'] 		= $row['start_time'];
			$fetch_data['end_time'] 		= $row['end_time'];
			$fetch_data['employ_name'] 		= $row['employ_name'];
			
		}

		return $fetch_data;
	}

	public function fetch_service_price($service_id,$category_id)
	{
		$query = $this->db->get_where('tbl_service_price', array('service_id' => $service_id,'category_id' => $category_id));

		$service_price_details = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$service_price_details['id'] 				= (integer)$row['id'];
			$service_price_details['price'] 				= (integer)$row['price'];
			
		}

		return $service_price_details;
	}
	
	
	public function insert_booking_customer_details($customer_details)
	{
		$table = 'tbl_booking_customers';
		unset($customer_details['id']); // sanity
		$this->db->insert($table, $customer_details);
	}
	
	public function insert_customer_details($customer_details)
	{
		$table = 'tbl_customer_details';
		unset($customer_details['id']); // sanity
		$this->db->insert($table, $customer_details);
	}
	
	public function insert_booking_register_details($register_details)
	{
		$table = 'tbl_confirm_booking';
		unset($register_details['id']); // sanity
		$this->db->insert($table, $register_details);
	}

	/**
	 * Update Tip database record.
	 *
	 * @param tip	- k/v array of Tip data to update db.
	 * @return void
	 */
	function update_booking_register_details($register_details)
	{
		$table = 'tbl_confirm_booking';
		$id = $register_details['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $register_details);
	}
	
	function update_time_allocation_row($time_row)
	{
		$table = 'tbl_time_allocation';
		$id = $time_row['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $time_row);
	}
		
	// ---------------------------------------------------------------------------/
public function insert_tmp_booking_data($booking_details)
	{
	
		$table = 'tbl_tmp_booking_details';
		unset($booking_details['id']); // sanity
		$this->db->insert($table, $booking_details);
		
	}
	
	public function delete_temp_booking_row($id)
	{
		$table = 'tbl_tmp_booking_details';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership_model extends CI_Model {

   
	// ---------------------------------------------------------------------------/


	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}


	// ---------------------------------------------------------------------------/
	
	function validate($username, $password){
		
		$values = array('user_name' => $username, 'password' => $password);
		
		$query = $this->db->get_where('tbl_main_membership', $values);

		
		if($query->num_rows() == 1){
			return true;
		}
		
	}
	
public function fetch_memberships()
	{
		$table = 'tbl_main_membership';

		$query = $this->db->get($table);
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$membership = array();

			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$membership['id'] 				= (integer)$row['id'];
			$membership['first_name'] 		= $row['first_name'];
			$membership['last_name'] 		= $row['last_name'];
			$membership['telephone'] 		= $row['telephone'];
			$membership['user_name'] 		= $row['user_name'];
			$membership['password'] 		= $row['password'];
			$membership['email'] 			= $row['email'];
			
			
			$result[] = $membership;
		}

		return $result;
	}
	
	public function fetch_membership($id)
	{
		$table = 'tbl_main_membership';
		
		$query = $this->db->get_where($table, array('id' => $id));

		$membership = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$membership['id'] 				= (integer)$row['id'];
			$membership['first_name'] 		= $row['first_name'];
			$membership['last_name'] 		= $row['last_name'];
			$membership['telephone'] 		= $row['telephone'];
			$membership['user_name'] 		= $row['user_name'];
			$membership['password'] 		= $row['password'];
			$membership['email'] 			= $row['email'];
			
		}

		return $membership;
	}
	
public function fetch_membership_data($username)
	{
		$table = 'tbl_main_membership';
		
		$query = $this->db->get_where($table, array('user_name' => $username));

		$membership = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$membership['id'] 				= (integer)$row['id'];
			$membership['first_name'] 		= $row['first_name'];
			$membership['last_name'] 		= $row['last_name'];
			$membership['telephone'] 		= $row['telephone'];
			$membership['user_name'] 		= $row['user_name'];
			$membership['password'] 		= $row['password'];
			$membership['email'] 			= $row['email'];
			
		}

		return $membership;
	}
	
	function create_membership($data = NULL)
	{
		//print_r($data);
		$membership = array(
				'id' => 0,
				'first_name' => '',
				'last_name' => '',
				'telephone' => '',
				'user_name' => '',
				'password' => '',
				'email' => '',
		);

		if (empty($data))
		{
			return $membership;
		}

		foreach ($membership as $k => $v)
		{
			if (isset($data[$k]))
			{
				$membership[$k] = $data[$k];
			}
		}

		return $membership;
	}
function update_membership($membership)
	{
		$table = 'tbl_main_membership';
		$id = $membership['id'];
		$this->db->where('id', $id);
		$this->db->update($table, $membership);
	}
	
public function insert_membership($membership)
	{
		$table = 'tbl_main_membership';
		unset($membership['id']); // sanity
		$this->db->insert($table, $membership);
	}

	
public function delete_membership($id)
	{
		$table = 'tbl_main_membership';
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
}
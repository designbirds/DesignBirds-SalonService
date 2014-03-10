<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_model extends CI_Model {

   
	// ---------------------------------------------------------------------------/


	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}
	
	public function getLogoArray($member_id,$feature_id)
	{
		$query = $this->db->get_where('tbl_image_upload', array('member_id' => $member_id,'feature_id'=>$feature_id));
		//print_r($query);
		$image_uploade = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$image_uploade['id'] 				= (integer)$row['id'];
			$image_uploade['name'] 				= $row['name'];
			
		}
		return $image_uploade;
	}
	
	public function getFeatureId($feature_name)
	{
		$query = $this->db->get_where('tbl_main_features', array('name' => $feature_name));

		$feature_id = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$feature_id['id'] 				= (integer)$row['id'];
			
		}
		return $feature_id;
	}
	
	
	
	
	public function get_image_banner_array($id)
	{
		
		$query = $this->db->get_where('tbl_image_upload', array('id' => $id));

		$image_uploade = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$image_uploade['id'] 				= (integer)$row['id'];
			$image_uploade['name'] 				= $row['name'];
			$image_uploade['description'] 		= $row['description'];
			$image_uploade['alt'] 				= $row['alt'];
			
		}

		return $image_uploade;
	}
	
public function getMemberId($user_name)
	{
		$query = $this->db->get_where('tbl_main_membership', array('user_name' => $user_name));

		$user_id = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$user_id['id'] 				= (integer)$row['id'];
			
		}

		return $user_id;
	}
	
}
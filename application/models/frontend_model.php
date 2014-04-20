<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_model extends CI_Model {

   
	// ---------------------------------------------------------------------------/


	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}
	
	public function getLogoArray($member_id,$client_id)
	{
		$query = $this->db->get_where('tbl_logo_design', array('member_id' => $member_id, 'client_id' => $client_id));
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

	public function getCarousalArray($member_id,$client_id)
	{
		$table = 'tbl_carousal_design';

		$query = $this->db->get($table);
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$carousal = array();

			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$carousal['id'] 			= (integer)$row['id'];
			$carousal['name'] 			= $row['name'];
			
			$result[] = $carousal;
		}

		return $result;
	}
	
	public function getServicesArray($member_id,$client_id)
	{
		
		$this->db->select("tbl_service_images.id as id,tbl_service_images.name as name,tbl_service_images.member_id as member_id,tbl_service_images.client_id as client_id,tbl_service_images.category_id as category_id,tbl_service_images.description as description,tbl_service_images.alt as alt,tbl_service_images.priority as priority,tbl_main_client_details.first_name as client_name,tbl_main_membership.first_name as member_name");
		$this->db->from("tbl_service_images");
		$this->db->join("tbl_main_client_details", "tbl_service_images.client_id = tbl_main_client_details.id");
		$this->db->join("tbl_main_membership", "tbl_service_images.member_id = tbl_main_membership.id");


		$query = $this->db->get();
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$featured = array();
			
			$featured['priority'] 	= $row['priority'];
			if($row['priority'] == 0){
			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$featured['id'] 			= (integer)$row['id'];
			$featured['name'] 			= $row['name'];
			$featured['description'] 	= $row['description'];
			
			
			$result[] = $featured;
			}
		}

		return $result;
	}

	public function getFeaturedServicesArray($member_id,$client_id)
	{
		
		$this->db->select("tbl_service_images.id as id,tbl_service_images.name as name,tbl_service_images.member_id as member_id,tbl_service_images.client_id as client_id,tbl_service_images.category_id as category_id,tbl_service_images.description as description,tbl_service_images.alt as alt,tbl_service_images.priority as priority,tbl_main_client_details.first_name as client_name,tbl_main_membership.first_name as member_name");
		$this->db->from("tbl_service_images");
		$this->db->join("tbl_main_client_details", "tbl_service_images.client_id = tbl_main_client_details.id");
		$this->db->join("tbl_main_membership", "tbl_service_images.member_id = tbl_main_membership.id");


		$query = $this->db->get();
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$featured = array();
			
			$featured['priority'] 	= $row['priority'];
			if($row['priority'] == 1){
			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$featured['id'] 			= (integer)$row['id'];
			$featured['name'] 			= $row['name'];
			$featured['description'] 	= $row['description'];
			
			
			$result[] = $featured;
			}
		}

		return $result;
	}
	
	
		public function getRecentPhotosArray($member_id,$client_id)
	{
		
		$this->db->select("tbl_recent_images.id as id,tbl_recent_images.name as name,tbl_recent_images.member_id as member_id,tbl_recent_images.client_id as client_id,tbl_recent_images.category_id as category_id,tbl_recent_images.description as description,tbl_recent_images.alt as alt,tbl_main_client_details.first_name as client_name,tbl_main_membership.first_name as member_name");
		$this->db->from("tbl_recent_images");
		$this->db->join("tbl_main_client_details", "tbl_recent_images.client_id = tbl_main_client_details.id");
		$this->db->join("tbl_main_membership", "tbl_recent_images.member_id = tbl_main_membership.id");


		$query = $this->db->get();
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$recent = array();

			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.

			$recent['id'] 			= (integer)$row['id'];
			$recent['name'] 		= $row['name'];
			$recent['description'] 	= $row['description'];
			
			
			$result[] = $recent;
			
		}

		return $result;
	}
	
		public function getCommentsArray()
	{
		
		$this->db->select("tbl_comment_mgnt.id as id,tbl_comment_mgnt.comment as comment,tbl_comment_mgnt.status as status,tbl_customer_details.first_name as customer_name,tbl_customer_details.image_name as photo");
		$this->db->from("tbl_comment_mgnt");
		$this->db->join("tbl_customer_details", "tbl_comment_mgnt.email = tbl_customer_details.email");
		$this->db->order_by("id", "desc");

		$query = $this->db->get();
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$comment = array();
			$comment['status'] 		= $row['status'];
			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.
			if($row['status'] == 1){
			$comment['id'] 				= (integer)$row['id'];
			$comment['comment'] 		= $row['comment'];
			$comment['customer_name'] 	= $row['customer_name'];
			$comment['photo'] 			= $row['photo'];
			}else{
			$comment['id'] 				= '';
			$comment['comment'] 		= '';
			$comment['customer_name'] 	= '';
			$comment['photo'] 			= '';
			}
			$result[] = $comment;
			
		}

		return $result;
	}
	
public function getTestimonialsArray()
	{
		
		$this->db->select("tbl_testimonial_mgnt.id as id,tbl_testimonial_mgnt.testimonial as testimonial,tbl_testimonial_mgnt.status as status,tbl_customer_details.first_name as customer_name,tbl_customer_details.image_name as photo");
		$this->db->from("tbl_testimonial_mgnt");
		$this->db->join("tbl_customer_details", "tbl_testimonial_mgnt.email = tbl_customer_details.email");
		$this->db->order_by("id", "desc");

		$query = $this->db->get();
		
		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$testimonial = array();
			$testimonial['status'] 		= $row['status'];
			// Need to iterate over dataset keys in order to force
			// type-casting for later JSON encoding.
			if($row['status'] == 1){
			$testimonial['id'] 				= (integer)$row['id'];
			$testimonial['testimonial'] 	= $row['testimonial'];
			$testimonial['customer_name'] 	= $row['customer_name'];
			$testimonial['photo'] 			= $row['photo'];
			}else{
			$testimonial['id'] 				= '';
			$testimonial['testimonial'] 		= '';
			$testimonial['customer_name'] 	= '';
			$testimonial['photo'] 			= '';
			}
			$result[] = $testimonial;
			
		}

		return $result;
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
	
	public function getClientId($clientname)
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
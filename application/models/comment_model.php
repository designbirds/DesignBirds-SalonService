<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_model{
	
public function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}
	
public function fetch_comments(){
	
		$table = 'commentmng';
			$query = $this->db->get($table);

		$result = array();

		if ($query->num_rows() == 0)
		{
			return $result;
		}

		foreach ($query->result_array() as $row)
		{
			$comments = array();


			$comments['id'] 			= (integer)$row['id'];
			$comments['type'] 			= $row['type'];
			$comments['comment'] 		= $row['comment'];
			$comments['service'] 		= $row['service'];

			

			$result[] = $comments;
		}

		return $result;
}

function make_comments($data = NULL)
	{
		$comments = array(
				'id' 			=> '',
				'type' 			=> '',
				'service' 		=> '',
				'comment' 		=> '',
		);

		if (empty($data))
		{
			return $comments;
		}

		foreach ($comments as $k => $v)
		{
			if (isset($data[$k]))
			{
				$comments[$k] = $data[$k];
			}
		}

		return $comments;
	}
	
function insert_comments($comments)
	{
		unset($comments['id']); // sanity
		$this->db->insert('commentmng', $comments);
		return $this->db->insert_id();
	}
	
function update_comments($comments)
	{
		$id = $comments['id'];
		$this->db->where('id', $id);
		$this->db->update('commentmng', $comments);
	}
	
public function fetch_editcomments($id)
	{
		$query = $this->db->get_where('commentmng', array('id' => $id));

		$editdata = array();

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			$editdata['id'] 		= (integer)$row['id'];
			$editdata['type'] 		= $row['type'];
			$editdata['comment'] 	= $row['comment'];
			$editdata['service'] 	= $row['service'];
			
		}

		return $editdata;
	}

}

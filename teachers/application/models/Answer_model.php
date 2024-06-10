<?php

class Answer_model extends CI_Model
{

	private $tableName = "aanswers";

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getById($id)
	{
		$result = $this->db
			->get_where($this->tableName, array('id' => $id), 1)
			->row_array();
		return $result;
	}
	public function save($data) {
		$this->db->set($data);
		$insert = $this->db
			->insert($this->tableName);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}



}

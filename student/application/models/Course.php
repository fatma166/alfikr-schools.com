<?php

class Course extends CI_Model
{

	private $tableName = "courses";

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function get_courses(){
		$this->db
			->select('id , name');
//                ->group_by('id');

		$result = $this->db->
		get($this->tableName)->
		result_array();
		if (is_array($result)) {
			$data = array();
			foreach ($result as $row) {
				$data['name'][$row['id']] = $row['name'];
			}
			return $data['name'];
		} else {
			return $result;
		}
	}
}

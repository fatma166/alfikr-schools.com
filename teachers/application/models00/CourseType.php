<?php

class CourseType extends CI_Model
{

	private $tableName = "courses_types";

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function get_course_type(){
		$this->db
			->select('id , ar_name');
//                ->group_by('id');

		$result = $this->db->
		get($this->tableName)->
		result_array();
		if (is_array($result)) {
			$data = array();
			foreach ($result as $row) {
				$data['name'][$row['id']] = $row['ar_name'];
			}
			return $data['name'];
		} else {
			return $result;
		}
	}
}

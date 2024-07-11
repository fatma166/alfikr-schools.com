<?php

class Questionbank_model extends CI_Model {

	private $tableName = "qquestions";

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function save($data) {
		$this->db->set($data);
		$insert = $this->db
			->insert($this->tableName);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function getById($id,$table="") {
		$result = $this->db;
		if($table=="") {
			$result->get_where($this->tableName, array('id' => $id), 1);
		}else{
			$result->get_where($table, array('id' => $id), 1);
		}
		$result->row_array();
		return $result;
	}

	public function update($id, $data) {
		$this->db->where('id', $id);
		$result = $this->db->update($this->tableName, $data);
		return $result;
	}

	public function getAllData($data_search /*$search = NULL, $order = NULL, $orderType = 'desc',$published='all',$featured='all'*/, $t='result', $limit=0, $start=10) {
//print_r($data_search);
		/*if ($order) {
			$this->db->order_by($order, $orderType);
		} else {
			$this->db->order_by('q.id', $orderType);
		}
		if ($published !='all') {
			$this->db->where('brands_published',$published);
		}
		if ($featured !='all') {
			$this->db->where('brands_featured',$featured);
		}
		if ($search) {
			$this->db->like('name', $search);
		}*/


		/* $this->db->select('q.*, g.id as group_id, g.name, a.image as answer_image, a.answer, a.id as answer_id, a.is_correct, a.question_id as question_id');
		$this->db->from('qquestions q');
		$this->db->join('aanswers a', 'a.question_id = q.id', 'left');
		$this->db->join('questions_groups g', 'g.id = q.group_id', 'left');

		$query = $this->db->get($this->tableName);*/

		$this->db->select('q.id, q.title,q.parent_id,q.question_type,ct.ar_name,ct.parent_id as course_type_parent_id, c.ar_name as parent_course_type_ar_name, g.id as group_id, g.name, GROUP_CONCAT(a.id SEPARATOR "|") AS answer_ids, GROUP_CONCAT(a.answer SEPARATOR "|") AS answers, GROUP_CONCAT(a.is_correct SEPARATOR "|") AS is_correct ,ms.id as subject_id,ms.name as subject_name');
		$this->db->from('qquestions q');
		$this->db->order_by('q.id','asc');
		$this->db->join('aanswers a', 'a.question_id = q.id', 'left');
		$this->db->join(' courses g', 'g.id = q.group_id', 'left');
		$this->db->join('courses_types ct', 'ct.id = q.course_type', 'left'); //course_type
		$this->db->join('courses_types c', 'ct.parent_id = c.id', 'left');
		$this->db->join('main_subjects ms', 'ms.id = q.course_id', 'left');
		$this->db->order_by('q.id','DESC');
		$this->db->group_by('q.id');

		if(isset($data_search['_class'])&&$data_search['_class']!="all"){
			$this->db->where("q.course_type", $data_search['_class']);
		}elseif (isset($data_search['stages'])&&$data_search['stages']!="all"){
		//	$this->db->where("q.course_type", $data_search['stages']);
		}
		if(isset($data_search['group_id'])&&$data_search['group_id']!="all"){
			$this->db->where("group_id", $data_search['group_id']);
		}
		if(isset($data_search['subject_id'])&&$data_search['subject_id']!="all"){
			$this->db->where("course_id", $data_search['subject_id']);
		}
		/*if($t == 'result'){
			$this->db->limit($limit);
			$this->db->offset($start);
		}*/
		$query = $this->db->get();
//print_r($this->db->last_query());exit;
	//	print_r($query->result_array()); exit;
		$questions = array();
		$data=array();
		foreach ($query->result_array() as $row) {
			$questions[] = array(
				'id' => $row['id'],
				'title' => $row['title'],
				'group_id' => $row['group_id'],
				'group_name' => $row['name'],
				'parent_id' => $row['parent_id'],
				'question_type' => $row['question_type'],
				'ar_name' => $row['ar_name'],
				'parent_course_type_ar_name' => $row['parent_course_type_ar_name'],
				'answers' => !is_null($row['answer_ids']) && !is_null($row['answers'])
					? array_combine(
						explode('|', $row['answer_ids']),
						array_map('trim', explode('|', $row['answers']))
					)
					: [],
				'is_correct' => !is_null($row['is_correct'])
					? array_combine(
						explode('|', $row['answer_ids']),
						array_map('trim', explode('|', $row['is_correct']))
					)
					: [],
			);
		}



		if (count($questions)> 0) {
			foreach ($questions as $parentId => $childQuestions) {

				if ($childQuestions['parent_id'] > 0) {
					// This is a child question, add it to the parent
					$data[$childQuestions['parent_id']][] = $childQuestions;

				} else {
					// This is a parent question
					$data[$childQuestions['id']][] = $childQuestions;
				}


			}

		}
		//}
		//print_r($data); exit;
		//return $questions;

		if ($t=='result') {
			$data = array_slice($data, $start, $limit);
			return $data;
		} else {

			//	return $data->num_rows();
			return(count($data));
		}
	}


	public function getSortingData() {

		$this->db->select('id,name,logo,sorting');
		$this->db->order_by('sorting');
		$this->db->where('brands_published',1);
		$this->db->where('brands_featured',1);
		$this->db->limit(11);
		$result = $this->db
			->get($this->tableName);

		return $result->result_array();
	}


	public function deleteRecord($id){
		$result = $this->db->delete($this->tableName,  array('id'=>$id));
		return $result;
	}

	function publish($id,$data) {
		$this->db->where('id', $id);
		$this->db->update($this->tableName, $data);
	}
	function feature($id,$data) {
		$this->db->where('id', $id);
		$this->db->update($this->tableName, $data);
	}
	function getmodelImg($id){
		$this->db
			->select("logo")
			->from($this->tableName)
			->where('id',$id);
		$result = $this->db->get()->result_array();
		return $result;
	}
	function get_course_type(/*$limit, $start*/ ) {
		//$this->db->limit($limit, $start);
		$query = $this->db->get('courses_types');

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				if($row->parent_id > 0 ){$in = 5;
					$data[$row->parent_id][] =  $row;
				}else{
					$data[$row->id] = array($row);
				}

			}
			return $data;
		}
		return false;
		//return $query->result();
	}
	function get_select($table,$where) {
		//$this->db->limit($limit, $start);
		if(count($where)>0){
			foreach($where as $key=>$value) {
				$this->db->where($key, $value);
			}
		}
		$data= $this->db->get($table)->result_array();
		//print_r($this->db->last_query());exit;
		//print_r($data); exit;
		return $data;

		//return $query->result();
	}
}

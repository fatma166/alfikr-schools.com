<?php

class Exam_model extends CI_Model {

	private $tableName = "exams_";

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function save($data,$table="") {

		$this->db->set($data);
		if($table=="") {
			$insert = $this->db
				->insert($this->tableName);
		}else{
			$insert = $this->db
				->insert($table);
		}
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function getById($id,$table="") {
		$this->db->select('e.id, e.title,e.active,e.minutes,e.degree,e.details,e.type,e.start_date,e.end_date,ct.ar_name,ct.parent_id as course_type_parent_id,c.ar_name as parent_course_type_ar_name,g.id as group_id,g.name,ms.id as subject_id,ms.name as subject_name');
		$this->db->from('exams_ e');
		$this->db->order_by('e.id','asc');

		$this->db->join(' courses g', 'g.id = e.group_id', 'left');
		$this->db->join('main_subjects ms', 'ms.id = e.main_subject_id', 'left');
		$this->db->join('courses_types ct', 'ct.id = e.course_id', 'left'); //course_type
		$this->db->join('courses_types c', 'ct.parent_id = c.id', 'left');


		$this->db->group_by('e.id');
		if($table=="") {

			$result=$this->db->get_where($this->tableName, array('e.id' => $id),1);
		}else{
			$result=$this->db->get_where($table, array('e.id' => $id), 1);
		}

		//print_r($this->db->last_query());exit;
		//$result->row();
		//	print_r($result->get()->row_array()); exit;
		if( $result->num_rows() > 0 )
		{
			return $result->row_array();
		}else{
			return (array());
		}
		//$result->fetch_assoc();
		//return $result;
	}
	public function getattend($id){

		$result=$this->db->select('e.id, e.title,e.degree,e.active,e.minutes,e.details,e.type,e.start_date,e.end_date,s.first_name,s.last_name,s.mobile,er.student_id,er.exam_id,er.mark,er.date,er.percentage')
			->from('exams_results er')
			->where('er.exam_id',$id)
			->join('exams_ e', 'e.id=er.exam_id', 'left')
			->join('students  s', 's.id = er.student_id', 'left')

			->get()->result_array();
		//	print_r($this->db->last_query()); exit;
		//	print_r($result); exit;
		return $result;
	}
	public function getnotattend($id){

		$result = $this->db->select('s.first_name, s.last_name, s.mobile, er.student_id, er.exam_id, er.mark, er.date, er.percentage')
			->from('students s')
			->join('exams_results er', 's.id = er.student_id', 'left outer')

			// ->where('er.exam_id', $id) and er.exam_id != ' . $id
			->where('er.student_id IS NULL')//and er.exam_id != ' . $id
			->get()
			->result_array();
//print_r($result); exit;   
		// print_r($this->db->last_query()); exit;
		return $result;
	}
	public function getmarks($id,$type="single"){
		if($type=="single"){
			$this->db->select('max(er.mark) AS max_marks');
		}else{
			$this->db->select('SUM(er.mark) AS total_marks');
		}

		$marks=$this->db->from('exams_results er')
			->where('er.exam_id',$id)
			->get()->row_array();
//print_r($marks); exit;
		return($marks);
	}
	public function update($id, $data) {
		$this->db->where('id', $id);
		$result = $this->db->update($this->tableName, $data);
		return $result;
	}

	public function getAllData($data_search /*$search = NULL, $order = NULL, $orderType = 'desc',$published='all',$featured='all'*/, $t='result', $limit=10, $start=0) {

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
		if(isset($data_search['stages'])&&($data_search['stages']!="all")){
			//$this->db->where("course_type", $data_search['stages']);
			$this->db->where("course_id", $data_search['_class']);
		}

		if(isset($data_search['group_id'])&&($data_search['group_id']!="all")){
			$this->db->where("group_id", $data_search['group_id']);
		}

		if($data_search['main_subject_id']&&($data_search['main_subject_id']!="all")){
			$this->db->where("main_subject_id", $data_search['main_subject_id']);
		}
		if($data_search['type_id']&&($data_search['type_id']!="all")){

			$this->db->where("type_id", $data_search['type_id']);
		}

		/* $this->db->select('q.*, g.id as group_id, g.name, a.image as answer_image, a.answer, a.id as answer_id, a.is_correct, a.question_id as question_id');
		$this->db->from('qquestions q');
		$this->db->join('aanswers a', 'a.question_id = q.id', 'left');
		$this->db->join('questions_groups g', 'g.id = q.group_id', 'left');

		$query = $this->db->get($this->tableName);*/

		$this->db->select('e.id, e.title,e.active,e.minutes,e.details,e.type,e.degree,e.start_date,e.end_date,e.main_subject_id,ct.ar_name,ct.parent_id as course_type_parent_id, c.ar_name as parent_course_type_ar_name, g.id as group_id, g.name,ms.id as subject_id,ms.name as subject_name,er.student_id as er_student_id,er.exam_id as er_exam_id ,er.id as er_id,er.mark as student_mark, er.date as exam_date');
		$this->db->from('exams_ e');
		$this->db->order_by('e.id','asc');

		$this->db->join('courses g', 'g.id = e.group_id', 'left');
		$this->db->join('courses_types ct', 'ct.id = e.course_id', 'left'); //course_type
		$this->db->join('courses_types c', 'ct.parent_id = c.id', 'left');
		$this->db->join('main_subjects ms', 'ms.id = e.main_subject_id', 'left')
			->join('exams_results er','e.id =er.exam_id', 'left outer');
		if(isset($data_search['student_id'])){
			$this->db->where('er.student_id',$data_search['student_id']);
		}
		if(isset($data_search['today'])){

			$today = date('Y-m-d');
			//$start_of_day = $today . ' 00:00:00';
			//$end_of_day = $today . ' 23:59:59';
			$this->db->where('er.date', $today);
			//->where('er.date <=', $end_of_day);
		}
		$this->db->where('e.deleted_at IS NULL');
		$this->db->group_by('e.id');
		if($t == 'result'){
			$this->db->limit($limit);
			$this->db->offset($start);
		}
		$data = $this->db->get();
		if(isset($data_search['today'])) {
//print_r($this->db->last_query());exit;
		}
		//print_r($data->result_array()); exit;
		$questions = array();





		//}
		//print_r($data); exit;
		//return $questions;

		if ($t=='result') {
			//	$data = array_slice($data, $start, $limit);
			return $data->result_array();
		} else {
			return $data->num_rows();
			//return(count($data->result_array()));
		}
	}



	public function get_exam_question($data_search,$id,$t='result',$limit=10,$start=0){
		$this->db->select('q.id as qid, q.title as qtitle, q.parent_id, q.question_type, e.id, e.title, e.active, e.minutes, e.details, e.type, e.start_date, e.end_date, ct.ar_name, ct.parent_id as course_type_parent_id, c.ar_name as parent_course_type_ar_name,
                   (SELECT GROUP_CONCAT(a.id SEPARATOR "|") FROM aanswers a WHERE a.question_id = q.id) AS answer_ids,
                   (SELECT GROUP_CONCAT(a.answer SEPARATOR "|") FROM aanswers a WHERE a.question_id = q.id) AS answers,
                   (SELECT GROUP_CONCAT(a.is_correct SEPARATOR "|") FROM aanswers a WHERE a.question_id = q.id) AS is_correct');
		$this->db->from('qquestions q');
		$this->db->join('exams_questions eq', 'eq.question_id = q.id OR eq.question_id = q.parent_id', 'left');
		$this->db->join('exams_ e', 'e.id = eq.exam_id', 'left');
		$this->db->join('courses_types ct', 'ct.id = e.course_id', 'left');
		$this->db->join('courses_types c', 'ct.parent_id = c.id', 'left');
		$this->db->where('eq.exam_id', $id);
		$this->db->order_by('eq.ordering', 'asc');
		$query = $this->db->get();
		$questions = array();
		$data=array();
		foreach ($query->result_array() as $row) {
			$questions[] = array(
				'eid' => $row['id'],
				'etitle' => $row['title'],
				'active' => $row['active'],
				'minutes' => $row['minutes'],
				'details' => $row['details'],
				'type' => $row['type'],
				'start_date' => $row['start_date'],
				'end_date' => $row['end_date'],
				'id' => $row['qid'],
				'title' => $row['qtitle'],
				'question_type' => $row['question_type'],
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
		return($data);
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
		$data = array(
			'deleted_at' => date('Y-m-d H:i:s')
		);
		$result=$this->db->where('id',$id)
			->update($this->tableName,$data);

		return $result;
	}
	public function getBrandsByIds($ids){
		$this->db
			->select("id,name")
			->from($this->tableName);
		$this->db->where_in('id',$ids);
		$result = $this->db
			->get()->result_array();
		$data = array();
		if (is_array($result)) {
			foreach ($result as $item){
				$one = array();
				$one['id']=$item['id'];
				$one['text']=$item['name'];
				array_push($data, $one);
			}
			return $data;
		} else {
			return FALSE;
		}

	}

	public function getBrandsNames(){
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

	public function total() {
		$query = $this->db->get('brands')->num_rows();
		return $query;
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
	function insertBatch_($data_to_insert, $table){
		$this->db->insert_batch($table,$data_to_insert);
	}
	public function get_correct_answers($data_posted, $student_id)
	{
		$this->db->select('q.degree');
		$this->db->from('students_questions_answers a');
		$this->db->join('qquestions q', 'a.question_id = q.id');
		$this->db->join('aanswers ma', 'a.answer = ma.id');
		$this->db->where_in('a.question_id', array_keys($data_posted['selectedAnswers']));
		$this->db->where('a.student_id', $student_id);
		$this->db->where('ma.is_correct', 1);
		$query = $this->db->get();

		$total_score = 0;
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$total_score += $row->degree;
			}
		}

		return $total_score;
	}
}

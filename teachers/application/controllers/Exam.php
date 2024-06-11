<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
use CodeIgniter\HTTP\Response;
class Exam extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->lang->load('arabic');
		$this->load->model('Exam_model');
		$this->load->model('CourseType');
		$this->load->model('Course');
		$this->load->model('Answer_model');

		$this->load->library('session');
		$this->load->library('form_validation');


	}

	public function getquestion() {

		$page = $this->input->get('page');
		$this->load->library('pagination');
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></div>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] =  $this->lang->line('Next');
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = $this->lang->line('Previous');
		$config['prev_tag_open'] =  '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$data_search ['stages'] = $this->input->get('course_type');

		//$data_search ['_class'] = (isset($_REQUEST['_class'])) ? $_REQUEST['_class'] : '';
		$data_search ['group_id'] =$this->input->get('group_id');;
		/*	$data['order'] = (isset($_REQUEST['order'])) ? $_REQUEST['order'] : 'q.id';
			$data['order_type'] = (isset($_REQUEST['order_type'])) ? $_REQUEST['order_type'] : 'DESC';

			$data['by_published'] = (isset($_REQUEST['by_published'])) ? $_REQUEST['by_published'] : 'all';*/
		//$data_search ['by_featured'] = (isset($_REQUEST['by_featured'])) ? $_REQUEST['by_featured'] : 'all';

		if (isset($_GET['page']))
		{
			//	$page = $this->input->post('page');
			$postion_row = ($page) * 1;
			$item_per_page = 1;
		} else
		{

			$postion_row = 0;
			$item_per_page = 1;
		}
		$start = ($page - 1) * $config['per_page'];
		$limit = $config['per_page'];
		$result = $this->Exam_model->getAllData($data_search , 'result', $limit , $start);

		//$config['total_rows'] =count($result) ;//$this->Questionbank_model->getAllData($data['search_string'], $data['order'], $data['order_type'], $data['by_published'], $data['by_featured'], 'total', $config["per_page"], $page);
		$config['total_rows'] =/*ceil(*/$this->Exam_model->getAllData($data_search,'total',$item_per_page,$postion_row);//$item_per_page)-1;

		$q = http_build_query($data_search) . "\n";
		$config['base_url'] = base_url() . 'exam/add/?' . $q;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		//print_r($data['paging']); exit;

		$data['query'] = $result;
print_r($data);

		if ($this->input->is_ajax_request()) {
			$this->load->view('exam/partails/questions', $data);
		}else{
			$vars['com_title'] = $this->lang->line('question_bank');
			$vars['right_menu']= $this->Users_per->fetch_right_menu();
			$vars['com_content'] = $this->load->view('exam/add_exam', $data, true);
			$this->load->view('teacher_temp', $vars);
		}

	}


	public function add() {
		$data['course_types'] = $this->Exam_model->get_course_type();
		//print_r($data); exit;
		$data['courses'] = $this->Course->get_courses();
		$data['questions_groups'] = $this->Exam_model->get_select('questions_groups',array());

		$vars['right_menu']= $this->Users_per->fetch_right_menu();
		$vars['com_title'] = $this->lang->line('exams') . ' - ' . $this->lang->line('add');
		$vars['com_content'] = $this->load->view('exam/add_exam', $data, true);
		$this->load->view('teacher_temp', $vars);
	}
	public function edit(){
		$id = $this->uri->segment(3);
		$result = $this->brands_model->getById($id);
		$data['query']=$result;
		$data['options_brands'] = $this->brands_model->getBrandsNames();
		$this->load->library('assign_albums');
		$vars['com_title'] = $this->lang->line('brands') . ' - ' . $this->lang->line('edit');
		$vars['com_content'] = $this->load->view('brands/form', $data, true);
		$this->load->view('admin', $vars);
	}

	public function save() {

		$this->load->library('form_validation');

		$data=$_POST; print_r($data); exit;
		$checkedQuestions = array_filter($this->input->post('check'));
		$questionOrderValues = array_intersect_key($this->input->post('arrange'), $checkedQuestions);
		foreach ($checkedQuestions as $index => $value) {
			$this->form_validation->set_rules('check[' . $index . ']', 'Checkbox ' . $index, 'in_list['.$value.']');
			$this->form_validation->set_rules('arrange[' . $index . ']', 'Question Order ' . $index, 'required|numeric');
		}
		if ($this->form_validation->run() == false) {
			$errors = $this->form_validation->error_array();
			return $this->output
				->set_content_type('application/json')
				->set_status_header(500)
				->set_output( json_encode(array(
					'errors' => $errors,
					'message' => 'validation error !!!'
				)) );
		}


		//print_r($this->input->post()); exit;

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			/*if(!empty($_POST['media'])){
				foreach($_POST['media'] as $ques_index=>$media) {
					if (!empty($_FILES['logo']['name'])) {
						$updateResult = $this->upload('logo');
						if (isset($updateResult['error'])) {
//                    TODO fix how the error appeared
							var_dump($updateResult['error']);
						} else {
							$tosave['logo'] = $updateResult['path'];
						}
					}
				}
			}*/

			/*if(empty($_POST['alias'])) $_POST['alias'] = $this->alias($_POST['name']);
	//            add rules for form validation
				$this->form_validation->set_rules('alias', 'Alias', 'is_unique[brands.alias]');
				$this->form_validation->set_rules('name', 'name', 'required');
				$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');*/
			//if ($this->form_validation->run()) {



				$exam=array();
				$exam_notes=array();
				$exam_question=array();
			$exam['title']=$data['title'];
			$exam['course_id']=$data['course_types_class'];
				$exam['group_id']=$data['question_group_id'];
				$exam['	minutes']=$data['time'];
				$exam['start_date']=$data['start_date'];
				$exam['end_date']=$data['end_date'];
				$exam['added_by']= $this->session->userdata('teacher_id');
				$exam['degree']= $data['degree'];
				$exam['pass_degree']= $data['passdegree'];
				$exam['question_count']= $data['question_count'];
				$exam_id= $this->Exam_model->save($exam);
			foreach ($data['notes'] as $i=>$note){
				$exam_notes['exam_id']=$exam_id;
				$exam_notes['notes']=$note;
				$this->Exam_model->save($exam,'exam_notes');

			}
				foreach ($data['check'] as $index=>$check){
					$child_question_arr=array();
					$child_question_arr['course_type']=$data['course_types_stages'];
					$child_question_arr['group_id']=$data['question_group_id'];
					$child_question_arr['parent_id']=$parent_question_id;
					$child_question_arr['title']=$child_question[0];
					//$child_question_arr['image']=$data['list_media_main_paths'];
					$child_question_arr['teacher_id']= $this->session->userdata('teacher_id');
					$child_question_id= $this->Questionbank_model->save($child_question_arr);
					foreach ($data['list_answer'][$child_quest_index] as $ans_index=>$ans_value){
						$answer_arr['question_id']=$child_question_id;
						$answer_arr['answer']=$ans_value;
						$answer_arr['image']=$data['list_media_paths'][$child_quest_index][$ans_index];
						$answer_arr['is_correct']=($data['list_correct_answer'][$child_quest_index][$ans_index]==1)?1:0;
						$this->Answer_model->save($answer_arr);
					}


				}




		}
		echo json_encode(array('sucess'=>"done"));
		//	return("sucess");
	}

	public function update($id = NULL) {
		if (!is_null($id)) {
			if ($this->input->server('REQUEST_METHOD') === 'POST') {

				if (!empty($_FILES['logo']['name'])) {
					$updateResult = $this->upload('logo');
					if (isset($updateResult['error'])) {
//                    TODO fix how the error appeared
						var_dump($updateResult['error']);
					} else {
						$tosave['logo'] = $updateResult['path'];
					}
				}

				if(empty($_POST['alias'])) $_POST['alias'] = $this->alias($_POST['name']);
//            add rules for form validation
				$this->load->library('updateunique');
				$ui=  $this->updateunique->unique($_POST['alias'],'brands.alias.id.'.$id);
//             var_dump($ui);die;
				if ($ui ==TRUE) {
					$this->form_validation->set_rules('name', 'name', 'required');
					$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
					if ($this->form_validation->run()) {
						$tosave['name'] = $this->input->post('name');
						if ($this->input->post('brands_featured') == 'on') {
							$tosave['brands_featured'] = TRUE;
						} else {
							$tosave['brands_featured'] = FALSE;
						}
						if ($this->input->post('brands_published') == 'on') {
							$tosave['brands_published'] = TRUE;
						} else {
							$tosave['brands_published'] = FALSE;
						}
						$tosave['album_id'] = $this->input->post("album_id");
						$tosave['keywords'] = $this->input->post("keywords");
						$tosave['meta_desc'] = $this->input->post("meta_desc");
						$tosave['alias'] = $this->input->post("alias");
						$createUser = $this->ion_auth->user()->row();
						$tosave['update_time'] = date('m/d/Y h:i:s a', time());
						$tosave['update_by'] = $createUser->username;
//                    $comma_separated = implode(",", $this->input->post('brands_id'));
//                    $tosave['brands_id'] = $comma_separated;
						if ($this->brands_model->update($id, $tosave)) {
							redirect('brands');
						} else {
							$data['flash_message'] = FALSE;
						}
					}
				} else {
					$error= FALSE;
				}
			}

			$result = $this->brands_model->getById($id);
			$data = array(
				'query' => $result,
			);
			if (isset($error)){
				$data['flash_message'] = $error;}
			$data['options_brands'] = $this->brands_model->getBrandsNames();
			$vars['com_content'] = $this->load->view('brands/update', $data, true);
			$this->load->view('admin', $vars);
		}
	}

	public function delete_media(){
		//$id = $this->uri->segment(3);
		//	$model_image=$this->brands_model->getmodelImg($id);
		//$image_name=$model_image[0]['logo'];
		$images=$this->input->post('mediaPathsValues');

		foreach ($images as $image){
			if($image!='')
				@unlink('./../'.$image );
			//$this->Questionbank_model->deleteRecord($);
			//redirect('brands');
			echo "done";
		}

	}

	private function upload($name)
	{
		$config['upload_path'] = './images/question_bank/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '10000000';
		$config['max_width'] = '2048';
		$config['max_height'] = '2048';
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($name)) {
			return array('error' => $this->upload->display_errors());
		} else {
			$data = $this->upload->data();
			return array('path' => 'images/question_bank/' . $data['file_name']);
		}
	}

	public function upload_ajax()
	{

		//print_r($_FILES);
		if($this->input->post('question_type')=='list_media'){
			if (!empty($_FILES['list_media']['name'][0])) {

				$result = $this->upload('list_media');
				//print_r($result); exit;
				if (isset($result['path'])) {
					echo json_encode($result);
				} else {
					echo json_encode(array('error' => 'Error uploading file.'));
				}
			} else {
				echo json_encode(array('error' => 'No file selected.'));
			}
		}elseif($this->input->post('question_type')=='media'){
			if (!empty($_FILES['media']['name'][0])) {

				$result = $this->upload('media');
				//print_r($result); exit;
				if (isset($result['path'])) {
					echo json_encode($result);
				} else {
					echo json_encode(array('error' => 'Error uploading file.'));
				}
			} else {
				echo json_encode(array('error' => 'No file selected.'));
			}
		}else{
			if (!empty($_FILES['list_media_main']['name'][0])) {

				$result = $this->upload('list_media_main');
				//print_r($result); exit;
				if (isset($result['path'])) {
					echo json_encode($result);
				} else {
					echo json_encode(array('error' => 'Error uploading file.'));
				}
			} else {
				echo json_encode(array('error' => 'No file selected.'));
			}
		}

	}

	public function publish($id, $s) {
		if ($s == 'true') {
			$s = 1;
		} else {
			$s = 0;
		}
		$record['brands_published'] = $s;
		$this->brands_model->publish($id, $record);
		redirect('brands');
	}

	public function feature($id, $s) {
		if ($s == 'true') {
			$s = 1;
		} else {
			$s = 0;
		}
		$record['brands_featured'] = $s;
		$this->brands_model->feature($id, $record);
		redirect('brands');
	}


	public	function edit_unique($value, $params)
	{
		$CI =& get_instance();
		$CI->load->database();

		$CI->form_validation->set_message('edit_unique', "Sorry, that %s is already being used.");

		list($table, $field, $current_id) = explode(".", $params);

		$query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();

		if ($query->row() && $query->row()->id != $current_id)
		{
			return FALSE;
		}
	}

	public	function sorting()
	{
		$data['query'] = $this->brands_model->getSortingData();
		$vars['com_title'] = 'Sorting featured brandss';
		$vars['sorting'] = true;
		$vars['com_content'] = $this->load->view('brands/sorting', $data, true);
		$this->load->view('admin', $vars);

	}

	public function sortingsave(){
		if(isset($_POST)){
			$data = array();
			foreach($_POST as $id=>$s){
				$data[] = array('brands_id'=>$id , 'sorting'=>$s);
			}
			//print_r($data);
			$this->load->database();
			$this->db->update_batch('brands', $data, 'brands_id');
			//echo 'the items sorted successfully';
		}else{
			echo 'error in sorting please try again';
		}

	}
	public function getchild_stage(){

		$this->Questionbank_model->get_course_type();
		$data=$this->Questionbank_model->get_select('courses_types',array('parent_id'=>$_GET['stage_id']));
		$response = array();
		foreach ($data as $option) {
			$response[] = array(
				'id' => $option['id'],
				'ar_name' => $option['ar_name']
			);
		}
		echo (json_encode($response));
	}


}

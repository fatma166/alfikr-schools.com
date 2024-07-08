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
		$this->load->model('Questionbank_model');

		$this->load->library('session');
		$this->load->library('form_validation');


	}

	public function index() {

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
		$data_search ['stages'] = (isset($_REQUEST['stages'])) ? $_REQUEST['stages'] : '';
		$data_search ['_class'] = (isset($_REQUEST['_class'])) ? $_REQUEST['_class'] : '';
		$data_search ['group_id'] = (isset($_REQUEST['group_id'])) ? $_REQUEST['group_id'] : '';
		//print_r($data_search); exit;
		/*	$data['order'] = (isset($_REQUEST['order'])) ? $_REQUEST['order'] : 'q.id';
			$data['order_type'] = (isset($_REQUEST['order_type'])) ? $_REQUEST['order_type'] : 'DESC';

			$data['by_published'] = (isset($_REQUEST['by_published'])) ? $_REQUEST['by_published'] : 'all';*/
		$data_search ['by_featured'] = (isset($_REQUEST['by_featured'])) ? $_REQUEST['by_featured'] : 'all';

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
		$config['base_url'] = base_url() . 'exam/index/?' . $q;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		//print_r($data['paging']); exit;
		$data['course_types'] = $this->Exam_model->get_course_type();
		//print_r($data); exit;
		$data['courses'] = $this->Course->get_courses();
		$data['questions_groups'] = $this->Exam_model->get_select('questions_groups',array());
		$data['query'] = $result;
//print_r($data); exit;

		if ($this->input->is_ajax_request()) {
			$this->load->view('exam/partails/_table', $data);
		}else{
			$vars['com_title'] = $this->lang->line('exams');
			$vars['right_menu']= $this->Users_per->fetch_right_menu();
			$vars['com_content'] = $this->load->view('exam/exams.php', $data, true);
			$this->load->view('teacher_temp', $vars);
		}

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
		$data_search ['stages'] = (isset($_REQUEST['stages'])&&$_REQUEST['stages']!='') ? $_REQUEST['stages'] : "all";

		//$data_search ['_class'] = (isset($_REQUEST['_class'])&&$_REQUEST['_class']!='') ? $_REQUEST['_class'] : "all";
		$data_search ['group_id'] = (isset($_REQUEST['group_id'])&&$_REQUEST['group_id']!='') ? $_REQUEST['group_id'] : "all";
		$data_search ['subject_id'] = (isset($_REQUEST['subject_id'])&&$_REQUEST['subject_id']!='') ? $_REQUEST['subject_id'] : "all";

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

		$result= $this->Questionbank_model->getAllData($data_search,'result', $limit , $start);
//print_r($result); exit;
		//$config['total_rows'] =count($result) ;//$this->Questionbank_model->getAllData($data['search_string'], $data['order'], $data['order_type'], $data['by_published'], $data['by_featured'], 'total', $config["per_page"], $page);
		$config['total_rows'] =/*ceil(*/$this->Questionbank_model->getAllData($data_search,'total',$item_per_page,$postion_row);//$item_per_page)-1;

		$q = http_build_query($data_search) . "\n";
		$config['base_url'] = base_url() . 'exam/add/?' . $q;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		//print_r($data['paging']); exit;

		$data['query'] = $result;
//print_r($data);

		if ($this->input->is_ajax_request()) {
			$this->load->view('exam/partails/questions', $data);
		}else{
			$vars['com_title'] = $this->lang->line('question_bank');
			$vars['right_menu']= $this->Users_per->fetch_right_menu();
			$vars['com_content'] = $this->load->view('exam/add_exam', $data, true);
			$this->load->view('teacher_temp', $vars);
		}

	}
	public function get_exam_question(){
		$page = $this->input->get('page');
		$config['per_page'] = 10;
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
		$data_search=array();
		$id=$this->input->post('id');
		$data['query'] = $this->Exam_model->get_exam_question($data_search ,$id, 'result', $limit , $start);
		//print_r($data['query'] ); exit;
		$data['exam_question']="details";
		//print_r($result);
		if(isset($_POST['question_type'])&& $_POST['question_type']=="details"){
			//print_r($data); exit;
			$this->load->view('questions-bank/partails/_table', $data);
		}

	}

	public function delete() {
		$id = $this->uri->segment(3);
		$this->Exam_model->deleteRecord($id);
		redirect('exam/index');
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

		$data=$_POST;
		//	print_r($data);

		/*$this->form_validation->set_rules('checkedIds', 'Checked IDs', 'required|is_array');
		$this->form_validation->set_rules('arrangeValues', 'Arrange Values', 'required|is_array');*/

		$checkedIds= json_decode($this->input->post('checkedIds'), true);
		if(count($checkedIds)!=0) {

			foreach ($checkedIds as $checkedId) {
				$this->form_validation->set_rules("arrange[$checkedId]", "Arrange Input for Checkbox $checkedId", 'required');
			}
		}elseif(isset($data['list_title_main'][0][0])&&(empty($data['list_title_main']) && $data['list_title_main'][0][0] == null)&&(empty($data['title']) && $data['title'][0][0] == null) ){
			$this->form_validation->set_rules("arrange", "Arrange Input for Checkbox", 'required');
		}
		//if(isset($data['list_title_main'])&& $data['list_title_main']!="") {
		if (!empty($data['list_title_main']) && $data['list_title_main'][0][0] !== null) {
			//$this->form_validation->set_rules('list_title_main', 'Parent Question', 'required');
			$this->form_validation->set_rules('list_arrange', 'list_arrange', 'required');
			for ($i = 0; $i < count($this->input->post('list_answer')); $i++) {
				$this->form_validation->set_rules('list_quest[' . $i . '][]', 'list_quest'. ($i + 1), 'required');

				$this->form_validation->set_rules('list_answer[' . $i . '][]', 'list_answer ' . ($i + 1), 'required');
				//$this->form_validation->set_rules('list_media_paths[' . $i . '][]', 'list_media_paths ' . ($i + 1), 'required');
				//	$this->form_validation->set_rules('list_answer[' . $i . '][]', 'list_answer ' . ($i + 1), 'required_without:list_media_paths[' . $i . '][]');
				//	$this->form_validation->set_rules('list_media_paths[' . $i . '][]', 'list_media_paths ' . ($i + 1), 'required_without:list_answer[' . $i . '][]');
				//$this->form_validation->set_rules('list_correct_answer[' . $i . '][]', 'list_correct_answer' . ($i + 1), 'required');
			}
		}
		//if(isset($data['title'])&& (count(end($data['title']))> 0)) {
		if (isset($data['title'][0][0])&&!empty($data['title']) && $data['title'][0][0] != null&& $data['title'][0][0]!="") {


			for ($i = 0; $i < count($this->input->post('answer')); $i++) {
				//	for ($j = 0; $j < count($data['title'][$i]); $j++) {

				$this->form_validation->set_rules('title[' . $i . '][]', 'Question' . ($i + 1), 'required');
				$this->form_validation->set_rules('free_arrange[' . $i . ']', 'free_arrange' . ($i + 1), 'required');

				$this->form_validation->set_rules('answer[' . $i . '][]', 'answer ' . ($i + 1), 'required');
				//	$this->form_validation->set_rules('answer[' . $i . '][]', 'answer ' . ($i + 1), 'required_without[answer[' . $i . '][], media_paths[' . $i . '][]');
				//	$this->form_validation->set_rules('media_paths[' . $i . '][]', 'media_paths ' . ($i + 1), 'required_without[answer[' . $i . '][], media_paths[' . $i . '][]');
				//	$this->form_validation->set_rules('answer[' . $i . '][' . $j . ']', 'answer ' . ($i + 1) . ' - Option ' . ($j + 1), 'required_without:media_paths[' . $i . '][' . $j . ']');
				//	$this->form_validation->set_rules('media_paths[' . $i . '][' . $j . ']', 'media_paths ' . ($i + 1) . ' - Option ' . ($j + 1), 'required_without:answer[' . $i . '][' . $j . ']');
				//	}
			}
			//	$this->form_validation->set_rules('correct_answer[0]', 'correct_answer ', 'required');
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
		//exit;
		//print_r($data);
		$checkedIds = json_decode($this->input->post('checkedIds'), true);
		//$arrangeValues= json_decode($this->input->post('arrangeValues'), true);
		//print_r($arrangeValues); exit;
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


			$exam['title']=$data['exam_title'];
			$exam['course_id']=$data['course_types_class'];
			$exam['group_id']=$data['question_group_id'];
			$exam['	minutes']=$data['time'];
			$exam['start_date']=$data['start_date'];
			$exam['end_date']=$data['end_date'];
			$exam['added_by']= $this->session->userdata('teacher_id');
			$exam['degree']= $data['degree'];
			$exam['pass_degree']= $data['passdegree'];
			$exam['question_count']= $data['question_count'];
			$exam['main_subject_id']= $data['question_subject_id'];
			$exam_id= $this->Exam_model->save($exam);
			foreach ($data['notes'] as $i=>$note){
				$exam_notes=array();
				$exam_notes['exam_id']=$exam_id;
				$exam_notes['notes']=$note;
				$this->Exam_model->save($exam_notes,'exam_notes');

			}
			if(count($checkedIds)!=0) {
				foreach ($checkedIds as $index => $check) {
					$exam_question = array();
					$exam_question['exam_id'] = $exam_id;
					//$exam_question['group_id']=$data['question_group_id'];
					$exam_question['question_id'] = $check;
					$exam_question['ordering'] = $data['arrange'][$check];
					$exam_question['grade'] = 4;
					$this->Exam_model->save($exam_question, 'exams_questions');


				}
			}
			if (isset($data['title'][0][0])&&!empty($data['title']) && $data['title'][0][0] != null&& $data['title'][0][0]!="") {

				$question_arr=array();
				$answer_arr=array();
				//foreach($data as $key=>$values){
				foreach ($data['title'] as $index=>$value){
					$question_arr['parent_id']=0;
					$question_arr['title']=$value[0];
					$question_arr['course_type']=$data['course_types_class'];
					//$question_arr[$index]['course_id']=$data['course_id'];
					$question_arr['teacher_id']=  $this->session->userdata('teacher_id');
					$question_arr['group_id']=$data['question_group_id'];
					$exam['main_subject_id']= $data['question_subject_id'];
					//$question_arr['image']=$values['media_paths'][$index][0];
					$question_id= $this->Exam_model->save($question_arr,'qquestions');
					foreach ($data['answer'][$index] as $ans_index=>$ans_value){
						$answer_arr['question_id']=$question_id;
						$answer_arr['answer']=$ans_value;
						$answer_arr['image']=$data['media_paths'][$index][$ans_index];
						$answer_arr['is_correct']=($data['correct_answer'][$index][$ans_index]==1)?1:0;
						$this->Exam_model->save($answer_arr,'aanswers');
					}
					$exam_question=array();
					$exam_question['exam_id']=$exam_id;
					//$exam_question['group_id']=$data['question_group_id'];
					$exam_question['question_id']=$question_id;
					$exam_question['ordering']=$data['free_arrange'][$index];
					$exam_question['grade']=4;
					$this->Exam_model->save($exam_question,'exams_questions');

				}
			}

			if (isset($data['list_title_main'][0][0])&&!empty($data['list_title_main']) && $data['list_title_main'][0][0] != null&& $data['list_title_main'][0][0]!="") {
				$parent_question=array();
				$parent_question['course_type']=$data['course_types_class'];
				$parent_question['group_id']=$data['question_group_id'];
				$parent_question['parent_id']=0;
				$parent_question['title']=$data['list_title_main'];
				$parent_question['image']=$data['list_media_main_paths'];
				$parent_question['teacher_id']= $this->session->userdata('teacher_id');
				$parent_question_id= $this->Exam_model->save($parent_question,'qquestions');

				foreach ($data['list_quest'] as $child_quest_index=>$child_question){
					$child_question_arr=array();
					$child_question_arr['course_type']=$data['course_types_class'];
					$child_question_arr['group_id']=$data['question_group_id'];
					$child_question_arr['parent_id']=$parent_question_id;
					$child_question_arr['title']=$child_question[0];
					//$child_question_arr['image']=$data['list_media_main_paths'];
					$child_question_arr['teacher_id']= $this->session->userdata('teacher_id');
					$child_question_id= $this->Exam_model->save($child_question_arr,'qquestions');
					foreach ($data['list_answer'][$child_quest_index] as $ans_index=>$ans_value){
						$answer_arr['question_id']=$child_question_id;
						$answer_arr['answer']=$ans_value;
						$answer_arr['image']=$data['list_media_paths'][$child_quest_index][$ans_index];
						$answer_arr['is_correct']=($data['list_correct_answer'][$child_quest_index][$ans_index]==1)?1:0;
						$this->Exam_model->save($answer_arr,'aanswers');
					}



				}
				$exam_question=array();
				$exam_question['exam_id']=$exam_id;
				//$exam_question['group_id']=$data['question_group_id'];
				$exam_question['question_id']=$parent_question_id;
				$exam_question['ordering']=$data['list_arrange'];
				$exam_question['grade']=4;
				$this->Exam_model->save($exam_question,'exams_questions');
			}


		}
		echo json_encode(array('sucess'=>"done"));exit;
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
			echo "done"; exit;
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
					echo json_encode($result) ;exit;
				} else {
					echo json_encode(array('error' => 'Error uploading file.')); exit;
				}
			} else {
				echo json_encode(array('error' => 'No file selected.')); exit;
			}
		}elseif($this->input->post('question_type')=='media'){
			if (!empty($_FILES['media']['name'][0])) {

				$result = $this->upload('media');
				//print_r($result); exit;
				if (isset($result['path'])) {
					echo json_encode($result);  exit;
				} else {
					echo json_encode(array('error' => 'Error uploading file.')); exit;
				}
			} else {
				echo json_encode(array('error' => 'No file selected.')); exit;
			}
		}else{
			if (!empty($_FILES['list_media_main']['name'][0])) {

				$result = $this->upload('list_media_main');
				//print_r($result); exit;
				if (isset($result['path'])) {
					echo json_encode($result); exit;
				} else {
					echo json_encode(array('error' => 'Error uploading file.')); exit;
				}
			} else {
				echo json_encode(array('error' => 'No file selected.')); exit;
			}
		}

	}

	public function publish() {
		$id = $this->input->get('id');
		$s = $this->input->get('s');
		//	echo $s;  echo $id; exit;
		if ($s == 'true') {
			$s = 1;
		} else {
			$s = 0;
		}
		$record['active'] = $s;
		$this->Exam_model->publish($id, $record);
		return($this->index());
	}
	public function get_detail($id){
		$data['data']=$this->Exam_model->getById($id);
		$data['marks']=$this->Exam_model->getmarks($id);
		$data['student_attends']=$this->Exam_model->getattend($id);
		$data['student_not_attends']=$this->Exam_model->getnotattend($id);

		$vars['com_title'] = $this->lang->line('exams_details');
		$vars['right_menu']= $this->Users_per->fetch_right_menu();
		$vars['com_content'] = $this->load->view('exam/details.php', $data, true);
		$this->load->view('teacher_temp', $vars);
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
			echo 'error in sorting please try again'; exit;
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

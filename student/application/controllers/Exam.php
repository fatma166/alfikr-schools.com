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
		$config['per_page'] = 1;
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
	//	$config['last_link'] = $this->lang->line('Last');
		$config['prev_tag_open'] =  '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$student_id=$this->session->userdata('student_user_id');
		$student_course_arr=$this->Exam_model->get_select("students_courses",array('student_id'=>$student_id));

		$course_arr=$this->Exam_model->get_select("courses",array('id'=>$student_course_arr[count($student_course_arr)-1]['course_id']));

		$data['subjects']=$this->getchild_subject($course_arr[0]['course_type']);

		//$data_search ['stages'] = (isset($_REQUEST['stages'])) ? $_REQUEST['stages'] : '';
	//	$data_search ['_class'] =isset($course_arr[0]['course_type'])?$course_arr[0]['course_type']:'';// (isset($_REQUEST['_class'])) ? $_REQUEST['_class'] : '';
		//$data_search ['group_id'] = isset($course_arr[0]['id'])?$course_arr[0]['id']:'';//(isset($_REQUEST['group_id'])) ? $_REQUEST['group_id'] : '';
		$data_search ['main_subject_id'] =(isset($_REQUEST['main_subject_id'])) ? $_REQUEST['main_subject_id'] : 'all';
		if(isset($_GET['type'])) {
			$data_search ['type_id'] =$this->input->get('type');
			$type_id= $this->Exam_model->get_select('exam_types', array('id' => $data_search ['type_id'] ));
			$data_search['page_type']=$type_id[0]['type'] ;
		}

		else {
			$type_id = $this->Exam_model->get_select('exam_types', array('type' => 'exam'));
			// print_r($type_id); exit;
			$data_search ['type_id'] = (isset($type_id[0]['id'])) ? $type_id[0]['id'] : 'all';
			$data_search['page_type']='exam';
		//	print_r($data_search); exit;
		}
		//print_r($data_search); exit;
		/*	$data['order'] = (isset($_REQUEST['order'])) ? $_REQUEST['order'] : 'q.id';
			$data['order_type'] = (isset($_REQUEST['order_type'])) ? $_REQUEST['order_type'] : 'DESC';

			$data['by_published'] = (isset($_REQUEST['by_published'])) ? $_REQUEST['by_published'] : 'all';*/
		$data_search ['by_featured'] = (isset($_REQUEST['by_featured'])) ? $_REQUEST['by_featured'] : 'all';
//echo $page; exit;
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
//echo $page; exit;
		if (!$this->input->is_ajax_request()) {
			$start=0;
		}else {
			$start = ($page) * $config['per_page'];
		}
		$limit =$config['per_page'];
		if (!$this->input->is_ajax_request()||(isset($_GET['table_position']))&&$_GET['table_position']=="table_first") {
			$result= $this->Exam_model->getAllData($data_search ,'result',$limit,$start);
			//$config['total_rows'] =count($result) ;//$this->Questionbank_model->getAllData($data['search_string'], $data['order'], $data['order_type'], $data['by_published'], $data['by_featured'], 'total', $config["per_page"], $page);
			$config['total_rows'] =/*ceil(*/$this->Exam_model->getAllData($data_search,'total',$item_per_page,$postion_row);//$item_per_page)-1;
			//	$data_search['today']= date('Y-m-d');
			//	$data_search['today']= date('Y-m-d');
			//$data_search['page']=$page;
			if (!$this->input->is_ajax_request()) {
				$q = http_build_query($data_search) . "\n";
				$config['base_url'] = base_url() . 'exam/index/?type=2&'. $q;
			}elseif (isset($_GET['type'])){
				$q = http_build_query($data_search) . "\n";
				$config['base_url'] = base_url() . 'exam/index/?type='+$type_id+'&'. $q;
			}

			//	print_r($config); exit;
			$this->pagination->initialize($config);
			$data['paging'] = $this->pagination->create_links();
			$data['query'] = $result;

		}

		if (!$this->input->is_ajax_request()||(isset($_GET['table_position']))&&$_GET['table_position']=="table_third") {
			$data_search['student_id']= $this->session->userdata('student_user_id');
			unset($data_search['today']);
			$result_student= $this->Exam_model->getAllData($data_search , 'result', $limit ,$start);
			//print_r($result_student);
			unset($config['total_rows']);
			$config['total_rows'] =/*ceil(*/$this->Exam_model->getAllData($data_search,'total',$item_per_page,$postion_row);
			$q = http_build_query($data_search) . "\n";
			$config['base_url'] = base_url() . 'exam/index/?' . $q;
			$this->pagination->initialize($config);
			$data['student_paging'] = $this->pagination->create_links();
			$data['query_student'] = $result_student;
		}
		if (!$this->input->is_ajax_request()||(isset($_GET['table_position']))&&$_GET['table_position']=="table_second") {
			$data_search['student_id']= $this->session->userdata('student_user_id');
			$data_search['today']= date('Y-m-d');

			$result_student_today= $this->Exam_model->getAllData($data_search , 'result',$limit,$start);
//print_r($result_student_today); exit;
			unset($config['total_rows']);
			$config['total_rows'] =/*ceil(*/$this->Exam_model->getAllData($data_search,'total',$item_per_page,$postion_row);
			$q = http_build_query($data_search) . "\n";
			$config['base_url'] = base_url() . 'exam/index/?' . $q;
			$this->pagination->initialize($config);
			$data['today_paging'] = $this->pagination->create_links();
			$data['query_student_today'] = $result_student_today;
		}
		/*if (!$this->input->is_ajax_request()||(isset($_GET['table_position']))&&$_GET['table_position']=="table_first") {

		}*/


		$data['course_types'] = $this->Exam_model->get_course_type();
		//print_r($data); exit;
		$data['courses'] = $this->Course->get_courses();
		$data['questions_groups'] = $this->Exam_model->get_select('questions_groups',array());
		$data['data_search']=$data_search;
		//	print_r($data['data_search']); exit;

		//print_r($result);
		//	print_r($result_student); exit;
		$data['exam_type']=(isset($type_id[0]['ar_name']))?$type_id[0]['ar_name']:'all' ;
		$data['table_position']=isset($_GET['table_position'])?$_GET['table_position']:'';
//print_r($data); exit;
		if ($this->input->is_ajax_request()&&(isset($_GET['table_position']))&&$_GET['table_position']=="table_first") {
			//if ($this->input->is_ajax_request()) {

			$this->load->view('exam/partails/_table', $data);
		}elseif ($this->input->is_ajax_request()&&(isset($_GET['table_position']))&&$_GET['table_position']=="table_third") {
			$this->load->view('exam/partails/_table_today', $data);
		}else{
			$vars['com_title'] = $this->lang->line('exams');
			$vars['right_menu']= $this->Users_per->fetch_right_menu();
			$vars['com_content'] = $this->load->view('exam/index.php', $data, true);
			$this->load->view('student_temp', $vars);
		}


	}
	public function exam_start($id){
		$data['query']=$this->Exam_model->get_select("exams_",array('id'=>$id));
		//print_r($data['query']); exit;
		if(!empty($data['query'])) {
			if (isset($data['query'][0]['added_by']))
				$data['teacher'] = $this->Exam_model->get_select("teachers", array('id' => $data['query'][0]['added_by']));
			$vars['com_title'] = $this->lang->line('exams');
			//$vars['right_menu'] = $this->Users_per->fetch_right_menu();
			$vars['com_content'] = $this->load->view('exam/exam_start.php', $data, true);
			$this->load->view('student_temp', $vars);
		}else{
			$vars['com_title'] = $this->lang->line('error');
			//$vars['right_menu'] = $this->Users_per->fetch_right_menu();
			$vars['com_content'] = $this->load->view('error.php', $data, true);
			$this->load->view('student_temp', $vars);
		}
	}
	public function perview_exam($id){
		/*	$data_search ['stages'] = '';
			$data_search ['_class'] ='';// (isset($_REQUEST['_class'])) ? $_REQUEST['_class'] : '';
			$data_search ['group_id'] = '';//(isset($_REQUEST['group_id'])) ? $_REQUEST['group_id'] : '';
	$data_search['type_id']=2;
			$data_search['student_id']= $this->session->userdata('student_user_id');
			$exams= $this->Exam_model->getAllData($data_search ,'result',200,0);
			print_r($exams); exit;
			$result = array_filter($exams, function($item) use ($id) {
				return $item['id'] == $id;
			});
		//	print_r($result); exit;
			if(empty($result)){
				$data=array();
				$vars['com_title'] = $this->lang->line('error');
				//$vars['right_menu'] = $this->Users_per->fetch_right_menu();
				$vars['com_content'] = $this->load->view('error.php', $data, true);
				$this->load->view('student_temp', $vars);
			}else {*/
		//print_r($exams); exit;
		$data = $this->get_exam_question($id);
		$data['exam_details'] = $this->Exam_model->get_select("exams_", array('id' => $id));
		//	print_r($data['exam_details']); exit;
		$vars['com_title'] = $this->lang->line('exams');
		//$vars['right_menu']= $this->Users_per->fetch_right_menu();
		$vars['com_content'] = $this->load->view('exam/exam.php', $data, true);
		$this->load->view('student_temp', $vars);
		//	}
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

		$data_search ['_class'] = (isset($_REQUEST['_class'])) ? $_REQUEST['_class'] : '';
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


	public function get_exam_question($id){
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
		//	$id=$this->input->post('id');
		$data['query'] = $this->Exam_model->get_exam_question($data_search ,$id, 'result', $limit , $start);
		//print_r($data['query'] ); exit;
		$data['exam_question']="details";
		//print_r($result);
		return($data);
		/*if(isset($_POST['question_type'])&& $_POST['question_type']=="details"){
			//print_r($data); exit;
			$this->load->view('questions-bank/partails/_table', $data);
		}*/

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
		if(isset($_GET['type'])) {
			$data['type_id'] =$this->input->get('type');
			$type_id= $this->Exam_model->get_select('exam_types', array('id' => $data['type_id'] ));
			$data['page_type']=$type_id[0]['type'] ;
		}

		else {
			$type_id = $this->Exam_model->get_select('exam_types', array('type' => 'exam'));
			// print_r($type_id); exit;
			$data['type_id'] = (isset($type_id[0]['id'])) ? $type_id[0]['id'] : 'all';
			$data['page_type']='exam';
		}
		$data['type_id']=$_GET['type'];
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

		$data_posted=$this->input->post();
		if(!empty($data_posted['selectedAnswers'])){
			$data_to_insert = array();
			$questions_posted=array();
			foreach($data_posted['selectedAnswers'] as $index=> $qusetion_answer){
				$data_to_insert[] = array(
					'question_id' => $index,
					'student_id' => $this->session->userdata('student_user_id'),
					'answer' => $qusetion_answer[0],
					'exam_id' => $data_posted['exam_id']
				);

			}
			if (!empty($data_to_insert)) {
				$this->Exam_model->insertBatch_($data_to_insert, 'students_questions_answers');
			}
			$student_grade=$this->Exam_model->get_correct_answers($data_posted,$this->session->userdata('student_user_id'));
			$exam_details=$this->Exam_model->get_select("exams_",array('id'=>$data_posted['exam_id']));
			//print_r($exam_details); exit;
			$grade_type=($student_grade>=$exam_details[0]['pass_degree'])?"success":"failed";
			$exam_results=array('student_id'=>$this->session->userdata('student_user_id'),'exam_id'=>$data_posted['exam_id'],'mark'=>$student_grade,'date'=>date('Y-m-d'),'percentage'=>ceil($student_grade/$exam_details[0]['degree'])*100,'full_mark'=>$exam_details[0]['degree'],"pass_degree"=>$exam_details[0]['pass_degree']);
			$this->Exam_model->save($exam_results,$table="exams_results");
			/*$session_data = array(
				'student_grade' => $student_grade,
				'full_mark' => $exam_details[0]['degree'],
				'grade_type' => $grade_type
			);

			$this->session->set_userdata($session_data);*/
			// Set a session variable to indicate that the exam is completed
			$this->session->set_userdata('exam_completed', true);

		}

	}
	public function result($id){


		$data['result']=$this->Exam_model->get_select("exams_results",array('exam_id'=>$id,'student_id'=>$this->session->userdata('student_user_id')));
		if(empty($data['result'])){
			$vars['com_title'] = $this->lang->line('error');
			//$vars['right_menu'] = $this->Users_per->fetch_right_menu();
			$vars['com_content'] = $this->load->view('error.php', $data, true);
			$this->load->view('student_temp', $vars);
		}else {
			/*	$data['student_grade']=$this->session->userdata('student_grade');
				$data['full_mark']=$this->session->userdata('full_mark');
				$data['grade_type']=$this->session->userdata('grade_type');*/
			$vars['com_title'] = $this->lang->line('exam result');
			//$vars['right_menu']= $this->Users_per->fetch_right_menu();
			$vars['com_content'] = $this->load->view('exam/result.php', $data, true);
			$this->load->view('student_temp', $vars);
		}

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
		$data['marks']=$this->Exam_model->getmarks($id,"single");
		$data['student_results']=$this->Exam_model->get_select('exams_results',array('exam_id'=>$id,'student_id'=> $this->session->userdata('student_user_id'))) ;
		//print_r($data['marks']); exit;

		//$data['student_attends']=$this->Exam_model->getattend($id);
		if(isset($_GET['type'])) {
			$get_type_id=$this->input->get('type');
			$type_id= $this->Exam_model->get_select('exam_types', array('id' => $get_type_id));
			$data['exam_type']=(isset($type_id[0]['type']))?$type_id[0]['type']:'all';
		}else{
			$data['exam_type']="all";
		}

		//$data['student_not_attends']=$this->Exam_model->getnotattend($id);

		$vars['com_title'] = $this->lang->line('exams_details');
		$vars['right_menu']= $this->Users_per->fetch_right_menu();
		$vars['com_content'] = $this->load->view('exam/details.php', $data, true);
		$this->load->view('student_temp', $vars);
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

	public function getchild_subject($class_id){

		$data=$this->Questionbank_model->get_select('main_subjects',array('course_type'=>$class_id));
		$response = array();
		foreach ($data as $option) {
			$response[] = array(
				'id' => $option['id'],
				'name' => $option['name']
			);
		}
		return($response);

	}


}

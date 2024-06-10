<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('teacher_id')) { 
			redirect(base_url(), 'refresh');
		}
				
		$this->load->database();
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('teacher_id');
		$this->load->model('Users_per');
		
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		/********************** fetch nof of contact us not seen messages ****************/
		$nof_msg = $this->db->query("SELECT count(*) as nof_msg FROM contact_us WHERE seen = 0");
		$nof_msg = $nof_msg->result();
		$this->data['nof_msg'] = $nof_msg[0]->nof_msg;
		
		
		/***************** site info *****************/
		$this->load->model("fetch_items");
		$this->data["site_info"] = $this->fetch_items->fetch_site_info();
		
		$this->data['notifications'] = null;
    }
    
    
    public function profile(){
        $teacher_id = $this->session->userdata('teacher_id');
        
        $this->data['teacher'] = $this->db->query("SELECT * FROM teachers WHERE id = '$teacher_id'")->result();
        
        
        $this->load->view('profile', $this->data);
    }
	
	public function teachers_requests(){
	    $this->data['requests'] = $this->db->query("SELECT * FROM teachers_requests ORDER BY id DESC")->result();
	    
	    
	    $this->load->view('teachers_requests', $this->data);
	    
	    
	}
	
	
	
	public function main_subjects(){
		$teacher_id = $this->session->userdata('teacher_id');
		$subjects = $this->db->query("SELECT * FROM main_subjects WHERE id IN (SELECT subject_id FROM teachers_subjects 
					WHERE teacher_id = '$teacher_id')")->result();
		$i = 0 ;
		foreach($subjects as $s){
			$course_type = $this->db->query("SELECT * FROM courses_types WHERE id = '$s->course_type'")->result();
			if($course_type){
				$subjects[$i]->course_type = $course_type[0]->ar_name;
			}
			else{
				
				$subjects[$i]->course_type = '';
			}
			
			$i++;			
		}
		
		$this->data['subjects'] = $subjects;
		$this->load->view('main_subjects', $this->data);
	}
	public function questions_bank(){
		$teacher_id = $this->session->userdata('teacher_id');
		$this->data["questions"] = $this->db->query("SELECT * FROM questions_bank WHERE added_by  = '$teacher_id'")->result();
		
		
		
		
		$this->load->view("questions_bank", $this->data);
	}
	
	
	
	public function add_new_question_bank(){
		//extract($_POST);
		//var_dump($_POST);
		$this->data["courses_types"] = $this->db->query("SELECT * FROM courses_types")->result();
		$this->load->view("add_new_question_bank", $this->data);
	}
	
	public function fetch_subjects_by_course_type(){
	    $id = $this->input->post('id');
	    //echo $id;
	    $subjects = $this->db->query("SELECT * FROM main_subjects WHERE course_type = '$id'")->result();
	    foreach($subjects as  $s){
	        echo "<option value='$s->id'>$s->name</option>";
	    }
	}
	
	
	public function add_new_qeustion_bank_done(){
		//var_dump($_POST);
		//var_dump($_FILES);
		extract($_POST);
		//var_dump($_FILES);
		$teacher_id = $this->session->userdata('teacher_id');
		$answers = [];
		if(isset($_FILES['image'])){
				$config['upload_path']          = '../uploads/questions/';
						$config['allowed_types']        = 'gif|jpg|png|pdf|doc|jpeg|mp4';
						$config['max_size']             = 1000000;
						$new_name = rand(1000, 100000).$_FILES['image']['name'];
						$ext = explode(".", $_FILES['image']['name']);
						$new_name = rand(10000000000, 100000000000000) . "." . $ext[1]  ;
						$config['file_name'] = $new_name;
						$this->load->library('upload', $config);
						$data = array('upload_data' => $this->upload->data());
						$this->upload->do_upload('image');
						$image = $new_name;
				
			}
			
			if($_FILES['video']['name'] != ''){
				$config['upload_path']          = '../uploads/questions/';
						$config['allowed_types']        = 'gif|jpg|png|pdf|doc|jpeg|mp4';
						$config['max_size']             = 1000000;
						$new_name = rand(1000, 100000).$_FILES['video']['name'];
						$ext = explode(".", $_FILES['video']['name']);
						$new_name = rand(10000000000, 100000000000000) . "." . $ext[1]  ;
						$config['file_name'] = $new_name;
						$this->load->library('upload', $config);
						$data = array('upload_data' => $this->upload->data());
						$this->upload->do_upload('video');
						$video = $new_name;
				
			}
			else{
				$video = '';
			}
		
		
		if($question_type == "خيار متعدد"){
			for($i = 1; $i <= 5; $i++){
				$answer_type = 'answer_type_'.$i; 
				$file_name = 'answer_'.$i;
				if($_POST[$answer_type] == "فيديو" || $_POST[$answer_type]  == "صورة"){
					if(isset($_FILES[$file_name])){
						//var_dump($_FILES[$file_name]);
						$config['upload_path']          = '../uploads/questions/';
						$config['allowed_types']        = 'gif|jpg|png|pdf|doc|jpeg|mp4';
						$config['max_size']             = 1000000;
						$new_name = rand(1000, 100000).$_FILES[$file_name]['name'];
						$ext = explode(".", $_FILES[$file_name]['name']);
						$new_name = rand(10000000000, 100000000000000) . "." . $ext[1]  ;
						$config['file_name'] = $new_name;
						$this->load->library('upload', $config);
						$data = array('upload_data' => $this->upload->data());
						$this->upload->do_upload($file_name);
						$answers[$i] = $new_name;
						//var_dump($config);
						
						unset($config);
						unset($data);
						//var_dump($config);
					}
					else{
						$answers[$i] = '';
					}
				}	
				else{
					$answers[$i] = $_POST[$file_name];
				}
			}
			
			
			
			
			$this->db->query("INSERT INTO questions_bank
					(
						name,
						text, 
						image, 
						question_type,
						answer_1_type, 
						answer_1,
						answer_2_type, 
						answer_2,
						answer_3_type, 
						answer_3,
						answer_4_type, 
						answer_4,
						answer_5_type, 
						answer_5,
						grade, 
						video, 
						right_answer, 
						subject_id, 
						course_type_id, 
						added_by
					)
					VALUES (
						'$name',
						'$text', 
						'$image', 
						'$question_type',
						'$answer_type_1', 
						'$answers[1]',
						'$answer_type_2', 
						'$answers[2]',
						'$answer_type_3', 
						'$answers[3]',
						'$answer_type_4', 
						'$answers[4]',
						'$answer_type_5', 
						'$answers[5]',
						
						'$grade', 
						'$video', 
						'$multi_right_answer', 
						'$subject_id', 
						'$course_type_id', 
						'$teacher_id'
					)
			
			
			
			
			
			
			
			
			");	
			
			
		}
		else{
			$this->db->query("INSERT INTO questions_bank
					(
						name,
						text, 
						image, 
						question_type,
						answer_1_type, 
						answer_1,
						answer_2_type, 
						answer_2,
						answer_3_type, 
						answer_3,
						answer_4_type, 
						answer_4,
						answer_5_type, 
						answer_5,
						grade, 
						video, 
						right_answer, 
						subject_id, 
						course_type_id,
						added_by
					)
					VALUES (
						'$name',
						'$text', 
						'$image', 
						'$question_type',
						'', 
						'',
						'', 
						'',
						'', 
						'',
						'', 
						'',
						'', 
						'',
						
						'', 
						'$video', 
						'$right_answer', 
						'$subject_id', 
						'$course_type_id', 
						'$teacher_id'
					)
			
			
			
			
			
			
			
			
			");	
			
		}
		
		
		
		
		redirect(base_url().'master/questions_bank', 'refresh');
		
		
	}
	
	public function add_new_exam(){
	    extract($_POST);
		$teacher_id = $this->session->userdata('teacher_id');		
		
	    $this->db->query("INSERT INTO exams (title, details, active, course_id, minutes, type, start_date, end_date, added_by) 
			VALUES ('$title', '$details', 0, '$course_id', '$minutes', '$type' , '$start_date', '$end_date', '$teacher_id' )");
	    redirect(base_url().'master/exams', 'refresh');
	}
	
	public function new_exam_group_question(){
		extract($_POST);
		
		$this->db->query("INSERT INTO exams_groups_questions (group_id, question_id, grade, ordering) 
					VALUES ('$group_id', '$question_id', '$grade', '$ordering')");
		
		redirect(base_url().'master/exams_contents/'.$exam_id, 'refresh');
	}
	
	public function exams_contents($id){
		$exams_contents = $this->db->query("SELECT * FROM exams_contents WHERE exam_id = '$id'")->result();
		$i = 0;
		$teacher_id = $this->session->userdata('teacher_id');
		$this->data["all_questions"] = $this->db->query("SELECT * FROM questions_bank WHERE added_by = '$teacher_id'")->result();
		
		foreach($exams_contents as $c){
			if($c->content_type == 0){
				//Questions groups
				
				$group = $this->db->query("SELECT * FROM exams_groups WHERE id = '$c->item_id'")->result();
				$exams_contents[$i]->group = $group[0];
				$group_id = $group[0]->id;
				
				$questions = $this->db->query("SELECT * FROM questions_bank WHERE 
						id IN (SELECT question_id FROM exams_groups_questions WHERE group_id = '$group_id')")->result();
				$j = 0;	
				foreach($questions as $q){
					$question_info = $this->db->query("SELECT * FROM exams_groups_questions WHERE group_id = '$group_id'
								AND question_id = '$q->id'")->result();
								
					$questions[$j]->grade = $question_info[0]->grade;
					$questions[$j]->ordering = $question_info[0]->ordering;
					$j++;
				}
				
				$exams_contents[$i]->group->questions = $questions;
				
				
			}
			else{
				//one Question 
				$question = $this->db->query("SELECT * FROM questions_bank WHERE id = '$c->item_id'")->result();
				$exams_contents[$i]->question = $question[0];
			}
			$i++;
		}
		$this->data['exams_contents'] = $exams_contents;
		$this->data['exam_id'] = $id;
		$this->load->view('exams_contents', $this->data);
	}
	
	
	public function change_exam_status(){
        extract($_POST);

		$this->db->query("UPDATE exams SET active = '$value' WHERE id = '$id'");

		

	}
	
	public function add_exam_qeustion(){
		extract($_POST);
		$this->db->query("INSERT INTO exams_contents (exam_id, content_type, item_id, ordering, grade)
				VALUES ('$exam_id', '1', '$question_id', '$ordering', '$grade')");
				
		redirect(base_url().'master/exams_contents/'.$exam_id, 'refresh');
	}
	
	public function new_exam_group(){
		extract($_POST);
		
		$this->load->helper(array('form', 'url'));
		
		if($_FILES['img']['name'] != ''){
			$this->load->library('form_validation');
			$config['upload_path']          = '../uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 10000;
			$imgname = $_FILES["img"]['name'];        
			$ext = explode(".", $imgname);
			$new_name = time().rand(10000000, 100000000).'.'.end($ext);	
			$config['file_name'] = $new_name;
		
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			if(!$this->upload->do_upload('img')){
					$error =array('upload_data' => $this->upload->data());
					die("Error");
			}
		}
		else{

			$target_path = '';
		}			
		
		$this->db->query("INSERT INTO exams_groups (name, file, text) VALUES ('$name', '$target_path', '$text')");
		
		$group_id = $this->db->query("SELECT * FROM exams_groups ORDER BY id DESC")->result();
		$group_id = $group_id[0]->id;
		$this->db->query("INSERT INTO exams_contents (exam_id, content_type, item_id, ordering) 
							VALUES ('$exam_id', '0', '$group_id', '$ordering')");
							
							
		redirect(base_url().'master/exams_contents/'.$exam_id, 'refresh');
		
	}
	
	
	public function exams(){
		$teacher_id = $this->session->userdata('teacher_id');
		$exams = $this->db->query("SELECT * FROM exams WHERE added_by = '$teacher_id' ORDER BY id DESC")->result();
		$i = 0;
		foreach($exams as $e){
			$course = $this->db->query("SELECT * FROM courses WHERE id = '$e->course_id'")->result();
			if($course){
				$exams[$i]->course_name = $course[0]->name;
			}
			else{
				$exams[$i]->course_name = '';
			}
			
			
			$i++;
		}
	    $this->data["exams"] = $exams;
	    $this->data["courses"] = $this->db->query("SELECT * FROM courses ORDER BY id DESC")->result();
	   
	   $this->load->view("exams", $this->data);
	    
	}
	
	
	
	
	
	public function teachers_files(){
		$teacher_id = $this->session->userdata('teacher_id');
		$this->data['courses'] = $this->db->query("SELECT * FROM courses WHERE id IN (SELECT course_id FROM courses_teachers WHERE teacher_id = '$teacher_id')")->result();
		
		$files = $this->db->query("SELECT * FROM teachers_files WHERE teacher_id = '$teacher_id'")->result();
		$i = 0;
		foreach($files as $f){
				$course = $this->db->query("SELECT * FROM courses WHERE id = '$f->course_id'")->result();
				$files[$i]->course_name = $course[0]->name;
				
				
				
				$subject = $this->db->query("SELECT * FROM main_subjects WHERE id = '$f->subject_id'")->result();
				if($subject){
					$files[$i]->subject = $subject[0]->name;
					
				}
				else{
					$files[$i]->subject = '';
				}
				
				$i++;
		}
		
		$this->data['files'] = $files;
		
		
		$teacher_courses = $this->db->query("SELECT * FROM courses WHERE id IN (SELECT course_id FROM courses_teachers 
				WHERE teacher_id = '$teacher_id')")->result();
				
		
			
		
		$i = 0;
		foreach($teacher_courses as $c){
			$course_type = $c->course_type;
			$course_type_name  = $this->db->query("SELECT *  FROM courses_types WHERE id = '$course_type'")->result();
			$teacher_courses[$i]->course_type_name = $course_type_name[0]->ar_name;
			$i++;
		}
		
		$this->data['teacher_courses'] = $teacher_courses;
		
		$this->data['subjects'] = $this->db->query("SELECT * FROM main_subjects WHERE id IN (SELECT subject_id FROM teachers_subjects 
						WHERE teacher_id = '$teacher_id')")->result();
		
		$this->load->view('teachers_files', $this->data);
	}
	
	
	public function fetch_subjects_by_course_id(){
		$course_id = $this->input->post('id');
		$teacher_id = $this->session->userdata('teacher_id');
		$subjects = $this->db->query("SELECT * FROM main_subjects WHERE course_type =
		(SELECT course_type FROM courses WHERE id = '$course_id') AND id IN (SELECT subject_id FROM teachers_subjects WHERE teacher_id = '$teacher_id')")->result();
		foreach($subjects as $s){
			
			echo "<option value='".$s->id."'>$s->name</option>";
		}
	}
	
	public function   edit_lesson_name(){
	    extract($_POST);
	    
	    $this->db->query("UPDATE lessons SET name = '$name' WHERE id = '$lesson_id'");
	    redirect(base_url().'master/view_course/'.$course_id, 'refresh');
	}
	
	public function view_teacher_request($id){
	    $r = $this->db->query("SELECT * FROM teachers_requests WHERE id = '$id'")->result();
	    $this->data['request'] = $r[0];
	    
	    
	    $this->load->view('view_teacher_request', $this->data);
	}
	
	
	
	public function index()
	{
		
		
		$masters = $this->db->query("SELECT * FROM masters ORDER BY id DESC");
		$this->data['masters'] = $masters;
		
		
		$this->load->view('masters', $this->data);
		
		
		
	}
	
	
	public function live_classes(){
	    $this->data['live_classes'] = $this->db->query("SELECT * FROM live_classes ORDER BY id DESC")->result();
	    
	    
	    $this->load->view('live_classes', $this->data);
	}
	
	public function new_live_class(){
	    $this->data['live_classes'] = $this->db->query("SELECT * FROM live_classes ORDER BY id DESC")->result();
	    
	    
	    
	    $this->data['courses'] = $this->db->query("SELECT * FROM courses ORDER BY id DESC")->result();
	    
	    
	    $this->load->view('new_live_class', $this->data);
	}
	
	
	public function get_course_sections($course_id){
	    
	    $sections = $this->db->query("SELECT * FROM subjects WHERE course_id = '$course_id'")->result();
	    foreach($sections as $c){
	        echo "<option value='$c->id'>$c->name</option>";
	        
	    }
	    
	    
	    
	    
	    
	}
	
	
	
	public function approve_teacher_request($id){
	    $teacher = $this->db->query("SELECT * FROM teachers_requests WHERE id = '$id'")->result();
	    $first_name = $teacher[0]->first_name;
	    $last_name = $teacher[0]->last_name;
	    $full_name = $first_name . ' ' . $last_name;
	    $email = $teacher[0]->email;
	    $password = $teacher[0]->password;
	    $phone = $teacher[0]->phone;
	    $gender = $teacher[0]->gender;
	    $country = $teacher[0]->country;
	    $image = $teacher[0]->image;
	    $cv = $teacher[0]->cv;
	    $linkedin = $teacher[0]->linkedin;
	    $twitter = $teacher[0]->twitter;
	    $facebook = $teacher[0]->facebook;
	    $bank_type = $teacher[0]->bank_type;
	
	    $iban = $teacher[0]->iban;
	    $paypal = $teacher[0]->paypal;
	    $payment_details = $teacher[0]->payment_details;
	   
	   
	   
	   
	    $this->db->query("INSERT INTO teachers 
	                            (full_name, image, linkedin, facebook, email, password, paypal, cv, bank_type, iban, payment_details, country, gender, twitter, phone)
	                            VALUES 
	                            ('$full_name', '$image', '$linkedin', '$facebook', '$email', '$password', '$paypal', '$cv', '$bank_type', '$iban', '$payment_details', '$country', '$gender', '$twitter', '$phone')
	    ");
	    
	    $this->db->query("DELETE FROM  teachers_requests WHERE id = '$id'");
	    
	    redirect(base_url().'master/teachers_requests/', 'refresh');
	    
	    
	    
	}
	
	
	
	
	public function new_live_class_done(){
	    extract($_POST);
	    $section_id = 0;
	    $this->db->query("INSERT INTO live_classes (title, meeting_id, meeting_password, course_id, section_id, remarks, date, start_time, end_time, user_id) 
	                        
	                        VALUES ('$title', '$meeting_id', '$meeting_password', '$course_id', '$section_id', '$remarks', '$date', '$start_time', '$end_time', 0)
	            ");
	   
	    
	    redirect(base_url().'master/live_classes/', 'refresh');
	    
	}
	
	
	
	
	
	public function pages(){
	    
	    
	    $this->load->view('pages', $this->data);
	}
	
	public function teachers(){
	    $teachers = $this->db->query("SELECT * FROM teachers");
	    $this->data["teachers"]  = $teachers->result();
	    $this->load->view('teachers', $this->data);
	}
	
	public function delete_student_course($sid, $cid){
	    $this->db->query("DELETE FROM students_courses WHERE student_id = '$sid' AND course_id = '$cid'");
	    redirect(base_url().'master/view_course/'.$cid, 'refresh');
	}
	
	
	
	public function edit_teacher($id){
	    $teacher = $this->db->query("SELECT * FROM teachers WHERE id = '$id'");
	    $teacher  = $teacher->result();
	    $this->data["teacher"] = $teacher[0];
	    $this->load->view('edit_teacher', $this->data);
	}
	
	
	
	public function new_university(){
		$cities = $this->db->query("SELECT * FROM cities");
		$this->data["cities"] = $cities->result();
		
		$this->load->view('new_university', $this->data);
		
	}
	
	
	public function new_master(){
		$universities = $this->db->query("SELECT * FROM universities");
		$this->data["universities"] = $universities->result();
		
		$this->load->view('new_master', $this->data);
		
	}
	
	
	public function courses_enrolls_requests(){
	    $req = $this->db->query("SELECT * FROM courses_enrolls_requests ORDER BY id DESC")->result();
	    
	    $i = 0;
	    foreach($req as $r){
	        $student_id = $r->student_id;
	        $course_id  = $r->course_id;
	        
	        $student = $this->db->query("SELECT * FROM students WHERE id = '$student_id'")->result();
	        $course = $this->db->query("SELECT * FROM courses WHERE id = '$course_id'")->result();
	        
	        $req[$i]->student = $student[0]->first_name .' '.$student[0]->last_name;
	        $req[$i]->course = $course[0]->name;
	        
	        $i++;
	        
	    }
	    
	    
	    $this->data["req"] = $req;
	    $this->load->view('courses_enrolls_requests', $this->data);
	}
	
	
	
	public function new_student_done(){
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$mobile = $this->input->post("mobile");
		$email = $this->input->post("email");
		$password = md5($this->input->post("mobile"));
		
		$this->db->query("INSERT INTO students (first_name, last_name, mobile, email, password) 
			VALUES ('$first_name', '$last_name', '$mobile', '$email', '$password')");
		
		redirect(base_url().'master/students', 'refresh');
		
	}
	
	public function add_teacher(){
	    $full_name = $this->input->post("full_name");
	    $details = $this->input->post("details");
	    
	    $this->load->helper(array('form', 'url'));			
		    $this->load->library('form_validation');			
		    $config['upload_path']          = '../uploads/';			
		    $config['allowed_types']        = 'gif|jpg|png|pdf|doc';			
		    $config['max_size']             = 2048;			
		    $new_name = time().$_FILES["img"]['name'];			
		    $config['file_name'] = $new_name;						
		    $this->load->library('upload', $config);			
		    $data = array('upload_data' => $this->upload->data());		
		$target_path = $new_name; 			
	    $this->upload->do_upload('img');		
		
		$this->db->query("INSERT INTO teachers (full_name , details, image) VALUES ('$full_name', '$details', '$target_path')");
		redirect(base_url().'master/teachers', 'refresh');

	    
	    
	}
	
	public function new_course_done(){
		$name = $this->input->post("name");
		$cost = $this->input->post("cost");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");
		$course_type = $this->input->post("course_type");
		$short_details = addslashes( $this->input->post('short_details') );
		$details = addslashes( $this->input->post('details') );
		$details = $details;
		$keywords =addslashes( $this->input->post('keywords') );
		$slug = $this->input->post("slug");
		//echo $slug;
		
		$meta_desc = addslashes($this->input->post('meta_desc'));


		$this->load->helper(array('form', 'url'));			
		$this->load->library('form_validation');			
		$config['upload_path']          = '../uploads/';			
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc';			
		$config['max_size']             = 2048;			
		$new_name = time().$_FILES["img"]['name'];			
		$config['file_name'] = $new_name;						
		$this->load->library('upload', $config);			
		$data = array('upload_data' => $this->upload->data());		
		$target_path =  $new_name; 			
		$this->upload->do_upload('img');
		
		





		
		$this->db->query("INSERT INTO courses (name, cost,  course_type, short_details, details, meta_keywords, meta_description, image, slug) 
			VALUES ('$name', '$cost',  '$course_type', '$short_details', '$details', '$keywords', '$meta_desc', '$target_path', '$slug')");
		
		redirect(base_url().'master/courses', 'refresh');
		
	}
	
		
	public function edit_course_done(){
		$course_name = $this->input->post("name");
		$cost = $this->input->post("cost");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");	
		$short_details = $this->input->post("short_details");		
		$details = $this->input->post("details");
		$course_type = $this->input->post("course_type");
		$course_id = $this->input->post("course_id");						
		if($_FILES["img"]['name'] != ''){			
		    $this->load->helper(array('form', 'url'));			
		    $this->load->library('form_validation');			
		    $config['upload_path']          = '../uploads/';			
		    $config['allowed_types']        = 'gif|jpg|png|pdf|doc';			
		    $config['max_size']             = 2048;			
		    $new_name = time().$_FILES["img"]['name'];			
		    $config['file_name'] = $new_name;						
		    $this->load->library('upload', $config);			
		    $data = array('upload_data' => $this->upload->data());		
		    $target_path = $new_name; 			
		    $this->upload->do_upload('img');			
		    $this->db->query("UPDATE courses SET image='$target_path' WHERE id = '$course_id'");		
		    
		}				
		
		$this->db->query("UPDATE courses SET name = '$course_name', cost = '$cost', start_date = '$start_date', end_date = '$end_date',		course_type = '$course_type', short_details = '$short_details', details = '$details' WHERE id = '$course_id' ");
		
		redirect(base_url().'master/view_course/'.$course_id, 'refresh');
		
	}
	
	
	public function edit_teacher_done(){
		$full_name = $this->input->post("full_name");
		$details = $this->input->post("details");
		$linkedin = $this->input->post("linkedin");
		$facebook = $this->input->post("facebook");
		$instagram = $this->input->post("instagram");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		
		
		
		$id = $this->input->post("id");						
		if($_FILES["img"]['name'] != ''){			
		    $this->load->helper(array('form', 'url'));			
		    $this->load->library('form_validation');			
		    $config['upload_path']          = '../uploads/';			
		    $config['allowed_types']        = 'gif|jpg|png|pdf|doc';			
		    $config['max_size']             = 2048;			
		    $new_name = time().$_FILES["img"]['name'];			
		    $config['file_name'] = $new_name;						
		    $this->load->library('upload', $config);			
		    $data = array('upload_data' => $this->upload->data());		
		    $target_path = $new_name; 			
		    $this->upload->do_upload('img');			
		    $this->db->query("UPDATE teachers SET image='$target_path' WHERE id = '$id'");		
		    
		}				
		
		$this->db->query("UPDATE teachers SET full_name = '$full_name', details = '$details', linkedin = '$linkedin', facebook = '$facebook',
		instagram = '$instagram', email = '$email'
		WHERE id = '$id' ");
		
		
		/*********** change password *********/
		$check_pass = $this->db->query("SELECT * FROM teachers WHERE id = '$id'")->result();
		$check_pass = $check_pass[0]->password;
		if($check_pass != $password){
		    $password = md5($password);
		    $this->db->query("UPDATE teachers SET password = '$password' WHERE id = '$id' ");
		}
		
		
		redirect(base_url().'master/teachers/', 'refresh');
		
	}
	
	
	public function edit_course($id){
	    $course = $this->db->query("SELECT * FROM courses WHERE id = '$id'");
	    $course = $course->result();
	    $this->data['course'] = $course[0];
	    
	    $courses_types = $this->db->query("SELECT * FROM courses_types");
	    $this->data['courses_types'] = $courses_types->result();
	    $this->load->view('edit_course', $this->data);
	}			
	
	
	public function courses_types(){
	    $courses_types = $this->db->query("SELECT * FROM courses_types");
	    $this->data["courses_types"] = $courses_types->result();
	    
	    $this->load->view('course/courses_types', $this->data); 
	}
	
	public function edit_course_type_done(){
	    $id  = $this->input->post("id");
		$ar_name = $this->input->post("ar_name");
		$en_name = $this->input->post("en_name");
		$tr_name = $this->input->post("tr_name");
		
		$parent_id = $this->input->post("parent_id");
		
		$this->db->query("UPDATE courses_types SET ar_name = '$ar_name', en_name = '$en_name', tr_name = '$tr_name', parent_id = '$parent_id' WHERE id = '$id'");
		
		redirect(base_url().'master/courses_types', 'refresh');
	}


	public function edit_course_type($id){
		$course_type = $this->db->query("SELECT * FROM courses_types WHERE id = '$id'");
		$course_type = $course_type->result();
		$course_type = $course_type[0];

		

		$courses_types = $this->db->query("SELECT * FROM courses_types");
		$courses_types = $courses_types->result();


		echo '<div class="modal-dialog">
    
      <form method="post" action="'.base_url().'master/edit_course_type_done">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">تعديل تصنيف </h4>
        </div>
        <div class="modal-body">
          <table class="table">
		  	<tr>
				<td>الاسم العربي</td>
				<td><input type="text" name="ar_name" class="form-control" value="'.$course_type->ar_name.'" /></td>
			</tr>
			<tr>
				<td>الاسم الانكليزي</td>
				<td><input type="text" name="en_name" class="form-control" value="'.$course_type->en_name.'" /></td>
			</tr>
			<tr>
				<td>الاسم التركي</td>
				<td><input type="text" name="tr_name" class="form-control" value="'.$course_type->tr_name.'" /></td>
			</tr>
			
			<tr>
				<td>التصنيف الأب</td>
				<td>
					<select name="parent_id" class="form-control">
						<option value="0">لا يوجد أب</option>
					';
					foreach($courses_types as $c){
						if($c->id == $course_type->parent_id){
							echo "<option value='".$c->id."' selected>".$c->ar_name."</option>";
						}
						else{
							echo "<option value='".$c->id."'>".$c->ar_name."</option>";
						}
						
					}	
				
		echo 		'</td>
			</table>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success"  value="حفظ وإغلاق"></button>
        </div>
      </div>
	  <input type="hidden" name="id" value="'.$id.'" />
	  </form>
      
		</div>';
	}
	public function new_course_type(){
	  
		$ar_name = $this->input->post("ar_name");
		$en_name = $this->input->post("en_name");
		$tr_name = $this->input->post("tr_name");
		
		
		$this->load->helper(array('form', 'url'));			
		    $this->load->library('form_validation');			
		    $config['upload_path']          = '../uploads/';			
		    $config['allowed_types']        = 'gif|jpg|png|pdf|doc';			
		    $config['max_size']             = 2048;			
		    $new_name = time().$_FILES["img"]['name'];			
		    $config['file_name'] = $new_name;						
		    $this->load->library('upload', $config);			
		    $data = array('upload_data' => $this->upload->data());		
		$target_path = 'uploads/'.$new_name; 			
	    $this->upload->do_upload('img');
		
		
		$parent_id = $this->input->post("parent_id");
		if($parent_id == 0){
		    $this->db->query("INSERT INTO courses_types (ar_name,  parent_id, image, en_name, tr_name ) VALUES ('$ar_name', 0, '$target_path', '$en_name', '$tr_name')");
		}
		else{
		    $this->db->query("INSERT INTO courses_types (ar_name,  parent_id, image, en_name, tr_name) VALUES ('$ar_name', '$parent_id', '$target_path', '$en_name', '$tr_name')");
		}
		
		
		
		redirect(base_url().'master/courses_types', 'refresh');
	}
	
	
	
	public function new_city_done(){
		$ar_name = $this->input->post("ar_name");
		$tr_name = $this->input->post("tr_name");
		
		$this->db->query("INSERT INTO cities (ar_name, tr_name) VALUES ('$ar_name', '$tr_name')");
		
		redirect(base_url().'master/cities', 'refresh');
		
	}
	
	public function change_ordering(){		
		$table = $this->input->post("table");		
		$id = $this->input->post("id");		
		$value = $this->input->post("value");				
		$this->db->query("UPDATE $table SET ordering = '$value' WHERE id = '$id'");					
	}
	
	
	public function change_req_status(){		
				
		$id = $this->input->post("id");		
		$value = $this->input->post("value");				
		$this->db->query("UPDATE courses_enrolls_requests SET status = '$value' WHERE id = '$id'");					
	}
	
	public function free_preview(){		
				
		$id = $this->input->post("id");		
		$value = $this->input->post("value");				
		$this->db->query("UPDATE lessons SET free_preview = '$value' WHERE id = '$id'");					
	}
	
	public function delete($table, $id){
						if($table == 'subjects'){
						        $course_id = $this->db->query("SELECT course_id FROM subjects WHERE id= '$id'");
						        $course_id = $course_id->result();			$course_id = $course_id[0]->course_id;			$url = base_url().'master/view_course/'.$course_id.'/?tab='.$table;		}		else if($table == 'lessons'){			$course_id = $this->db->query("SELECT course_id FROM subjects WHERE id= (SELECT subject_id FROM lessons WHERE id ='$id')");			$course_id = $course_id->result();			$course_id = $course_id[0]->course_id;			$url = base_url().'master/view_course/'.$course_id.'/?tab='.$table;		}		else if($table == 'stories'){			$url = base_url().'settings/stories/';		}		else{
						            $url = base_url().'master/'.$table;		
						
						        }						$this->db->query("DELETE FROM $table WHERE id = '$id'");
		redirect($url, 'refresh');
	}
	
	
	public function new_payment(){
		
		
		$this->load->view('new_payment', $this->data);
		
	}
	
	public function fetch_courses(){
		
		$name = $this->input->post("name");
		$students = $this->db->query("SELECT * FROM courses WHERE name LIKE '%$name%'");
		$students = $students->result();
		foreach($students as $s){
			echo "<option value='$s->id'>$s->name</option>";
		}
	}
	public function fetch_students(){
		
		
		
		
		$name = $this->input->post("name");
		$students = $this->db->query("SELECT * FROM students WHERE first_name LIKE '%$name%' OR  last_name LIKE '%$name%'");
		$students = $students->result();
		foreach($students as $s){
			echo "<option value='$s->id'>$s->first_name $s->last_name</option>";
		}
	}
	
	
	public function fetch_teachers(){
		
		
		
		
		$name = $this->input->post("name");
		$students = $this->db->query("SELECT * FROM teachers WHERE full_name LIKE '%$name%'");
		$students = $students->result();
		foreach($students as $s){
			echo "<option value='$s->id'>$s->full_name</option>";
		}
	}
	
	
	
	public function new_walad(){
		
		
		
		$this->load->view('new_walad', $this->data);

		
	}
	
	
	
	
	
	
	
	public function outgoing_payments(){
	    $payments_for_types = $this->db->query("SELECT * FROM payments_for_types");
	    $this->data["payments_for_types"] = $payments_for_types->result();
	    
	    
	    
	    $query = "SELECT p.id, p.date, p.amount, pt.name as payment_for FROM outgoing_payments as p LEFT JOIN payments_for_types as pt ON p.payment_for_id = pt.id WHERE 1 ";
	    if($this->input->get('payment_for_id') > 0){
	        $pfid = $this->input->get('payment_for_id');
	        $query .= " AND pt.id = '$pfid'";
	    }
	    $payments = $this->db->query($query);
	    $this->data['payments'] = $payments->result();
	    
	    $this->load->view('outgoing_payments', $this->data);
	}
	
	
	
	
	
	public function edit_payment_for_type(){
	    $name = $this->input->post("name");
	    $id = $this->input->post("id");
	    $this->db->query("UPDATE payments_for_types SET name = '$name' WHERE id = '$id'");
	    redirect(base_url().'master/outgoing_payments', 'refresh');
	    
	}
	
	public function new_outgoing_payment_done(){
	    $payment_for_id = $this->input->post("payment_for_id");
	    $amount = $this->input->post("amount");
	    $date = $this->input->post('date');
	    $this->db->query("INSERT INTO outgoing_payments (payment_for_id, amount, date) VALUES ('$payment_for_id', '$amount', $date)");
	    
	    redirect(base_url().'master/outgoing_payments', 'refresh');
	}
	
	public function new_outgoing_payment(){
	    $payments_for_types = $this->db->query("SELECT * FROM payments_for_types");
	    $this->data["payments_for_types"] = $payments_for_types->result();
	    
	    
	    
	    $this->load->view('new_outgoing_payment', $this->data);
	}
	
	public function edit_outgoing_payment_done(){
	    $payment_for_id = $this->input->post("payment_for_id");
	    $amount = $this->input->post("amount");
	    $date = $this->input->post('date');
	    $id = $this->input->post('id');
	    
	    $this->db->query("UPDATE outgoing_payments SET amount = '$amount', payment_for_id = '$payment_for_id', date = '$date' WHERE id = '$id'");
	    redirect(base_url().'master/outgoing_payments/?view_type=outgoing_payments', 'refresh');
	}
	
	public function new_payment_for_type(){
	    $name = $this->input->post("name");
	   
	    $this->db->query("INSERT INTO payments_for_types (name) VALUES ('$name')");
	    
	    redirect(base_url().'master/outgoing_payments', 'refresh');
	}
	
	
	public function edit_outgoing_payment($id){
	    $payments_for_types = $this->db->query("SELECT * FROM payments_for_types");
	    $this->data["payments_for_types"] = $payments_for_types->result();
	    
	    $payment = $this->db->query("SELECT * FROM outgoing_payments WHERE id = '$id'");
	    $this->data["payment"] = $payment->result();
	    
	    
	    $this->load->view('edit_outgoing_payment', $this->data);
	}
	
	
	public function new_walad_done(){
		$walad_name = $this->input->post("walad_name");
		$walad_trteeb = $this->input->post("walad_trteeb");
		
		$this->db->query("INSERT INTO wladna (name, trteeb) VALUES ('$walad_name', '$walad_trteeb')");
		
		redirect(base_url().'master/wladna', 'refresh');
		
	}
	
	public function wladna(){
		$wladna = $this->db->query("SELECT * FROM wladna");
		$wladna = $wladna->result();
		$this->data["wladna"] = $wladna;
		//var_dump($cities);
		
		
		$this->load->view("wladna", $this->data);
		
	}
	
	public function masters(){
		$masters = $this->db->query("SELECT * FROM masters");
		$masters = $masters->result();
		$i = 0;
		foreach($masters as $m){
			$uid = $m->university_id;
			$university = $this->db->query("SELECT * FROM universities WHERE id = '$uid'");
			$university = $university->result();
			$masters[$i]->univ_ar_name = $university[0]->ar_name;
			$i++;
			
		}
		
		$this->data["masters"] = $masters;
		
		$this->load->view("masters", $this->data);
		
	}
	
	
	public function edit_city($city_id){
		$city = $this->db->query("SELECT * FROM cities WHERE city_id = '$city_id'");
		$city = $city->result();
		$this->data["city"] = $city[0];
		
		$this->load->view('edit_city', $this->data);
	}
	
	
	public function edit_university($uid){
		$university = $this->db->query("SELECT * FROM universities WHERE id = '$uid'");
		$university = $university->result();
		$this->data["university"] = $university[0];
		
		
		$cities = $this->db->query("SELECT * FROM cities");
		$this->data["cities"] = $cities->result();
		
		$this->load->view('edit_university', $this->data);
	}
	
	public function edit_payment($id){
	    $payment = $this->db->query("SELECT p.id, p.date,  p.amount, s.first_name, s.last_name, c.name as course_name FROM payments as p 
	        LEFT JOIN students as s ON p.student_id = s.id 
	        LEFT JOIN students_courses as sc ON sc.student_id = s.id
	        LEFT JOIN courses as c ON c.id = sc.course_id
	           WHERE p.id = '$id' ");
	    $payment = $payment->result();
	    $this->data["payment"] = $payment[0];
	    $this->load->view('edit_payment', $this->data);
	    
	}
	
	public function new_city(){
		
		
		$this->load->view('new_city', $this->data);
		
	}
	
	public function edit_payment_done(){
	    $id = $this->input->post("id");
	    $amount = $this->input->post("amount");
	    $date = $this->input->post("date");
	    
	    
	    $this->db->query("UPDATE payments SET amount = '$amount' , date = '$date' WHERE id = '$id'");
	    redirect(base_url().'master/payments', 'refresh');
	    
	}
	
	
	
	public function change_student_picture(){
	    $id = $this->input->post("id");
	    $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$config['upload_path']          = 'uploads/students_pictures/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|jpeg|JPG|PNG';
        $config['max_size']             = 1024;
        $new_name = time().$_FILES["photo"]['name'];
		$config['file_name'] = $new_name;

        $this->load->library('upload', $config);

        if (  $this->upload->do_upload('photo'))
        {	
                        
            $this->db->query("UPDATE students SET picture  = '$new_name' WHERE id = '$id'");
            
        }
        redirect(base_url().'master/student_profile/'.$id, 'refresh');
	}
	
	
	public function edit_student_info_done(){
	    $user_id = $this->input->post('user_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$mobile = $this->input->post('mobile');
		
	
	
	
		
		
		//echo $nickname;
		$this->db->query("UPDATE students SET
					first_name = '$first_name',
					last_name = '$last_name',
					gender = '$gender',
					scoial_stat = '$scoial_stat',
					birthday = '$birthday',
					nationality = '$nationality',
					birth_place = '$birth_place',
					kimlik_no = '$kimlik_no',
					ID_no = '$ID_no',
					father_name = '$father_name',
					mother_name = '$mother_name',
					gmail = '$gmail'
					
					
					WHERE id = '$user_id'");
					
					
		redirect(base_url().'master/student_profile/'.$user_id, 'refresh');
	}
	
	public function edit_student_done(){
	    $id = $this->input->post('id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
		
		
		
		
			$this->db->query("UPDATE students SET
					first_name = '$first_name',
					last_name = '$last_name',
					mobile = '$mobile', 
					email = '$email'
					
					
					
					WHERE id = '$id'");
					
					
					
					
		$password = $this->input->post('password');			
		$check = $this->db->query("SELECT * FROM students WHERE id = '$id'");
		$check = $check->result();
		$old_pass = $check[0]->password;
		if($old_pass != $password){
		    $password = md5($password);
		    	$this->db->query("UPDATE students SET
					password = '$password'
					
					
					
					WHERE id = '$id'");
		}
		
		
		redirect(base_url().'master/students/', 'refresh');
	}
	
	
	public function student_profile($id){
	    $student_info = $this->db->query("SELECT * FROM students WHERE id = '$id'");
	    $student_info = $student_info->result();
	    $this->data["student_info"] = $student_info[0];
	    
	    
	    $student_courses = $this->db->query("SELECT c.name, c.id FROM courses as c WHERE id IN (SELECT course_id FROM students_courses WHERE student_id = '$id')");
	    $student_courses= $student_courses->result();
	    $i = 0;
	    foreach($student_courses as $c){
	        $course_id = $c->id;
	        $payments = $this->db->query("SELECT * FROM payments WHERE course_id = '$c->id' AND student_id = '$id'");
	        $payments = $payments->result();
	        $student_courses[$i]->payments = $payments;
	        
	        
	        $fetch_cost = $this->db->query("SELECT * FROM students_courses WHERE course_id = '$course_id' AND student_id = '$id'");
	        $fetch_cost = $fetch_cost->result();
	        $student_courses[$i]->course_cost = $fetch_cost[0]->amount;
	        $i++;
	    }
	    $this->data["student_courses"] = $student_courses;
	    
	    
	    
	    $this->load->view('student_profile', $this->data);
	}
	
	
	public function edit_city_done(){
		$city_id = $this->input->post("city_id");
		$ar_name = $this->input->post("ar_name");
		$tr_name = $this->input->post("tr_name");
		
		$this->db->query("UPDATE cities SET ar_name = '$ar_name', tr_name = '$tr_name' WHERE city_id = '$city_id'");
		
		
		redirect(base_url().'master/cities', 'refresh');
	}
	
	public function delete_city($city_id){
		$this->db->query("DELETE FROM cities WHERE city_id = '$city_id'");
		redirect(base_url().'master/cities', 'refresh');
	}
	
	public function universities(){
		$universites = $this->db->query("SELECT u.ar_name as univ_ar_name, u.tr_name as univ_tr_name, 
			u.logo, c.ar_name as city_name, u.id
			FROM universities  as u LEFT JOIN cities as c ON c.city_id = u.city_id");
		$this->data["universities"] = $universites->result();
		
		$this->load->view('universities', $this->data);
		
	}
	
	
	public function new_university_done(){
		$ar_name = $this->input->post("ar_name");
		$city_id = $this->input->post("city_id");
		$tr_name = $this->input->post("tr_name");
		$website = $this->input->post("website");
		$ar_details = $this->input->post("ar_details");
		$tr_details = $this->input->post("tr_details");
		$tags = $this->input->post("tags");
		
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$config['upload_path']          = '../uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $config['max_size']             = 2048;
        $new_name = time().$_FILES["img"]['name'];
		$config['file_name'] = $new_name;
		
		$this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());
		$target_path = $new_name; 
		$this->upload->do_upload('img');
		
		
		$this->db->query("INSERT INTO universities (ar_name, tr_name, website, logo, ar_about, tr_about, tags, city_id) 
			VALUES ('$ar_name', '$tr_name', '$website', '$target_path', '$ar_details', '$tr_details', '$tags', '$city_id')");
			
			
		redirect(base_url().'master/universities', 'refresh');
	}
	
	
	
	public function new_master_done(){
		$university_id = $this->input->post("university_id");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");
		$results_date = $this->input->post("results_date");
		$ar_details = $this->input->post("ar_details");
		$nof_seats = $this->input->post("nof_seats");
		$website = $this->input->post("website");
		//$tr_details = $this->input->post("tr_details");
		//$tags = $this->input->post("tags");
		
		
		
		
		
		$this->db->query("INSERT INTO masters (nof_seats, start_date, website, end_date, results_date, university_id, ar_about) 
			VALUES ('$nof_seats', '$start_date', '$website', '$end_date', '$results_date', '$university_id', '$ar_details')");
			
			
		redirect(base_url().'master/masters', 'refresh');
	}
	
	public function new_payment_done(){
		$course_id = $this->input->post("course_id");
		$student_id = $this->input->post("student_id");
		$date = $this->input->post("date");
		$amount = $this->input->post("amount");
		$user_id = $this->session->userdata('admin_user_id');
		
		
		
		
		
		$this->db->query("INSERT INTO payments (course_id, student_id, date, amount, user_id) 
			VALUES ('$course_id', '$student_id', '$date', '$amount', '$user_id')");
			
			
		redirect(base_url().'master/payments', 'refresh');
	}
	
	public function edit_university_done(){
		$ar_name = $this->input->post("ar_name");
		$city_id = $this->input->post("city_id");
		//echo $city_id.'<br />';
		$tr_name = $this->input->post("tr_name");
		$website = $this->input->post("website");
		$ar_details = $this->input->post("ar_details");
		$tr_details = $this->input->post("tr_details");
		$tags = $this->input->post("tags");
		$uid = $this->input->post("id");
		//echo $uid;
		
		
		if($_FILES["img"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          =   '../uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload('img');
			$this->db->query("UPDATE universities SET logo='$target_path' WHERE id = '$uid'");
		}
		else{
			//echo 66;
		}
		
		
		$this->db->query("UPDATE universities SET ar_name = '$ar_name', tr_name = '$tr_name', ar_about = '$ar_details', 
			tr_about= '$tr_details', website = '$website', city_id = '$city_id' WHERE id = '$uid'");
			
			
		redirect(base_url().'master/universities', 'refresh');
	}
	
	
	public function fetch_student_ajax(){
	    $text = $this->input->post("text");
	    $course_id = $this->input->post("course_id");
	    
	    $query = "SELECT * FROM students WHERE 1 ";
	    if($text != ''){
	        $query .= " AND (first_name LIKE '%$text%' OR last_name LIKE '%$text%')";
	    }
	    
	    if($course_id != 0){
	        $query .= " AND id IN (SELECT student_id FROM students_courses WHERE course_id = '$course_id')";
	        
	    }
	    
	    $students = $this->db->query($query);
	    $students = $students->result();
	    echo "
	    <table class='table '>
			<tr >
				
				<th style=\"text-align: right\">الرقم</th>
				
				<th style=\"text-align: right\">الاسم</th>
				<th style=\"text-align: right\">الموبايل</th>
			
				<th style=\"text-align: right\">تعديل</th>
				<th style=\"text-align: right\">حذف</th>
				
			</tr>";
 
		foreach($students as $s){

			echo "<tr onclick=\"location.href='". base_url()."master/student_profile/". $s->id ."'\" class=\"student_row\">
				
				<td>". $s->id ."</td>
				<td>". $s->first_name .' ' .$s->last_name ."</td>
				<td>". $s->mobile."</td>
				
				
				<td><a href=\"". base_url() ."master/edit_student/". $s->id."\" >تعديل</a></td>
				<td><a href=\"".  base_url()."master/delete_student/". $s->id."\">حذف</a></td>
			</tr>";
	

		}


            echo "</table>";
	}
	
	
	
	public function edit_student($id){
	    $student = $this->db->query("SELECT * FROM students WHERE id = '$id'");
	    $student = $student->result();
	    $this->data["student"] = $student[0];
	    
	    $this->load->view("edit_student", $this->data);
	    
	}
	
	public function students(){
	    $all_courses = $this->db->query("SELECT * FROM courses ");
		$this->data["all_courses"] = $all_courses->result();
		
		
		$query = "SELECT * FROM students WHERE 1 ";
		
		if($this->input->get('course_id') > 0){
		    $course_id = $this->input->get('course_id');
		    $query .= " AND id IN (SELECT student_id FROM students_courses WHERE course_id = '$course_id')";
		}
		
		$students = $this->db->query($query);
		$students = $students->result();
		
		$this->data["students"] = $students;
		
		$this->load->view("students", $this->data);
	}
	
	public function new_student(){
		
		$this->load->view("new_student", $this->data);
	}
	
	
	public function payments(){
	
		
	    $query = "SELECT payment.id, student.first_name, student.last_name, course.name, user.username, payment.amount, student.id as student_id,
		payment.amount, payment.date, course.id as course_id FROM payments as payment
		LEFT JOIN students as student ON student.id = payment.student_id
		LEFT JOIN courses as course ON course.id = payment.course_id
		LEFT JOIN users as user ON user.id = payment.user_id ";
	    
	    if($this->input->get('start_date') != ''){
	        $start_date = $this->input->get('start_date');
	        $end_date = $this->input->get('end_date');
	        
	        $query .= " WHERE payment.date between '$start_date' AND '$end_date'";
	   }
	    
	    $query .=  " ORDER BY payment.id DESC";
		$payments  = $this->db->query($query);
		$payments = $payments->result();
		$i = 0;
		foreach($payments as $p){
		   
		    $student_id = $p->student_id;
		    $payment_id = $p->id;
		    
		    $allpayments  = $this->db->query("SELECT sum(amount) as total FROM payments WHERE id <= '$payment_id' AND student_id = '$student_id'");
		    $allpayments = $allpayments->result();
		    $total = $allpayments[0]->total;
		    $payments[$i]->total = $total;
		    
		    
		    
		    $course_id = $p->course_id;
		    $course_cost = $this->db->query("SELECT amount FROM students_courses WHERE student_id = '$student_id' AND course_id = '$course_id' ");
		    $course_cost = $course_cost->result();
		    if($course_cost){
		        $payments[$i]->course_cost = $course_cost[0]->amount;
		    }
		    else{
		         $payments[$i]->course_cost = null;
		    }
		   
		    $i++;
		}
		
		
		
		
		$this->data["payments"] = $payments;
		
		$this->load->view("payments", $this->data);
	}
	
	
	public function add_student_to_course($course_id){
		$this->data["course_id"] = $course_id;
		
		$course = $this->db->query("SELECT * FROM courses WHERE id = '$course_id'");
		$course = $course->result();
		$this->data["course"] = $course[0];
		
		$this->load->view("add_student_to_course", $this->data);
	}
	
	public function add_student_to_course_type($course_type_id){
		$this->data["course_type_id"] = $course_type_id;
		
		$course = $this->db->query("SELECT * FROM courses_types WHERE id = '$course_type_id'");
		$course = $course->result();
		$this->data["course_type"] = $course[0];
		
		$this->load->view("add_student_to_course_type", $this->data);
	}
	
	
	
	public function add_teacher_to_course($course_id){
		$this->data["course_id"] = $course_id;
		
		$course = $this->db->query("SELECT * FROM courses WHERE id = '$course_id'");
		$course = $course->result();
		$this->data["course"] = $course[0];
		
		$this->load->view("add_teacher_to_course", $this->data);
	}
	
	
	public function add_student_to_course_done(){
		
		$student_id = $this->input->post('student_id');
		$course_id = $this->input->post('course_id');
		$amount = $this->input->post('amount');
		$user_id = $this->session->userdata('admin_user_id');
		
		$this->db->query("INSERT INTO students_courses (student_id, course_id, amount, date, user_id ) VALUES 
								('$student_id', '$course_id', '$amount', NOW(), '$user_id')");
		redirect(base_url().'master/courses', 'refresh');
		
	}
	
	
	public function add_student_to_course_type_done(){
		
		$student_id = $this->input->post('student_id');
		$course_type_id = $this->input->post('course_type_id');
		$amount = $this->input->post('amount');
		$user_id = $this->session->userdata('admin_user_id');
		
		$courses = $this->db->query("SELECT * FROM courses WHERE course_type = '$course_type_id'")->result();
		if($courses){
		    foreach($courses as $c){
		        $cid = $c->id;
		        $this->db->query("INSERT INTO students_courses (student_id, course_id, amount, date, user_id ) VALUES 
								('$student_id', '$cid', '$amount', NOW(), '$user_id')");
				
		    }
		    redirect(base_url().'master/courses_types', 'refresh');
		}
		else{
		    //redirect(base_url().'master/courses_types', 'refresh');
		}
		
		
		
		
		
		
	}
	
	
	
	
	
	public function add_teacher_to_course_done(){
		
		$teacher_id = $this->input->post('teacher_id');
		$course_id = $this->input->post('course_id');
	
		
		$this->db->query("INSERT INTO courses_teachers (teacher_id, course_id ) VALUES 
								('$teacher_id', '$course_id')");
		redirect(base_url().'master/courses', 'refresh');
		
	}
	
	
	
	
	public function edit_student_course_amount(){
	    $student_id = $this->input->post('student_id');
		$course_id = $this->input->post('course_id');
		$amount = $this->input->post('amount');
		$this->db->query("UPDATE students_courses SET amount = '$amount' WHERE course_id = '$course_id' AND student_id = '$student_id'");
		
	    
	    redirect(base_url().'master/view_course/'.$course_id, 'refresh');
	}
	
	
	
	public function view_course($course_id){
				/************** fetch students ***********/
		$students = $this->db->query("SELECT * FROM students WHERE id IN (SELECT student_id FROM students_courses 
			WHERE course_id = '$course_id')");
		$students = $students->result();
		$i = 0;
		foreach($students as $s){
			$student_id = $s->id;
			
			$total_amount = $this->db->query("SELECT * FROM students_courses WHERE student_id = '$student_id' AND course_id = '$course_id'");
			$total_amount = $total_amount->result();
			$students[$i]->total_amount = $total_amount[0]->amount;
			
			$payments = $this->db->query("SELECT * FROM payments WHERE course_id = '$course_id' AND student_id = '$student_id' ");
			$payments = $payments->result();
			$students[$i]->payments = $payments;
			$i++;
			
			
		}
		
		$this->data["students"] = $students;								
		/************** fetch course details ***************/		
		$course = $this->db->query("SELECT *  FROM courses WHERE id = '$course_id'");		
		$course = $course->result();		$this->data['course'] = $course[0];								
		
		
		/************** fetch course subjects ***********/		
		$subjects = $this->db->query("SELECT * FROM subjects WHERE course_id = '$course_id'");		
		$subjects = $subjects->result();		$this->data['subjects'] = $subjects;						
		
		/************ fetch course lessons ***********/		
		$lessons = $this->db->query("SELECT l.name as lesson_name, l.id as lesson_id, s.name as  subject_name , l.ordering	, l.free_preview		
			FROM lessons as l LEFT JOIN subjects as s ON l.subject_id = s.id 			
			LEFT JOIN courses as c ON c.id = s.course_id 			
			
			WHERE c.id = '$course_id'")->result();		
		
		$i = 0;
		foreach($lessons as $l){
		    $lid = $l->lesson_id;
		    $lessons[$i]->files = $this->db->query("SELECT * FROM files  WHERE lesson_id = '$lid'")->result();
		    
		    $i++;
		}
			
		$this->data['lessons'] = $lessons;
		$this->data['course_id'] = $course_id;		

		
		/************ fetch courses types ***************/		
		$courses_types = $this->db->query("SELECT * FROM courses_types");		
		$this->data['courses_types'] = $courses_types->result();		
		$this->load->view("view_course_students", $this->data);
	}
	
	public function courses(){
	    $user_id = $this->session->userdata('admin_user_id');
	    
		$courses = $this->db->query("SELECT * FROM courses WHERE id IN (SELECT course_id FROM courses_teachers WHERE teacher_id = '$user_id')");
		$courses = $courses->result();
		
		$this->data["courses"] = $courses;
		
		$this->load->view("courses", $this->data);
	}
	
	public function new_course(){
	    
	    $courses_types = $this->db->query("SELECT * FROM courses_types");
	    $this->data['courses_types'] = $courses_types->result();
		
		$this->load->view("new_course", $this->data);
	}
	
	
	public function add_file($lesson_id, $course_id){
	    
	    
	    
	    $this->data["lesson_id"] = $lesson_id;
	    
	    $this->data["course_id"] = $course_id;
	    
		$this->load->view("add_file", $this->data);
	    
	    
	    
	}
	
	
	
	public function cities(){
		$cities = $this->db->query("SELECT * FROM cities");
		$cities = $cities->result();
		$this->data["cities"] = $cities;
		//var_dump($cities);
		
		
		$this->load->view("cities", $this->data);
		
	}
		public function add_subject(){		
		    $name = $this->input->post('name');		
		    $course_id = $this->input->post('course_id');			
		    $this->db->query("INSERT INTO subjects (name, course_id) VALUES ('$name', '$course_id')");				
		    redirect(base_url().'master/view_course/'.$course_id.'?tab=subjects', 'refresh');	
		    
		}			
	public function add_lesson(){			
	    $lesson_name = $this->input->post('name');		
	    $subject_id = $this->input->post('subject_id');		
	    $course_id = $this->input->post('course_id');				
	    $this->load->helper(array('form', 'url'));        
	    $this->load->library('form_validation');	
	    $config['upload_path']          = '../uploads';        
	    $config['allowed_types']        = 'gif|jpg|png|pdf|doc|jpeg|JPG|PNG|mp4';        
	    $config['max_size']             = 10000000;        
	    $name = $_FILES["video"]['name'];        
	    $ext = explode(".", $name);
	    $new_name = time().rand(10000000, 100000000).'.'.end($ext);				
	    $config['file_name'] = $new_name;        
	    $this->load->library('upload', $config);        
	    if ( ! $this->upload->do_upload('video'))       
	    {	                                    
	        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');            
	        $error = array('error' => $this->upload->display_errors());			
	        var_dump($error);            //$this->load->view('upload', $error);        
	   }				
	        
	        $targetFilePath = '../uploads/'.$new_name;
	        
	        //echo $targetFilePath;
	        
	        //$this->load->library('getid3');
	        
	        require_once('application/libraries/getid3/getid3.php');
	        $getID3 = new getID3;

            // Analyze the uploaded video file
            $fileInfo = $getID3->analyze($targetFilePath);
            //var_dump($fileInfo);
            // Get the duration in seconds
            $duration = $fileInfo['playtime_string'];

            // Display the duration
            //..
            //echo 'Video duration: ' . $duration . ' seconds';
	        
	        $this->db->query("INSERT INTO lessons (name, video, subject_id, duration ) VALUES 							
	        ('$lesson_name', '$new_name', '$subject_id', '$duration')");		
	        redirect(base_url().'master/view_course/'.$course_id, 'refresh');					
	    
	}
	
	public function new_slider(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$type = $this->input->post('type');
		$name = $this->input->post('name');
		$style = $this->input->post('style');
		$item_id = $this->input->post('item_id');
		$nof_of_programs = $this->input->post('nof_of_programs');
		
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $config['max_size']             = 2048;
        $new_name = time().$_FILES["img"]['name'];
		$config['file_name'] = $new_name;
		
		$this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());
		$target_path = $new_name; 
		$this->upload->do_upload('img');
		
		$this->db->query("INSERT INTO slider (name, type, nof_of_programs, image, item_id, style ) VALUES 
								('$name', '$type', '$nof_of_programs', '$target_path', '$item_id', '$style')");
		redirect(base_url().'settings/slider', 'refresh');
		
		
	}
	
	
	public function new_blog(){
		$categories  = $this->db->query("SELECT * FROM categories");
		$this->data["categories"] = $categories->result();
		
		$this->load->view('new_blog', $this->data);
	}
	
	
	
	
	
	
	public function edit_blog($id){
		$categories  = $this->db->query("SELECT * FROM categories");
		$this->data["categories"] = $categories->result();
		
		$article = $this->db->query("SELECT * FROM blog WHERE id  = '$id'");
		$article = $article->result();
		$this->data["article"] = $article[0];
		
		$this->load->view('edit_blog', $this->data);
	}
	
	
	public function edit_blog_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$id = $this->input->post('id');
		$category_id = $this->input->post('category_id');
		
		
	
		
		if($_FILES["img"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = 'uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload('img');
			$this->db->query("UPDATE blog SET image='$target_path' WHERE id = '$id'");
		}
		else{
			//echo 66;
		}
		
		
		
		
		$this->db->query("UPDATE blog SET title = '$title', content = '$content', category_id = '$category_id' WHERE id = '$id'");
		redirect(base_url().'settings/blog', 'refresh');
		
		
		
		
		
	}
	
	
	public function blog_featured($id, $status){
		$this->load->database();
		$this->db->query("UPDATE blog SET featured = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		
		redirect(base_url().'settings/blog', 'refresh');
	}
	
	public function delete_blog($id){
		$this->load->database();
		$this->db->query("DELETE FROM blog WHERE id = '$id'");
		redirect(base_url().'settings/blog', 'refresh');
	}
	
	
	public function new_blog_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		
		
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $config['max_size']             = 2048;
        $new_name = time().$_FILES["img"]['name'];
		$config['file_name'] = $new_name;
		
		$this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());
		$target_path = $new_name; 
		$this->upload->do_upload('img');
		
		$this->db->query("INSERT INTO blog (title, content, category_id, image, featured, date ) VALUES 
								('$title', '$content', '$category_id', '$target_path', '1', NOW())");
		redirect(base_url().'settings/blog', 'refresh');
		
	}
	
	
	
	public function add_file_done(){
		if(!$this->session->userdata('teacher_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$teacher_id = $this->session->userdata('teacher_id');
		$name = $this->input->post('name');
		$subject_id = $this->input->post('subject_id');
		
		$course_id = $this->input->post('course_id');
		
		/*************** add notifictions to all students *************/
		$teacher = $this->db->query("SELECT * FROM teachers WHERE id = '$teacher_id'")->result();
		$teacher = $teacher[0];
		$all_students   = $this->db->query("SELECT * FROM students WHERE id IN (SELECT student_id FROM students_courses WHERE 
							course_id = '$course_id')")->result();
							
		$text = "قام الاستاذ ".$teacher->full_name ." بإضافة ملف مساعد جديد ";
		foreach($all_students as $s){
			$sid = $s->id;
			
			$this->db->query("INSERT INTO students_notifications (student_id, text, date) VALUES ('$sid', '$text', NOW())");
			
		}
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$config['upload_path']          = '../uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $config['max_size']             = 10000000;
        $new_name = time().$_FILES["img"]['name'];
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
        $data = array('upload_data' => $this->upload->data());
		$target_path = $new_name; 
		$size = $_FILES['img']['size'];
		$this->upload->do_upload('img');
		$this->db->query("INSERT INTO teachers_files (file, name, course_id, size, teacher_id, subject_id) 
		VALUES  ('$target_path', '$name', '$course_id', '$size', '$teacher_id', '$subject_id')");
		redirect(base_url().'master/teachers_files/', 'refresh');
	}
	
	
	public function delete_files($id, $course_id){
	   
	    $this->db->query("DELETE FROM files WHERE id = '$id'");
	    redirect(base_url().'master/view_course/'.$course_id.'?tab=lessons', 'refresh');
	    
	    
	}
	
	
	public function blog(){
		
		$articles = $this->db->query("SELECT b.id, b.featured, b.title, b.content, b.date, c.en_name FROM blog as b LEFT JOIN categories as c ON c.id = b.category_id
		ORDER BY b.id DESC");
		$this->data["articles"] = $articles->result();
		

		$this->load->view('blog', $this->data);
	}
	
	
	public function slider(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
	
		$categories = $this->db->query("SELECT * FROM categories WHERE parent_id != 0");
		$this->data["categories"] = $categories->result();
		
		
		$page = $this->db->query("SELECT * FROM slider");
		$page = $page->result();
		$this->data["slider"] = $page;
		
		$this->load->view('slider', $this->data);
		
	}
	
	
	
	
	
	public function language(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		/********************** fetch translations ****************************/
		$all_words = $this->db->query("SELECT * FROM translations");
		$all_words = $all_words->result();
		$this->data["all_words"] = $all_words;
	
		
		
		
		
		$this->load->view('language', $this->data);
		
	}
	
	public function banners(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		
		/********************** fetch banners ****************************/
		$this->load->model('Fetch_items');
		$this->data['banner_1'] = $this->Fetch_items->fetch_banner("1");
		$this->data['banner_2'] = $this->Fetch_items->fetch_banner("2");
		$this->data['banner_3'] = $this->Fetch_items->fetch_banner("3");
		$this->data['banner_4'] = $this->Fetch_items->fetch_banner("4");
		$this->data['banner_5'] = $this->Fetch_items->fetch_banner("5");
		$this->data['banner_6'] = $this->Fetch_items->fetch_banner("6");
		$this->data['banner_7'] = $this->Fetch_items->fetch_banner("7");
	
		
		
		
		
		$this->load->view('banners', $this->data);
		
	}
	public function edit_banner($banner_id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		
		/********************** fetch banners ****************************/
		$this->load->model('Fetch_items');
		$this->data['banner'] = $this->Fetch_items->fetch_banner($banner_id);
		
	
		
		
		
		
		$this->load->view('edit_banner', $this->data);
		
	}
	
	public function edit_language(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$id = $this->input->post('id');
		$ar = $this->input->post('ar');
		$en = $this->input->post('en');
		$de = $this->input->post('de');
		
		$this->db->query("UPDATE translations SET ar = '$ar', en = '$en', de = '$de' WHERE id = '$id'");
		
		redirect(base_url().'settings/language', 'refresh');
	}
	
	
	public function edit_banner_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$id = $this->input->post('id');
		$url = $this->input->post('url');
		
		if($_FILES["image"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = 'images/banners/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["image"]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload('image');
			$this->db->query("UPDATE banners SET image_ar='$target_path' WHERE id = '$id'");
		}
		else{
			//echo 66;
		}
		$this->db->query("UPDATE banners SET url='$url' WHERE id = '$id'");
		redirect(base_url().'settings/banners', 'refresh');
		
	}
	
	
	
	
	public function delete_slider($id){
		$this->load->database();
		$this->db->query("DELETE FROM slider WHERE id = '$id'");
		redirect(base_url().'settings/slider', 'refresh');
	}
	
	public function edit_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$content = $this->input->post('content');
		$id = $this->input->post('id');
		
		$this->db->query("UPDATE pages SET content = '$content' WHERE id = '$id'");
		
		redirect(base_url().'pages', 'refresh');
		
		
		
		
		
	}
	
	public function display(){
		$this->load->database();
		$word = $this->input->get('word');
		$lang = $this->input->get('lang');
		$word = $this->db->query("SELECT * FROM translations WHERE title = '$word'");
		$word = $word->result();
		echo $word[0]->$lang;
	}
	public function change_lang(){
		$lang = $this->input->get('lang');
		//echo $lang;
		$this->session->set_userdata('lang', $lang);
		
		redirect(base_url(), 'refresh');
	}
	
	public function info(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		
	
		
		
		$email = $this->db->query("SELECT * FROM settings WHERE name = 'email'");
		$email = $email->result();
		$this->data["email"] = $email[0]->content;
		
		
		$address = $this->db->query("SELECT * FROM settings WHERE name = 'address'");
		$address = $address->result();
		$this->data["address"] = $address[0]->content;
		
		
		
		$about_us = $this->db->query("SELECT * FROM settings WHERE name = 'about_us'");
		$about_us = $about_us->result();
		$this->data["about_us"] = $about_us[0]->content;
		
		
		$phone = $this->db->query("SELECT * FROM settings WHERE name = 'phone'");
		$phone = $phone->result();
		$this->data["phone"] = $phone[0]->content;
		
		$facebook = $this->db->query("SELECT * FROM settings WHERE name = 'facebook'");
		$facebook = $facebook->result();
		$this->data["facebook"] = $facebook[0]->content;
		
		$twitter = $this->db->query("SELECT * FROM settings WHERE name = 'twitter'");
		$twitter = $twitter->result();
		$this->data["twitter"] = $twitter[0]->content;
		
		
		$instegram = $this->db->query("SELECT * FROM settings WHERE name = 'instegram'");
		$instegram = $instegram->result();
		$this->data["instegram"] = $instegram[0]->content;
		
		$whatsapp = $this->db->query("SELECT * FROM settings WHERE name = 'whatsapp'");
		$whatsapp = $whatsapp->result();
		$this->data["whatsapp"] = $whatsapp[0]->content;
		
		$snapchat = $this->db->query("SELECT * FROM settings WHERE name = 'snapchat'");
		$snapchat = $snapchat->result();
		$this->data["snapchat"] = $snapchat[0]->content;
		
		$youtube = $this->db->query("SELECT * FROM settings WHERE name = 'youtube'");
		$youtube = $youtube->result();
		$this->data["youtube"] = $youtube[0]->content;
		
		$telegram = $this->db->query("SELECT * FROM settings WHERE name = 'telegram'");
		$telegram = $telegram->result();
		$this->data["telegram"] = $telegram[0]->content;
		
		
		$logo = $this->db->query("SELECT * FROM settings WHERE name = 'logo'");
		$logo = $logo->result();
		$this->data["logo"] = $logo[0]->content;
		
		
		
		$map = $this->db->query("SELECT * FROM settings WHERE name = 'map'");
		$map = $map->result();
		$this->data["map"] = $map[0]->content;
		
		
		
		$view_price = $this->db->query("SELECT * FROM settings WHERE name = 'view_price'");
		$view_price = $view_price->result();
		$this->data["view_price"] = $view_price[0]->content;
		
		
		$view_price = $this->db->query("SELECT * FROM settings WHERE name = 'nof_students'");
		$view_price = $view_price->result();
		$this->data["nof_students"] = $view_price[0]->content;
		$view_price = $this->db->query("SELECT * FROM settings WHERE name = 'nof_courses'");
		$view_price = $view_price->result();
		$this->data["nof_courses"] = $view_price[0]->content;
		$view_price = $this->db->query("SELECT * FROM settings WHERE name = 'nof_subjects'");
		$view_price = $view_price->result();
		$this->data["nof_subjects"] = $view_price[0]->content;
		$view_price = $this->db->query("SELECT * FROM settings WHERE name = 'nof_teachers'");
		$view_price = $view_price->result();
		$this->data["nof_teachers"] = $view_price[0]->content;
		
		
		$this->load->view('info', $this->data);
		
	}
	
	public function edit_info(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$content = $this->input->post('content');
		$name = $this->input->post('name');
		$sql = "UPDATE settings SET content = '$content' WHERE name = '$name'";
		//echo $sql;
		$this->db->query($sql);
		redirect(base_url().'settings/info', 'refresh');
	}
	
	public function edit_logo(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		if($_FILES["img"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = 'uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			print_r($config);
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			if(!$this->upload->do_upload('img')){
					$error =array('upload_data' => $this->upload->data());
					die("Error");
			}
			$this->db->query("UPDATE settings SET content = '$target_path' WHERE  name = 'logo'");
		}
		redirect(base_url().'settings/info', 'refresh');
	}
	
	
	
	public function admins(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		
		$users = $this->db->query("SELECT * FROM users ");
		$users = $users->result();
		$this->data["users"] = $users;
		
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		$this->load->view('admins', $this->data);
		
	}
	
	
	public function edit_admin($id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(22, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		$users = $this->db->query("SELECT * FROM users WHERE id = '$id' ");
		$users = $users->result();
		$this->data["users"] = $users[0];
		
		$menu = $this->db->query("SELECT * FROM menu ");
		$menu = $menu->result();
		
		$i = 0;
		foreach($menu as $m){
			$menu_type = $m->id.'_0';
			$per = $this->db->query("SELECT * FROM user_per WHERE user_id = '$id' AND menu_type = '$menu_type'");
			$per = $per->result();
			if($per){
				$menu[$i]->type = 1;
			}
			else{
				$menu[$i]->type = 0;
			}
			$i++;
		}
		$this->data["menu"] = $menu;
		
		
		$this->load->view('edit_admin', $this->data);
	}
	
	
	
	
	
	
	public function new_admin(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(22, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		
		
		$menu = $this->db->query("SELECT * FROM menu ");
		$menu = $menu->result();
		
		
		
		$this->data["menu"] = $menu;
		
		
		$this->load->view('new_admin', $this->data);
	}
	
	
	
	public function new_admin_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$username = $this->input->post("username");
		$password = md5($this->input->post("password"));
		$this->db->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
		$fetch_last_user = $this->db->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
		$fetch_last_user = $fetch_last_user->result();
		$user_id = $fetch_last_user[0]->id;
		
		
		
		
		
		$this->db->query("DELETE FROM user_per WHERE user_id = '$user_id'");
		$menu = $this->input->post("menu");
		for($i = 0; $i < count($menu); $i++){
			$menu_per = $menu[$i].'_0';
			$this->db->query("INSERT INTO user_per (menu_type, user_id) VALUES ('$menu_per', '$user_id') ");
		}
		
		
		redirect(base_url().'settings/admins', 'refresh');
	}
	
	
	
	
	public function edit_admin_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$user_id = $this->input->post("user_id");
		$username = $this->input->post("username");
		$password = md5($this->input->post("password"));
		
		$fetch_user = $this->db->query("SELECT * FROM users WHERE id = '$user_id'");
		$fetch_user  = $fetch_user->result();
		$user_password = $fetch_user[0]->password;
		if($user_password != $password){
			$this->db->query("UPDATE users SET username = '$username', password = '$password' WHERE id = '$user_id'");
		}
		else{
			$this->db->query("UPDATE users SET username = '$username' WHERE id = '$user_id'");
		
		}
		
		
		
		$this->db->query("DELETE FROM user_per WHERE user_id = '$user_id'");
		$menu = $this->input->post("menu");
		for($i = 0; $i < count($menu); $i++){
			$menu_per = $menu[$i].'_0';
			$this->db->query("INSERT INTO user_per (menu_type, user_id) VALUES ('$menu_per', '$user_id') ");
		}
		
		
		
		
		redirect(base_url().'settings/admins', 'refresh');
	}
	
	
	
	public function delete_admin($id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$this->db->query("DELETE FROM users WHERE id = '$id'");
		$this->db->query("DELETE FROM user_per  WHERE user_id = '$id'");
		redirect(base_url().'settings/admins', 'refresh');
	}
	
	
	public function statistics(){
	    $all_courses = $this->db->query("SELECT * FROM courses ");
	    $this->data['all_courses'] = $all_courses->result();
	    
	    $query = "SELECT * FROM students WHERE 1 ";
	    if($this->input->get('course_id') !=0){
	        $course_id = $this->input->get('course_id');
	        $filter_type= $this->input->get('filter_type');
	        $month = $this->input->get('month');
	        if($filter_type == 1){
	            $query .= " AND id IN (SELECT student_id FROM students_courses WHERE course_id = '$course_id') AND id NOT IN (SELECT student_id FROM payments WHERE date LIKE '%-$month-%')";
	            
	        }
	        else if($filter_type == 2){
	            $query .= " AND id IN (SELECT student_id FROM students_courses WHERE course_id = '$course_id') AND id IN (SELECT student_id FROM payments WHERE date LIKE '%-$month-%')";
	        }
	        
	        
	        
	    }
	    else{
	        $filter_type= $this->input->get('filter_type');
	        $month = $this->input->get('month');
	        if($filter_type == 1){
	            $query .= " AND  id NOT IN (SELECT student_id FROM payments WHERE date LIKE '%-$month-%')";
	            
	        }
	        else if($filter_type == 2){
	            $query .= " AND  id IN (SELECT student_id FROM payments WHERE date LIKE '%-$month-%')";
	        }
	    }
	    //echo $query;
	    $all_students = $this->db->query($query);
	    $all_students = $all_students->result();
	    $i = 0;
	    foreach($all_students as $s){
	        if($this->input->get('filter_type') == 2){
	            $month = $this->input->get("month");
	            $fetch_payments = $this->db->query("SELECT * FROM payments WHERE student_id = '$s->id' AND date LIKE '%-$month-%'");
	        
	        }
	        else{
	            $fetch_payments = $this->db->query("SELECT * FROM payments WHERE student_id = '$s->id'");
	            
	        }
	        $fetch_payments = $fetch_payments->result();
	        $all_students[$i]->payments = $fetch_payments;
	        $i++;
	    }
	    $this->data['students'] = $all_students;
	    
	    $this->load->view('statistics', $this->data);
		
	}
	
	
	public function courses_visible(){
		$this->load->database();
		$id = $this->input->post('id');
		$status = $this->input->post('value');
		$this->db->query("UPDATE courses SET visible = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
	
		redirect(base_url().'/master/courses', 'refresh');
	}
	
	
	public function courses_featured(){
		$id = $this->input->post('id');
		$status = $this->input->post('value');
		$this->load->database();
		$this->db->query("UPDATE courses SET featured = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		
		redirect(base_url().'/master/courses', 'refresh');
	}

	public function messages_box()
	{
		$this->load->database();
		$teacher_id = $this->session->userdata('teacher_id');
		//echo $teacher_id;
		$messages = $this->db->query("SELECT * FROM teacher_student_message WHERE teacher_id = '$teacher_id'")->result();
		$this->data["messages"] = $messages;
		$teachers = $this->db->query("SELECT * FROM teachers WHERE id = '$teacher_id'")->result();
		$school_id=$teachers[0]->school_id;
		$students = $this->db->query("SELECT * FROM students WHERE school_id = '$school_id'")->result();
		$this->data["students"] = $students;
		//var_dump($students);
		$this->load->view('messages_box', $this->data);
	}
	public function reply_messaage_page($id)
	{
		$message = $this->db->query("SELECT * FROM teacher_student_message WHERE id = '$id'")->result();
		$student_id=$message[0]->student_id;
		//echo $student_id;
		//var_dump($message);
		$this->data["message"] = $message;
		$students = $this->db->query("SELECT * FROM students WHERE id = '$student_id'")->result();
		$this->data["students"] = $students;
		$this->load->view('reply_message', $this->data);
	}
	public function reply_messaage($id)
	{
		$this->load->database();
		$message = $this->db->query("SELECT * FROM teacher_student_message WHERE id = '$id'")->result();	
		if($this->input->post())
		{
		    $data['student_id']=$message[0]->student_id;
			$data['teacher_id']=$message[0]->teacher_id;
			$data['message']=$this->input->post('message');
			$data['from_t_to_s']='0';
			$data['date']=date("Y-m-d");
			$response=$this->db->insert('teacher_student_message',$data);
			redirect(base_url().'master/messages_box', 'refresh');
			if($response==true)
			{
			    echo "تم إرسال الرسالة بنجاح، شكرا لكم";
			}
			else{
				echo "لم يتم إرسال الشكوى بنجاح يرجى المحاولة من جديد";
			}
   		}
	}
	public function messages_box_students_list()
	{
		$this->load->database();
		$teacher_id = $this->session->userdata('teacher_id');
		$teachers = $this->db->query("SELECT * FROM teachers WHERE id = '$teacher_id'")->result();
		//var_dump($teachers);
		$school_id=$teachers[0]->school_id;
		//echo $school_id;
		$students = $this->db->query("SELECT * FROM students WHERE id IN (SELECT student_id FROM students_courses WHERE course_id IN 
				(SELECT course_id FROM courses_teachers WHERE teacher_id = '$teacher_id'))")->result();
		$this->data["students"] = $students;
		$this->load->view('messages_box_students_list', $this->data);
	}
	public function send_message_for_student_page($id)
	{
		$student = $this->db->query("SELECT * FROM students WHERE id = '$id'")->result();
		$this->data["student"] = $student;
		$this->load->view('messages_box_student_page', $this->data);
	}
	public function send_message_for_student($id)
	{
		$this->load->database();
		if($this->input->post())
		{
		    $data['student_id']=$id;
			$data['teacher_id']=$this->session->userdata('teacher_id');
			
			
			$teacher_id = $this->session->userdata('teacher_id');
			$teacher = $this->db->query("SELECT * FROM teachers WHERE id  = '$teacher_id'")->result();
			$teacher = $teacher[0];
			
			$text = "قام الاستاذ " . $teacher->full_name .' بإرسال رسالة جديدة';
			$this->db->query("INSERT INTO students_notifications (student_id, text, date) VALUES ('$id', '$text', NOW())");
			
			$data['message']=$this->input->post('message');
			$data['from_t_to_s']='0';
			$data['date']=date("Y-m-d");
			$response=$this->db->insert('teacher_student_message',$data);
			redirect(base_url().'master/messages_box_students_list', 'refresh');
			if($response==true)
			{
			    echo "تم إرسال الرسالة بنجاح، شكرا لكم";
			}
			else{
				echo "لم يتم إرسال الشكوى بنجاح يرجى المحاولة من جديد";
			}
   		}
	}
	public function sent_messages()
	{
		$this->load->database();
		$teacher_id = $this->session->userdata('teacher_id');
		$teacher = $this->db->query("SELECT * FROM teachers WHERE id = '$teacher_id'")->result();
		$school_id = $teacher[0]->school_id;
		$messages = $this->db->query("SELECT * FROM teacher_student_message WHERE teacher_id = '$teacher_id'")->result();
		$this->data["messages"] = $messages;
		$students = $this->db->query("SELECT * FROM students WHERE school_id = '$school_id'")->result();
		$this->data["students"] = $students;
		$this->load->view('sent_messages_view', $this->data);
	}
	public function students_page()
	{
		$this->load->database();
		$teacher_id = $this->session->userdata('teacher_id');
		//echo $teacher_id;
		$teacher = $this->db->query("SELECT * FROM teachers WHERE id = '$teacher_id'")->result();
		$school_id = $teacher[0]->school_id;
		//echo $school_id;
		//echo "</br>";
		$teacher_courses = $this->db->query("SELECT * FROM courses_teachers WHERE teacher_id = '$teacher_id'")->result();
		//var_dump($teacher_courses);
		//echo "</br>";
		$i=0;
		$j=0;
		foreach($teacher_courses as $t)
		{
			$course_id = $t->course_id;
			//$students = $this->db->query()
			$i++;
		}
		
		
			
		if($this->input->get('course_id')!=0){
			$course_id = $this->input->get('course_id');
			$query = "SELECT * FROM students WHERE id IN (SELECT DISTINCT student_id FROM students_courses WHERE course_id IN 
			(SELECT course_id FROM courses_teachers WHERE teacher_id = '$teacher_id' AND course_id = '$course_id'))";
			
		}
		else{
			
			$query = "SELECT * FROM students WHERE id IN (SELECT DISTINCT student_id FROM students_courses WHERE course_id IN 
			(SELECT course_id FROM courses_teachers WHERE teacher_id = '$teacher_id'))";
			
		}
		
		$students = $this->db->query($query)->result();
		
		$i = 0;
		foreach($students as $s){
			$sid = $s->id;
			//echo $sid;
			$class_name = $this->db->query("SELECT * FROM courses WHERE id = (SELECT course_id FROM students_courses WHERE student_id = '$sid' AND is_finished = 0)")->result();
			//var_dump($class_name);
			if($class_name){
				$students[$i]->class_name = $class_name[0]->name;
				$course_type_id = $class_name[0]->course_type;
				//echo $course_type_id;
				$course_type = $this->db->query("SELECT * FROM courses_types WHERE id = '$course_type_id'")->result();
				$students[$i]->course_type_name = $course_type[0]->ar_name;
			}
			else{
				$students[$i]->class_name = '';
				$students[$i]->course_type_name = '';
			}
			
			
			
			$i++;
		}
		
		
		$teacher_courses = $this->db->query("SELECT * FROM courses WHERE id IN (SELECT course_id FROM courses_teachers 
				WHERE teacher_id = '$teacher_id')")->result();
		$i = 0;
		foreach($teacher_courses as $c){
			$course_type = $c->course_type;
			$course_type_name  = $this->db->query("SELECT *  FROM courses_types WHERE id = '$course_type'")->result();
			$teacher_courses[$i]->course_type_name = $course_type_name[0]->ar_name;
			$i++;
		}
		
		$this->data['teacher_courses'] = $teacher_courses;
			//var_dump($students);
		$this->data['students'] = $students;
		$this->load->view('students_page', $this->data);
	}
	public function add_comment_page($student_id)
	{
		$student = $this->db->query("SELECT * FROM students WHERE id = '$student_id'")->result();
		$this->data["student"] = $student;
		$this->load->view('add_comment_view', $this->data);
	}
	
	
	
	//$this->data['thursday_time_table'] = $this->fetch_time_table('thursday', $course_id);
	function fetch_time_table($day, $teacher_id){
		$time_table = $this->db->query("SELECT * FROM time_table WHERE 
		teacher_id = '$teacher_id' AND day = '$day' ORDER BY ordering")->result();
		$i = 0;
		foreach($time_table  as $t){
			$course_id = $t->course_id;
			$course = $this->db->query("SELECT * FROM courses WHERE id = '$course_id'")->result();
			$time_table[$i]->course_name = $course[0]->name;
			//$time_table[$i]->course_id = $course[0]->id;
			$i++;
		}
		return $time_table;
	}
	
	public function start_session($id){
		$this->db->query("UPDATE time_table SET is_live = 1 WHERE id = '$id'");
		$this->db->query("INSERT INTO lessons_sessions (time_table_id, start_time) VALUES ('$id', NOW())");
		header("Location: https://app.bbbserver.eu/de/quick-connect/d577af4b-69d2-4315-8324-fce43625cc2e");
	}
	
	
	public function end_session($id){
		$this->db->query("UPDATE time_table SET is_live = 0 WHERE id = '$id'");
		$this->db->query("UPDATE lessons_sessions SET end_time = NOW() WHERE time_table_id = '$id' AND end_time = '0000-00-00 00:00:00'");
		redirect(base_url().'master/lessons_timetable', 'refresh');
	}
	
	public function lessons_timetable(){
		
		$teacher_id = $this->session->userdata('teacher_id');
		
		$this->data['sunday_time_table'] = $this->fetch_time_table('sunday', $teacher_id);
		$this->data['monday_time_table'] = $this->fetch_time_table('monday', $teacher_id);

		$this->data['teusday_time_table'] = $this->fetch_time_table('teusday', $teacher_id);

		$this->data['wednesday_time_table'] = $this->fetch_time_table('wednesday', $teacher_id);

		$this->data['thursday_time_table'] = $this->fetch_time_table('thursday', $teacher_id);

		

		
		$this->load->view('time_table', $this->data);
	}
	
	
	
	
	
	public function teacher_comments_page()
	{
		$this->load->database();
		$teacher_id = $this->session->userdata('teacher_id');
		$comments = $this->db->query("SELECT * FROM comments WHERE teacher_id = '$teacher_id'")->result();
		$i = 0; 
		foreach($comments as $c){
			$student = $this->db->query("SELECT * FROM students WHERE id = '$c->student_id'")->result();
			$comments[$i]->student_name = $student[0]->first_name .' ' .$student[0]->last_name;
			$i++;
		}
		$this->data['comments'] = $comments;
		$this->load->view('teacher_comments_view', $this->data);
	}
	
	
	
	public function add_comment($student_id){
		$this->load->database();
		if($this->input->post()){
		    $data['student_id']=$student_id;
			$data['teacher_id']=$this->session->userdata('teacher_id');
			$data['comment']=$this->input->post('message');
			$data['date']=date("Y-m-d");
			
			$teacher_id = $this->session->userdata('teacher_id');
			$teacher = $this->db->query("SELECT * FROM teachers WHERE id  = '$teacher_id'")->result();
			$teacher = $teacher[0];
			
			$text = "قام الاستاذ " . $teacher->full_name .' بإضافة تعليق جديد';
			$this->db->query("INSERT INTO students_notifications (student_id, text, date) VALUES ('$student_id', '$text', NOW())");
			
			
			
			$response=$this->db->insert('comments',$data);
			redirect(base_url().'master/students_page', 'refresh');
			if($response==true){
			    echo "تم إرسال الرسالة بنجاح، شكرا لكم";
			}
			else{
				echo "لم يتم إرسال الشكوى بنجاح يرجى المحاولة من جديد";
			}
   		}
	}
}

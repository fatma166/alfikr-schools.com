<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
	<div class="title_page">
		<h2>بنك الأسئلة</h2>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
				</li>
				<li class="breadcrumb-item" aria-current="page">
					القسم الإداري
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					بنك الأسئلة
				</li>
			</ol>
		</nav>
	</div>
</div>
<div
	class="d-flex justify-content-between align-items-center flex-row w-100 mb-1"
>
	<h1>إضافة أسئلة</h1>
</div>
<div
	class="adding__questions d-flex justify-content-start flex-column gap-4 align-items-start w-100"
>
	<div
		class="d-flex justify-content-start flex-row gap-2 align-items-start"
	>
		<div>
			<input
				type="radio"
				class="btn-check"
				name="options-outlined"
				id="free-question"
				autocomplete="off"
				checked
			/>
			<label class="btn btn-outline-success" for="free-question"
			>سؤال حر</label
			>
		</div>
		<div>
			<input
				type="radio"
				class="btn-check"
				name="options-outlined"
				id="list-questions"
				autocomplete="off"
			/>
			<label class="btn btn-outline-success" for="list-questions"
			>مجموعة أسئلة</label
			>
		</div>
	</div>

	<form method="post" class="w-100 question_exist_free" id="free_form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<input  type="hidden" name="ques_type" value="free">
				<div class="input_form mb-4">
					<label for="" class="mb-3"> المرحلة </label>
					<select
						name="course_types_stages"
						id="q_free_stages"
						class="form-select form-control" onchange="change_class('q_free')"
					>

						<option selected disabled>المرحله</option>
						<?php foreach($course_types as $course_type_arr) {?>
							<option value="<?php if(isset($course_type_arr[0]->parent_id)&&$course_type_arr[0]->parent_id==0) echo $course_type_arr[0]->id;?>"> <?php if(isset($course_type_arr[0]->ar_name)&&$course_type_arr[0]->parent_id==0)  echo $course_type_arr[0]->ar_name;?></option>
						<?php }?>

					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input_form mb-4">
					<label for="" class="mb-3"> الصف الدراسي </label>
					<select
						name="course_types_class"
						id="q_free_class"
						class="form-select form-control"
					>
						<option selected disabled>الصف الدراسي</option>

					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input_form mb-4">
					<label for="" class="mb-3"> الشعبة </label>
					<select
						name="question_group_id"
						id="question_group_id"
						class="form-select form-control"
					>
						<option selected disabled>الشعبة</option>

					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input_form mb-4">
					<label for="" class="mb-3"> الماده العلميه </label>
					<select
						name="question_subject_id"
						id="question_subject_id"
						class="form-select form-control"
					>
						<option selected disabled>الماده العلميه</option>

					</select>
				</div>
			</div>
		</div>
		<?php $i=0;?>
		<div id="questions_container">
			<div
				class="w-100 border-bottom border-solid border-fifth-color pb-4 free_question_ques mt-4"
			>
				<div
					class="d-flex justify-content-start flex-column align-items-start gap-2 mb-3 w-100"
				>
					<span> السؤال </span>
					<input
						type="text"
						class="form-control"
						name="title[0][]"
						placeholder="السؤال"
						value=""
						aria-label="text"
						required
					/>
				</div>
				<div
					class="d-flex justify-content-start flex-column align-items-start gap-3"
				>
					<span> الأجابات </span>
					<div class="w-100">
						<label
							class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
						>
							<input type="radio" name="correct_answer[0][]" value="" class="check_correct" onchange="checkCorrect(this, 0,0,'correct_answer')" />
							<input
								type="text"
								index_="0>"
								name="answer[0][]"
								class="form-control w-100 answer_data"
								placeholder="اجابة 1"
								aria-label="text"
								value=""
								required
							/>
							<div class="input-group">
								<input name="media[0][]" type="file" class="form-control"  id="inputGroupFile02" onchange="uploadMedia(this, 0,0)">
								<input type="hidden" name="media_paths[0][]" />
								<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
							</div>
						</label>
					</div>
					<div class="w-100">
						<label
							class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
						>
							<input name="correct_answer[0][]" type="radio"  value="" class="check_correct" onchange="checkCorrect(this, 0,1,'correct_answer')"/>
							<input
								name="answer[0][]"
								type="text"
								class="form-control"
								placeholder="اجابة 2"
								aria-label="text"
								value=""
								required
							/>
							<div class="input-group">
								<input name="media[0][]" type="file" class="form-control"  id="inputGroupFile02" onchange="uploadMedia(this, 0,1)">
								<input type="hidden" name="media_paths[0][]" />
								<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
							</div>
						</label>
					</div>
					<div class="w-100">
						<label
							class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
						>
							<input name="correct_answer[0][]" type="radio"  value="" class="check_correct" onchange="checkCorrect(this, 0,2,'correct_answer')"/>
							<input
								type="text"
								name="answer[0][]"
								class="form-control"
								placeholder="اجابة 3"
								aria-label="text"
								value=""
								required
							/>
							<div class="input-group">
								<input name="media[0][]" type="file" class="form-control"  id="inputGroupFile02" onchange="uploadMedia(this, 0,2)">
								<input type="hidden" name="media_paths[0][]" />
								<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
							</div>
						</label>
					</div>
					<div class="w-100">
						<label
							class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
						>
							<input name="correct_answer[0][]" type="radio"  value="" class="check_correct" onchange="checkCorrect(this, 0,3,'correct_answer')"/>
							<input
								type="text"
								name="answer[0][]"
								class="form-control"
								placeholder="اجابة 4"
								aria-label="text"
								value=""
								required
							/>
							<div class="input-group">
								<input name="media[0][]" type="file" class="form-control"  id="inputGroupFile02" onchange="uploadMedia(this, 0,3)">
								<input type="hidden" name="media_paths[0][]" />
								<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
							</div>
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-center align-items-center flex-row gap-3 mt-3">
			<button   class="add_ques" id="add_question_free">  <!--type="submit"-->
				<span> حفظ </span>
			</button>
			<div
				class="d-flex justify-content-end align-items-end flex-row gap-2"
			>
				<button class="d-flex justify-content-center align-items-center flex-row" id="add_another_question_free" onclick="add_another_question_free()">
					<svg
						width="20"
						height="20"
						viewBox="0 0 24 24"
						color="#000"
						fill="#000"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M12 5V19M5 12H19"
							color="#000"
							stroke="#000"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<span> اضافة سؤال اخر </span>
				</button>
			</div>
		</div>
	</form>
	<form  class="w-100 question_exist_list" style="display: none;" enctype="multipart/form-data" id="list_form">
		<div class="row">
			<div class="col-md-6">
				<div class="input_form mb-4">
					<input  type="hidden" name="ques_type" value="list">
					<label for="" class="mb-3"> المرحلة </label>
					<select
						name="course_types_stages"
						id="q_list_stages"
						class="form-select form-control" onchange="change_class('q_list');"
					>
						<option selected disabled>المرحلة</option>
						<?php foreach($course_types as $course_type_arr) {?>
							<option value="<?php if(isset($course_type_arr[0]->parent_id)&&$course_type_arr[0]->parent_id==0) echo $course_type_arr[0]->id;?>"> <?php if(isset($course_type_arr[0]->ar_name)&&$course_type_arr[0]->parent_id==0)  echo $course_type_arr[0]->ar_name;?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input_form mb-4">
					<label for="" class="mb-3"> الصف الدراسي </label>
					<select
						name="course_types_class"
						id="q_list_class"
						class="form-select form-control"
					>
						<option selected disabled>الصف الدراسي</option>

					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input_form mb-4">
					<label for="" class="mb-3"> الشعبة </label>
					<select
						name="question_group_id"
						id="q_list_group"
						class="form-select form-control"
					>
						<option selected disabled>الشعبة</option>

					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="input_form mb-4">
					<label for="" class="mb-3"> الماده العلميه </label>
					<select
						name="listquestion_subject_id"
						id="listquestion_subject_id"
						class="form-select form-control"
					>
						<option selected disabled>الماده العلميه</option>

					</select>
				</div>
			</div>
		</div>
		<div id="questions_container">
			<div
				class="w-100 free_question_ques mt-4"
			>
				<div
					class="d-flex justify-content-start flex-column align-items-start gap-2 mb-3 w-100"
				>
					<span> القطعة : </span>
					<textarea name="list_title_main" id="" cols="30" rows="10" class="form-control" placeholder="اكتب القطعة هنا"></textarea>
				</div>
				<div class="col-md-12">
					<label for="" class="mb-3"> ميديا السؤال (صورة  - فيديو)</label>
					<div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
						 style="gap: 8px">
						<input type="hidden"  name="list_media_main_paths">
						<input class="form-control" type="file" id="formFile" name="list_media_main" onchange="list_uploadMedia(this, 0,2,'list_media_main')">
						<img src="<?php echo base_url()?>../assets/images/down.svg" alt="download" alt="download"
							 loading="lazy" width="40" height="40"/>
						<span> اضغط او قم بالسحب </span>
						<p>png, jpg, jpeg (max. 800x400px)</p>
					</div>
				</div>
				<div id="list_question_repeat_top">
					<div class="list_question_repeat  border-bottom border-solid border-fifth-color pb-4 mt-5">
						<div
							class="d-flex justify-content-start flex-column align-items-start gap-2 mb-3 w-100"
						>
							<span> السؤال </span>
							<input
								type="text"
								name="list_quest[0][]"
								class="form-control"
								placeholder="السؤال"
								value=""
								aria-label="text"
								required
							/>
						</div>
						<div
							class="d-flex justify-content-start flex-column align-items-start gap-3"
						>
							<span> الأجابات </span>
							<div class="w-100">
								<label
									class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
								>
									<input type="radio" name="list_correct_answer[0][]" value="" class="listcheck_correct" onchange="checkCorrect(this, 0,0,'list_correct_answer')"/>
									<input
										type="text"
										name="list_answer[0][]"
										class="form-control w-100"
										placeholder="اجابة 1"
										aria-label="text"
										value=""
										required
									/>
									<div class="input-group">
										<input   type="file" name="list_media[0][]" class="form-control" id="inputGroupFile02"  onchange="list_uploadMedia(this, 0,0,'list_media')">
										<input type="hidden" name="list_media_paths[0][]" />
										<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
									</div>

								</label>
							</div>
							<div class="w-100">
								<label
									class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
								>
									<input type="radio" name="list_correct_answer[0][]" value=""  class="listcheck_correct" onchange="checkCorrect(this, 0,1,'list_correct_answer')"/>
									<input
										type="text"
										name="list_answer[0][]"
										class="form-control"
										placeholder="اجابة 2"
										aria-label="text"
										value=""
										required
									/>

									<div class="input-group">
										<input type="file"  name="list_media[0][]"  class="form-control" id="inputGroupFile02"   onchange="list_uploadMedia(this, 0,1,'list_media')">
										<input type="hidden" name="list_media_paths[0][]" />
										<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
									</div>
								</label>
							</div>
							<div class="w-100">
								<label
									class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
								>
									<input type="radio" name="list_correct_answer[0][]" value="" class="listcheck_correct" onchange="checkCorrect(this, 0,2,'list_correct_answer')"/>
									<input
										type="text"
										name="list_answer[0][]"
										class="form-control"
										placeholder="اجابة 3"
										aria-label="text"
										value=""
										required
									/>
									<div class="input-group">
										<input  type="file" class="form-control"   name="list_media[0][]" id="inputGroupFile02"  onchange="list_uploadMedia(this, 0,2,'list_media')">
										<input type="hidden" name="list_media_paths[0][]" />
										<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
									</div>
								</label>
							</div>
							<div class="w-100">
								<label
									class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
								>
									<input type="radio" name="list_correct_answer[0][]"  class="listcheck_correct" value="" onchange="checkCorrect(this, 0,3,'list_correct_answer')"/>
									<input
										type="text"
										name="list_answer[0][]"
										class="form-control"
										placeholder="اجابة 4"
										aria-label="text"
										value=""
										required
									/>
									<div class="input-group">
										<input   type="file"  name="list_media[0][]" class="form-control" id="inputGroupFile02"  onchange="list_uploadMedia(this, 0,3,'list_media')">
										<input type="hidden" name="list_media_paths[0][]" />
										<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
									</div>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-center align-items-center flex-row gap-3 mt-3">
			<button class="add_ques" id="add_ques_list">
				<span> حفظ </span>
			</button>
			<div
				class="d-flex justify-content-end align-items-end flex-row gap-2"
			>
				<button type="button" class="d-flex justify-content-center align-items-center flex-row" id="add_another_question_list">
					<svg
						width="20"
						height="20"
						viewBox="0 0 24 24"
						color="#000"
						fill="#000"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M12 5V19M5 12H19"
							color="#000"
							stroke="#000"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<span> اضافة سؤال اخر </span>
				</button>
			</div>
		</div>
	</form>
</div>

<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
	<!-- Modal delete question -->
	<div
		class="modal fade DeleteQuestion"
		id="DeleteQuestion"
		tabindex="-1"
		aria-labelledby="exampleModalLabel"
		aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content p-3">
				<div class="modal-body">
					<h6>هل تريد أن تحذف هذا السؤال ؟</h6>
				</div>
				<div
					class="modal-footer d-flex justify-content-center align-items-center flex-row gap-3"
				>
					<button type="button" class="btn close__" data-bs-dismiss="modal">
						إغلاق
					</button>
					<button type="button" class="btn save__">حذف</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal edit question -->
	<div
		class="modal fade EditQuestion"
		id="EditQuestion"
		tabindex="-1"
		aria-labelledby="exampleModalLabel"
		aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content py-3">
				<div class="modal-body">
					<h6>تعديل السؤال</h6>
					<form action="">
						<div
							class="d-flex justify-content-start flex-column align-items-start gap-2 mb-3"
						>
							<span> السؤال </span>
							<input
								type="text"
								class="form-control"
								placeholder="السؤال"
								value=" ماهي عاصمة مصر ؟ "
								aria-label="text"
								required
							/>
						</div>
						<div
							class="d-flex justify-content-start flex-column align-items-start gap-3"
						>
							<span> الأجابات </span>
							<div class="w-100">
								<label
									class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
								>
									<input type="radio" name="correct_answer" value="answer1" />
									<input
										type="text"
										class="form-control w-100"
										placeholder="اجابة 1"
										aria-label="text"
										value="القاهرة"
										required
									/>
								</label>
							</div>
							<div class="w-100">
								<label
									class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
								>
									<input type="radio" name="correct_answer" value="answer2" />
									<input
										type="text"
										class="form-control"
										placeholder="اجابة 2"
										aria-label="text"
										value="المحلة"
										required
									/>
								</label>
							</div>
							<div class="w-100">
								<label
									class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
								>
									<input type="radio" name="correct_answer" value="answer3" />
									<input
										type="text"
										class="form-control"
										placeholder="اجابة 3"
										aria-label="text"
										value="الأسكندرية"
										required
									/>
								</label>
							</div>
							<div class="w-100">
								<label
									class="d-flex justify-content-start align-items-center flex-row gap-3 w-100"
								>
									<input type="radio" name="correct_answer" value="answer4" />
									<input
										type="text"
										class="form-control"
										placeholder="اجابة 4"
										aria-label="text"
										value="سوهاج"
										required
									/>
								</label>
							</div>
						</div>
						<div
							class="modal-footer d-flex justify-content-center align-items-center flex-row gap-3"
						>
							<button
								type="button"
								class="btn close__"
								data-bs-dismiss="modal"
							>
								إغلاق
							</button>
							<button type="submit" class="btn save__">حفظ</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Function to show/hide forms based on radio button selection
    function toggleForms() {
        var freeQuestionForm = document.querySelector('.question_exist_free');
        var listQuestionForm = document.querySelector('.question_exist_list');

        // Get the checked radio button
        var freeQuestionChecked = document.getElementById('free-question').checked;
        var listQuestionChecked = document.getElementById('list-questions').checked;

        // Show/hide forms based on checked state
        if (freeQuestionChecked) {
            freeQuestionForm.style.display = 'block';
            listQuestionForm.style.display = 'none';
        } else {
            freeQuestionForm.style.display = 'none';
            listQuestionForm.style.display = 'block';
        }
    }

    // Listen for changes in the radio buttons' checked state
    var radioButtons = document.querySelectorAll('.btn-check');
    radioButtons.forEach(function(button) {
        button.addEventListener('change', toggleForms);
    });

    // Initially call toggleForms to set initial visibility
    toggleForms();
</script>

<script>
    delete_counter=1;
    document.getElementById('add_another_question_free').addEventListener('click', function() {
        var container = document.getElementById('questions_container');
        var newQuestion = document.querySelector('.free_question_ques').cloneNode(true);



        var inputField = newQuestion.querySelector('input[name="title[0][]"]');
        inputField.name = `title[${container.children.length}][]`;
        inputField.value='';
        var correct_answerInputs = newQuestion.querySelectorAll('input[name="correct_answer[0][]"]');
        correct_answerInputs.forEach(function(correct_answerInput, index) {
            correct_answerInput.name = `correct_answer[${container.children.length}][${index}]`;
            correct_answerInput.value='';
            correct_answerInput.checked = false;
        });
        var answerInputs = newQuestion.querySelectorAll('input[name="answer[0][]"]');
        answerInputs.forEach(function(answerInput, index) {
            answerInput.name = `answer[${container.children.length}][${index}]`;
            answerInput.value='';
        });
        var mediaInputs = newQuestion.querySelectorAll('input[name="media[0][]"]');
        mediaInputs.forEach(function(mediaInput, index) {
            mediaInput.name = `media[${container.children.length}][${index}]`;
            mediaInput.value='';

        });
        var media_funInputs = newQuestion.querySelectorAll('input[onchange^="uploadMedia("]');
        media_funInputs.forEach(function(media_funInput, index) {
            media_funInput.setAttribute('onchange', `uploadMedia(this, ${container.children.length}, ${index})`);


        });
        var correct_funInputs = newQuestion.querySelectorAll('input[onchange^="checkCorrect("]');
        correct_funInputs.forEach(function(correct_funInput, index) {
            correct_funInput.setAttribute('onchange', `checkCorrect(this, ${container.children.length}, ${index},'correct_answer')`);
        });

        var media_pathsInputs = newQuestion.querySelectorAll('input[name="media_paths[0][]"]');
        media_pathsInputs.forEach(function(media_pathsInput, index) {
            media_pathsInput.name = `media_paths[${container.children.length}][${index}]`;
            media_pathsInput.value='';


        });


        // Create delete button
        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'حذف';
        deleteButton.className = 'delete_question';
        deleteButton.id = 'delete_question_'+delete_counter;
        deleteButton.addEventListener('click', function() {
            //
            deleteQuestion('delete_question_',delete_counter);
            newQuestion.remove();
        });


        // Append delete button to new question
        newQuestion.appendChild(deleteButton);

        // Append new question to container
        container.appendChild(newQuestion);
        delete_counter++;
    });
</script>
<script>
    document.getElementById('add_another_question_list').addEventListener('click', function() {
        var container = document.getElementById('list_question_repeat_top');
        var newQuestion = document.querySelector('.list_question_repeat').cloneNode(true);

        var inputField = newQuestion.querySelector('input[name="list_quest[0][]"]');
        inputField.name = `list_quest[${container.children.length}][]`;
        inputField.value='';
        var list_correct_answerInputs = newQuestion.querySelectorAll('input[name="list_correct_answer[0][]"]');
        list_correct_answerInputs.forEach(function(list_correct_answerInput, index) {
            list_correct_answerInput.name = `list_correct_answer[${container.children.length}][${index}]`;
            list_correct_answerInput.value='';
            list_correct_answerInput.checked = false;
        });
        var list_answerInputs = newQuestion.querySelectorAll('input[name="list_answer[0][]"]');
        list_answerInputs.forEach(function(list_answerInput, index) {
            list_answerInput.name = `list_answer[${container.children.length}][${index}]`;
            list_answerInput.value='';

        });
        var list_mediaInputs = newQuestion.querySelectorAll('input[name="list_media[0][]"]');
        list_mediaInputs.forEach(function(list_mediaInput, index) {
            list_mediaInput.name = `list_media[${container.children.length}][${index}]`;
            list_mediaInput.value='';
        });
        var list_media_funInputs = newQuestion.querySelectorAll('input[onchange^="list_uploadMedia("]');
        list_media_funInputs.forEach(function(list_media_funInput, index) {
            list_media_funInput.setAttribute('onchange', `list_uploadMedia(this, ${container.children.length}, ${index},'list_media')`);
        });
        var list_correct_funInputs = newQuestion.querySelectorAll('input[onchange^="checkCorrect("]');
        list_correct_funInputs.forEach(function(list_correct_funInput, index) {
            list_correct_funInput.setAttribute('onchange', `checkCorrect(this, ${container.children.length}, ${index},'list_correct_answer')`);
        });
        var list_mediaInputs = newQuestion.querySelectorAll('input[name="list_media[0][]"]');
        list_mediaInputs.forEach(function(list_mediaInput, index) {
            list_mediaInput.name = `list_media[${container.children.length}][${index}]`;
            list_mediaInput.value='';
        });
        var list_media_pathsInputs= newQuestion.querySelectorAll('input[name="list_media_paths[0][]"]');
        list_media_pathsInputs.forEach(function(list_media_pathsInput, index) {
            list_media_pathsInput.name = `list_media_paths[${container.children.length}][${index}]`;
            list_media_pathsInput.value='';
        });


        // Create delete button
        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'حذف';
        deleteButton.className = 'delete_question';
        deleteButton.addEventListener('click', function() {
            newQuestion.remove();
        });

        // Append delete button to new question
        newQuestion.appendChild(deleteButton);

        // Append new question to container
        container.appendChild(newQuestion);
    });
</script>

<script type="text/javascript">
    // jQuery document ready
    $(document).ready(function() {

        $("#add_question_free").click(function (e) {
            e.preventDefault();

            // Create a new FormData object
            var formData = new FormData();

            // Iterate through the form fields and append them to the FormData
            $('#free_form').find('input, textarea, select').each(function() {
                var $this = $(this);
                var name = $this.attr('name');

                if ($this.is('input[type="file"]')) {
                    //alert(this.files);
                    var files = this.files;
                    for (var i = 0; i < files.length; i++) {
                        // console.log(name);
                        formData.append(name, files[i]);
                    }
                } else {
                    formData.append(name, $this.val());
                }
            });
            // console.log(formData);
            $.ajax({
                type:"post",
                url: "<?Php echo base_url(); ?>questionBank/save",
                data:formData,//$("#free_form").serialize(),
                processData: false, // Prevent jQuery from automatically processing the data
                contentType: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data1) {
                    //  alert("suceess");
                    $('.is-invalid').removeClass('is-invalid');
                    $('.invalid-feedback').remove();
                    Swal.fire({
                        title: "<?php echo $this->lang->line('free question saved')?>",
                        text: "<?php echo $this->lang->line('free questions has been successfully saved')?>",
                        icon: 'success',
                        confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                    });

                } ,
                error: function(xhr, status, error) {
                    // Handle the error response
                    var errorResponse = JSON.parse(xhr.responseText);
                    showErrors(errorResponse.errors);

                    //  console.log('Error occurred while fetching options');
                    Swal.fire({
                        title: "<?php echo $this->lang->line('Error')?>",
                        text:  "<?php echo $this->lang->line('An error occurred while') .$this->lang->line('free question saved') ?>",
                        icon: 'error',
                        confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                    });
                }


            });
        });
        function showErrors(errors) {
            // Clear any previous errors
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            // Loop through the errors and display them
            $.each(errors, function(field, message) {
                //alert(field);
                var input = $('[name="' + field + '"]');
                //  alert(input);
                input.addClass('is-invalid');
                input.parent().append('<div class="invalid-feedback">' + message + '</div>');
            });
        }

        $("#add_ques_list").click(function (e) {
            // alert("list");
            e.preventDefault();
            //  alert("dsjkdsj");
            // Create a new FormData object
            var formData = new FormData();

            // Iterate through the form fields and append them to the FormData
            $('#list_form').find('input, textarea, select').each(function() {
                var $this = $(this);
                var name = $this.attr('name');

                if ($this.is('input[type="file"]')) {
                    //  alert(this.files);
                    var files = this.files;
                    for (var i = 0; i < files.length; i++) {
                        console.log(name);
                        formData.append(name, files[i]);
                    }
                } else {
                    formData.append(name, $this.val());
                }
            });
            console.log(formData);
            $.ajax({
                type:"post",
                url: "<?Php echo base_url(); ?>questionBank/save",
                data:formData,//$("#free_form").serialize(),
                processData: false, // Prevent jQuery from automatically processing the data
                contentType: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data1) {
                    // alert("suceess");

                    Swal.fire({
                        title: "<?php echo $this->lang->line('multi question saved')?>",
                        text: "<?php echo $this->lang->line('questions has been successfully saved')?>",
                        icon: 'success',
                        confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                    });

                } ,
                function(xhr, status, error) {
                    // Handle the error response
                    var errorResponse = JSON.parse(xhr.responseText);
                    showErrors(errorResponse.errors);
                    console.log('Error occurred while fetching options');
                    Swal.fire({
                        title: "<?php echo $this->lang->line('Error')?>",
                        text:  "<?php echo $this->lang->line('An error occurred while') .$this->lang->line('save question multi') ?>",
                        icon: 'error',
                        confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                    });
                }


            });
        });


    });
    function change_class(id){
//alert("fdklk");
        stage_id =  $('#'+id+'_stages').val();//$(this).val();

        // Clear the options in the second select menu
        $('#'+id+'_class').empty();
        $.ajax({
            type:"get",
            url: "<?Php echo base_url(); ?>questionBank/getchild_stage",
            data: {'stage_id': stage_id},
            dataType: 'json',
            //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data1) {


                // Add the new options based on the selected value
                if (stage_id) {

                    $.each(data1, function (index, value) {

                        $('#'+id+'_class').append('<option value="' + value.id + '">' + value.ar_name + '</option>');
                        if(index==0){
                            if(id=='q_free') {
                                getgroup(value.id, 'question_group_id');
                                getsubject(value.id, 'question_subject_id')
                            } else {
                                getgroup(value.id, 'q_list_group');
                                getsubject(value.id, 'listquestion_subject_id')
                            }

                        }
                    });
                } else {
                    $('#'+id+'_class').append('<option value="">Select an option</option>');
                }
            } ,
            error: function() {
                console.log('Error occurred while fetching options');
            }


        });

    }

    $('#q_list_class').on('change', function () {
        class_id_= $(this).val();
        getgroup(class_id_,'q_list_group');
        getsubject(class_id_,'listquestion_subject_id')
    });
    $('#q_free_class').on('change', function () {
        class_id_= $(this).val();
        getgroup(class_id_,'question_group_id');
        getsubject(class_id_,'question_subject_id')
    });

    function getsubject(class_return,selector_name) {
        //
        class_id=class_return;
        // Clear the options in the second select menu

        $('#'+selector_name).empty();
        $.ajax({
            type: "get",
            url: "<?Php echo base_url(); ?>questionBank/getchild_subject",
            data: {'class_id': class_id},
            dataType: 'json',
            //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data1) {


                // Add the new options based on the selected value
                if (class_id) {

                    $.each(data1, function (index, value) {

                        $('#'+selector_name).append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                } else {
                    $('#'+selector_name).append('<option value="">Select an option</option>');
                }
            },
            error: function () {
                console.log('Error occurred while fetching options');
            }


        });
        //
    }

    function getgroup(class_return,selector_name) {
        //
        class_id=class_return;
        // Clear the options in the second select menu

        $('#'+selector_name).empty();
        $('#'+selector_name).append('<option value="">الكل</option>');
        $.ajax({
            type: "get",
            url: "<?Php echo base_url(); ?>questionBank/getchild_groups",
            data: {'class_id': class_id},
            dataType: 'json',
            //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data1) {


                // Add the new options based on the selected value
                if (class_id) {

                    $.each(data1, function (index, value) {

                        $('#'+selector_name).append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                } else {
                    $('#'+selector_name).append('<option value="">Select an option</option>');
                }
            },
            error: function () {
                console.log('Error occurred while fetching options');
            }


        });
        //
    }


    function uploadMedia(fileInput, index,$answer_number) {
        //  alert(fileInput);
        // Create a new FormData object
        var formData = new FormData();

        // Append the selected file to the FormData
        formData.append('media', fileInput.files[0]);
        formData.append('question_type', 'media');
        // Perform the AJAX request to upload the file
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>questionBank/upload_ajax",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                console.log(data.path);
                // Update the hidden input field with the file path
                $("input[name='media_paths[" + index + "]["+$answer_number+"]']").val(data.path);
                // Show a SweetAlert2 success message
                Swal.fire({
                    title: "<?php echo $this->lang->line('File Uploaded')?>",
                    text: "<?php echo $this->lang->line('The file has been successfully uploaded')?>",
                    icon: 'success',
                    confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                });
            },
            error: function () {
                //console.log('Error occurred while uploading the file.');

                Swal.fire({
                    title: "<?php echo $this->lang->line('Error')?>",
                    text:  "<?php echo $this->lang->line('An error occurred while') .$this->lang->line('uploading the file') ?>",
                    icon: 'error',
                    confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                });
            }
        });
    }

    function list_uploadMedia(fileInput, index,$answer_number,filename) {

        // Create a new FormData object
        var formData = new FormData();

        // Append the selected file to the FormData
        formData.append(filename, fileInput.files[0]);
        if(filename=='list_media') {
            formData.append('question_type', 'list_media');
        }else{
            formData.append('question_type', 'list_media_main');
        }

        // Perform the AJAX request to upload the file
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>questionBank/upload_ajax",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                console.log(data.path);
                // Update the hidden input field with the file path
                if(filename=='list_media') {
                    $("input[name='list_media_paths[" + index + "][" + $answer_number + "]']").val(data.path);
                }else{

                    $("input[name='list_media_main_paths']").val(data.path);

                }
                Swal.fire({
                    title: "<?php echo $this->lang->line('File Uploaded')?>",
                    text: "<?php echo $this->lang->line('The file has been successfully uploaded')?>",
                    icon: 'success',
                    confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                });
            },
            error: function () {
                console.log('Error occurred while uploading the file.');
                Swal.fire({
                    title: "<?php echo $this->lang->line('Error')?>",
                    text:  "<?php echo $this->lang->line('An error occurred while') .$this->lang->line('uploading the file') ?>",
                    icon: 'error',
                    confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                });
            }
        });
    }
    $('.check_correct:checked').each(function() {
        console.log(this.value);
        $(this).val("1");
    });


    function deleteQuestion(identifier,questionId) {
        //  alert(questionId);
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this question!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                var mediaPathsValues;
                // Perform AJAX request to delete the question
                if(identifier=='delete_question_') {
                    mediaPathsValues = $("[name*='media_paths[1]']").map(function() {
                        return $(this).val();
                    }).get();

// Log the values
                    console.log(mediaPathsValues);
                }

//alert(mediaPathsValues);

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>questionBank/delete_media",
                    data: { id: questionId,"mediaPathsValues":mediaPathsValues },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data);

                        // Remove the question element from the DOM
                        //  $('.free_question_ques :nth-child('+delete_counter+')').remove();

                        // Show a SweetAlert2 success message
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'The question has been deleted.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function() {
                        console.log('Error occurred while deleting the question.');

                        // Show a SweetAlert2 error message
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while deleting the question.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    }
    function checkCorrect(input, question, answer, inputname) {
        var selectorString = inputname + "[" + question + "][" + answer + "]";
        //alert(selectorString);
        var $checkedRadio = $("input[name='" + selectorString + "']:checked");

        //$("input[name='" + selectorString + "']").prop("checked", false);
        // $("input[name='" + selectorString + "']").val("0");
        if(inputname=="correct_answer") {
            $('input[name^="correct_answer[' + question+ ']"]').not(input).prop('checked', false);
          //  $(".check_correct").val(0);
          //  $(".check_correct").prop("checked", false);
        }else{
            $('input[name^="list_correct_answer[' + question+ ']"]').not(input).prop('checked', false);
          //  $(".listcheck_correct").val(0);
          //  $(".listcheck_correct").prop("checked", false);
        }
        //$("[name*='"+inputname+"["+question+"]']").val("0");

        // Check the clicked radio button and set its value to 1
        $(input).prop("checked", true);
        $(input).val("1");
    }
    /* $('.answer_data').on( "keyup", function() {
		alert( $(this).val());
		 alert(  $(this).attr('index_'));
		 index_= $(this).attr('index_');
		 $("input[name='correct_answer['+index_+']']").val("1");
	 });*/
    //$(".correct_answer")
</script>

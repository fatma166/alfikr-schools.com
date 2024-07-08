
<div
	class="tab-pane fade show active mt-4"
	id="bank-tab-pane"
	role="tabpanel"
	aria-labelledby="bank-tab"
	tabindex="0"
>
	<?php  if (isset($query)&&!empty($query)){
		foreach($query as $main_id=>$question_arrs){
			foreach($question_arrs  as $index=>$question){
				//if(isset($question['parent_id']) && $question['parent_id']==0&& count($question_arrs)==1){
				if($question['parent_id']==0){
					//foreach ($question_arrs as $question){ print_r($question); exit;?>
					<div
						class="d-flex justify-content-between flex-row align-items-start flex-wrap mt-4 pb-3 border-bottom border-solid border-fifth-color"
					>
						<div
							class="d-flex justify-content-start align-items-start flex-row gap-0"
						>
							<div class="form-check form-check-inline">
								<input
									name="check[]"
									class="form-check-input"
									type="checkbox"
									id="<?php  echo $question['id'];?>"

								/>
							</div>
							<h6> <?php  echo $question['title'];?></h6>
						</div>
						<div>
							<input
								name="arrange[<?php  echo $question['id'];?>]"
								type="number"
								class="form-control w-100"
								placeholder="ترتيب السؤال"
								aria-label="text"

								required
							/>
						</div>
					</div>
				<?php } elseif(isset($question['parent_id']) && $question['parent_id']==0&& count($question_arrs)==1){
					?>

					<div
						class="d-flex justify-content-between flex-row align-items-start flex-wrap mt-4 pb-3 border-bottom border-solid border-fifth-color"
					>
						<div
							class="d-flex justify-content-start align-items-start flex-row gap-0"
						>
							<div class="form-check form-check-inline">
								<input
									name="check[]"
									class="form-check-input"
									type="checkbox"
									id="<?php  echo $question['id'];?>"

								/>
							</div>
							<?php if(isset($question['title'])&&($question['title']!="")){?>
								<h6> <?php echo $question['title'];?></h6>
							<?php } else {?>
								<img src="../../assets/images/map.png" alt="image" height="400" width="400">
							<?php }?>
						</div>
						<div>
							<input
								name="arrange[<?php echo $question['id'] ?>]"
								type="number"
								class="form-control w-100"
								placeholder="ترتيب السؤال"
								aria-label="text"

								required
							/>
						</div>
					</div>


				<?php }}} }?>
</div>
<div
	class="tab-pane fade w-100"
	id="adding-tab-pane"
	role="tabpanel"
	aria-labelledby="adding-tab"
	tabindex="0"
>
	<div
		class="adding__questions d-flex justify-content-start flex-column gap-4 align-items-start w-100"
	>
		<div
			class="d-flex justify-content-start flex-row gap-2 align-items-start w-100"
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
		<form action="" class="w-100" id="question_exist_free">
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
								<input name="correct_answer[0][]" type="radio"  value="" onchange="checkCorrect(this, 0,1,'correct_answer')"/>
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
								<input name="correct_answer[0][]" type="radio"  value=""  onchange="checkCorrect(this, 0,2,'correct_answer')"/>
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
								<input name="correct_answer[0][]" type="radio"  value="" onchange="checkCorrect(this, 0,3,'correct_answer')"/>
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
						<input
							type="number"
							name="free_arrange[]"
							class="form-control"
							placeholder="ترتيب السؤال"
							aria-label="text"

							required
						/>
					</div>
				</div>
			</div>
			<div class="d-flex justify-content-center align-items-center flex-row gap-3 mt-3">
				<div
					class="d-flex justify-content-end align-items-end flex-row gap-2"
				>
					<button class="d-flex justify-content-center align-items-center flex-row" id="add_another_question_free">
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



		<form action="" class="w-100 question_exist_list" id="question_exist_list" style="display: none;">
			<div id="questions_container_" class="w-100">
				<div
					class="w-100  mt-4"
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
</div>

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
</script>


<div class="exams">
	<div class="container">
		<div class="exams__section">
			<form action="">
				<input type="hidden" class="exam_id" value="<?php echo $exam_details[0]['id']?>">
				<div
					class="exam__header d-flex justify-content-between align-items-center flex-row gap-3 flex-wrap"
				>
					<div
						class="exam_info d-flex justify-content-start align-items-start flex-column gap-1"
					>
						<h6><?php  echo $exam_details[0]['title']?></h6>
						<p><?php echo date('Y-m-d')?></p>
					</div>
					<div
						class="time__left d-flex justify-content-start align-items-start flex-row gap-1"
					>
						<div>
                  <span>
                    <svg
						width="30"
						height="30"
						viewBox="0 0 24 24"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					>
                      <path
						  d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2C17.52 2 22 6.48 22 12Z"
						  stroke="#fff"
						  stroke-width="1.5"
						  stroke-linecap="round"
						  stroke-linejoin="round"
					  />
                      <path
						  d="M15.7099 15.18L12.6099 13.33C12.0699 13.01 11.6299 12.24 11.6299 11.61V7.51001"
						  stroke="#fff"
						  stroke-width="1.5"
						  stroke-linecap="round"
						  stroke-linejoin="round"
					  />
                    </svg>
                  </span>
						</div>
						<div
							class="d-flex justify-content-start align-items-start flex-column gap-1"
						>
							<h3 id="timer"> <?php  echo $exam_details[0]['minutes']?></h3>
							<p>الوقت المتبقي</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php  if (isset($query)&&!empty($query)){
						$j=0;
						foreach($query as $main_id=>$question_arrs){
							$i=0;
							foreach($question_arrs  as $index=>$question){

								if($question['parent_id']==0&&count($question_arrs)==1){?>

									<div class="col-md-12">
										<div class="exams__items">
											<div class="number_ques_chip"><span> <?php echo $j+1  ?> </span></div>
											<span class="num__ques"> السؤال<?php echo $this->lang->line($index+1); ?> </span>
											<h5><?php echo $question['title']?>></h5>
											<hr />
											<div class="exams__answers">
												<?php if (isset($question['answers']) && !empty($question['answers'])) { ?>
													<?php   foreach($question['answers'] as $answer_index=>$answer){ if(empty($answer)) break;?>

														<div>
															<input
																type="radio"
																class="btn-check"
																name="answer[<?php echo $question['id']?>]"
																id="answer_[<?php echo $answer_index ?>]"
																autocomplete="off"

															/>
															<label class="btn" for="answer_[<?php echo $answer_index ?>]"><?php echo $answer;?></label>
														</div>
													<?php }?>

												<?php } ?>

											</div>
										</div>
									</div>

								<?php }
								else{$i++;
									?>
									<?php   if($index==0){?>
										<div class="col-md-12">
										<div class="exams__items">
									<?php }?>
									<?php   if($question['parent_id']==0){?>
										<div class="number_ques_chip"><span> <?php echo $j+1  ?>  </span></div>
										<span class="num__ques"> السؤال <?php echo $this->lang->line($index+1); ?> </span>

										<h5>
											<?php  echo $question['title'];?>
										</h5>

										<hr />
									<?php }	else{  if($index!=0){ ?>

										<div class="exams__answers">
									<?php } ?>

										<h6><?php  echo $question['title'];?> </h6>

										<?php   foreach($question['answers'] as $answer_index=>$answer){ if(empty($answer)) break;?>

											<div>

												<input
													type="radio"
													class="btn-check"
													name="answer[<?php  echo $question['id']?>]"
													id="answer_[<?php  echo $answer_index ?>]"
													autocomplete="off"

												/>
												<label class="btn" for="answer_[<?php  echo $answer_index ?>]"><?php echo $answer;?></label>
											</div>
										<?php }?>
										<?php   if($index!=0){?>
											</div>
										<?php }}?>
									<?php   if($i==(count($question_arrs))){?>
										</div>
										</div>
									<?php }?>

								<?php }} $j++; } }?>
				</div>
				<div class="submit__exam">
					<button type="button" data-bs-toggle="modal" data-bs-target="#finishExam">تأكيد</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal when time is out -->
<div
	class="modal fade"
	id="oppsExam"
	data-bs-backdrop="static"
	data-bs-keyboard="false"
	tabindex="-1"
	aria-labelledby="staticBackdropLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body d-flex justify-content-center align-items-center flex-column gap-1">
				<img src="<?php echo base_url();?>../assets/images/exam.svg" alt="exam" width="250" height="250" class="object-fit-contain">
				<h5> عذرا لقد انتهى الوقت </h5>
				<p> سـيتم احتساب درجات ما تم حـلـه في الأختبار </p>
			</div>
		</div>
	</div>
</div>

<!-- modal when finish exam -->
<div
	class="modal fade"
	id="finishExam"
	tabindex="-1"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body d-flex justify-content-center align-items-center flex-column gap-1">
				<img src="<?php echo base_url();?>../../assets/images/exam-2.svg" alt="exam" width="250" height="250" class="object-fit-contain">
				<h5> هل أنت متأكد نهاية الأختبار ؟ </h5>
				<p>   سـيتم احتساب درجات ما تم حـلـه في الأختبار اذا ضغطت على تأكيد </p>
				<button class="submit_exam_confirm" onclick="redirectToDuties()"> تأكيد </button>
			</div>
		</div>
	</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdownMenuButton1');
        const dropdownMenu = document.querySelector('.notification-menu');

        dropdownButton.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    });
</script>
<script>
   var initialTime = document.getElementById("timer").textContent;
    var timeArray = initialTime.split(":");

   var hours = parseInt(timeArray[0]);
   var minutes = parseInt(timeArray[1]);
   var seconds = parseInt(timeArray[2]);

   var totalSeconds = (hours * 3600) + (minutes * 60) + seconds;
   var totalMinutes = Math.floor(totalSeconds / 60);

   console.log("Total minutes:", totalMinutes);
     function updateTimer() {
       if (totalSeconds <= 0) {
           clearInterval(timerInterval);
           document.getElementById("timer").textContent = "00:00";
           $('#oppsExam').modal('show');
            setTimeout(redirectToDuties, 5000);
           return;
       }

       var minutes = Math.floor(totalSeconds / 60);
       var seconds = totalSeconds % 60;
       var formattedMinutes = String(minutes).padStart(2, "0");
       var formattedSeconds = String(seconds).padStart(2, "0");

       document.getElementById("timer").textContent = `${formattedMinutes}:${formattedSeconds}`;
       totalSeconds--;
   }
   var timerInterval = setInterval(updateTimer, 1000);
    $("#submit__exam").click(function (e) {
        e.preventDefault();
        redirectToDuties();
    });
    function redirectToDuties() {


        // Get the selected answers
        var selectedAnswers = {};
        $("input[type='radio']:checked").each(function() {
            var name = $(this).attr("name");
            var parts = name.split("[");
            var questionId = parts[1].replace("]", "");
            var parts_id = $(this).attr("id").split("answer_[");
            //  alert(parts_id);
            var answerIndex = parts_id[1].replace("]","");
            //  alert(answerIndex);

            if (!selectedAnswers[questionId]) {
                selectedAnswers[questionId] = [];
            }

            selectedAnswers[questionId].push(answerIndex);
        });

        var exam_id="<?php echo $exam_details[0]['id']?>";  //$(".exam_id").val();
        // Do something with the selected answers (e.g., send them to the server)
        console.log(selectedAnswers);

        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>exam/save",
            data: { selectedAnswers: selectedAnswers, exam_id: exam_id },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(data1) {
                // Check if the exam is completed
                if (<?php echo $this->session->userdata('exam_completed') ? 'true' : 'false'; ?>) {
                    // Update the browser's history to prevent back button navigation
                    window.history.pushState(null, null, "<?php echo base_url(); ?>exam/result/" + exam_id);
                }

                // Redirect the user to the result page
                window.location.href = "<?php echo base_url(); ?>exam/result/" + exam_id;
            },
            error: function(xhr, status, error) {
                // Handle the error response
                var errorResponse = JSON.parse(xhr.responseText);
                showErrors(errorResponse.errors);

                Swal.fire({
                    title: "<?php echo $this->lang->line('Error')?>",
                    text: "<?php echo $this->lang->line('An error occurred while') . $this->lang->line('exam saved') ?>",
                    icon: 'error',
                    confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                });
            }
        });

    }
</script>

<script>

</script>
<script>
    var examHeader = document.querySelector('.exam__header');
    function handleScroll() {
        if (window.scrollY > 100) {
            examHeader.classList.add('exam__header--fixed');
        } else {
            examHeader.classList.remove('exam__header--fixed');
        }
    }
    window.addEventListener('scroll', handleScroll);
</script>


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
						id="inlineCheckbox1"
						value=" <?php  echo $question['id'];?>"
					/>
				</div>
				<h6> <?php  echo $question['title'];?></h6>
			</div>
			<div>
				<input
					name="arrange[<?php echo $index ?>]"
					type="number"
					class="form-control w-100"
					placeholder="ترتيب السؤال"
					aria-label="text"
					value=""
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
						id="inlineCheckbox1"
						value="<?php  echo $question['id'];?>"
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
					name="arrange[<?php echo $index ?>]"
					type="number"
					class="form-control w-100"
					placeholder="ترتيب السؤال"
					aria-label="text"
					value=""
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
				<div id="questions_container" class="w-100">
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
									<input type="radio" name="correct_answer" value="answer1" />
									<input
										type="text"
										class="form-control w-100"
										placeholder="اجابة 1"
										aria-label="text"
										value=""
										required
									/>
									<div class="input-group">
										<input type="file" class="form-control" id="inputGroupFile02">
										<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
									</div>
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
										value=""
										required
									/>
									<div class="input-group">
										<input type="file" class="form-control" id="inputGroupFile02">
										<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
									</div>
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
										value=""
										required
									/>
									<div class="input-group">
										<input type="file" class="form-control" id="inputGroupFile02">
										<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
									</div>
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
										value=""
										required
									/>
									<div class="input-group">
										<input type="file" class="form-control" id="inputGroupFile02">
										<label class="input-group-text" for="inputGroupFile02">او ارفع ميديا كـ اجابة</label>
									</div>
								</label>
							</div>
							<input
								type="nymber"
								class="form-control"
								placeholder="ترتيب السؤال"
								aria-label="text"
								value=""
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



			<form action="" class="w-100" id="question_exist_list" style="display: none;">
				<div id="questions_container" class="w-100">
					<div
						class="w-100 free_question_ques mt-4"
					>
						<div
							class="d-flex justify-content-start flex-column align-items-start gap-2 mb-3 w-100"
						>
							<span> القطعة : </span>
							<textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="اكتب القطعة هنا"></textarea>
						</div>
						<div class="col-md-12">
							<label for="" class="mb-3"> صورة السؤال </label>
							<div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
								 style="gap: 8px">
								<input class="form-control" type="file" id="formFile">
								<img src="../../assets/images/down.svg" alt="download" alt="download"
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
											<input type="radio" name="correct_answer" value="answer1" />
											<input
												type="text"
												class="form-control w-100"
												placeholder="اجابة 1"
												aria-label="text"
												value=""
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
												value=""
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
												value=""
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
												value=""
												required
											/>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center align-items-center flex-row gap-3 mt-3">
					<button class="add_ques">
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
</div>
<div class="mt-4 d-flex justify-content-center align-items-center flex-row">

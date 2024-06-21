<?php  if (isset($query)&&!empty($query)){
	foreach($query as $main_id=>$question_arrs){
		foreach($question_arrs  as $index=>$question){
			//if(isset($question['parent_id']) && $question['parent_id']==0&& count($question_arrs)==1){
			if($question['parent_id']==0){?>
<div
	class="mt-5 list__questions d-flex justify-content-start align-items-start flex-column gap-3 w-100 pb-3 border-bottom border-solid border-fifth-color mb-3"
	id="headingOne"
>
	<p type="button" class="w-100 d-flex justify-content-between align-items-center flex-row" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                <span>
                  <?php  echo $question['qtitle'];?>
                </span>
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M6 9L12 15L18 9" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>

	</p>
<?php if (isset($question['answers']) && !empty($question['answers'])) { ?>
	<div class="accordion-collapse collapse accordion-body justify-content-start align-items-start flex-column gap-3 w-100"  id="collapseOne"
		 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
		<div
			class="d-flex justify-content-between align-items-center flex-row flex-wrap w-100"
		>
			<?php   foreach($question['answers'] as $answer_index=>$answer){ if(empty($answer)) break;?>
				<span class="<?php if($question['is_correct'][$answer_index]==1) echo 'active' ?>"> <?php echo $answer;?>  </span>

			<?php }?>

		</div>
	</div>
<?php }?>
</div>
<?php } elseif(isset($question['parent_id']) && $question['parent_id']==0&& count($question_arrs)==1){
?>
<div
	class="list__questions d-flex justify-content-start align-items-start flex-column gap-3 w-100 pb-3 border-bottom border-solid border-fifth-color mb-3"
	id="headingTwo"
>

	<h6 type="button" class="w-100 d-flex justify-content-between align-items-center flex-row" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" >
              <span>
                2-)  هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ
              </span>
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M6 9L12 15L18 9" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</h6>
	<div class="accordion-collapse collapse accordion-body justify-content-start align-items-start flex-column gap-3 w-100"  id="collapseTwo"
		 aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
		<div class="mb-3 w-100">
			<div class="">
				<p> 1- ماهي عاصمة مصر ؟ </p>
				<div
					class="d-flex justify-content-between align-items-center flex-row flex-wrap w-100 mt-3"
				>
					<span class="active"> القاهرة </span>
					<span> الأسكندرية </span>
					<span> المحلة </span>
					<span> سوهاج </span>
				</div>
			</div>
		</div>
		<div class="mb-3 w-100">
			<div class="">
				<p> 1- ماهي عاصمة مصر ؟ </p>
				<div
					class="d-flex justify-content-between align-items-center flex-row flex-wrap w-100 mt-3"
				>
					<span class="active"> القاهرة </span>
					<span> الأسكندرية </span>
					<span> المحلة </span>
					<span> سوهاج </span>
				</div>
			</div>
		</div>
	</div>
</div>
			<?php }}} }?>
<div
	class="list__questions d-flex justify-content-start align-items-start flex-column gap-3 w-100 pb-3 border-bottom border-solid border-fifth-color mb-3"
	id="headingThree"
>
	<div type="button" class="w-100 d-flex justify-content-between align-items-center flex-row" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
		3-) <img src="../../assets/images/map.png" alt="image" height="400" width="400">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M6 9L12 15L18 9" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</div>
	<div class="accordion-collapse collapse accordion-body justify-content-start align-items-start flex-column gap-3 w-100"  id="collapseThree"
		 aria-labelledby="headingThree" data-bs-parent="#accordionExample">
		<div class="mb-3 w-100">
			<div class="w-100">
				<p> 1- ماهي عاصمة مصر ؟ </p>
				<div
					class="mt-3 d-flex justify-content-between align-items-center flex-row flex-wrap w-100"
				>
					<span class="active"> القاهرة </span>
					<span> الأسكندرية </span>
					<span> المحلة </span>
					<span> سوهاج </span>
				</div>
			</div>
		</div>
		<div class="mb-3 w-100">
			<div class="">
				<p> 1- ماهي عاصمة مصر ؟ </p>
				<div
					class="mt-3 d-flex justify-content-between align-items-center flex-row flex-wrap w-100"
				>
					<span class="active"> القاهرة </span>
					<span> الأسكندرية </span>
					<span> المحلة </span>
					<span> سوهاج </span>
				</div>
			</div>
		</div>
	</div>
</div>

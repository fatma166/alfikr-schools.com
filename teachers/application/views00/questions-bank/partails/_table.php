<?php  if (isset($query)&&!empty($query)){
	$j=0;
	foreach($query as $main_id=>$question_arrs){
		$i=0;
		foreach($question_arrs  as $index=>$question){

			if(isset($question['parent_id']) && $question['parent_id']==0&& count($question_arrs)==1){
				//foreach ($question_arrs as $question){ print_r($question); exit;?>

				<div class="list__questions d-flex justify-content-start align-items-start flex-column w-100 gap-3 pb-3 border-bottom border-solid border-fifth-color mb-3"
					 id="headingOne">
					<p type="button" class="w-100 d-flex justify-content-between align-items-center flex-row" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php if( isset($question['id'])) echo $question['id']; elseif (isset($question['qid'])) echo $question['qid'] ;?>" aria-expanded="true" aria-controls="collapseOne" >
            <span>
              <?php echo $j+1 ."-".$question['title'];?>
            </span>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6 9L12 15L18 9" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>

					</p>
					<?php if (isset($question['answers']) && !empty($question['answers'])) { ?>
						<div class="accordion-collapse collapse accordion-body justify-content-start align-items-start flex-column gap-3 w-100"  id="collapseOne<?php if( isset($question['id'])) echo $question['id']; elseif (isset($question['qid'])) echo $question['qid'] ;?>"
							 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div
								class="d-flex justify-content-between align-items-center flex-row flex-wrap w-100"
							>
								<?php   foreach($question['answers'] as $answer_index=>$answer){ // if(empty($answer)) break;?>
									<span class="<?php if($question['is_correct'][$answer_index]==1) echo 'active' ?>"> <?php echo $answer;?>  </span>

								<?php }?>

							</div>
							<?php  if(!isset($exam_question)){?>
								<div
									class="d-flex justify-content-end align-items-end flex-row gap-3 w-100 grade_bank">

									<span><?php echo $question['ar_name'] ?>  </span>
									<span><?php echo $question['parent_course_type_ar_name'] ?>  </span>
									<span>  <?php echo $question['group_name'] ?> </span>
									<!--<span> الصف الأول </span>-->
								</div>
							<?php }?>
						</div>

					<?php }?>
				</div>
			<?php }else{
				if($index==0){?>

					<div
					class="list__questions d-flex justify-content-start align-items-start flex-column w-100  gap-3 pb-3 border-bottom border-solid border-fifth-color mb-3"
					id="headingTwo"
					>
				<?php }?>
				<?php   if($question['parent_id']==0){?>
					<h6 type="button" class="w-100 d-flex justify-content-between align-items-center flex-row" data-bs-toggle="collapse" data-bs-target="#collapseTwo<?php if( isset($question['id'])) echo $question['id']; elseif (isset($question['qid'])) echo $question['qid'] ;?>" aria-expanded="true" aria-controls="collapseTwo" >
          <span>
            <?php  echo $j+1 ."-".$question['title'];?>
          </span>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6 9L12 15L18 9" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</h6>
				<?php }else{  $i++ ; if(isset($query[$main_id][0]['id'])){ ?>
					<div class="accordion-collapse collapse accordion-body justify-content-start align-items-start flex-column gap-3 w-100 "  id="collapseTwo<?php if(isset($query[$main_id][0]['id'])) echo $query[$main_id][0]['id']; elseif(isset($query[$main_id][0]['qid'])) echo $query[$main_id][0]['qid'];?>"
					aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
				<?php }?>
					<div class="mb-3 w-100">
						<div class="">
							<p>  <?php  echo "-".$question['title'];?> </p>
							<div
								class="d-flex justify-content-between align-items-center flex-row flex-wrap w-100 mt-3"
							>
								<?php   foreach($question['answers'] as $answer_index=>$answer){?>
									<span class="<?php if($question['is_correct'][$answer_index]==1) echo 'active'; ?>"> <?php echo $answer;?> </span>
								<?php }?>

							</div>
						</div>
						<?php  if(!isset($exam_question)){?>
							<div
								class="d-flex justify-content-end align-items-end flex-row gap-3 w-100 grade_bank"
							>
								<span><?php if($question['parent_id']!=0)echo $question['ar_name'] ?>  </span>
								<span><?php if($question['parent_id']!=0)echo $question['parent_course_type_ar_name'] ?>  </span>
								<span> <?php if($question['parent_id']!=0) echo $question['group_name'];?></span>

							</div>
						<?php }?>
					</div>
					<?php if(isset($query[$main_id][0]['id'])){?>
						</div>
					<?php } ?>
					<?php  if($i==(count($question_arrs)-1)){?>
						</div>
					<?php }?>
				<?php }}} $j++;} } else{?>
	<tr>
		<td colspan="20" class="text-center">
			<?php  echo $this->lang->line('no data available')?>
		</td>
	</tr>

<?php }?>

<div class="pagination">
	<?php if(isset($paging)) echo $paging;  ?>
</div>

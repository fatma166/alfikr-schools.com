<div class="exam__layout exam__layout__result">
<div class="result__exam">
	<div class="row">
		<div class="col-md-6">
			<div class="result_exam_info d-flex justify-content-start align-items-start gap-3 flex-column">
				<img src="<?php echo base_url()?>../assets/images/icon.svg" alt="success" width="90" height="90">
				<h3> <?php  if($result[0]['mark']>=$result[0]['pass_degree']){  echo $this->lang->line('congratulation you passed exam'); } else{ echo $this->lang->line("sorry you failed in exam");}?> </h3>
				<p>   <?php  echo  $this->lang->line("you have earned");?> <span> <?php  echo$result[0]['mark'];?> </span> من <?php  echo $result[0]['full_mark'];?></p>
				<a href="<?php echo base_url() ?>exam/index"> <?php echo $this->lang->line('return to exam page');   ?>   </a>
			</div>
		</div>
		<div class="col-md-6">
			<div class="result_exam_info">
				<img src="<?php if($result[0]['mark']>=$result[0]['pass_degree']){ echo base_url().'../assets/images/61153-trophy-congratulation.gif'; } else{echo base_url().'../assets/images/61153-trophy-congratulation.gif';}?>" alt="prize" width="300" height="300">
			</div>
		</div>
	</div>
</div>
</div>

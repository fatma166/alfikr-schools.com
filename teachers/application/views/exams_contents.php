<?php $this->load->view('template/body'); ?>



<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#group-center">
							مجموعة جديدة
</button>
<button  type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-center">
							سؤال جديد
</button>


<script>
	function display_content(id){
		var elements = document.getElementsByClassName('content_content');
		for (var i in elements) {
		  if (elements.hasOwnProperty(i)) {
			elements[i].style.display = 'none';
		  }
		}
		document.getElementById(id).style.display="block";
		
	}
	
	
	function change_content_ordering(id, ordering ){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_exam_content_ordering",
                data: {'ordering': ordering, 'id': id}

            }).done(function (msg) {
                   alert("تمت التغييرات");
            });
	}
	
	
	//change_group_question_ordering
	function change_group_question_ordering(group_id, id, ordering ){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_group_question_ordering",
                data: {'ordering': ordering, 'question_id': id, 'group_id':group_id}

            }).done(function (msg) {
                   alert("تمت التغييرات");
            });
	}
</script>

<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
					<div class="box-body">
<div style="min-height: 1200px;">

<?php //print_r($exams_contents); ?>
<?php $i = 0; ?>
<?php foreach($exams_contents as $e){ ?>

	<?php if($e->content_type == 0){ ?>
		<div style="border: solid 1px #f1f1f1; width:100%; padding: 15px;" >
		
		
		
			<h5 style="cursor: pointer" onclick="display_content('content_div_<?php echo $i; ?>')"><?php echo $e->group->name; ?> : <?php echo $e->group->text; ?> (<span id="group_mark_<?php echo $i; ?>"></span> درجات)
				<button style="float:left; margin: 5px;" onmouseover="document.getElementById('group_id').value=<?php echo $e->group->id; ?>;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-group-question">
							سؤال جديد
				</button>
				<a style="float:left; margin: 5px;" class="btn btn-danger" href="<?php echo base_url(); ?>master/delete_exam_group/<?php echo $exam_id; ?>/<?php echo $e->id; ?>">
					حذف
				</a>
				
				
				
				<input type="text" class="form-control" style="margin-left: 30px; width: 50px; float: right; " name="ordering" value="<?php echo $e->ordering; ?>" 
									onkeyup="change_content_ordering(<?php echo $e->id; ?>, this.value)" />
			</h5>
			
			<div id="content_div_<?php echo $i; ?>" style="display:none;" class="content_content">
			<?php if($e->group->file != ''){ ?>
			<p style='text-align: center'>
				<img width="50%" src="<?php echo base_url(); ?>../uploads/<?php echo $e->group->file; ?>" />
			</p>
			<?php } ?>
			
				<?php $group_mark = 0; ?>
				
				<?php foreach($e->group->questions as $q){ ?>
					<?php $group_mark += $q->grade; ?>
					<table class="table" style="margin-right: 50px;">
					<tr>
						<td>
							<h4>
								<?php echo $q->name; ?> : <?php echo $q->text; ?> (<?php echo $q->grade; ?> درجة)
								<input type="text" class="form-control" style="margin-left: 30px; width: 50px; float: right; " name="ordering" value="<?php echo $q->ordering; ?>" 
									onkeyup="change_group_question_ordering(<?php echo $e->group->id; ?>, <?php echo $q->id; ?>, this.value)" />
							</h4>
						</td>
					</tr>
					<?php if($q->question_type == "خيار متعدد"){ ?>
					<tr>	
						<td>
							 <?php
							 /*
							<p style="width: 100%; font-size: 25px; padding: 25px; text-align: center">
								<?php //var_dump($e->question); ?>
								<?php 
									for($i = 1 ; $i < 6; $i++){ 
										$answer_type = 'answer_type_'.$i;
										$answer = 'answer_'.$i;
										if($e->question->$answer != ''){
											echo "<input type='radio' style='position: unset; opacity: 1; margin-right: 20px;' /> " . $e->question->$answer; 
										}
								
									}
								?>
							</p>
						*/ 
						?>
						</td>
					</tr>
					<?php } else{  ?>
					<tr>
						<td>
							<textarea class="form-control" style="width: 80%;"><?php echo $q->right_answer; ?></textarea>
						</td>
					</tr>
					<?php } ?>
					</table>
				<?php } ?>
				<script>
					div = "group_mark_<?php echo $i; ?>";
					document.getElementById(div).innerHTML = <?php echo $group_mark; ?>;
				</script>
			
			
			
			</div>
		</div>
	<?php } else{  ?>
	<div style="border: solid 1px #f1f1f1; width:100%; padding: 15px;">
		<h5 style="cursor: pointer" onclick="display_content('content_div_<?php echo $i; ?>')"><?php echo $e->question->name; ?> :  <?php echo $e->question->text; ?> (<?php echo $e->grade; ?> درجات)
		
		<a style="float:left; margin: 5px;" class="btn btn-danger" href="<?php echo base_url(); ?>master/delete_exam_group/<?php echo $exam_id; ?>/<?php echo $e->id; ?>">
					حذف
				</a>
				<input type="text" class="form-control" style="margin-left: 30px; width: 50px; float: right; " name="ordering" value="<?php echo $e->ordering; ?>" 
									onkeyup="change_content_ordering(<?php echo $e->id; ?>, this.value)" />
		</h5>
		
		<div  id="content_div_<?php echo $i; ?>" style="display:none;" class="content_content">
		<?php if($e->question->image != ''){ ?>
		<p style="width: 100%; font-size: 25px; padding: 25px; text-align: center">
			<img src="<?php echo base_url(); ?>../uploads/questions/<?php echo $e->question->image; ?>" />
		</p>
		<?php } ?>
		
		
		<?php if($e->question->question_type == 'سؤال كتابي'){ ?>
		<p style="width: 100%; font-size: 25px; padding: 25px; text-align: center">
			<textarea class="form-control"><?php echo $e->question->right_answer; ?></textarea>
		</p>
		
		<?php } else{ ?>
		<p style="width: 100%; font-size: 25px; padding: 25px; text-align: center">
			<?php //var_dump($e->question); ?>
			<?php 
				for($i = 1 ; $i < 6; $i++){ 
					$answer_type = 'answer_type_'.$i;
					$answer = 'answer_'.$i;
					if($e->question->$answer != ''){
						echo "<input type='radio' style='position: unset; opacity: 1; margin-right: 20px;' /> " . $e->question->$answer; 
					}
			
				}
			?>
		</p>
		<?php } ?>
		</div>
	</div>
	
	<?php } ?>
	<?php $i++; ?>
<?php } ?>


</div>
 <?php $this->load->view('exams/modals'); ?>
 
 <?php $this->load->view('template/footer'); ?>
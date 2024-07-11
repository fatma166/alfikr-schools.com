<?php $this->load->view('template/body'); ?>




<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            document.getElementById("main_form").submit();
        }
    }, 1000);
}

jQuery(function ($) {
    var fiveMinutes = 60 * <?php echo $exam[0]->minutes; ?>,
        display = $('#time');
    startTimer(fiveMinutes, display);
});

$(document).keypress(
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }


});

</script>

<div style="background:#000; color: #fff; padding: 10px; position: fixed; top: 100px; left: 0px; z-index: 5555;"><span id="time">120:00</span></div>


<form method="post" action="<?php echo base_url(); ?>master/insert_exam_answers" id="main_form">
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
		
		
				<h5 style="cursor: pointer" onclick="display_content('content_div_<?php echo $i; ?>')">
					<?php echo $e->group->name; ?> : <?php echo $e->group->text; ?> (<span id="group_mark_<?php echo $i; ?>"></span> درجات)
				
				
				
				
				
			</h5>
			
			
			<div id="content_div_<?php echo $i; ?>" style="display:block;" class="content_content">
			<?php if($e->group->file != ''){ ?>
			<p style='text-align: center'>
				<img width="50%" src="<?php echo base_url(); ?>../uploads/<?php echo $e->group->file; ?>" />
			</p>
			<?php } ?>
			
				<?php $group_mark = 0; ?>
				<?php //var_dump($e->group->questions); ?>
				<?php foreach($e->group->questions as $q){ ?>
					<?php $group_mark += $q->grade; ?>
					<table class="table" style="margin-right: 50px;">
					<tr>
						<td>
							<h4>
								<?php echo $q->name; ?> : <?php echo $q->text; ?> (<?php echo $q->grade; ?> درجة)
							
							</h4>
						</td>
					</tr>
					<?php if($q->question_type == "خيار متعدد"){ ?>
					<tr>	
						<td>
							
						</td>
					</tr>
					<?php } else{  ?>
					<tr>
						<td>
							<textarea class="form-control" style="width: 90%"></textarea>
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
		
		
				
		</h5>
		
		<div  id="content_div_<?php echo $i; ?>" style="display:block;" class="content_content">
		<?php if($e->question->image != ''){ ?>
		<p style="width: 100%; font-size: 25px; padding: 25px; text-align: center">
			<img src="<?php echo base_url(); ?>../uploads/questions/<?php echo $e->question->image; ?>" />
		</p>
		<?php } ?>
		
		
		<?php if($e->question->question_type == 'سؤال كتابي'){ ?>
		<p style="width: 100%; font-size: 25px; padding: 25px; text-align: center">
			<textarea class="form-control"></textarea>
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
<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>" />
<input type="submit" style="width: 100%" class="btn btn-success" value="إرسال الأجوبة" />
</div>




</form>
 
 
 <?php $this->load->view('template/footer'); ?>
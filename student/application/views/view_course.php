<?php $this->load->view('template/body'); ?>
<?php
  
   //  $check = mysql_num_rows(mysql_query("SELECT * FROM students_courses WHERE course_id = '$course_id' AND student_id = '$user_id'"));
   // if($check == 1){
        
       
    
?>

	<input type="button" onclick="location.href='<?php echo base_url(); ?>courses/lessons/<?php echo $course_id; ?>'" class='btn btn-primary' style="width: 250px;" value='مشاهدة الدروس ' />
<input type="button" onclick="location.href='index.php?action=homework&course_id=<?php echo $this->input->get('course_id'); ?>'" class='btn btn-primary' style="width: 250px;" value='الوظائف (<?php echo $nof_hw; ?>)' />

<input type="button" onclick="location.href='images/program_course_<?php echo $this->input->get('course_id'); ?>.png'" class='btn btn-primary' style="width: 250px;" value='برنامج الدورة ' />


<input type="button" onclick="location.href='index.php?action=ask_qs&course_id=<?php echo $this->input->get('course_id'); ?>'" class='btn btn-warning' style="width: 250px;" value='عندك سؤال ؟  ' />



<?php
   
     


    

    foreach($lessons as $row){
?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                        <h4><?php echo $row->date; ?> || <?php echo $row->title; ?></h4>
                    </div>
                     <div class="x_content">
                      <div class="dashboard-widget-content">
                        
                          <?php echo $row->content; ?>
                        
                     
                      </div>
                    </div>
            </div>
            </div>
<?php
            }

?> 

<?php $this->load->view('template/footer'); ?>
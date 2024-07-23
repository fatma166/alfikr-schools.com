<?php $this->load->view('template/body'); ?>

<h3><?php echo $lesson->title; ?></h3>
<div id="video-container">
  <!-- Video -->
  <video id="video" controls width="100%" height="365">
 
    <source src="<?php echo $lesson->video_url; ?>" type="video/mp4">
   
  </video>
  <!-- Video Controls -->
 
</div>

<hr />
<h2>
<p>أضف تعليق</p>
</h2>
<form method="post" action='functions/add_lesson_comment.php'>
<textarea style='width: 60%; resize: none; height: 50px;' class='form-control' required name='comment' placeholder='اكتب تعليق هنا ...'></textarea><br />
<input type='submit' class='btn btn-success' value='إضافة'/>
<input type='hidden' name='lesson_id' value='<?php //echo $_GET['lesson_id']; ?>' />
</form>
<hr />

<h3>التعليقات</h3>
<hr />
<?php
   /* $result = mysql_query("SELECT * FROM lessons_comments WHERE lesson_id = '$lid' ORDER BY id DESC");
    while($row = mysql_fetch_array($result)){
        $sid = $row[student_id];
        $user_row = mysql_fetch_array(mysql_query("SELECT nickname FROM students WHERE id = '$sid'"));
?>
<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                        <h4><?php echo $user_row[0]; ?></h4>
                    </div>
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
                          
                          
                          <?php echo $row[comment]; ?>
                          
                          <p style='font-size: 10px;'><?php echo $row['date']; ?></p>
                    
                      </div>
                    </div>
            </div>
            </div>

<?php
    }


	*/
?>


<?php $this->load->view('template/footer'); ?>


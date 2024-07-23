
<table class="table table-bordered table-striped" id="datatable4" width="100%"> 
<thead>   
<tr>        <td>اسم الاستاذ</td>        <td>حذف</td>          </tr> 
</thead>
<tbody>
   <?php //$toplam = 0; ?>    <?php //$rest_toplam = 0; ?>    <?php //$each_student_toplam = 0; ?>  
   <?php foreach($teachers as $t){ ?>      
   <tr>    
		<td><?php echo $t->full_name; ?></td>
		<td><a href="<?php echo base_url(); ?>master/delete_teacher_from_course/<?php echo $course_id; ?>/<?php echo $t->id; ?>">حذف</td>
	</tr>
   <?php } ?>
  </tbody>
 </table>
   <script>
$( document ).ready(function() {
    $('#datatable4').DataTable();
});


</script>
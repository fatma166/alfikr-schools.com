<?php /*<p>إجمالي المدفوعات: <span id="toplam"></span></p><p>إجمالي المتبقي: <span id="rest_toplam"></span></p>*/ ?>


<table class="table table-bordered table-striped" id="datatable2" style="width: 100%"> 
<thead>
   <tr>        <td>اسم الطالب</td>        <td>قسط الدورة</td>        <td>الدفعات</td>        <td>المتبقي</td>        <td>حذف</td>    </tr>  


</thead>
<tbody>
   <?php //$toplam = 0; ?>    <?php //$rest_toplam = 0; ?>    <?php //$each_student_toplam = 0; ?>    <?php foreach($students as $s){ ?>  
   <tr>      
   <td><a href="<?php echo base_url(); ?>master/student_profile/<?php echo $s->id; ?>" target="_blank"><?php echo $s->first_name ; ?> <?php echo $s->last_name; ?></a></td>        <td>            <form method="post" action="<?php echo base_url(); ?>master/edit_student_course_amount">            <input type="hidden" name="student_id" value="<?php echo $s->id; ?>" />            <input type="text" name="amount" value="<?php echo $s->total_amount; ?>" />            <input type="hidden" name="course_id" value="<?php echo $this->uri->segment('3'); ?>" />            <input type="submit" class="btn btn-success" value="تعديل" />            </form>        </td>         <td>            <?php                       //echo gettype($s->total_amount);            /*if($s->total_amount > 0 && $s->total_amount != 'فريق البيان'){                $payments = $s->payments;                if(count($payments) > 0){                    foreach($payments as $p){                        $toplam += $p->amount;                        $each_student_toplam += $p->amount;                         echo $p->amount.'<br />';                    }                                    }                else{                        $each_student_toplam = 0;                                        }                //echo $s->total_amount;                $rest_toplam += $s->total_amount - $each_student_toplam;            }*/            ?>                    </td>        <td>            <?php //if($s->total_amount > 0 && $s->total_amount != 'فريق البيان'){ echo $s->total_amount - $each_student_toplam; } ?>        </td>        <td>            <a href="<?php echo base_url(); ?>master/delete_student_course/<?php echo $s->id; ?>/<?php echo $course_id; ?>">حذف</a>        </td>    </tr>    <?php //$each_student_toplam = 0; ?>    <?php } ?>
   
   
</tbody>
   
   </table><?php /*<script>    document.getElementById('toplam').innerHTML = <?php echo $toplam; ?>;    document.getElementById('rest_toplam').innerHTML = <?php echo $rest_toplam; ?>;</script>*/?>



<script>
$( document ).ready(function() {
    $('#datatable2').DataTable();
});


</script>
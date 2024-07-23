<?php $this->load->view('template/body'); ?>

<table width='100%'>
    <tr>
        <td style="font-weight: bold;"><?php echo $exam->title; ?> - <span style="color: red; " ><?php echo count($questions); ?> سؤال</span></td>
        
        <td style="text-align: left">
            <a href="<?php echo base_url(); ?>master/exams" class="btn btn-danger">رجوع</a>
            
        </td>
    </tr>
</table>

        
<table class='table'>
			<tr>
				<th style="text-align: right"><?php echo $words["id"]; ?></th>
				<th style="text-align: right">اسم الطالب</th>
				<th style="text-align: right">عدد الأسئلة الصحيحة</th>
	
					<th style="text-align: right">النسبة المئوية</th>

                	<th style="text-align: right">التاريخ والوقت</th>			
				
				
				
			

			</tr>
	<?php 
		foreach($marks as $b){
	?>
			<tr>
				<td><?php echo $b->id; ?></td>
				<td><?php echo $b->student->first_name .' ' . $b->student->last_name; ?></td>
				<td><?php echo $b->mark; ?></td>
	
			
				<td>
				    <?php echo $b->percentage; ?>
				</td>
				
				<td>
				    <?php echo $b->date; ?>
				</td>
			
			
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>
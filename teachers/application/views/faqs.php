<?php $this->load->view('template/body'); ?>




<form method='post' action='<?php echo base_url(); ?>settings/new_faq_done' id='form'  enctype="multipart/form-data">           
<table class='table'>
			<tr>
				<td colspan="2"><h3>سؤال جديد</h3></td>
			</tr>
			<tr>
				<td>السؤال بالعربي</td>
				<td><input type="text" name="ar_qs"  class="form-control" /></td>
			</tr>
			
			
			<tr>
				<td>الإجابة بالعربي</td>
				<td><input type="text" name="ar_answer" class="form-control" /></td>
			</tr>
		
			<tr>
				<td>الترتيب</td>
				<td><input type="text" name="ordering" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="إضافة" class="btn btn-success" /></td>
			</tr>
		
</table>
           
                   
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">السؤال</th>
				<th style="text-align: right">الإجابة</th>
			
				
				
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php 
		foreach($faqs as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				
				<td><?php echo $c->ar_qs; ?></td>
				<td><?php echo $c->ar_answer; ?></td>
				
				<td><a href='<?php echo base_url(); ?>settings/delete/faqs/<?php echo $c->id; ?>'>حذف</a></td>
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>
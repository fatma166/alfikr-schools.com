<?php $this->load->view('template/body'); ?>


<a href="<?php echo base_url(); ?>settings/new_story" class="btn btn-success">جديد</a>

                   
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">الصورة</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">الاختصاص</th>
				<th style="text-align: right; width: 300px;">المحتوى</th>
				<th style="text-align: right">تعديل</th>
		
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php 
		foreach($stories as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $c->image; ?>" width="25" /></td>
				<td><?php echo $c->name; ?></td>
				<td><?php echo $c->spec; ?></td>
				<td><?php echo $c->content; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_story/<?php echo $c->id; ?>'>تعديل</a></td>
				<td><a href='<?php echo base_url(); ?>master/delete/stories/<?php echo $c->id; ?>' onclick="return confirm('هل تريد حذف هذا العنصر');">حذف</a></td>
	
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>
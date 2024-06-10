<?php $this->load->view('template/body'); ?>

<a href='<?php echo base_url(); ?>settings/new_blog' class='btn btn-success' style="display: inline-block;">
			
				<?php echo $words["new"]; ?>
			</a>
                   
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">عنوان المقال</th>
				<th style="text-align: right">مفضلة</th>
				<th style="text-align: right">تعديل</th>
		
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php 
		foreach($articles as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->title; ?></td>
				<td>
					<?php if($c->featured == 0){ ?>
					<a href='<?php echo base_url(); ?>settings/blog_featured/<?php echo $c->id; ?>/1'><img src="<?php echo base_url(); ?>images/icons/featured_on.png" alt="مفضلة" /></a>
					<?php } else { ?>
					<a href='<?php echo base_url(); ?>settings/blog_featured/<?php echo $c->id; ?>/0'><img src="<?php echo base_url(); ?>images/icons/featured_off.png" alt="مفضلة" /></a>
					<?php } ?>
				</td>
				<td><a href='<?php echo base_url(); ?>settings/edit_blog/<?php echo $c->id; ?>'><img src="<?php echo base_url(); ?>images/icons/edit.png" alt="تعديل" /></a></td>

				<td><a href='<?php echo base_url(); ?>settings/delete_blog/<?php echo $c->id; ?>'>حذف</a></td>
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>
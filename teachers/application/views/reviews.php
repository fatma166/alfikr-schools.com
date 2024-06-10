
<?php $this->load->view('template/body'); ?>

<style>
.not_seen{
		background: darkseagreen;
		color: #000;
		
	}
</style>
<table  id="datatable" class="table table-striped table-bordered">
			
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">المنتج</th>
				<th style="text-align: right">التعليق</th>
				<th style="text-align: right">التقييم</th>
				<th style="text-align: right">تفعيل</th>
				
				
				<th style="text-align: right">حذف</th>
			</tr>
	<?php 
		foreach($reviews as $r){
	?>
			<tr >
				<td><?php echo $r->id; ?></td>
				<td><?php echo $r->fullname; ?></td>
				<td><?php echo $r->product_name; ?></td>
				<td><?php echo $r->comment; ?></td>
				<td><?php echo $r->stars; ?></td>
			    <td>
			       
					<?php if($r->approved == 0){ ?>
					<a href='<?php echo base_url(); ?>settings/approve_review/<?php echo $r->id; ?>/1'><img src="<?php echo base_url(); ?>images/icons/featured_on.png" alt="مفضلة" /></a>
					<?php } else { ?>
					<a href='<?php echo base_url(); ?>settings/approve_review/<?php echo $r->id; ?>/0'><img src="<?php echo base_url(); ?>images/icons/featured_off.png" alt="مفضلة" /></a>
					<?php } ?>
				 
			    </td>
				
				<td><a href='<?php echo base_url(); ?>settings/delete_review/<?php echo $r->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png"  /></a></td>
		
			</tr>
	
	<?php
		}
	?>
</table>
        

          
 
 
 <?php $this->load->view('template/footer'); ?>
<?php $this->load->view('template/body'); ?>

       

                   
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">المنتج</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">التعليق</th>
				<th style="text-align: right">الرد</th>
				<th style="text-align: right">موافقة</th>
				
			</tr>
	<?php 
		foreach($comments as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->product_name; ?></td>
				<td><?php echo $c->username; ?></td>
				<td><?php echo $c->comment; ?></td>
				<td>
					<form method="post" action="<?php echo base_url(); ?>products/add_re_comment">
						<textarea cols="200" rows="3" name="re_comment"><?php echo $c->re_comment; ?></textarea>
						<input type="submit" value="رد" class="btn btn-success" />
						<input type="hidden" name="id" value="<?php echo $c->id; ?>" />
					
					
					</form>
				</td>
				<td>
					<?php if($c->approved == 0){ ?>
					<a href='<?php echo base_url(); ?>products/comment_approve/<?php echo $c->id; ?>/1'>موافقة</a>
					<?php } else { ?>
					<a href='<?php echo base_url(); ?>products/comment_approve/<?php echo $c->id; ?>/0'>إلغاء الموافقة</a>
					<?php } ?>
				</td>
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>
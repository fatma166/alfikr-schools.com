<?php $this->load->view('template/body'); ?>



       

                   
<table class='table'>
			<tr>
				<th style="text-align: right"><?php echo $words['id']; ?></th>
				<th style="text-align: right"><?php echo $words['image']; ?></th>
		
				<th style="text-align: right"><?php echo $words['url']; ?></th>
				<th style="text-align: right"><?php echo $words['edit']; ?></th>
				
			</tr>
	
			<tr>
				<td><?php echo $banner_1->id; ?></td>
				<td><img src="<?php echo base_url(); ?>images/banners/<?php echo $banner_1->image_ar; ?>" width="100" /></td>
				<td><?php echo $banner_1->url; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_banner/<?php echo $banner_1->id; ?>'><?php echo $words['edit']; ?></a></td>
				
			</tr>
			
			
			<tr>
				<td><?php echo $banner_2->id; ?></td>
				<td><img src="<?php echo base_url(); ?>images/banners/<?php echo $banner_2->image_ar; ?>" width="100" /></td>
				<td><?php echo $banner_2->url; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_banner/<?php echo $banner_2->id; ?>'><?php echo $words['edit']; ?></a></td>
				
			</tr>
			
			<tr>
				<td><?php echo $banner_3->id; ?></td>
				<td><img src="<?php echo base_url(); ?>images/banners/<?php echo $banner_3->image_ar; ?>" width="100" /></td>
				<td><?php echo $banner_3->url; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_banner/<?php echo $banner_3->id; ?>'><?php echo $words['edit']; ?></a></td>
				
			</tr>
			
			
			<tr>
				<td><?php echo $banner_4->id; ?></td>
				<td><img src="<?php echo base_url(); ?>images/banners/<?php echo $banner_4->image_ar; ?>" width="100" /></td>
				<td><?php echo $banner_4->url; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_banner/<?php echo $banner_4->id; ?>'><?php echo $words['edit']; ?></a></td>
				
			</tr>
			
			
			
			<tr>
				<td><?php echo $banner_5->id; ?></td>
				<td><img src="<?php echo base_url(); ?>images/banners/<?php echo $banner_5->image_ar; ?>" width="100" /></td>
				<td><?php echo $banner_5->url; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_banner/<?php echo $banner_5->id; ?>'><?php echo $words['edit']; ?></a></td>
				
			</tr>
			
			<tr>
				<td><?php echo $banner_6->id; ?></td>
				<td><img src="<?php echo base_url(); ?>images/banners/<?php echo $banner_6->image_ar; ?>" width="100" /></td>
				<td><?php echo $banner_6->url; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_banner/<?php echo $banner_6->id; ?>'><?php echo $words['edit']; ?></a></td>
				
			</tr>
			
			<tr>
				<td><?php echo $banner_7->id; ?></td>
				<td><img src="<?php echo base_url(); ?>images/banners/<?php echo $banner_7->image_ar; ?>" width="100" /></td>
				<td><?php echo $banner_7->url; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_banner/<?php echo $banner_7->id; ?>'><?php echo $words['edit']; ?></a></td>
				
			</tr>
	
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>
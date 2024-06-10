<?php $this->load->view('template/body'); ?>



       
<form method='post' action='<?php echo base_url(); ?>settings/edit_banner_done' id='form'  enctype="multipart/form-data">
                   
<table class='table'>
			<tr>
				<td><?php echo $words['image']; ?></td>
				<td><img src="<?php echo base_url(); ?>images/banners/<?php echo $banner->image_ar; ?>">
				<br />
				<input type="file" name="image" />
				</td>
			</tr>
			<tr>
				<td><?php echo $words['url']; ?></td>
				<td><input type="text" name="url" class="form-control" value="<?php echo $banner->url; ?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="<?php echo $words["edit"]; ?>" class="btn btn-success" />
</table>
           
<input type="hidden" name="id" value="<?php echo $banner->id; ?>">
</form>
          
 
 
 <?php $this->load->view('template/footer'); ?>
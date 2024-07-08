<?php $this->load->view('template/body'); ?>

<script src="<?php echo base_url(); ?>new_admin/bootstrap.js"></script> 
         <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>


 <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
<h3>معلومات الموقع</h3>



</div>
</div>
</div>
</div>

<script>
    function change_settings(thename, thecontent){
		   console.log(thename);
		   var name = document.getElementById(thename).value;
		   console.log(name);
		   var content = document.getElementById(thecontent).value;
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>settings/edit_info",
                data: {'name': name, 'content': content}

            }).done(function (msg) {
                   document.getElementById('msg').style.display = "block";
                   $("#msg").delay(3000).fadeOut(800);
            });
    }

    
</script>
                  


 <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
<table class='table table-striped table-bordered' id="datatable">
    <thead>
        		<th style="text-align: right">الاسم</th>
        				<th style="text-align: right">المحتوى</th>
    </thead>
    <tbody>
	<?php $the_order = 1; ?>
	<?php $i = 1; ?>
	<?php 
		foreach($all_site_info as $s){
			if($s->type != 1 && $s->type != 2){ 
			    
	?>
    <?php 
        if($the_order != $s->ordering){
            $the_order = $s->ordering;
         /*   echo '</table></div></div></div></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">';
            echo "<table class='table table-striped table-bordered'>"; */
        }
    ?>
	<tr>
		<td style='width: 200px;'><?php echo $s->ar_name; ?></td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
			    <textarea style="width: 600px; height: 100px;" id="content_<?php echo $i; ?>" name="content"><?php echo $s->content; ?></textarea>
				<input type="button" onclick="change_settings('name_<?php echo $i; ?>', 'content_<?php echo $i; ?>')" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" id="name_<?php echo $i; ?>" value="<?php echo $s->name; ?>" />
				<input type="hidden" name="id" value="<?php echo $s->id; ?>" />
			</form>
		</td>
	</tr>
	<?php
			} else if($s->type == 1){ 
	?>
	<tr>
		<td style='width: 200px;'><?php echo $s->ar_name; ?></td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info_image" enctype="multipart/form-data">
				<img src="<?php echo base_url(); ?>../uploads/<?php echo $s->content; ?>" style="width: 200px" />
				<input type="file" name="img" />
				<input type="hidden" name="name" value="<?php echo $s->name; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
			</form>
		
		</td>
	</tr>
	
	
	<?php
			}
			$i++;
		}
	?>
	</tbody>
	<?php /*<tr>
		<td>من نحن العربي</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<textarea  id="summernote" name="content"><?php echo $ar_about_us; ?></textarea>
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="ar_about_us" />
			</form>
		</td>
	</tr>
	<tr>
		<td>العنوان</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $address; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="address" />
			</form>
		</td>
	</tr>
	<tr>
		<td>الهاتف</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $phone; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="phone" />
			</form>
		</td>
	</tr>
	<tr>
		<td>البريد الالكتروني</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $email; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="email" />
			</form>
		</td>
	</tr>
	
	
	<tr>
		<td>فيسبوك</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $facebook; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="facebook" />
			</form>
		</td>
	</tr>
	<tr>
		<td>لينكد إن</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $linkedin; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="linkedin" />
			</form>
		</td>
	</tr>
	
	<tr>
		<td>تويتر</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $twitter; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="twitter" />
			</form>
		</td>
	</tr>
	
	
	<tr>
		<td>انستغرام</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $instegram; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="instegram" />
			</form>
		</td>
	</tr>
	
	
	<tr>
		<td>واتس أب </td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $whatsapp; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="whatsapp" />
			</form>
		</td>
	</tr>
	
	
	<tr>
		<td>سناب شات </td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $snapchat; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="snapchat" />
			</form>
		</td>
	</tr>

	
		<tr>
		<td>يوتيوب </td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $youtube; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="youtube" />
			</form>
		</td>
	</tr>
	
	
		<tr>
		<td>تلغرام </td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<input type="text" name="content" class="form-control" style="width: 500px; display: inline-block;" value="<?php echo $telegram; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="telegram" />
			</form>
		</td>
	</tr>
	<tr>
		<td>اللوغو</td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_logo" enctype="multipart/form-data">
				<img src="<?php echo base_url(); ?>uploads/<?php echo $logo; ?>" />
				<input type="file" name="img" />
				<input type="submit" value="تعديل" class="btn btn-success" />
			</form>
		
		</td>
	</tr>
	<tr>
		<td>الخريطة </td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
				<textarea name="content" class="form-control" style="height: 250px; direction: ltr;"><?php echo $map; ?></textarea>
				<input type="submit" value="تعديل" class="btn btn-success" />
				<input type="hidden" name="name" value="map" />
			</form>
		</td>
	</tr>*/ ?>

</table>


<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 200
          });
        
    });
        
	
	

  </script>
  
  
  </div>
  </div>
  
      </div>
  
</div>



<div id="msg" class="alert alert-success alert-dismissible fade in" role="alert" style="display: none; position: fixed; bottom: 10px; left: 10px; z-index: 5; width: 300px;">
                    
                    
                    تمت التعديلات بنجاح
                  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                  
                  </div>
          
 
 
 <?php $this->load->view('template/footer'); ?>
<?php $this->load->view('template/body'); ?>

<script src="<?php echo base_url(); ?>new_admin/bootstrap.js"></script> 
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

<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>معلومات الموقع</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				معلومات الموقع
                </li>
              </ol>
            </nav>
          </div>
        </div>
		<table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
			  	<th>الاسم</th>
				<th>المحتوى</th>
				<th>المدرسة</th>
              </tr>
            </thead>
            <tbody>
			<?php 
		$the_order = 1; 
		$i = 1; 
		foreach($all_site_info as $s){
			if($s->type != 1 && $s->type != 2){ 
        		if($the_order != $s->ordering){
            		$the_order = $s->ordering;
        		}
    ?>
	<tr>
		<td style='width: 200px;'><?php echo $s->ar_name; ?></td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>settings/edit_info">
			    <textarea style="width: 600px; height: 100px;" id="content_<?php echo $i; ?>" name="content"><?php echo $s->content; ?></textarea>
				<input type="button" onclick="change_settings('name_<?php echo $i; ?>', 'content_<?php echo $i; ?>')" value="تعديل" class="btn btn-success" />
			
				<input type="hidden" name="id" value="<?php echo $s->id; ?>" />
			</form>
		</td>
		<td>
			<?php echo $s->school_id; ?>
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
				<input type="hidden" name="id" value="<?php echo $s->id; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
			</form>
		
		</td>
		<td>
			<?php echo $s->school_id; ?>
		</td>
	</tr>
	
	
	<?php
			}
			$i++;
		}
	?>
            </tbody>
          </table>
		  </div>
    </div>


<div id="msg" class="alert alert-success alert-dismissible fade in" role="alert" style="display: none; position: fixed; bottom: 10px; left: 10px; z-index: 5; width: 300px;">
 	تمت التعديلات بنجاح
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>           
</div>	
<?php $this->load->view('template/footer');?>
 <script>
      $(document).ready(function () {
        var table = $("#example").DataTable({
          dom:
            "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
            "<'row'<'col-sm-12 table_layout'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
          lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
          ],
          responsive: true,
          language: {
            search: "_INPUT_",
            searchPlaceholder: "بحث",
            lengthMenu: "_MENU_",
            paginate: {
              first: "الأول",
              last: "الأخير",
              next: "التالي",
              previous: "السابق",
            },
          },
        });
        $(".dataTables_filter input").addClass("form-control");
        $(".dataTables_length select").addClass("form-select");
      });
    </script>
  </body>
</html>
		
		
		


                
          
 
 

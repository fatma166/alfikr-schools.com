<?php $this->load->view('template/body'); ?>

<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">مجموعات الأسئلة </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم الإداري</li>
								<li class="breadcrumb-item active" aria-current="page">مجموعات الأسئلة</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>
		
		
		

<div class="modal center-modal fade" id="modal-center" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة مجموعة جديدة</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 <form method="post" action="<?php echo base_url(); ?>master/add_new_questions_group" enctype="multipart/form-data">
        <table class="table">
			<Tr>
				<td>اسم  المجموعة</td>
				<td><input type="text" name="name" class="form-control" />
				
			
			</tr>
			<tR>
                <td>النص</td>
                <td>
                    <textarea name="text" class="form-control"></textarea>
                </td>
            </tR>
			
            <tR>
                <td>صورة المجموعة</td>
                <td>
                    <input type="file" name="img" />
                </td>
            </tR>
           
            <tr>
                <td>
                    الترتيب
                </td>
                <td>
                    <input type="text" name="ordering" class="form-control" style="width: 100px;" />
                </td>
            </tr>
        </table>
        <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>" />
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>







<script>
function change_questions_ordering(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_questions_ordering",
                data: {'id': id, 'value': value}

            }).done(function (msg) {
                   alert("تم تغيير الترتيب");
            });
}
</script>
        

           

<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">مجموعات الأسئلة</h4>
						  <button style="float: left;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">
							مجموعة جديدة
						  </button>
						</div>
						
						<div class="box-body">
						  <table class='table'>
			<tr>
				<th style="text-align: right"><?php echo $words["id"]; ?></th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">النص</th>
				<th style="text-align: right">الأسئلة</th>
				<th style="text-align: right">الصورة</th>
			
				<th style="text-align: right">حذف</th>
				
				
				
			

			</tr>
	<?php 
		foreach($groups as $b){
	?>
			<tr>
				<td><?php echo $b->id; ?></td>
				
				<td><?php echo $b->name; ?></td>
				<td><?php echo $b->text; ?></td>
				<td><a href="<?php echo base_url(); ?>master/exams_questions/<?php echo $b->id; ?>">الأسئلة</a></td>
			
				
				<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $b->image; ?>" width="200" /></td>
			
				
		
			    <td><a href="<?php echo base_url(); ?>master/delete_questions_group/<?php echo $b->id; ?>/<?php echo $exam_id; ?>">حذف</a></td>
			</tr>
	
	<?php
		}
	?>
</table>
						  
						  
						  
						</div>
						
					</div>
				</div>
			</div>
		</section> 
 
 
 <?php $this->load->view('template/footer'); ?>
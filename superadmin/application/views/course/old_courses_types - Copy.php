<?php $this->load->view('template/body'); ?>





<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">المراحل الدراسية </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم العلمي</li>
								<li class="breadcrumb-item active" aria-current="page">المراحل الدراسية</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		



<script>
	function view_modal(id){
        //var $data = $('#review_product_id span').text();
        var url = '<?php echo base_url(); ?>master/edit_course_type/'+id;
        $.ajax({
            type: 'GET',
            url: url,
            success: function (output) {
				$('#login_for_review').html(output);//now its working
				$('#login_for_review').modal('show');//now its working
            },
            error: function(output){
				alert("fail");
            }
        });
	}
</script>

<div id="login_for_review" class="modal" style="" role="dialog">
 
</div>



<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">جميع التصنيفات</h4>
						  <button style="float: left;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">
							إضافة مرحلة جديدة
						  </button>
						</div>
						<div class="box-body">
						  <table class='table table-striped table-bordered'  id="datatable">
	<thead>
			<tr>
				
				<th style="text-align: right">الرقم</th>
			<th style="text-align: right">الصورة</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">إضافة طالب</th>
				<th style="text-align: right"></th>
		</thead>		
	<tbody>
    <?php foreach($courses_types as $c){ ?>
	<form method="post" action="<?php echo base_url(); ?>master/edit_course_type">
	<tr>
		<td><?php echo $c->id; ?></td>
	  <td><img src="<?php echo base_url(); ?>../<?php echo $c->image; ?>" width="150" /></td>
        <td>
            
              <?php 
                echo $c->ar_name;
              ?>
           
                
            
        </td>
		<td>
		    <a href="<?php echo base_url(); ?>master/add_student_to_course_type/<?php echo $c->id; ?>" class="btn btn-success">إضافة طالب</a>
		</td>
		<td>
			<a href="<?php echo base_url(); ?>master/delete/courses_types/<?php echo $c->id; ?>" onclick="return confirm('هل تريد حقاً حذف هذا العنصر');" class="btn btn-danger"><span class="fa fa-trash"></span></a>
			<a  href="<?php echo base_url(); ?>master/edit_course_type/<?php echo $c->id; ?>"  class="btn btn-warning edit_modal" alt="تعديل"><span class="fa fa-edit"></span></a>
		</td>
		
				
    </tr>
	</form>
    <?php } ?>
	</tbody>
</table>
						</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>
          

<script>

$( document ).ready(function() {
    $('#datatable').DataTable();
});

</script>
<?php $this->load->view('template/footer'); ?>

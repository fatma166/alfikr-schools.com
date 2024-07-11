<?php $this->load->view('template/body'); ?>



<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">الملفات المساعدة </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>eschool/student/"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم العلمي</li>
								<li class="breadcrumb-item active" aria-current="page">الملفات المساعدة</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">جميع الملفات</h4>
						</div>
						<div class="box-body">

	<table class="table"  width="80%" style="margin-top: 20px; width: 100%;" align="center">
	<tr>
		<th>اسم الاستاذ</th>
		<th>اسم الملف</th>
		<th>عرض</th>
	
	<tr>
	<?php foreach($files as $f){ ?>
		<tr>
			<td><?php echo $f->teacher_name; ?></td>
			<td><?php echo $f->name; ?></td>
			<td><a href="<?php echo base_url(); ?>../uploads/<?php echo $f->file; ?>" target="_blank">عرض</a></td>
		</tr>
	
	
	<?php } ?>


</table>




						</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>

<?php $this->load->view('template/footer'); ?>

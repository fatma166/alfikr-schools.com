


<?php $this->load->view('template/body'); ?>



<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">الكتب </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>eschool/student/"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم العلمي</li>
								<li class="breadcrumb-item active" aria-current="page">الكتب</li>
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
						  <h4 class="box-title">برنامج الدوام</h4>
						</div>
						<div class="box-body">

	<div class="row">
        <?php foreach($books as $b){ ?>
        <div class="col-3" style="border: solid 1px #f1f1f1; padding: 5px; margin: 1px; direction: rtl">
            <img src="<?php echo base_url(); ?>../<?php echo $b->image; ?>" width="200"> <Br /><br />
            <?php echo $b->name; ?><br />
            <a href="<?php echo base_url(); ?><?php echo $b->link; ?>" class="btn">تنزيل</a>
        </div>
        
        <?php } ?>

    </div>

						</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>


<?php $this->load->view('template/footer'); ?>

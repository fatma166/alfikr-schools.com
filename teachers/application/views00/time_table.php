<?php $this->load->view('template/head'); ?>

<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>برنامج الدروس</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				برنامج الدروس
                </li>
            </ol>
        </nav>
    </div>
</div>

<table class="table table-striped">
	<tr>
		<td>
			الأحد	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
					<?php foreach($sunday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->course_name; ?></p>
							<?php if($t->is_live == 0){ ?>
							<a class="btn btn-success" href="<?php echo base_url(); ?>master/start_session/<?php echo $t->id; ?>/">
								بدء الجلسة
							</a>
							<?php } else{ ?>
							<a class="btn btn-danger" href="<?php echo base_url(); ?>master/end_session/<?php echo $t->id; ?>/">
								إنهاء الجلسة
							</a>
							<?php } ?>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td>
			الاثنين	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
				<?php foreach($monday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->course_name; ?></p>
							<a class="btn btn-success" href="<?php echo base_url(); ?>master/start_session/<?php echo $t->id; ?>/">
								بدء الجلسة
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td>
			الثلاثاء	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
				<?php foreach($teusday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->course_name; ?></p>
							<a class="btn btn-success" href="<?php echo base_url(); ?>master/start_session/<?php echo $t->id; ?>/">
								بدء الجلسة
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td>
			الأربعاء	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
				<?php foreach($wednesday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->course_name; ?></p>
							<a class="btn btn-success" href="<?php echo base_url(); ?>master/start_session/<?php echo $t->id; ?>/">
								بدء الجلسة
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td>
			الخميس	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
				<?php foreach($thursday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->course_name; ?></p>
							<a class="btn btn-success" href="<?php echo base_url(); ?>master/start_session/<?php echo $t->id; ?>/">
								بدء الجلسة
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
</table>
</div>


<?php $this->load->view('template/footer'); ?>

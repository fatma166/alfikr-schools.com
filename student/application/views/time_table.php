<?php $this->load->view('template/head'); ?>

<style>
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>

<div
      class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
    >
      <div class="title_page">
        <h2> برنامج الدوام </h2>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              القسم العلمي
            </li>
            <li class="breadcrumb-item active" aria-current="page">
			برنامج الدوام 
            </li>
          </ol>
        </nav>
      </div>
      <div
      class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
    >
      <button>
        <img
          src="<?php echo base_url(); ?>../assets/images/printer.svg"
          alt="print"
          width="20"
          height="20"
          loading="lazy"
        />
        <span>طباعة</span>
      </button>
      <button>
        <img
          src="<?php echo base_url(); ?>../assets/images/file.svg"
          alt="print"
          width="20"
          height="20"
          loading="lazy"
        />
        <span> تصدير إلى PDF </span>
      </button>
      <button>
        <img
          src="<?php echo base_url(); ?>../assets/images/download-cloud.svg"
          alt="print"
          width="20"
          height="20"
          loading="lazy"
        />
        <span> إستيراد </span>
      </button>

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
							<?php if($t->is_live){ ?><p style="color: red" class="blink_me">مباشر</p><?php } ?>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->teacher_name; ?></p>
							<?php if($t->is_live == 1){ ?><a href="<?php echo base_url(); ?>master/join_session/<?php echo $t->id; ?>" class="btn btn-warning">
							دخول للجلسة
							</a><?php } ?>
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
						<?php if($t->is_live){ ?><p style="color: red" class="blink_me">مباشر</p><?php } ?>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->teacher_name; ?></p>
							<?php if($t->is_live == 1){ ?><a href="<?php echo base_url(); ?>home/join_session/<?php echo $t->id; ?>" class="btn btn-warning">
							دخول للجلسة
							</a><?php } ?>
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
						<?php if($t->is_live){ ?><p style="color: red" class="blink_me">مباشر</p><?php } ?>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->teacher_name; ?></p>
							<?php if($t->is_live == 1){ ?><a href="<?php echo base_url(); ?>home/join_session/<?php echo $t->id; ?>" class="btn btn-warning">
							دخول للجلسة
							</a><?php } ?>
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
						<?php if($t->is_live){ ?><p style="color: red" class="blink_me">مباشر</p><?php } ?>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->teacher_name; ?></p>
							<?php if($t->is_live == 1){ ?><a href="<?php echo base_url(); ?>home/join_session/<?php echo $t->id; ?>" class="btn btn-warning">
							دخول للجلسة
							</a><?php } ?>
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
						<?php if($t->is_live){ ?><p style="color: red" class="blink_me">مباشر</p><?php } ?>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->title; ?></p>
							<p><?php echo $t->teacher_name; ?></p>
							<?php if($t->is_live == 1){ ?><a href="<?php echo base_url(); ?>home/join_session/<?php echo $t->id; ?>" class="btn btn-warning">
							دخول للجلسة
							</a><?php } ?>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>

                </table>
    </div>


 <?php $this->load->view('template/footer'); ?>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const dropdownButton = document.getElementById('dropdownMenuButton1');
          const dropdownMenu = document.querySelector('.notification-menu');

          dropdownButton.addEventListener('click', function(event) {
              event.stopPropagation();
              dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
          });

          document.addEventListener('click', function(event) {
              if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                  dropdownMenu.style.display = 'none';
              }
          });
      });
  </script>
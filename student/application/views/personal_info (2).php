<?php $this->load->view('template/body'); ?>
	<div class="row">
        <?php foreach($books as $b){ ?>
        <div class="col-3" style="border: solid 1px #f1f1f1; padding: 5px; margin: 1px; direction: rtl">
            <img src="<?php echo base_url(); ?>../<?php echo $b->image; ?>" width="200"> <Br /><br />
            <?php echo $b->name; ?><br />
            <a href="<?php echo base_url(); ?><?php echo $b->link; ?>" class="btn">تنزيل</a>
        </div>
        
        <?php } ?>

    </div>


<?php $this->load->view('template/footer'); ?>

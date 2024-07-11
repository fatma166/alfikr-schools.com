<?php $this->load->view('template/body'); ?>

<!-- Page Header section start here -->

<!-- Page Header section ending here -->
<?php $teacher_id=$this->uri->segment(3);?>
<!-- Sent Message Section Section Starts Here -->
<div class="contact-section padding-tb">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">إرسال رسالة</span>
        </div>
        <div class="section-wrapper">
            <form class="contact-form" action="<?php echo base_url(); ?>master/send_teacer_messaage/<?php echo $teacher_id; ?>" id="contact-form" method="POST" dir="rtl">
                <div class="form-group w-100">
                    <textarea class="form-control"  name="message" style="width: 100%" id="message" placeholder="محتوى الرسالة" required></textarea>
                </div>
                <div class="form-group w-100 text-center">
                    <button class="btn btn-success" type='submit'><span><?php echo $words['send']; ?></span></button>
                </div>
            </form>
            <p class="form-message"></p> 
        </div>
    </div>
</div>
<!-- Sent Message Section Section Ends Here -->

 <?php $this->load->view('template/footer'); ?>
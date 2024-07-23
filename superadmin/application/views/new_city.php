<?php $this->load->view('template/head'); ?>


<div class="tabs__form w-100">
    <div class="form__details w-100">
        <form enctype="multipart/form-data" action="<?php echo base_url(); ?>master/new_city_done" method="post"
            class="">
            <div class="row">
                <h2>إضافة مدينة جديدة
                </h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_form">
                            <label for=""> اسم المدينة </label>
                            <input type="text" name="ar_name" class="form-control">
                        </div>
                    </div>
                    <div class="btn__save">
                        <button>حفظ</button>
                    </div>
        </form>
    </div>
</div>







<?php $this->load->view('template/footer'); ?>

<?php $this->load->view('template/head'); ?>


<div class="tabs__form w-100">
    <div class="form__details w-100">
        <form enctype="multipart/form-data" action="<?php echo base_url(); ?>settings/new_story_done" method="post"
            class="">
            <div class="row">
                <h2>إضافة رأي جديد
                </h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_form">
                            <label for=""> الاسم </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
					<div class="col-md-12">
                        <div class="input_form">
                            <label for=""> الاختصاص </label>
                            <input type="text" name="spec" class="form-control">
                        </div>
                    </div>
					<div class="col-md-12">
                            <label for="" class="mb-2"> الصورة </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" type="file" name="image" id="formFile">
                                <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                    </div>
					<div class="col-md-12">
                        <div class="input_form">
                            <label for=""> المحتوى </label>
                            <textarea style="width: 600px; resize: none; " rows="5" name="content"></textarea>
                        </div>
                    </div>
                    <div class="btn__save">
                        <button>حفظ</button>
                    </div>
        </form>
    </div>
</div>







<?php $this->load->view('template/footer'); ?>

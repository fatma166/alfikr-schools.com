<?php $this->load->view('template/head'); ?>

 <link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
  
  <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>


<div class="tabs__form w-100">
    <div class="form__details w-100">
        <form enctype="multipart/form-data" action="<?php echo base_url(); ?>settings/new_story_done" method="post"
            class="">
            <div class="row">
                <h2>إضافة صفحة جديدة
                </h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_form">
                            <label for=""> الصفحة الأب </label>
                            <select name="parent_id" class="form-control">
								<option value="0">لا يوجد أب</option>
								<?php foreach($pages as $p){ ?>
									<option value="<?php echo $p->id; ?>"><?php echo $p->ar_name; ?></option>
								<?php } ?>
							</select>
                        </div>
                    </div>
					<div class="col-md-12">
                        <div class="input_form">
                            <label for=""> الاسم بالعربية </label>
                            <input type='text' name='ar_name' required autocomplete="off" class="form-control" />
                        </div>
                    </div>
					<div class="col-md-12">
                        <div class="input_form">
                            <label for=""> الاسم بالانجليزية </label>
                            <input type='text' name='en_name' autocomplete="off" class="form-control" />
                        </div>
                    </div>
					<div class="col-md-12">
                        <label for=""> المحتوى بالعربي </label>
                        <textarea id="summernote_1" name='ar_content'><p></p></textarea>
                    </div>
					<div class="col-md-12">
                        <label for=""> المحتوى بالانجليزي </label>
                        <textarea id="summernote_2" name='en_content'><p></p></textarea>
                    </div>
                    <div class="btn__save">
                        <button>حفظ</button>
                    </div>
        </form>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>
<script>
    $(document).ready(function() {
        $('#summernote_1').summernote({
			placeholder: '',
			tabsize: 2,
			height: 200,
			toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            
            
             ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen', 'codeview', 'help']],
  ['style', ['style']],
  ['fontname', ['fontname']],

              
          ]
		  });
		$('#summernote_2').summernote({
			placeholder: '',
			tabsize: 2,
			height: 200,
			toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            
            
             ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen', 'codeview', 'help']],
  ['style', ['style']],
  ['fontname', ['fontname']],

              
          ]
		  });
		
	
    });
  </script>

<?php $this->load->view('template/body'); ?>
<?php if($this->input->get('msg') == 'done'){ ?>
<script>
alert('تمت التعديلات بنجاح');
</script>
<?php } ?>

<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>الحساب الشخصي</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الأداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    الحساب الشخصي
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="__details w-100">
    <?php if(isset($_GET['msg'])){ ?>
    <?php if($_GET['msg'] == 'done'){ ?>
    <p align="center" style="color: green">
        تمت التعديلات بنجاح
    </p>
    <?php } ?>
    <?php } ?>
	<form method="post" action="<?php echo base_url(); ?>master/edit_student_info_done">
    <div class="row">
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الإسم الأول </p>
                <span><input type='text' style="width: 300px;" class="form-control" name="first_name" value='<?php echo $student->first_name; ?>' /></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الإسم الثاني </p>
                <span><input type='text' style="width: 300px;" class="form-control" name="last_name" value='<?php echo $student->last_name; ?>' /></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> رقم الجوال </p>
                <span><input type='text' style="width: 300px;" class="form-control" name="mobile" value='<?php echo $student->mobile; ?>' /></span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الصورة الشخصية </p>
                <img src="../../assets/images/avatar.png" alt="avatar" width="120" height="120">
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> رقم جوال بديل</p>
                <span> 0123453789 </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> البريد الألكتروني </p>
                <span><input disabled type='text' style="width: 300px;" class="form-control" name="email" value='<?php echo $student->email; ?>' /></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> المرحلة </p>
                <span><input type='text' style="width: 300px;" class="form-control" name="course_type" disabled value='<?php echo $course->name; ?>' /></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الصف الدراسي </p>
                <span><input type='text' style="width: 300px;" class="form-control" name="course_type" disabled value='<?php echo $course_type->ar_name; ?>' /></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> اسم الأب </p>
                <span> أب </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> اسم الأم </p>
                <span> أم </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الجنس</p>
                <span>
				<select name="gender" style="width: 300px;" class="form-control">
                                        <option value="0">الجنس</option>
                                        <option value="1" <?php if($student->gender == 1){ ?> selected <?php  } ?>>ذكر
                                        </option>
                                        <option value="2" <?php if($student->gender == 2){ ?> selected <?php  } ?>>أنثى
                                        </option>
                                        =>
                                    </select>
				</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الحالة الأحتماعية </p>
                <span> أعزب </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> تاريخ الميلاد </p>
                <span> 27-11-2020 </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الجنيسة</p>
                <span> مصري </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الحالة</p>
                <span> نشط </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p> الرقم الوطني</p>
                <span> 056168416016804615 </span>
            </div>
        </div>
		<div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
                <p>كلمة المرور</p>
                <span><input type='password' style="width: 300px;" class="form-control" name="password" value='<?php echo $student->password; ?>' /></span>
            </div>
        </div>
		
    </div>
	</form>
</div>



<?php $this->load->view('template/footer'); ?>

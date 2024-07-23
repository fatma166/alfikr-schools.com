
<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="eduStudent" />
    <meta name="keywords" content="eduStudent" />
    <meta name="author" content="eduStudent" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sass/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatable.css" />
    <title>EDU STUDENT</title>
    <link rel="icon" href="<?php echo base_url(); ?>../assets/images/logo.png" type="image/x-icon" />
  </head>
  <body>
    <div
      class="login__page"
      style="background-image: url('<?php echo base_url(); ?>../assets/images/header2.webp')"
    >
      <div class="login_form">
        <form action="<?php echo base_url(); ?>login/check" method="post" class="w-100 d-flex justify-content-start align-items-start flex-column gap-3">
          <div class="d-flex justify-content-start align-items-start flex-column gap-2 w-100">
            <label for=""> اسم المستخدم </label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>../assets/images/mail-02.svg" alt="text"></span>
              <input type="text" class="form-control" name="username" placeholder="اسم المستخدم" aria-label="text">
            </div>          
          </div>
          <div class="d-flex justify-content-start align-items-start flex-column gap-2 w-100">
            <label for=""> كلمة المرور </label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>../assets/images/lock-01.svg" alt="password"></span>
              <input type="password" class="form-control" name="password" placeholder="كلمة المرور" aria-label="password">
            </div>          
          </div>
          <a href="" class="forget__pasword"> هل نسيت كلمة السر ؟ </a>
          <div class="w-100 d-flex justify-content-center align-items-center flex-column mt-2">
            <!-- <button class="btn__form"> تسجيل دخول </button> -->
            <button type="submmit"> تسجيل دخول </a>
          </div>
        </form>
      </div>
      <div class="login__info">
        <img src="<?php echo base_url(); ?>../assets/images/logo.png" alt="logo" width="100" height="100">
        <h1>اهلا بكم <br> سجل الاّن وتابع كل جديد في لوحة التحكم</h1>
      </div>
    </div>
    <script src="<?php echo base_url(); ?>../assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>../assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>../assets/js/datatable.js"></script>

  </body>
</html>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->

    <title>Login</title>

    <link rel="stylesheet" href="<?php echo base_url('asset/css/styles.css');?>">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="<?php echo base_url('asset/js/jquery.validate.min.js')?>"></script>

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        body{
            background-size: cover;
            background-repeat: no-repeat;
            background: -webkit-linear-gradient(left, #3931af, #00c6ff)!important;
            height: 100vh;
        }
        .login-container{
            margin-top: 5%;
            margin-bottom: 5%;
        }
        .login-form-2{
            padding: 5%;
            background: #c83232;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }
        .login-form-2 h3{
            text-align: center;
            color: #fff;
        }
        .login-container form{
            padding: 10%;
        }
        .btnSubmit
        {
            width: 150px!important;
            margin: auto;
            display: block;
            border-radius: 0;
            padding: 1.5% 1%;
            color: #fff;
            border: none!important;
            cursor: pointer;
            background-color: #216ecf;
        }
        span {
            color: red;
        }
       
    /* =============== */
    .login-page{
        transform: translateX(-50%) translatey(-50%);
        left: 50%;
        top: 50%;
        position: absolute;
        width: 100%;
    }
    .login-page .container {
        width: 65%;
        margin: auto;
        display: block;
        box-shadow: 0px 0px 34px 2px #272727;
        padding: 0px;
        border-radius: 18px;
        background-color: #fff;
    }
    .login-page form {
        margin: 0;
        width: 100%;
        padding: 30px 0px 10px;
         display: inline-block;
/*      border: 1px solid rgba(22, 82, 107, 0.5294117647058824);
        background-color: rgba(25, 185, 199, 0.72);*/
    }
    .login-page input{
        height: 36px;
        border-radius: 0;
        border: 1px solid #dddddd;
    }
    .login-page input[type="submit"]{
        font-weight: 600;
    }
    .login-page .nav {
        float: right;
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #fff;
        background-color: #216ecf;
        border: 0;
    }
    .nav-tabs>li {
        width: 50%;
    }

    .nav-tabs{
        border-bottom: 0px;
    }
    .nav-tabs>li>a {
        border-color: #eee;
        background-color: #eee;
        border-radius: 0px;
        border: 0px;
        font-weight: 600;
        font-size: 16px;
        border-top-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }
    .nav-tabs>li>a:hover {
        border-color: #eee;
    }
    .login-page .left {
        background-image: url("<?php echo base_url('asset/images/login-bg-2.jpg') ?>");
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 520px;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        position: relative;
    }
    .login-page .left img {
        position: absolute;
        transform: translateX(-50%) translateY(-50%);
        left: 50%;
        top: 50%;
        width: 70%;
    }
    .login-page .right {
        background-color: #ffffff;
        padding: 30px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        min-height: 485px;
    }
    .ForgetPwd{
        color: #cccccc!important;
        font-size: 12px;
    }
    span.btnSubmit{
        padding: 11px 20px;
        font-weight: 600;
        width: 150px;
        text-align: center;
    }
    .btn-222{
        width: 200px;
    }
    span.red{
        font-size: 12px;
    }
    label.error{
        color: red;
    }
    .password_error_confirm{
        margin-bottom: 15px;
    }

    @media screen and (max-width: 768px){
        body {
            background-size: 422% 170%;
            padding: 15px;
        }

        .login-page .container {
            width: 100%;
        }
        .nav-tabs>li>a {
            font-size: 15px;
        }
        .login-page form {
            border: 1px solid rgba(22, 82, 107, 0.5294117647058824);
            padding: 20px 20px 10px;
        }
        .login-page .left {
            min-height: 170px;
            padding: 10px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
        }
        .login-container {
             margin-top: 0%;
             margin-bottom: 0%; 
        }
        .login-page {
            transform: unset;
            left: unset;
            top: unset;
            position: unset;
        }
        .login-page .right {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .login-page .right {
            padding: 15px 15px 10px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            min-height: auto;
        }
        .form-group {
            margin-bottom: 8px;
        }
        .login-page input{
            width: 100%;
            height: 32px;
        }
        span.btnSubmit {
            padding: 7px 0;
            text-align: center;
        }
        .nav>li>a {
            padding: 6px 15px;
            font-size: 14px!important;
        }


    }
</style>

</head>

<body>

	
    

        <div class="login-page">
            <div class="container">
                  
                <div class="col-xs-12 col-sm-5 left">
                    <img src="<?php echo base_url('asset/images/logo.png'); ?>" class="img-responsive" alt="logo">
                </div>
                <div class="col-xs-12 col-sm-7 right">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#Login">Login</a></li>
                    <li><a data-toggle="tab" href="#Registration">Registration</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="Login" class="tab-pane fade in active">
                        <br>
                    <form action="<?php echo base_url('frontend/verifylogin')?>" method="post" class="login_form" id="login_form">
                        <div class="form-group">
                            <input type="name"  class="form-control" name="email" id="email" autocomplete="off"  placeholder="Email *" />

                              <!-- <span class="red" id="loginemail_error"><?php echo form_error('email'); ?></span> -->
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" autocomplete="off"  placeholder="Password *" />
                            <!-- <span class="red" id="loginpassword_error"><?php echo form_error('password'); ?></span> -->
                        </div>
                        
                        <div class="form-group">
                            <a href="<?php echo base_url('/frontend/forget'); ?>" class="ForgetPwd" style="color:#FFFFFF;">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                                <!-- <span class="btnSubmit" onclick="login_form_check()">Login</span> -->
                            <input type="submit" name="loginsubmit" class="btnSubmit btn-222" value="Login"  />
                        </div>
                         
                            <?php if(validation_errors() && isset($_POST['loginsubmit'])){?>
                            <div class="alert alert-danger">
                               
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php  }if(!empty($msg)){?>
                            <div class="alert alert-info">
                                <?php echo $msg;?>
                            </div>
                            <?php }?>
                    </form>

                    </div>
                    <div id="Registration" class="tab-pane fade">
                            <br>
                     <form role="form" method="post" action="<?php echo base_url('frontend/add_user')?>" class="registration_form1" enctype="multipart/form-data" id="registration_form1" >
                        <div class="form-group">
                             <input type="text" name="name" id="name"  class="form-control" value="" maxlength="30" placeholder="Name *">
                              <span class="red" id="name_error"><?php echo form_error('name'); ?></span>
                            
                        </div>
                         <div class="form-group">
                            <input type="text" name="phone_number" class="form-control" placeholder="Mobile Number *" value=""  id="phone_number" maxlength="10" minlength="10" />
                            <span class="red" id="number_error"><?php echo form_error('phone_number'); ?></span>
                        </div>
                        <div class="form-group">
                            <input type="email"  name="email" class="form-control" placeholder="Email *" value="" id="register_email" />
                            <span class="red" id="email_error"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="loginpassword" class="form-control" placeholder="Password *" value="" id="register_password" />
                            <span class="red" id="password_error"><?php echo form_error('loginpassword'); ?></span>
                        </div>   
                        <div class="form-group password_error_confirm">
                            <input type="password" name="Confirmpassword" class="form-control" placeholder="Confirm Password *" value="" id="register_cnfirm_password" />
                            <span class="red" id="password_error_confirm"><?php echo form_error('Confirmpassword'); ?></span>
                        </div>         
                        <div class="form-group">
                            <span class="btnSubmit" onclick="checkform()">Registration</span>
                         </div>
                    </form>
                            <?php if(isset($msgsucees) && !empty($msgsucees)){    ?>
                            <div class="alert alert-success">
                                <strong style="font-size: 17px;"></strong>
                                <?php echo $msgsucees; ?>
                            </div>
                            <?php } ?>  
                    </div>
                  </div>
                </div>
            </div>
        </div>
        


</body>

</html>

<script type="text/javascript">

    /**
  * Basic jQuery Validation Form Demo Code
  * Copyright Sam Deering 2012
  * Licence: http://www.jquery4u.com/license/
  */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#login_form").validate({
                rules: {
                    
                  
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                       
                    },
                    agree: "required"
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide a password",
                       
                    },
                    email: "Please enter a valid email address",
                    agree: "Please accept our policy"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
    // function login_form_check(){
    //     var email     = $('#login_email').val();
    //     var password  = $('#password_login').val();

    //     if(email==''){
    //         $('#loginemail_error').text('Email field required');
    //         return false;
    //        }else if(password==''){
    //           $('#loginpassword_error').text('Password field required');
    //           return false;
    //        }else{
    //         $('#login_form').submit();
    //        }

    // }
    function checkform(){
       var name          = $('#name').val();
       var phone_number  = $('#phone_number').val();
       var email         = $('#register_email').val();
       var password      = $('#register_password').val();
       var confirm_pass  = $('#register_cnfirm_password').val();

       if(name==''){
            $('#name_error').text('Name field required');
            return false;
       }else{
            $('#name_error').text('');
       }
        if(phone_number==''){
            $('#number_error').text('Phone number field required');
            return false;
       }else{
            if (validatePhone(phone_number)) {
                    $('#number_error').text(''); 
            }
            else {
              $('#number_error').text('Please enter a valid number'); 
             // $('#phone_number').val('');
              return false;
            
            }
           // $('#number_error').text('');
       }
       if(email==''){
            $('#email_error').text('Email field required');
            return false;
       }else{

            if (!validateEmail(email)) {
                 $('#email_error').text('Please enter a valid email'); 
                 $('#register_email').val('');
                    return false;
                    
            }
            else {
                $('#email_error').text(''); 
            
            }
            
       }
       if(password==''){
            $('#password_error').text('Password field required');
            return false;
       }else{
            $('#password_error').text('');
       }
       if(confirm_pass=='') {
            $('#password_error_confirm').text('Confirm password field required');
            return false;
       }else{
            $('#password_error_confirm').text('');
       }

       if(password!=confirm_pass){
            $('#password_error_confirm').text('Password and confirm password not match');
            return false;
       }else{
             $('#password_error_confirm').text('');
       }

        
       
        $.ajax({
                type: "Post",
                url: "<?php echo base_url('frontend/check_email')?>",
                    data: {
                        'email': email,
                         },
                    success: function(data) {

                        if(data ==0){
                      
                          $('#email_error').text('This email is already existing please check the email.');
                          return false; 
                        }else{
                               $("#registration_form1").submit();
                        }
                    }
        });
    }

   
   
   
   function validateEmail(sEmail) {
        var filter = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (filter.test(sEmail)) {
           return true;
        }
        else {
           return false;
        }
    }

    function validatePhone(txtPhone) {

       // var a = document.getElementById(txtPhone).value;

        var filter = /^[0-9-+]+$/;

        if (filter.test(txtPhone)) {
            if(txtPhone.length==10){
            return true;
            }else{
                return false;
            }

        }

        else {

            return false;

        }
    }

</script>




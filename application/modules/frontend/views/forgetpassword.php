<!doctype html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->

    <title>Login</title>

<!--     <link rel="stylesheet" href="<?php echo base_url('asset/styles.css');?>"> -->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="<?php echo base_url('asset/js/jquery.validate.min.js')?>"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        body{
		    /*background-color: #272323c9;
            background-color: skyblue!important;
            background-image: url(http://webdesky.com/studentx/asset/images/gradient-2.jpg);*/
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
            width: auto;
            border-radius: 0;
            padding: 1.5% 10%;
            color: #fff;
            border: none;
            cursor: pointer;
            background-color: #216ecf;
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
        margin: 20px auto;
        width: 100%;
        padding: 30px 0px 10px;
         display: inline-block;
/*      border: 1px solid rgba(22, 82, 107, 0.5294117647058824);
        background-color: rgba(25, 185, 199, 0.72);*/
    }
    .login-page input{
        height: 40px;
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
        font-size: 18px;
        border-top-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }
    .nav-tabs>li>a:hover {
        border-color: #eee;
    }
    .login-page .left {
        background-image: url(http://webdesky.com/studentx/asset/images/login-bg-2.jpg);
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
        padding: 45px 30px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        min-height: 485px;
    }
    .ForgetPwd{
        color: #cccccc!important;
        font-size: 12px;
    }

    label.error{
        color: red;
        font-size: 12px !important;
        font-weight: 300 !important;
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
            padding: 30px 15px 10px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            min-height: auto;
        }
        .login-page input{
            width: 100%;
        }
        .nav-tabs>li{
            width: 100%;
        }



    }
</style>

</head>

<body>

	
    

        <div class="login-page">
            <div class="container">
                  
                <div class="col-xs-12 col-sm-5 left">
                    <img src="http://webdesky.com/studentx/asset/images/logo.png" class="img-responsive" alt="logo">
                </div>
                <div class="col-xs-12 col-sm-7 right">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#Login">Forget Password</a></li>
                    
                  </ul>

                  <div class="tab-content">
                    <div id="Login" class="tab-pane fade in active">
                        <br>
                    <form action="<?php echo base_url('frontend/forget')?>" method="post" class="login_form" id="form">
                        <div class="form-group">
                            <input type="email"   class="form-control" id="email" name="email" autocomplete="off"  placeholder="Email *" />
                        </div>
                        <div class="form-group">
                            <a href="<?php echo base_url('/'); ?>" class="ForgetPwd" style="color:#FFFFFF;">Login</a>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="forgetsubmit" class="btnSubmit" value="Submit" />
                        </div>
                         <?php if(!empty($msgerror)){?>
                            <div class="alert alert-danger">
                                <strong style="font-size: 17px;"></strong>
                                <?php echo $msgerror; ?>
                            </div>
                            <?php }elseif(!empty($msg)){?>
                            <div class="alert alert-info">
                                <?php echo $msg;?>
                            </div>
                            <?php }?>
                    </form>
                    </div>
                            <div id="Registration" class="tab-pane fade">
                                    <br>
                             <form role="form" method="post" action="<?php echo base_url('frontend/add_user')?>" class="registration_form1" enctype="multipart/form-data">
                                <div class="form-group">
                                     <input type="text" name="name" id="name"  class="form-control" value="" maxlength="30" placeholder="Name *">
                                      <span class="red"><?php echo form_error('name'); ?></span>
                                    
                                </div>
                                 <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control" placeholder="Mobile Number *" value="" />
                                    <span class="red"><?php echo form_error('phone_number'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="email"  name="email" class="form-control" placeholder="Email *" value="" />
                                    <span class="red"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="loginpassword" class="form-control" placeholder="Password *" value="" />
                                    <span class="red"><?php echo form_error('loginpassword'); ?></span>
                                </div>                        
                                <div class="form-group">
                                    <input type="submit" name="registerbtn" class="btnSubmit" value="Registration" />
                                </div>
                            </form>
                            <?php if(isset($msgsucees) && isset($_POST['registerbtn'])){?>
                                    <div class="alert alert-success">
                                        <strong style="font-size: 17px;">Success!</strong>
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
            $("#form").validate({
                rules: {
                    
                  
                    email: {
                        required: true,
                        email: true
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
</script>




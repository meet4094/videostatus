<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo PLATFORM_NAME; ?> | Admin Reset Password</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo BASE_URL;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo BASE_URL;?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo BASE_URL;?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo BASE_URL;?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo BASE_URL;?>assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo BASE_URL; ?>favicon.ico" /> </head>
        <style type="text/css">
            .login .logo { margin: 15px auto 20px; padding: 0px; text-align: center; width: 350px; }
            @media only screen and (max-width: 480px) and (min-width: 320px) { 
                .login .logo { width: 210px; }
            }
            @media only screen and (max-width: 320px) { 
                .login .logo { width: 210px; }
            }
        </style>
    <!-- END HEAD -->
    <body class=" login">
        <div class="menu-toggler sidebar-toggler"></div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGO -->
        <div class="logo">
            <img class="img-responsive" src="<?php echo BASE_URL; ?>images/logo_wide.png" alt="<?php echo PLATFORM_NAME; ?>" /> 
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <?php if ($statuscode != 1) { ?>
                <h3>This link has expired.</h3>
            <?php } else { ?>
                <?php if (isset($info_message)) {
                    echo $info_message;
                }?>
                <form class="reset-form" action="<?php echo BASE_URL."services/admin/reset_password"; ?>" method="post">
                    <h3 class="form-title font-green">Reset Password</h3>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <div class="input-icon">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="new_password" class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Password" id="reset_password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <div class="input-icon">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="rpassword" class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Re-type Your Password" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" id="secret_token" name="token" value="<?php echo $token; ?>">
                        <button type="submit" class="btn green uppercase">Reset</button>
                    </div>
                </form>
            <?php } ?> 
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright"> <?php echo date("Y"); ?> &copy; <?php echo PLATFORM_NAME; ?>.</div>
        <!--[if lt IE 9]>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo BASE_URL;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE_URL;?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo BASE_URL;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <script type="text/javascript">
            var Login = function() {
                var handleLogin = function() {
                    $('.reset-form').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: false, // do not focus the last invalid input
                        rules: {
                            new_password: {
                                required: true
                            },
                            rpassword: {
                                equalTo: "#reset_password"
                            }
                        },

                        invalidHandler: function(event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('.reset-form')).show();
                        },

                        highlight: function(element) { // hightlight error inputs
                            $(element)
                                .closest('.form-group').addClass('has-error'); // set error class to the control group
                        },

                        success: function(label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        },

                        errorPlacement: function(error, element) {
                            error.insertAfter(element.closest('.input-icon'));
                        },

                        submitHandler: function(form) {
                            form.submit(); // form validation success, call ajax form submit
                        }
                    });

                    $('.reset-form input').keypress(function(e) {
                        if (e.which == 13) {
                            if ($('.reset-form').validate().form()) {
                                $('.reset-form').submit(); //form validation success, call ajax form submit
                            }
                            return false;
                        }
                    });
                }

                return {
                    //main function to initiate the module
                    init: function() {
                        handleLogin();
                    }
                };
            }();

            jQuery(document).ready(function() {
                Login.init();
            });
        </script>
    </body>
</html>
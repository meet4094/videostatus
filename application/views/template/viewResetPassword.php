<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo PLATFORM_NAME; ?> | Reset Password</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo BASE_URL; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL; ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL; ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL; ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo BASE_URL; ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL; ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo BASE_URL; ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo BASE_URL; ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo BASE_URL; ?>assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="<?php echo BASE_URL; ?>favicon.ico" />
        <style type="text/css">
            .login .logo { margin: 15px auto 20px; padding: 0px; text-align: center; width: 350px; }
            @media only screen and (max-width: 480px) and (min-width: 320px) { 
                .login .logo { width: 210px; }
            }
            @media only screen and (max-width: 320px) { 
                .login .logo { width: 210px; }
            }
        </style>
    </head>
    <!-- END HEAD -->
    <script type="text/javascript">
        var IS_IPAD = navigator.userAgent.match(/iPad/i) != null;
        var IS_IPHONE = !IS_IPAD && ((navigator.userAgent.match(/iPhone/i) != null) || (navigator.userAgent.match(/iPod/i) != null));
        var IS_IOS = IS_IPAD || IS_IPHONE;
        var IS_ANDROID = !IS_IOS && navigator.userAgent.match(/android/i) != null;
        var IS_MOBILE = IS_IOS || IS_ANDROID;
        
        function checkAppInstall() {
            var url = "videostatus://resettoken/?code=<?php echo $code; ?>&secret_token=<?php echo $token; ?>"; // Schema of the App.
            if(IS_MOBILE) {
                location.href = url;
            }
            return false;
        }
    </script>
    <body class=" login" onload="checkAppInstall();">
        <div class="menu-toggler sidebar-toggler"></div>
        <div class="logo">
            <a href="<?php echo WEB_URL; ?>">
                <img class="img-responsive" src="<?php echo BASE_URL; ?>images/logo_wide.png" alt="<?php echo PLATFORM_NAME; ?>" /> 
            </a>
        </div>
        <div class="content">
            <hr>
            <div class="c_message">
                <span id="loader_rp" style="color:red;"></span>
            </div>
            <?php if ($statuscode != 1) { $iView = 0; ?>
                <h3>This link may be expired.</h3>
            <?php } else { $iView = 1; if (isset($info_message)) { echo $info_message; } ?>
                <form class="reset-form" action="#" method="post">
                    <h3 class="form-title">Reset Password</h3>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <div class="input-icon">
                            <i class="fa fa-lock"></i>
                            <input type="password" id="fpassword" name="fpassword" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <div class="input-icon">
                            <i class="fa fa-lock"></i>
                            <input type="password"  id="spassword" name="spassword" class="form-control" placeholder="Confirm Password" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" id="secrettoken" name="secret_token" value="<?php echo $token; ?>">
                        <input type="button" class="btn btn-success" value="Reset" id="Reset" name="Reset" onclick="return reset_password();"/>
                    </div>
                </form>
            <?php } ?> 
        </div>
        <div class="copyright"> 2017 © <?php echo PLATFORM_NAME; ?>. </div>
        <!--[if lt IE 9]>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <?php if($iView == 1) { ?>
            <script type="text/javascript">
                function reset_password() {
                    var fpassword = $("#fpassword").val();
                    var spassword = $("#spassword").val();
                    var secret_token = $("#secrettoken").val();
                    if (fpassword === "") {
                        $("#loader_rp").html("Password should not be blank!!");
                        return false;
                    }
                    if (fpassword !== spassword) {
                        $("#loader_rp").html("Password and confirm password does not match!!");
                        return false;
                    }
                    $.ajax({
                        url: "<?php echo BASE_URL.'api/user/resetPassword'; ?>",
                        type: 'POST',
                        data: {'new_password': fpassword, 'secret_token': secret_token},
                        beforeSend: function () {
                            $("#loader_rp").html('Please wait..');
                        },
                        success: function (data, textStatus, xhr) {
                            if (data['statuscode'] == 1)
                                msg = "<span style='color:green'>" + data['msg'] + "</span>";
                            else
                                msg = "<span style='color:red'>" + data['msg'] + "</span>";
                            $("#loader_rp").html(msg);
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            var color = 'red';
                            $("#loader_rp").html("");
                        }
                    });
                }
            </script>
        <?php } ?>
    </body>
</html>
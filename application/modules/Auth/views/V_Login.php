<!DOCTYPE html>
<html style="overflow:auto;">
    <head>
        <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
        <meta charset=utf-8>
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>
            <?= $title ?>
        </title>
        <link href="<?= base_url('assets/images/Logo/PT.Marsit.png'); ?>" rel="icon" type="image/png" sizes="16x16">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel=stylesheet>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.1/animate.min.css" rel=stylesheet>
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color:#000;">
        <div class="row" style="clear:both;margin:5% 0px;display:none;">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card" style="background-image:url('<?= base_url('assets/images/bg1.jpg'); ?>');background-position: center;background-repeat:no-repeat;background-size:100%;">
                    <div class="card-header">
                        <div class="text-center">
                            <h3 class="text-uppercase">login user</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group" style="clear:both;margin:20px 0px;">
                            <label class="label label-primary">Username:</label>
                            <p id="unamemsg" class="text-left text-danger" style="display:none;color:#ed4956;"></p>
                            <input type=text name=unametxt class=form-control placeholder="input your username" autocomplete=off> 
                        </div>
                        <div class="form-group" style="clear:both;margin:20px 0px;">
                            <label class="label label-primary">Password:</label>
                            <p id="pwdmsg" class="text-left text-danger" style="display:none;color:#ed4956;"></p>
                            <div class="input-group mb-3">
                                <input type="password" name="pwdtxt" id="pwdtxt" class="form-control" placeholder="input your secure password">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="showpwd()"><i class="fa fa-eye showpwd" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <p class="text-center" id="errmsg" style="display:none;color:#ed4956;"></p>
                        <div class="form-group text-center">
                            <button class="text-uppercase btn btn-info" onclick="Login()" type="button">login</button>
                        </div>
                    </div>
                    <div class="text-center card-footer">
                        <p>©
                            <?= date("Y"); ?> All Rights Reserved.<br>
                            PT SANINDO UTAMA TRAKTOR
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="<?= base_url('assets/js/fastclick.js'); ?>"></script>
        <script src="<?= base_url('assets/js/login.js'); ?>"></script>
    </body>
</html>

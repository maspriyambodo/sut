<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="icon" href="<?= base_url('favicon.ico'); ?>" type="image/ico" />
        <title class="text-uppercase"><?= $title ?></title>
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('node_modules/nprogress/nprogress.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/datatables.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/animate.css'); ?>" type="text/css" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/custom.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('node_modules/chart.js/dist/Chart.min.css'); ?>" rel=stylesheet type="text/css" />
    </head>
    <body class="nav nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="clearfix"></div>
                        <div class="profile clearfix">
                            <div class="profile_pic"> <img src="<?= base_url('assets/images/user/marketing.png');?>" class="img-circle profile_img img-rounded"> </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2 class="text-uppercase"><?= $uname; ?></h2>
                                <?php
                                if ($this->session->userdata('hakakses') == 1) {
                                    echo 'ADMIN';
                                } elseif ($this->session->userdata('hakakses') == 2) {
                                    echo 'CUSTOMER';
                                } elseif ($this->session->userdata('hakakses') == 3) {
                                    echo 'DIREKTUR';
                                }
                                ?>
                            </div>
                        </div>
                        <br/>
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <!--====================================================================================-->
                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                <?php
                                $admin = 'hidden';
                                $customer = 'hidden';
                                $direktur = 'hidden';
                                if ($this->session->userdata('hakakses') == 1) {
                                    $admin = 'show';
                                } elseif ($this->session->userdata('hakakses') == 2) {
                                    $customer = 'show';
                                } elseif ($this->session->userdata('hakakses') == 4) {
                                    $direktur = 'show';
                                }
                                ?>
                                <div class="menu_section <?= $admin; ?>">
                                    <ul class="nav side-menu">
                                        <li><a href="<?= base_url('Admin/Dashboard/index'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
                                        <li><a href="<?= base_url('Admin/Preorder/index'); ?>"><i class="glyphicon glyphicon-shopping-cart"></i> P O</a></li>
                                        <li><a href="<?= base_url('Admin/Quotation/index'); ?>"><i class="glyphicon glyphicon-list-alt"></i> Quotation</a></li>
                                        <li><a href="<?= base_url('Admin/Payment/index'); ?>"><i class="fa fa-credit-card-alt"></i> Payment</a></li>
                                        <li><a href="<?= base_url('Admin/Invoice/index'); ?>"><i class="fa fa-file-text"></i> Invoice</a></li>
                                        <li><a href="<?= base_url('Admin/Report/index'); ?>"><i class="fa fa-files-o"></i> Report</a></li>
                                    </ul>
                                </div>
                                <!--====================================================================================-->
                                <div class="menu_section <?= $customer; ?>">
                                    <ul class="nav side-menu">
                                        <li class=""><a href="<?= base_url('Customer/Dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                        <li class="">
                                            <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu" style="display: none;">
                                                <li><a href="#">Dashboard</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                                <!--====================================================================================-->
                                <div class="menu_section <?= $direktur; ?>">
                                    <ul class="nav side-menu">
                                        <li class=""><a href="<?= base_url('Direktur/Dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                        <li class="">
                                            <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu" style="display: none;">
                                                <li><a href="#">Dashboard</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--====================================================================================-->
                        </div>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle"><a id="menu_toggle"><i class="fa fa-bars"></i></a></div>

                            <ul class="nav navbar-nav navbar-right"> 
                                <li class=""> 
                                    <a href="javascript:;" class="user-profile dropdown-toggle text-uppercase" data-toggle="dropdown" aria-expanded="false"> 
                                        <img src="../../assets/images/user/marketing.png"><?= $uname ?> 
                                        <span class=" fa fa-angle-down">
                                        </span> 
                                    </a> 
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li>
                                            <a href="<?= base_url('Auth/Logout'); ?>">
                                                <i class="fa fa-sign-out pull-right">
                                                </i> Log Out
                                            </a>
                                        </li> 
                                    </ul> 
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="right_col hidden" role="main" style="min-height:0px ! important;">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 class="text-uppercase"><?= $formtitle; ?></h2>
                            <div class="clearfix" style="clear:both;margin:0px;"></div>
                        </div>
                        <div class="x_content clearfix" style="clear:both;margin:0px;display:block;">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <footer>
        <div class="pull-right"> Copyrights © <?= date("Y") ?> All Rights Reserved by <a href="#" target="_new">PT SANINDO UTAMA TRAKTOR</a> </div>
        <div class="clearfix"></div>
    </footer>
    <div class="back-to-top" data-placement="top" data-toggle="tooltip" id="back-top" title="" data-original-title="Back to Top"><i class="fa fa-chevron-up"></i></div>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/fastclick.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('node_modules/nprogress/nprogress.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('node_modules/chart.js/dist/Chart.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/date.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/moment.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/custom.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/dropzone.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/jquery.inputmask.bundle.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/signature_pad.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/jquery.number.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/html2canvas.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/datatables.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/pdfmake.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/vfs_fonts.js'); ?>" type="text/javascript"></script>
</body>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
</script>
</html>
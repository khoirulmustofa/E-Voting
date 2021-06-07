<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Voting NFBS Bogor</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="NFBS Bogor">
    <meta name="description" content="E-Voting NFBS Bogor Sebuah sistem yang memanfaatkan perangkat elektronik dan mengolah informasi digital untuk membuat surat suara, memberikan suara, menghitung perolehan suara, menayangkan perolehan suara" />
    <meta name="author" content="LRC NFBS Bogor (Dev By MasMus" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="https://app.nfbs-bogor.sch.id/logo_nf_atas.ico" />
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/icon/themify-icons/themify-icons.css">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/icon/feather/css/feather.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.mCustomScrollbar.css">
    <?php if ($load_css != '') {
        $this->load->view($load_css);
    }
    ?>
</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>

                        <a>
                            E-Voting NFBS Bogor
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a class="waves-effect waves-light">
                                    <img src="<?php echo base_url() ?>assets/images/logo-kepala.png" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $this->session->userdata('nama_lengkap') . ' (' . $this->session->userdata('pengguna_level') . ')' ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigation-label">NAVIGATION</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php echo $menu == 'menu_dashboard' ? 'active' : '' ?>">
                                    <a href="<?php echo base_url('dashboard') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php echo $menu == 'menu_update_password' ? 'active' : '' ?>">
                                    <a href="<?php echo base_url('update_password') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-settings"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Change Password</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('login/logout') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-share-alt"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Logout</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <?php if ($this->session->userdata('pengguna_level') == 'Administrator') { ?>
                                <div class="pcoded-navigation-label">MASTER</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="<?php echo $menu == 'menu_pengguna' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url('pengguna') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                                            <span class="pcoded-mtext">Users</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>

                                    <li class="<?php echo $menu == 'menu_kandidat' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url('kandidat') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-id-badge"></i><b>D</b></span>
                                            <span class="pcoded-mtext">Candidat</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo $menu == 'menu_dpt' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url('dpt') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-heart"></i><b>D</b></span>
                                            <span class="pcoded-mtext">Permanent Voter Data</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo $menu == 'menu_dpt_belum_memilih' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url('dpt/belum_memilih') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-ticket"></i><b>D</b></span>
                                            <span class="pcoded-mtext">Not Yet Vote Data</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo $menu == 'menu_dpt_sudah_memilih' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url('dpt/sudah_memilih') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layers-alt"></i><b>D</b></span>
                                            <span class="pcoded-mtext">Already Vote Data</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            <?php  } ?>

                            <div class="pcoded-navigation-label">E-VOTING</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php echo $menu == 'menu_voting' ? 'active' : '' ?>">
                                    <a href="<?php echo base_url('voting') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-check-box"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Vote</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php if ($this->session->userdata('pengguna_level') == 'Administrator') { ?>
                                    <li class="<?php echo $menu == 'menu_hitung_cepat' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url('hitung_cepat') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-dashboard"></i><b>D</b></span>
                                            <span class="pcoded-mtext">Quick Count</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li class="<?php echo $menu == 'menu_data_masuk' ? 'active' : '' ?>">
                                    <a href="<?php echo base_url('hitung_cepat/data_masuk') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-import"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Data Entry</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <?php if ($this->session->userdata('password_update') == 'N') { ?>
                            <div class="row">
                                <div class="col-12 bg-c-red">
                                    <marquee behavior="" scrollamount="15" direction="left">
                                        <h3 style="color: #fff;"><i class="fas fa-fighter-jet"></i> Please update your password for your safe in using this application <i class="fas fa-rocket"></i></h3>
                                    </marquee>
                                </div>
                            </div>
                        <?php } ?>
                        <?php echo $contents ?>
                    </div>
                    <div id="styleSelector"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="<?php echo base_url() ?>assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="<?php echo base_url() ?>assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="<?php echo base_url() ?>assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="<?php echo base_url() ?>assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="<?php echo base_url() ?>assets/images/browser/ie.png" alt="">
                            <div>IE (9 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="<?php echo base_url() ?>assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pcoded.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vertical/vertical-layout.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
    <?php if ($load_js != '') {
        $this->load->view($load_js);
    }
    ?>
    <?php
    if ($this->session->userdata('nama_lengkap') == '') { ?>
        <script>            
            $(document).ready(function() {
                window.location.replace('http://localhost/pemira/login/logout');
            });
        </script>
    <?php } ?>
</body>

</html>
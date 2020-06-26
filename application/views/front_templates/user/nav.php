<!-- header-start -->
<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="<?= base_url('vendor/travelo/'); ?>img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="<?= base_url() ?>">Home</a></li>
                                            <li><a href="<?= base_url('home/about') ?>">About</a></li>
                                            <li><a href="<?= base_url('home/info') ?>">Wisata</a></l/li>
                                                <li><a href="#">pages</i></a>
                                                    <ul class="submenu">
                                                        <li><a href="destination_details.html">Destinations details</a></li>
                                                        <li><a href="elements.html">elements</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">blog</i></a>
                                                    <ul class="submenu">
                                                        <li><a href="blog.html">blog</a></li>
                                                        <li><a href="single-blog.html">single-blog</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="<?= base_url('home/contact') ?>">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                        <?php
                                            if($this->session->userdata('email')) :
                                        ?>
                                    <div class="number">
                                    <a href="<?= base_url('pemesanan/data_transaksi') ?>" class="genric-btn info circle arrow">Transaksi<span class="lnr lnr-arrow-right"></span></a>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
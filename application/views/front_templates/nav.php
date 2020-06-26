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
                                            <li><a href="<?= base_url('home/blog') ?>">Informasi</a></li>
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
                                    <div class="social_links d-none d-xl-block">
                                        <?php
                                            if($this->session->userdata('email')) :
                                        ?>
                                        <ul>
                                        <a href="<?= base_url('auth/logout') ?>" class="genric-btn danger circle arrow">logout<span class="lnr lnr-arrow-right"></span></a>
                                        </ul>
                                        <?php endif;?>
                                        <?php
                                            if(!$this->session->userdata('email')) :
                                        ?>
                                        <ul>
                                        <a href="<?= base_url('auth') ?>" class="genric-btn danger circle arrow">Login<span class="lnr lnr-arrow-right"></span></a>
                                        </ul>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
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
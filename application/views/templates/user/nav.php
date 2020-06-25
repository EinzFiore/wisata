<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('home') ?>">
                    <span class="daftar">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('home/info') ?>">
                    <span class="daftar">Daftar Wisata</span>
                </a>
            </li>
            <?php if($this->session->userdata('email')) : ?>
            <li class="nav-item mr-5">
                <a class="nav-link" href="<?= site_url('pemesanan/data_transaksi') ?>">
                    <span class="daftar">Transaksi</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(!$this->session->userdata('email')) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('auth/daftar') ?>">
                    <span class="daftar">Daftar</span>
                </a>
            </li>
            <li class="nav-item  mr-5">
                <a class="nav-link" href="<?= site_url('auth') ?>">
                    <span class="daftar">Login</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('email')) : ?>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="<?= base_url('assets/upload/') . $member['image']; ?>" alt="Profil"
                            class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="<?= base_url('assets/upload/') . $member['image']; ?>"
                                        alt="Foto profil" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4><?= $member['nama']; ?></h4>
                                    <p class="text-muted"><?= $member['email']; ?></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= site_url('home/profile'); ?>">Profil Saya</a>
                            <a class="dropdown-item" href="<?= site_url('home/edit_profil'); ?>">Ubah Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= site_url('Member/ubah_password'); ?>">Pengaturan Akun</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>">Keluar</a>
                        </li>
                    </div>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
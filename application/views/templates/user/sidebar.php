<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="<?= site_url('peserta'); ?>">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-bars text-info"></i>
                        <p>Pendaftaran</p>
                    </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2) == "profil") { echo "active"; } ?>">
                    <a href="<?= site_url('peserta/profil') ?>">
                        <i class="fas fa-user-circle text-primary"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2) == "ubahpassword") { echo "active"; } ?>">
                    <a href="<?= site_url('peserta/ubahpassword') ?>">
                        <i class="fas fa-cogs text-success"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('auth/logout') ?>">
                        <i class="fas fa-power-off text-danger"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
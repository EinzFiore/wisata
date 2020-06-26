<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url('assets/upload/' . $admin['image']); ?>" alt="Profil" class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= ucwords($admin['nama']) ?>
                            <span class="user-level"><?= $admin['telepon']; ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="<?= site_url('admin/profil'); ?>">
                                    <span class="link-collapse">Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/edit_profil'); ?>">
                                    <span class="link-collapse">Ubah Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/ubahpassword'); ?>">
                                    <span class="link-collapse">Pengaturan</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/logout'); ?>">
                                    <span class="link-collapse text-danger">Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?php if ($this->uri->segment(1) == "dashboard") {
                                        echo "active";
                                    } ?>">
                    <a href="<?= site_url('dashboard'); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(1) == "wisata" || $this->uri->segment(2) == "laporan_wisata") {
                                        echo "active";
                                    } ?>">
                    <a data-toggle="collapse" href="#wisata">
                        <i class="fas fa-layer-group"></i>
                        <p>Wisata</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="wisata">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?= site_url('wisata') ?>">
                                    <span class="sub-item">Data Wisata</span>
                                </a>
                                <a href="<?= site_url('admin/laporan_wisata'); ?>">
                                    <span class="sub-item">Laporan Data Wisata</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(2) == "informasi") {
                                        echo "active";
                                    } ?>">
                    <a href="<?= site_url('admin/informasi'); ?>">
                        <i class="fas fa-table"></i>
                        <p>Post Informasi</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(2) == "member") {
                                        echo "active";
                                    } ?>">
                    <a href="<?= site_url('admin/member'); ?>">
                        <i class="fas fa-users"></i>
                        <p>Data Member</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(1) == "pemesanan" xor $this->uri->segment(2) == "detail_pemesanan") {
                                        echo "active";
                                    } ?>">
                    <a href="<?= site_url('pemesanan'); ?>">
                        <i class="fas fa-table"></i>
                        <p>Data Pemesanan</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(2) == "detail_pemesanan") {
                                        echo "active";
                                    } ?>">
                    <a href="<?= site_url('pemesanan/detail_pemesanan'); ?>">
                        <i class="fas fa-table"></i>
                        <p>Detail Pemesanan</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(2) == "review") {
                                        echo "active";
                                    } ?>">
                    <a href="<?= site_url('admin/komplain'); ?>">
                        <i class="fas fa-table"></i>
                        <p>Data Review</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('admin/logout') ?>" id="btn-logout">
                        <i class="fas fa-power-off text-danger"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
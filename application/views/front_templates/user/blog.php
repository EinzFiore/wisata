    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Informasi</h3>
                        <p>Jelajahi Destinasi Wisata Purwakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    <?php foreach($post as $p) : ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?= base_url('assets/upload/blog/cover/') . $p['cover'] ?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3><?= date($p['tanggal_post']) ?></h3>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= site_url('home/detailBlog/' . $p['id_info']); ?>">
                                    <h2><?= $p['judul'] ?></h2>
                                </a>
                                <p><?= substr($p['post'], 0 , 300) ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> <?= $p['nama'] ?></a></li>
                                </ul>
                            </div>
                        </article>
                    <?php  endforeach; ?>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

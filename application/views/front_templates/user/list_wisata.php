<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Destinations</h3>
                        <p>Jelajahi Destinasi Wisata Purwakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->


    <div class="popular_places_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                    <?php foreach($wisata as $w) : ?>
                        <div class="col-lg-4 col-md-4 col-md-4">
                            <div class="single_place">
                                <div class="thumb">
                                    <img src="<?= base_url('assets/upload/wisata/') . $w['gambar']; ?>" alt="">
                                    <a href="#" class="prise">Rp. <?= number_format($w['harga'], 0, ',', '.'); ?></a>
                                    <span class="badge badge-primary"><?= $w['jenis_wisata']; ?></span>
                                </div>
                                <div class="place_info">
                                    <a href="<?= site_url('home/detail/' . $w['id']); ?>"><h3><?= $w['nama'] ?></h3></a>
                                    <p><?= $w['lokasi'] ?></p>
                                    <div class="rating_days d-flex justify-content-between">
                                        <span class="d-flex justify-content-center align-items-center">
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i>
                                             <a href="#">(20 Review)</a>
                                        </span>
                                        <div class="days">
                                            <i class="fa fa-clock-o"></i>
                                            <a href="#">5 Days</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="more_place_btn text-center">
                                <a class="boxed-btn4" href="#">More Places</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3><?= $wisata['nama'] ?></h3>
                        <p>Destinasi Wisata Purwakarta </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
        <?php
        if($userPesan == !null)
        if($userPesan['status_pembayaran'] == 1 AND $userPesan['id_wisata'] == $wisata['id']) : ?>
            <div class="alert alert-success mt-3" role="alert">
             Terimakasih karena telah memesan tiket di <strong>SIPARWA</strong>, kami harap anda dapat meluangkan waktu sebentar untuk memberi ulasan
             tentang Sistem Web kami <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Beri Ulasan</button>
            </div>
        <?php endif; ?>
			<div class="section-top-border">
				<h3 class="mb-30">Detail Wisata</h3>
				<div class="row">
					<div class="col-md-3">
						<img src="<?= base_url('assets/upload/wisata/') . $wisata['gambar']; ?>" alt="" class="img-fluid">
					</div>
					<div class="col-md-9 mt-sm-20">
                    <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $time = date("G:i:s");
                        if($wisata['jam_tutup'] > $time):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Mohon maaf, Wisata ini sedang <strong>Tutup</strong>
                    </div>
                        <?php endif; ?>
                    

                        <p><strong>Deskripsi : </strong></p>
                        <p><?= $wisata['deskripsi'] ?></p>
                        <?php 
                            if($wisata['status'] == "Tutup") :
                                ?>
                            <button type="button" class="btn btn-primary mt-4" disabled>Pesan Tiket</button>
                            <?php endif; ?>
                            <?php 
                            if($wisata['status'] == "Buka") :
                                ?>
                            <a href="<?= site_url('pemesanan/tambah/' . $wisata['id']); ?>" class="btn btn-primary mt-4">Pesan Tiket</a>
                            <?php endif; ?>
                            <a href="<?= base_url('home/info') ?>"  class="btn btn-success mt-4">Kembali</a>
                        <hr>
                        <p><strong>Nama Wisata </strong> : <?= $wisata['nama']; ?></p>
                        <p><strong>Jam Buka </strong> : <?= $wisata['jam_buka']; ?></p>
                        <p><strong>Jam Tutup </strong> : <?= $wisata['jam_tutup']; ?></p>
                        <p><strong>Jenis Wisata </strong> : <span class="badge badge-primary"><?= $wisata['jenis_wisata']; ?></span></p>
                        <p><strong>Harga </strong> : Rp. <?= number_format($wisata['harga'], 0, ',', '.'); ?></p>
                        <p><strong>Lokasi Wisata </strong> : <?= $wisata['lokasi']; ?></p>
                        <p><strong>Status </strong> :
                        <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $time = date("G:i:s");
                            if($wisata['jam_tutup'] < $time):
                        ?>
                        <span class="badge badge-danger">Tutup</span></p>
                        <?php endif; ?>
                        <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $time = date("G:i:s");
                            if($wisata['jam_tutup'] > $time):
                        ?>
                         <span class="badge badge-primary"><?= $wisata['status']; ?></span></p>
                        <?php endif; ?>
                        <!-- Link Map -->
                        <iframe src="<?= $wisata['link_map']; ?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Align Area -->
    
    <!-- fix Ulasan -->
            <div class="container">
                <div class="comments-area">
                  <h4> Ulasan</h4>
                  <div class="comment-list">
                  <?php if($ulas['id_wisata'] == null) : ?>
                  <p>Belum ada ulasan untuk wisata ini</p>
                  <?php endif; ?>
                      <?php foreach($review as $r) :  ?>
                     <div class="single-comment justify-content-between d-flex mb-5">
                        <div class="user justify-content-between d-flex">
                        <?php 
                        if($ulas['id_wisata'] == $wisata['id']) : ?>
                           <div class="thumb">
                              <img src="<?= base_url('assets/upload/') . $r['image'] ?>" >
                           </div>
                           <div class="desc">
                               <div class="d-flex justify-content-between">
                                   <div class="d-flex">
                                       <h5>
                                        <a href="#"><?= $r['nama']; ?></a>
                                         <span class="d-flex align-items-center">
                                             <?php 
                                             $star = $r['star'];
                                             for($i=0; $i<$star; $i++) :
                                             ?>
                                                 <i class="fa fa-star"></i> 
                                             <?php endfor; ?>
                                         </span>
                                     </h5>
                                 </div>
                               </div>
                              <p class="comment">"<?= $r['deskripsi'] ?>"</p>
                              <span class="badge badge-light"><?= $r['tanggal'] ?></span>
                           </div>
                        <?php endif; ?>
                        </div>
                     </div>
                      <?php endforeach; ?>
                  </div>
               </div>
            </div>


<!-- Modal Ulasan -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ulasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="mb-2">Silahkan isi form dibawah untuk melakukan ulasan. </p>
        <form method="post" action="<?= base_url('home/tes') ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Ulasan Wisata</label>
                <textarea class="form-control" name="deskripsi" rows="3"></textarea>
            </div>
            <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Dari angka 1-5, menurut anda bagaimana rating pelayanan atau tempat wisata ini?</small>
                <input type="text" name="star" class="form-control" placeholder="Ex : 3">
                <input type="hidden" name="id_wisata" value="<?= $wisata['id']; ?>" class="form-control">
                <input type="hidden" name="id_member" value="<?= $member['id']; ?>" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit Ulasan</button>
      </div>
    </form>
    </div>
  </div>
</div>

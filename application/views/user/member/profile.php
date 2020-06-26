	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
			<div class="section-top-border">
				<h3 class="mb-30">Profil</h3>
				<div class="row">
					<div class="col-md-3">
						<img src="<?= base_url('assets/upload/') . $member['image']; ?>" alt="" class="img-fluid">
					</div>
				    <div class="col-md-4 mt-sm-20">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?= $member['nama'] ?>" name="nama" id="exampleInputPassword1" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telepon</label>
                            <input type="text" class="form-control" name="telepon" value="<?= $member['telepon'] ?>" id="exampleInputPassword1" disabled>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" id="exampleInputPassword1" disabled><?= $member['alamat'] ?></textarea>
                        </div>
                        <a href="<?= base_url('home/edit_profil') ?>" class="btn btn-primary">Ubah Profile</a>
                    </div>
                    <div class="col-sm-5">
                        <img src="<?= base_url('assets/profile.svg') ?>" width="105%" alt="">
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Align Area -->
  
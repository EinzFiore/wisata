	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
			<div class="section-top-border">
				<h3 class="mb-30">Ubah Profil</h3>
				<div class="row">
					<div class="col-md-3">
						<img src="<?= base_url('assets/upload/') . $member['image']; ?>" alt="" class="img-fluid">
					</div>
					<div class="col-md-4 mt-sm-20">
            <?php if (!empty($this->session->flashdata('success'))) : ?>
                                  <div class="alert alert-success alert-notify">
                                      <i class="fa fa-bell"></i>
                                      <?= $this->session->flashdata('success'); ?>
                                  </div>
                              <?php endif; ?>
            <?= form_open_multipart('home/edit_profil'); ?>
              <div class="form-group">
                <label for="exampleFormControlFile1">Foto Profil</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                <p><small>*format foto .jpg/.png size tidak boleh lebih dari 2MB</small></p>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nama Lengkap</label>
                <input type="text" class="form-control" value="<?= $member['nama'] ?>" name="nama" id="exampleInputPassword1">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Telepon</label>
                <input type="text" class="form-control" name="telepon" value="<?= $member['telepon'] ?>" id="exampleInputPassword1">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea type="text" class="form-control" name="alamat" id="exampleInputPassword1"><?= $member['alamat'] ?></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Ubah</button>
              <?= form_close(); ?>
          </div>
                    <div class="col-sm-5">
                        <img src="<?= base_url('assets/edit.svg') ?>" width="105%" alt="">
                    </div>
          </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Align Area -->
  
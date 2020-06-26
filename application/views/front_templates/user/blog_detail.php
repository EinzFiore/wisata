 <!-- bradcam_area  -->
 <div class="bradcam_area bradcam_bg_4">
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
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-11 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" width="90%" src="<?= base_url('assets/upload/blog/cover/') . $post['cover'] ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h1><?= $post['judul'] ?>
                     </h1>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> <?= $post['nama'] ?></a></li>
                     </ul>
                     <p class="excert">
                        <?= $post['post'] ?>
                     </p>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="<?= base_url('assets/img/default.png') ?>" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4><?= $post['nama'] ?></h4>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, labore. Molestiae animi nulla dolorum obcaecati voluptas illum officia tenetur minima rerum, deleniti facilis fugiat rem possimus delectus tempore voluptatem fuga?</p>
                     </div>
                  </div>
               </div>
               <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" action="#" id="commentForm">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
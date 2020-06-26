<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/user/header.php'); ?>
    <style>
        #carouselId img {
            height: 600px;
            width: 100%;
        }

        .nav-item span.daftar {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="wrapper overlay-sidebar">
        <div class="main-header">
            <?php $this->load->view('templates/user/logo-header.php'); ?>
            <?php $this->load->view('templates/user/nav.php'); ?>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
                    <?php if ($this->session->flashdata('flash-error')) : ?>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="<?= base_url('assets/img/bg-header.jpeg'); ?>" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h1 class="display-4 text-primary">Pariwisata </h1>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= base_url('assets/img/bg-header.jpeg'); ?>" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= base_url('assets/img/bg-header.jpeg'); ?>" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('templates/user/footer.php'); ?> ?>
        </div>
    </div>
    <?php $this->load->view('templates/user/js.php'); ?>
    <script>
        const flashError = $('.flash-data').data('flashdata');
        if (flashError) {
            swal({
                title: 'Oops..',
                text: flashError,
                icon: 'error',
            });
        }
    </script>
</body>

</html>
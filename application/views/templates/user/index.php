<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/user/header.php'); ?>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <?php  $this->load->view('templates/user/logo-header.php');?>
            <!-- Navbar Header -->
            <?php $this->load->view('templates/user/nav.php'); ?>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <?php $this->load->view('templates/user/sidebar.php'); ?>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <!-- content -->
                </div>
            </div>
            <?php $this->load->view('templates/user/footer.php'); ?>
        </div>
        <!-- Custom template | don't include it in your project! -->
        <?php $this->load->view('templates/user/custom.php'); ?>
        <!-- End Custom template -->
    </div>
    <?php $this->load->view('templates/user/js.php'); ?>
</body>

</html>
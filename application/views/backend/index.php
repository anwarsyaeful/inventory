<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>toggle/bootstrap4-toggle.min.css" rel="stylesheet">

  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

  <link rel="stylesheet" href="<?= base_url('assets/datatable/dataTables.bootstrap4.min.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/datatable/buttons.bootstrap4.min.css') ?>" type="text/css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BAROKAH TANI</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item" id="dashboard">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <?php if ($this->admin->role == 1) : ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>LIst Akun</span>
          </a>
          <div id="admin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" id="l-admin" href="<?= base_url('admin/list_admin'); ?>">Admin</a>
            </div>
          </div>
        </li>

        <hr class=" sidebar-divider d-none d-md-block">

      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#barang" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-box"></i>
          <span>Data Barang</span>
        </a>
        <div id="barang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" id="k-barang" href="<?= base_url('admin/kategori'); ?>">Kategori Barang</a>
            <a class="collapse-item" id="m-barang" href="<?= base_url('admin/barang'); ?>">Master Barang</a>
            <a class="collapse-item" id="s-barang" href="<?= base_url('admin/stok_barang'); ?>">Stok Barang</a>
            <a class="collapse-item" id="barang-m" href="<?= base_url('admin/barang_masuk'); ?>">Barang Masuk</a>
            <a class="collapse-item" id="barang-k" href="<?= base_url('admin/barang_keluar'); ?>">Barang Keluar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item mb-3">
        <a class="nav-link" href="<?= base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->admin->nama; ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('upload/profile/' . $this->admin->foto); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('admin/profile'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Content -->
        <div class="flash-sukses" data-flashdata="<?= $this->session->flashdata('flash-sukses'); ?>"></div>
        <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>

        <?php $this->load->view($page); ?>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Barokah Tani 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" untuk keluar dari halaman</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

<!-- Include js -->

<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert2.all.js'); ?> "></script>

<script src="<?= base_url('assets/js/new_script.js'); ?> "></script>

<script src="<?= base_url('assets/'); ?>toggle/bootstrap4-toggle.min.js"></script>

<script src="<?php echo base_url(); ?>assets/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/datatable/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/buttons.colVis.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();

    var table = $('#examples').DataTable({
      lengthChange: false,
      buttons: [{
          extend: 'print',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excel',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: ':visible'
          }
        },
        'colvis'
      ],
      columnDefs: [{
        visible: false
      }]
    });

    table.buttons().container()
      .appendTo('#examples_wrapper .col-md-6:eq(0)');

    function bacaGambar(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#gambar_nodin').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#image").change(function() {
      bacaGambar(this);
    });
  });
</script>
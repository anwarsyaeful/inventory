<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Total Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $admin; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Total Barang</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-boxes fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
    $('#dashboard').addClass('active');
  });
</script>
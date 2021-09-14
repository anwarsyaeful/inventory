  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                  </div>

                  <div class="flash-sukses" data-flashdata="<?= $this->session->flashdata('flash-sukses'); ?>"></div>
                  <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>

                  <form class="user" action="<?= base_url('login/login_proses'); ?>" method="POSt">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Type your username..." required autocomplete="off">
                      <small class="text-danger pl-2 txt-email"></small>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required autocomplete="off">
                      <small class="text-danger pl-2 txt-password"></small>
                    </div>
                    <button type="submit" name="btnlogin" id="btnlogin" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
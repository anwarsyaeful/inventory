<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('upload/profile/' . $this->admin->foto); ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $this->admin->nama; ?></h5>
                    <p class="card-text"><?= $this->admin->email; ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', strtotime($this->admin->created_at)); ?></small></p>
                    <button type="button" class="btn btn-sm btn-warning float-right mb-2" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-edit"></i> Edit Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('admin/update'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="id" hidden value="<?= $this->admin->id; ?>">
                        <input type="text" class="form-control" name="nama" required autocomplete="off" value="<?= $this->admin->nama; ?>">
                    </div>
                    <div class="form-group">
                        <label for="grup">Username</label>
                        <input type="email" class="form-control" name="username" required autocomplete="off" value="<?= $this->admin->username; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="grup">Email</label>
                        <input type="email" class="form-control" name="email" required autocomplete="off" value="<?= $this->admin->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="grup">Password</label>
                        <input type="text" class="form-control" name="password" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="add" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
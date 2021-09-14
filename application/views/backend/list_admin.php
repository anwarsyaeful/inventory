<section class="container-fluid">

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 col-12 text-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Admin</button>
                    </div>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($admin as $hasil) : ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <td><?= $hasil->nama; ?></td>
                                        <td><?= $hasil->username; ?></td>
                                        <td><?= $hasil->email; ?></td>
                                        <td>
                                            <span class="badge <?= ($hasil->role == 1) ? 'badge-danger' : 'badge-primary'; ?>"><?= ($hasil->role == 1) ? 'Admin' : 'Karyawan'; ?></span>
                                        </td>
                                        <td><a href="<?= base_url() ?>admin/list_admin/resetPassword/<?= $hasil->id; ?>" class="badge badge-success delete-people"><i class="fa fa-edit"></i>
                                                Reset</a>
                                        </td>
                                        <td>
                                            <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modalEdit<?= $hasil->id; ?>"><i class="fa fa-edit"></i>
                                                Edit</a>
                                            <?php if ($hasil->role != 1) : ?>
                                                <a href="<?= base_url('admin/list_admin/delete/') . $hasil->id; ?>" class="badge badge-danger tombol-hapus"><i class="fa fa-trash"></i>
                                                    Hapus</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Modal Add-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('admin/list_admin/tambah'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control">
                            <option value="">-- Pilih Level --</option>
                            <option value="1">Admin</option>
                            <option value="2">Karyawan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="add" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach ($admin as $dt) : ?>
    <div class="modal fade" id="modalEdit<?= $dt->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('admin/list_admin/edit'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $dt->id; ?>" name="id">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $dt->nama; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required autocomplete="off" value="<?= $dt->username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required autocomplete="off" value="<?= $dt->email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" class="form-control">
                                <option value="">-- Pilih Level --</option>
                                <option value="1" <?= ($dt->role == 1) ? 'selected' : ''; ?>>Admin</option>
                                <option value="2" <?= ($dt->role == 2) ? 'selected' : ''; ?>>Karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>

<script>
    $(document).ready(function() {
        $('#admin').addClass('show');
        $('#l-admin').addClass('active');
    });
</script>
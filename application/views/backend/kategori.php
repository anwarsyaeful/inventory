<section class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 col-12 text-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Kategori</button>
                    </div>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($kategori as $hasil) : ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <td><?= $hasil->kategori; ?></td>
                                        <td><?= $hasil->created_at; ?></td>
                                        <td>
                                            <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modalEdit<?= $hasil->id; ?>"><i class="fa fa-edit"></i>
                                                Edit</a>
                                            <a href="<?= base_url('admin/kategori/delete/') . $hasil->id; ?>" class="badge badge-danger tombol-hapus"><i class="fa fa-trash"></i>
                                                Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </tfoot>
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
        <form action="<?= base_url('admin/kategori/tambah'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah kategori Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" required autocomplete="off">
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
<?php foreach ($kategori as $dt) : ?>
    <div class="modal fade" id="modalEdit<?= $dt->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('admin/kategori/edit'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Jenis Ujian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $dt->id; ?>" name="id">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $dt->kategori; ?>">
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
        $('#barang').addClass('show');
        $('#k-barang').addClass('active');
    });
</script>
<section class="container-fluid">

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 col-12 text-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Stok Barang</button>
                    </div>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="<?= ($this->admin->role == 1) ? 'examples' : 'example'; ?>" class="table table-bordered table-hover">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Total Masuk</th>
                                    <th>Total Keluar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($stok as $hasil) : ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <td><?= $hasil->kategori; ?></td>
                                        <td><?= $hasil->nama; ?></td>
                                        <td><?= $hasil->stok; ?></td>
                                        <td><?= $hasil->masuk; ?></td>
                                        <td><?= $hasil->keluar; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/stok_barang/delete/') . $hasil->id; ?>" class="badge badge-danger tombol-hapus"><i class="fa fa-trash"></i>
                                                Hapus</a>
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
        <form action="<?= base_url('admin/stok_barang/tambah'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <label for="barang">Nama Barang</label>
                        <select class="form-control" name="barang">
                            <option value="">Pilih Barang</option>
                            <?php foreach ($barang as $kat) : ?>
                                <option value="<?= $kat->id; ?>"><?= $kat->nama; ?></option>
                            <?php endforeach; ?>
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

<script>
    $(document).ready(function() {
        $('#barang').addClass('show');
        $('#s-barang').addClass('active');
    });
</script>
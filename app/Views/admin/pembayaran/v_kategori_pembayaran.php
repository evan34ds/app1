<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.ISI DAN TABEL -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus"> Add</i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Pesan berhasil -->
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="card card-success" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <?php
                if (session()->getFlashdata('gagal')) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon fas fa-ban"></i>';
                    echo session()->getFlashdata('gagal');
                    echo '</div>';
                }
                ?>

                <?php
                $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                foreach ($kategori_pembayaran as $key => $value) {

                    ?>

                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">Kode Kategori Pembayaran</th>
                            <th class="text-center">Nama Kategori Pembayaran</th>
                            <th class="text-center">Singkatan</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                        $no = 1;
                        foreach ($kategori_pembayaran as $key => $value) {
                       
                       ?>


                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="text-center"><?= $value['kode_kategori_pembayaran'] ?></td>
                                <td class="text-center"><?= $value['nama_kategori_pembayaran'] ?></td>
                                <td class="text-center"><?= $value['singkatan_kategori_pembayaran'] ?></td>
                                <td class="text-center">
                                    <button class="fas fa-edit btn-sm btn-danger" data-toggle="modal" data-target="#edit<?= $value['id_kategori_pembayaran'] ?>"></button>
                                    <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kategori_pembayaran'] ?>"><i class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="center">Kode Kategori Pembayaran</th>
                            <th class="center">Nama Kategori Pembayaran</th>
                            <th class="center">Singkatan</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    <!-- form inputnya -->
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Kategori Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open('Pembayaran/add_kategori_pembayaran');
                        ?>

                    <div class="form-grup">
                        <label>Kode Pembayaran</label>
                        <input name="kode_kategori_pembayaran" class="form-control" placeholder="Kode Kategori Pembayaran" maxlength="6">
                    </div>
                    <div class="form-grup">
                        <label>Nama Kelas Pembayaran</label>
                        <input name="nama_kategori_pembayaran" class="form-control" placeholder="Nama Kategori Pembayaran">
                    </div>
                    <div class="form-grup">
                        <label>Singkatan</label>
                        <input name="singkatan_kategori_pembayaran" class="form-control" placeholder="Nama Kategori Pembayaran">
                    </div>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="fas fa-edit btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    

    <!-- form delete -->
    <?php foreach ($kategori_pembayaran as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_kategori_pembayaran'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kategori Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Kelas <b><?= $value['nama_kategori_pembayaran'] ?></b>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('/Pembayaran/delete_kategori_pembayaran/' . $value['id_kategori_pembayaran']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

     <!-- form edit -->
     <?php foreach ($kategori_pembayaran as $key => $edit) { ?>
        <div class="modal fade" id="edit<?= $edit['id_kategori_pembayaran'] ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php
                            echo form_open('pembayaran/edit_kategori/' . $edit['id_kategori_pembayaran']); ?>
                        <div class="form-grup">
                            <label>Nama Pembayaran</label>
                            <input name="kode_kategori_pembayaran" value="<?= $edit['kode_kategori_pembayaran'] ?>" class="form-control" placeholder="kode kategori pembayaran" required>
                        </div>

                        <div class="form-grup">
                            <label>Nama Kategori Pembayaran</label>
                            <input  name="nama_kategori_pembayaran" value="<?= $edit['nama_kategori_pembayaran'] ?>" class="form-control" placeholder="nama kategori pembayaran" required>
                        </div>
                        <div class="form-grup">
                        <label>Singkatan</label>
                        <input name="singkatan_kategori_pembayaran" class="form-control" placeholder="Singkatan Kategori Pembayaran">
                    </div>
                        </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="fas fa-edit btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

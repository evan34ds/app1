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

                <?php foreach ($slider as $key => $value) { ?>

                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th class="text-center">Gambar</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($slider as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['judul'] ?></td>
                                <td><?= $value['isi'] ?></td>
                                <td class=" text-center"><img src="<?= base_url('corousel/' . $value['foto']) ?>" class="attachment-img" width="90px" height="90px"></td>
                                <td class=" text-center">
                                    <button class="fas fa-edit btn-sm btn-danger" data-toggle="modal" data-target="#edit<?= $value['id'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id'] ?>"><i class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th class="text-center">Foto</th>
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
                    <h4 class="modal-title">Add <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open_multipart('slider/add/');
                        ?>
                        <div class="form-grup">
                            <label>Judul</label>
                            <input name="judul" class="form-control" placeholder="judul">
                        </div>
                        <div class="form-grup">
                            <label>Keterangan</label>
                            <input name="isi" class="form-control" placeholder="isi">
                        </div>
                        <div class="form-grup">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" placeholder="Foto">
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


    <!-- form edit -->
    <?php foreach ($slider as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id'] ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit <?= $title ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php
                            echo form_open_multipart('slider/edit/' . $value['id']) ?>
                            <div class="form-grup">
                                <label>Judul</label>
                                <input name="judul" value="<?= $value['judul'] ?>" class="form-control" placeholder="judul">
                            </div>
                            <div class="form-grup">
                                <label>isi</label>
                                <input name="isi" value="<?= $value['isi'] ?>" class="form-control" placeholder="isi">
                            </div>
                            <div class="form-grup">
                                <label>Ganti Foto</label>
                                <input type="file" value="<?= $value['foto'] ?>" name="foto" class="form-control" placeholder="foto">
                            </div>
                            <div class="form-grup">
                                
                                <br><img src="<?= base_url('corousel/' . $value['foto']) ?>" class="attachment-img" width="80px" height="80px"></br>
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

    <!-- form delete -->
    <?php foreach ($slider as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete <?= '$title ' ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['judul'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('slider/delete/' . $value['id']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
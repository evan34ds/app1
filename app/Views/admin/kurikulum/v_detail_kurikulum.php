<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?>
                        <small><?= $prodi['prodi'] ?> </small>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <!-- /.ISI DAN TABEL -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="">


                <div class="box box-solid">
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="150px">Program Studi</th>
                        <td width="30px">:</td>
                        <td><?= $prodi['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang'] ?></td>
                    </tr>
                    <tr>
                        <th>Kode Program Studi</th>
                        <td>:</td>
                        <td><?= $prodi['kode_prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Ketua Program Stdi</th>
                        <td>:</td>
                        <td> <?= $prodi['ka_prodi'] ?></td>
                    </tr>
                </table>

            </div>

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><?= $title ?></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus"> Add</i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>

                        <div class="btn-sm btn-danger" role="alert">
                            <ul>
                                <?php foreach ($errors as $key => $value) { ?>
                                    <li><?= esc($value) ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php //pesan berhasil di hapus
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

<?php //pesan berhasil di hapus
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                    }
                    ?>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Nama Kurikulum</th>
                                <th class="text-center">Mulai Berlaku</th>
                                <th class="text-center">Jumlah Mata Kuliah</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $db      = \Config\Database::connect();
                            foreach ($kurikulum as $key => $value) {
                                $jumlah = $db->table('tbl_kurikulum') // Membuat Jumlah Mata Kuliah
                                    ->selectCount('id_matkul')
                                    ->where('nama_kurikulum', $value['nama_kurikulum'])
                                    ->countAllResults();
                                $jml = $jumlah - 1;
                                $tidakadadata = 0;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['nama_kurikulum'] ?></td>
                                    <td class="text-center"><?= $value['ta'] ?> | <?= $value['semester'] ?> </td>
                                    <td class="text-center"><?= $jml ?></td>
                                    <td width="50px" class="text-center">
                                        <?php if ($jml > 0) { ?>
                                            <a href="<?= base_url('kurikulum/detail_kurikulum_matakuliah/' . $value['id_prodi'] . '/' . $value['nama_kurikulum']) ?>" class="btn-flat bg-primary color-palette">
                                                <i class="fas fa-eye"> </i></a>
                                            <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#gagal<?= $value['id_kurikulum'] ?>"><i class="fa fa-pencil"></i></button>
                                        <?php } else { ?>
                                            <a href="<?= base_url('kurikulum/detail_kurikulum_matakuliah/' . $value['id_prodi'] . '/' . $value['nama_kurikulum']) ?>" class="btn-flat bg-primary color-palette">
                                                <i class="fas fa-eye"> </i></a>
                                            <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kurikulum'] ?>"><i class="fa fa-pencil"></i></button>
                                        <?php  }  ?>
                                    </td>
                                </tr>
                            <?php } ?>

                        <tfoot>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Nama_kurikulum</th>
                                <th class="text-center">Mulai Berlaku</th>
                                <th class="text-center">Jumlah Mata Kuliah</th>
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

    </div>
    <!-- /.col -->

    <!-- form inputnya -->
    <div class="modal fade" id="add">
        <div class="modal-dialog">
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
                        echo form_open('kurikulum/add_kurikulum/' . $prodi['id_prodi']);
                        ?>
                    <div class="form-grup">
                        <label>Nama Kurikulum</label>
                        <input name="nama_kurikulum" class="form-control">
                    </div>

                    <div class="form-grup">
                        <label>Tahun Akademik Mulai Berlaku</label>
                        <select name="id_ta" class="form-control">
                            <option value="">Tahun Akademik</option>
                            <?php foreach ($ta as $key => $value) { ?>
                                <option value="<?= $value['id_ta'] ?>"><?= $value['ta'] ?> <?= $value['semester'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php foreach ($kurikulum as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_kurikulum'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete <?= $title ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['nama_kurikulum'] ?> | <?= $value['ta'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn-sm btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('kurikulum/delete/' . $value['id_kurikulum'] . '/' . $prodi['id_prodi']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

    <!-- Gagal Hapus-->
    <?php foreach ($kurikulum as $key => $value) {
    ?>
        <div class="modal fade" id="gagal<?= $value['id_kurikulum'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['nama_kurikulum'] ?> | <?= $value['ta'] ?>.?</b>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('kurikulum/gagal_hapus_kurikulum/' . $value['id_kurikulum'] . '/' . $prodi['id_prodi']) ?>" class="btn btn-info">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
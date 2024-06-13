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
                        <th>Fakultas</th>
                        <td>:</td>
                        <td><?= $prodi['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>:</td>
                        <td> <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></td>
                    </tr>
                    <tr>
                        <th>Kode Bobot Nilai</th>
                        <td>:</td>
                        <td><?= $kode_bobot_nilai ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td>:</td>
                        <td><?= $tanggal_mulai ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Akhir</th>
                        <td>:</td>
                        <td><?= $tanggal_akhir ?></td>
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

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Nilai Huruf</th>
                                <th class="text-center">Nilai Index</th>
                                <th class="text-center">Nilai Minimum</th>
                                <th class="text-center">Nilai Maksimum</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($detail_bobot as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                                    <td class="text-center"><?= $value['nilai_index'] ?></td>
                                    <td class="text-center"><?= $value['bobot_minimum'] ?></td>
                                    <td class="text-center"><?= $value['bobot_maksimum'] ?></td>
                                    <td width="50px" class="text-center">
                                        <a href="" class="btn btn-sm fas fa-edit btn-danger" data-toggle="modal" data-target="#edit<?= $value['id_range_nilai'] ?>"></i></a>
                                        <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_range_nilai'] ?>"><i class="fa fa-pencil"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>

                        <tfoot>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Nilai Huruf</th>
                                <th class="text-center">Nilai Index</th>
                                <th class="text-center">Nilai Minimum</th>
                                <th class="text-center">Nilai Maksimum</th>
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Bobot Nilai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open('BobotNilai/add_bobot_nilai/' . $kode_bobot_nilai);
                        ?>
                    <div class="form-grup">
                        <label>Nilai Huruf</label>
                        <input name="nilai_huruf" class="form-control" placeholder="Nilai Huruf">
                    </div>
                    <div class="form-grup">
                        <label>Nilai Index</label>
                        <input name="nilai_index" class="form-control" placeholder="Nilai Index">
                    </div>
                    <div class="form-grup">
                        <label>Nilai Minimum</label>
                        <input name="bobot_minimum" class="form-control" placeholder="Nilai Minimum">
                    </div>
                    <div class="form-grup">
                        <label>Nilai Maksimum</label>
                        <input name="bobot_maksimum" class="form-control" placeholder="Nilai Maksimum">
                    </div>
                    <p>
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
    <?php foreach ($detail_bobot as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_range_nilai'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Bobot Nilai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Bobot Nilai <b><?= $value['kode_range_nilai'] ?> </b>
                        <div> Mulai Tanggal <b> <?= $value['tanggal_mulai'] ?></b> sampai <b><?= $value['tanggal_akhir'] ?></b></div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('/BobotNilai/delete_detail_bobot_nilai/' . $value['id_range_nilai']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>


      <!-- form edit -->
      <?php foreach ($detail_bobot as $key => $value) { ?>
        <div class="modal fade"  id="edit<?= $value['id_range_nilai'] ?>">
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
                            echo form_open('bobotnilai/edit_detail_bobot_nilai/' . $value['id_range_nilai']); ?>
                        <div class="form-grup">
                            <label>Nilai Huruf</label>
                            <input name="nilai_huruf" value="<?= $value['nilai_huruf'] ?>" class="form-control" placeholder="Nilai Huruf" required>
                        </div>

                        <div class="form-grup">
                            <label>Nilai Index</label>
                            <input  name="nilai_index" value="<?= $value['nilai_index'] ?>" class="form-control" placeholder="Nilai Index" required>
                        </div>
                        <div class="form-grup">
                        <label>Bobot Minimum</label>
                        <input name="bobot_minimum" value="<?= $value['bobot_minimum'] ?>" class="form-control" placeholder="Bobot Minimum">
                        </div>
                        <div class="form-grup">
                        <label>Bobot Maksimum</label>
                        <input name="bobot_maksimum" value="<?= $value['bobot_maksimum'] ?>" class="form-control" placeholder="Bobot Maksimum">
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


    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?>
                        <small><?= $prodi['prodi'] ?> </small></h1>
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
                                <th class="text-center">Tanggal Mulai </th>
                                <th class="text-center">Tanggal Akhir</th>
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
                                    <td class="text-center"><?= $value['tanggal_mulai'] ?></td>
                                    <td class="text-center"><?= $value['tanggal_akhir'] ?></td>
                                    <td width="50px" class="text-center">
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
                                <th class="text-center">Tanggal Mulai </th>
                                <th class="text-center">Tanggal Akhir</th>
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
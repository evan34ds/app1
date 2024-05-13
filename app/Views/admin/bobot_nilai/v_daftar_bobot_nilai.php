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

                    <?php //pesan berhasil di hapus
                    if (session()->getFlashdata('gagal')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('gagal');
                        echo '</div>';
                    }
                    ?>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Kode Bobot Nilai</th>
                                <th class="text-center">Tanggal Mulai </th>
                                <th class="text-center">Tanggal Akhir</th>
                                <th class="text-center">Jumlah</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $db      = \Config\Database::connect(); //conect databases
                            foreach ($bobot as $key => $value) {
                                $jml = $db->table('tbl_range_nilai')
                                    ->where('tbl_range_nilai.nilai_huruf IS NOT NULL')
                                    ->where('Kode_range_nilai', $value['kode_range_nilai']) // Membuat Jumlah Mata Kuliah
                                    ->countAllResults();
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['kode_range_nilai'] ?></td>
                                    <td class="text-center"><?= $value['tanggal_mulai'] ?></td>
                                    <td class="text-center"><?= $value['tanggal_akhir'] ?></td>
                                    <td class="text-center"><?= $jml ?></td>
                                    <td width="50px" class="text-center">
                                        <a href="<?= base_url('BobotNilai/detail_bobot_nilai/' . $value['kode_range_nilai']) ?>" class="btn btn-sm fas fa-eye btn-info"></a>
                                        <a href="" class="btn btn-sm fas fa-edit btn-danger"></i></a>
                                        <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_range_nilai'] ?>"><i class="fa fa-pencil"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>

                        <tfoot>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Kode Bobot Nilai</th>
                                <th class="text-center">Tanggal Mulai </th>
                                <th class="text-center">Tanggal Akhir</th>
                                <th class="text-center">Jumlah</th>
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
                        echo form_open('BobotNilai/add_daftar_bobot_nilai/' . $prodi['id_prodi']);
                        ?>
                    <div class="form-grup">
                        <label>Kode Bobot Nilai</label>
                        <input name="kode_range_nilai" class="form-control" placeholder="Kode Bobot Nilai">
                    </div>
                    <div class="form-grup">
                        <label>Tanggal Mulai</label>
                        <input name="tanggal_mulai" id="waktu_pembayaran" class="form-control" type="date" placeholder="Waktu Pembayaran" required>
                    </div>
                    <div class="form-grup">
                        <label>Tanggal Akhir</label>
                        <input name="tanggal_akhir" id="waktu_pembayaran" class="form-control" type="date" placeholder="Waktu Pembayaran" required>
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

    <!-- form delete -->
    <?php foreach ($bobot as $key => $value) { ?>
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
                        <a href="<?= base_url('/BobotNilai/delete_daftar_bobot_nilai/' . $value['id_range_nilai']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
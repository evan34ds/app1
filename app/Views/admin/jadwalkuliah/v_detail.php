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

                    <?php
                    if (session()->getFlashdata('gagal')) {
                        echo '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon fas fa-ban"></i>';
                        echo session()->getFlashdata('gagal');
                        echo '</div>';
                    }
                    ?>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Smt</th>
                                <th class="text-center">Kode Mata Kuliah</th>
                                <th class="text-center">Mata Kuliah</th>
                                <th class="text-center">Kelas Perkuliahan</th>
                                <th class="text-center">Dosen</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Ruangan</th>
                                <th class="text-center">Quota</th>
                                <th class="text-center">Jumlah Mahasiswa</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $db      = \Config\Database::connect();
                            foreach ($jadwal as $key => $value) {
                                $jml = $db->table('tbl_krs')
                                    ->where('id_jadwal', $value['id_jadwal'])
                                    ->countAllResults(); ?>
                                
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['smt'] ?></td>
                                    <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                    <td><?= $value['matkul'] ?></td>
                                    <td class="text-center"><?= $value['nama_kelas_perkuliahan'] ?></td>
                                    <td class="text-center"><?= $value['nama_dosen'] ?></td>
                                    <td class="text-center"><?= $value['hari'] ?></td>
                                    <td class="text-center"><?= $value['waktu'] ?></td>
                                    <td class="text-center"><?= $value['ruangan'] ?></td>
                                    <td class="text-center"><?= $value['quota'] ?></td>
                                    <td class="text-center"><?= $jml ?></td>
                                    <td width="50px" class="text-center">
                                        <?php if ($jml > 0) { ?>
                                            <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#gagal<?= $value['id_jadwal'] ?>"><i class="fa fa-pencil"></i></button>
                                        <?php } else { ?>
                                            <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fa fa-pencil"></i></button>
                                        <?php  }  ?>
                                    </td>
                                </tr>
                            <?php } ?>

                        <tfoot>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Smt</th>
                                <th class="text-center">Kode Mata Kuliah</th>
                                <th class="text-center">Mata Kuliah</th>
                                <th class="text-center">Kelas Perkuliahan</th>
                                <th class="text-center">Dosen</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Ruangan</th>
                                <th class="text-center">Quota</th>
                                <th class="text-center">Jumlah Mahasiswa</th>
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
                        echo form_open('jadwalkuliah/add/' . $prodi['id_prodi']);
                        ?>
                    <div class="form-grup">
                        <label>Kelas Perkuliahan</label>
                        <select name="id_kelas_perkuliahan" class="form-control">
                            <option value="">Kelas Pekuliahan</option>
                            <?php foreach ($kelas_perkuliahan as $key => $value) { ?>
                                <?php if ($value['semester'] == $ta_aktif['semester']) { ?>
                                    <!-- mentukan matakuliah berdasarkan semester aktif -->
                                    <option value="<?= $value['id_kelas_perkuliahan'] ?> <?= $value['sks'] ?>">|<?= $value['smt'] ?> |<?= $value['kode_kelas_perkuliahan'] ?> |<?= $value['matkul'] ?> |<?= $value['sks'] ?> SKS</option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-grup">
                        <label>Dosen</label>
                        <select name="id_dosen" class="form-control">
                            <option value="">--Pilih Dosen--</option>
                            <?php foreach ($dosen as $key => $value) { ?>
                                <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-grup">
                                <label>Hari</label>
                                <select name="hari" class="form-control">
                                    <option value="">--Pilih Hari--</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-grup">
                                <label>Hari</label>
                                <input name="waktu" class="form-control" placeholder="Ex:08.00-10.30">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-grup">
                                <label>Ruangan</label>
                                <select name="id_ruangan" class="form-control">
                                    <option value="">--Pilih Ruangan--</option>
                                    <?php foreach ($ruangan as $key => $value) { ?>
                                        <option value="<?= $value['id_ruangan'] ?>"><?= $value['ruangan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-grup">
                                <label>Quota</label>
                                <input name="quota" class="form-control" placeholder="Quota">
                            </div>
                        </div>
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

    <?php foreach ($jadwal as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete <?= $title ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['kode_matkul'] ?> | <?= $value['nama_dosen'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn-sm btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('jadwalkuliah/delete/' . $value['id_jadwal'] . '/' . $prodi['id_prodi']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

      <!-- Gagal Hapus-->
      <?php foreach ($jadwal as $key => $value) {
        ?>
        <div class="modal fade" id="gagal<?= $value['id_jadwal'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Kelas <b><?= $value['kode_matkul'] ?> | <?= $value['nama_dosen'] ?>.?</b>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('/jadwalkuliah/gagal_hapus_jadwal/' . $value['id_jadwal'] . '/' . $prodi['id_prodi']) ?>" class="btn btn-info">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?>
                        <small> </small>
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
                    <tr>
                        <th>Nama Kurikulum</th>
                        <td>:</td>
                        <td><?= $nama_kurikulum['nama_kurikulum'] ?></td>
                    </tr>
                    <tr>
                        <th>Mulai berlaku</th>
                        <td>:</td>
                        <td><?= $nama_kurikulum['ta'] ?></td>
                    </tr>
                    <tr>
                        <th>Total sks</th>
                        <td>:</td>
                        <td> <?= $totalsks_nama_kurikulum['sks'] ?></td>
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

                    <?php
                    if (session()->getFlashdata('gagal_matkul')) {
                        echo '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon fas fa-ban"></i>';
                        echo 'Mata Kuliah ';
                        echo session()->getFlashdata('gagal_matkul');
                        echo '</div>';
                    }
                    ?>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Mata Kuliah</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">SKS</th>
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
                                    <td class="text-center"><?= $value['matkul'] ?></td>
                                    <td class="text-center"><?= $value['smt'] ?> | <?= $value['smstr'] ?></td>
                                    <td class="text-center"><?= $value['sks'] ?></td>
                                    <td width="50px" class="text-center">
                                        <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kurikulum'] ?>"><i class="fa fa-pencil"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>

                        <tfoot>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">Nama kurikulum</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">Jumlah Mata Kuliah</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

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
                                    echo form_open('kurikulum/add_kurikulum_matakuliah/' . $prodi['id_prodi'] . '/' . $nama_kurikulum['nama_kurikulum']);
                                    ?>
                                <div class="form-grup">
                                    <div class="form-grup">
                                        <label>Tahun Mulai Berlaku</label>
                                        <input value="<?= $nama_kurikulum['ta'] ?>" class="form-control" readonly>
                                        <input type="hidden" name="id_ta" value="<?= $nama_kurikulum['id_ta'] ?>" class="form-control" readonly>
                                    </div>
                                    <label>Mata Kuliah</label>
                                    <select name="id_matkul" class="form-control"  required>
                                        <option value="">Mata Kuliah</option>
                                        <?php foreach ($kurikulum_prodi_matkul as $key => $value) { ?>
                                            <option value="<?= $value['id_matkul'] ?>"><?= $value['matkul'] ?> | <?= $value['smt'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger">Harus diisi</span>
                                    <div class="form-grup">
                                        <label>Semester</label>
                                        <input name="smstr" class="form-control" type="number" maxlength="2" required="harus di isi!!">
                                        <span class="text-danger">Harus diisi</span>
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

                                    Apakah Anda Yakin Ingin Menghapus <b><?= $value['matkul'] ?> | <?= $value['smt'] ?>.?</b>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn-sm btn-danger" data-dismiss="modal"> Tutup</button>
                                    <a href="<?= base_url('kurikulum/delete_kurikulum_matkul/' . $value['id_kurikulum'] . '/' . $value['id_prodi'] . '/' . $value['nama_kurikulum']) ?>" class="btn btn-info"> Delete</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                <?php } ?>
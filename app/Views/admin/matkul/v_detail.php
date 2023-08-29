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
                        <div class="card card-success" role="alert">
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
                                <th class="text-center">Kode</th>
                                <th>Mata Kuliah</th>
                                <th class="text-center">SKS</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">Masuk Kelas Perkuliahan</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $db      = \Config\Database::connect();
                            foreach ($matkul as $key => $value) {
                                $jml = $db->table('tbl_kurikulum')
                                    ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_kurikulum.id_matkul', 'left')
                                    ->where('tbl_matkul.id_matkul', $value['id_matkul'])
                                    ->countAllResults(); ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                    <td><?= $value['matkul'] ?></td>
                                    <td class="text-center"><?= $value['sks'] ?></td>
                                    <td class="text-center"><?= $value['kategori'] ?></td>
                                    <td class="text-center"><?= $value['semester'] ?> (<?= $value['smt'] ?>)</td>
                                    <td class="text-center"><?= $jml ?></td>
                                    <td width="50px" class="text-center">
                                        <?php if ($jml > 0) { ?>
                                            <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#gagal<?= $value['id_matkul'] ?>"><i class="fa fa-pencil"></i></button>
                                        <?php } else { ?>
                                            <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_matkul'] ?>"><i class="fa fa-pencil"></i></button>
                                        <?php  }  ?>
                                    </td>
                                </tr>
                            <?php } ?>


                        <tfoot>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th>Kode</th>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Kategori</th>
                                <th>Semester</th>
                                <th>Masuk Jadwal</th>
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
                    <h4 class="modal-title">Add <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open('matkul/add/' . $prodi['id_prodi']);
                        ?>
                    <div class="form-grup">
                        <label>Kode</label>
                        <input name="kode_matkul" class="form-control" placeholder="Kode Mata kuliah">
                    </div>
                    <div class="form-grup">
                        <label>Mata Kuliah</label>
                        <input name="matkul" class="form-control" placeholder="Mata kuliah">
                    </div>
                    <div class="form-grup">
                        <label>Mata Kuliah</label>
                        <select name="sks" class="form-control">
                            <option value="">--Pilih SKS--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Semester</label>
                        <select name="smt" class="form-control">
                            <option value="">--Pilih Semester--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <option value="Wajib">Wajib</option>
                            <option value="Pilihan">Pilihan</option>
                        </select>
                    </div>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="fas fa-edit btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- form delete -->
    <?php foreach ($matkul as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_matkul'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Mata Kuliah</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['matkul'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('matkul/delete/' . $prodi['id_prodi'] . '/' . $value['id_matkul']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

    <!-- form gagal -->
    <?php foreach ($matkul as $key => $value) { ?>
        <div class="modal fade" id="gagal<?= $value['id_matkul'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Mata Kuliah</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus 2 <b><?= $value['matkul'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('matkul/gagal_delete/' . $prodi['id_prodi'] . '/' . $value['id_matkul']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
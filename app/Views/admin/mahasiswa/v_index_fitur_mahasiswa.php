<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?> <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.ISI DAN TABEL -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title ?> </h3>
                <div class="card-tools">
                    <button type="button" class="btn-flat bg-primary color-palette" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus">TAMBAH MAHASISWA</i></button>
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
                if (session()->getFlashdata('error')) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon fas fa-ban"></i>';
                    echo session()->getFlashdata('error');
                    echo '</div>';
                }
                ?>
                <?php echo form_open('mahasiswa/Simpan_fitur_akses_mhs/') ?>

                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>NIM</th>
                            <th>NAMA MAHASISWA</th>
                            <th>PROGRAM STUDI</th>
                            <th>STATUS KRS</th>
                            <th>STATUS KHS</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($akses_fitur_mhs as $key => $value) {
                            echo form_hidden($value['id_akses_fitur_mhs'] . 'id_akses_fitur_mhs', $value['id_akses_fitur_mhs']);
                        ?>


                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nim'] ?></td>
                                <td><?= $value['nama_mhs'] ?></td>
                                <td class="text-center"><?= $value['prodi'] ?></td>
                               
                                <td><select name="<?= $value['id_akses_fitur_mhs'] ?>id_krs">
                                        <option value="0" <?php if ($value['id_krs'] == 0) {
                                                                echo 'selected';
                                                            } ?>>Nonaktif</option>
                                        <option value="1" <?php if ($value['id_krs'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Aktif</option>
                                    </select>
                                </td>
                                <td><select name="<?= $value['id_akses_fitur_mhs'] ?>khs">
                                        <option value="0" <?php if ($value['id_khs'] == 0) {
                                                                echo 'selected';
                                                            } ?>>Nonaktif</option>
                                        <option value="1" <?php if ($value['id_khs'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Aktif</option>
                                    </select>
                                </td>
                                <td class=" text-center">
                                    <a href="<?= ('mahasiswa/delete_akses_fitur/' . $value['id_akses_fitur_mhs']) ?>"  data-toggle="modal" data-target="#delete<?= $value['id_akses_fitur_mhs'] ?>">
                                        <button class="fas fa-trash btn-sm btn-flat">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Stdi</th>
                            <th>Status KRS</th>
                            <th>Status KHS</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>

                <button class="btn btn-outline-success"><i class="fa fa-save"> Simpan Fitur Mahasiswa</i></button>
                <?php echo form_close() ?>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    <!-- form delete -->
    <?php foreach ($akses_fitur_mhs as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_akses_fitur_mhs'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete <?= $title ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['nama_mhs'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('/mahasiswa/delete_akses_fitur/' . $value['id_akses_fitur_mhs']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>


    <!-- <H4><b>Jumlah SKS : $sks </b></H4> -->
    <!-- modal add -->
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open_multipart('mahasiswa/add_mhs_akses');
                    ?>
                    <table class="table table-bordered table-striped-md text-sm" id="example1">
                        <thead>
                            <tr class="bg-success color-palette">
                                <th width="50px" class="text-center">No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>Pilih Mahaiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                            foreach ($data_mhs_tambah as $key => $value) {

                                $is_mhs_exists = false;

                                foreach ($akses_fitur_mhs as $akses) {
                                    if ($akses['id_mhs'] == $value['id_mhs']  && $akses['id_ta'] == $ta_aktif['id_ta']) {
                                        $is_mhs_exists = true;
                                        break;
                                    }
                                }
                            ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['nim'] ?></td>
                                    <td><?= $value['nama_mhs'] ?> (
                                        <?= $value['kode_prodi'] ?>)
                                    </td>
                                    <td><?= $value['prodi'] ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" name="mahasiswa_ids[]" class="form-check-input" value="<?= $value['id_mhs'] ?>" <?= $is_mhs_exists ? 'disabled checked' : '' ?> multiple>
                                    </td>
                                </tr> <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit">Tambahkan Data</button>
                    </form>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

  
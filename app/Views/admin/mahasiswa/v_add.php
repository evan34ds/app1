<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3>
                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <!-- Pesan Error -->
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

                <p>
                    <?php
                    echo form_open_multipart('mahasiswa/insert');
                    ?>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>NIM</label>
                            <input name="nim" class="form-control" placeholder="NIM">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Nama Mahasiswa</label>
                            <input name="nama_mhs" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="form-grup">
                        <label>Program Studi</label>
                        <select name="id_prodi" class="form-control">
                            <option value="">--Pilih Program Studi--</option>
                            <?php foreach ($prodi as $key => $value) { ?>
                                <option value="<?= $value['id_prodi'] ?>"><?= $value['jenjang'] ?>-<?= $value['prodi'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Password</label>
                        <input name="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-grup">
                            <img src="<?= base_url('fotomahasiswa/mahasiswa.jpg') ?>" id="Gambar_load" width="100px">
                        </div>
                    </div>

                    <div class="form-grup">
                        <label>Foto</label>
                        <input type="file" name="foto_mhs" id="preview_gambar" class="form-control">
                    </div>

                </p>
                <div class="modal-footer justify-content-between">
                    <a href="<?= base_url('mahasiswa') ?>" class="fas fa-edit btn-sm btn-danger">Tutup</a>
                    <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
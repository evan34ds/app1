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
                    echo form_open('prodi/update/' . $prodi['id_prodi']);
                    ?>
                    <div class="form-grup">
                        <label>Program Studi</label>
                        <select name="id_fakultas" class="form-control" placeholder="Program Studi">
                            <option value="<?= $prodi['id_fakultas'] ?>"><?= $prodi['fakultas'] ?></option>
                            <?php foreach ($fakultas as $key => $value) { ?>
                                <option value="<?= $value['id_fakultas'] ?>"><?= $value['fakultas'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Kode Program Studi</label>
                        <input name="kode_prodi" value="<?= $prodi['kode_prodi'] ?>" class="form-control" placeholder="Kode Program Studi" readonly>
                    </div>
                    <div class="form-grup">
                        <label>Program Studi</label>
                        <input name="prodi" value="<?= $prodi['prodi'] ?>" class="form-control" placeholder="Program Studi">
                    </div>
                    <div class="form-grup">
                        <label>Jenjang</label>
                        <select name="jenjang" class="form-control">
                            <option value="<?= $prodi['jenjang'] ?>"><?= $prodi['jenjang'] ?></option>
                            <option value="D1">D1</option>"
                            <option value="D2">D2</option>"
                            <option value="D3">D3</option>"
                            <option value="D4">D4</option>"
                            <option value="S1">S1</option>"
                            <option value="S2">S2</option>"
                            <option value="S3">S3</option>"

                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Ketua Program Studi</label>
                        <select name="ka_prodi" class="form-control">
                            <option value="<?= $prodi['ka_prodi'] ?>"><?= $prodi['ka_prodi'] ?></option>
                            <?php foreach ($dosen as $key => $value) { ?>
                                <option value="<?= $value['nama_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </p>
                <div class="modal-footer justify-content-between">
                    <a href="<?= base_url('prodi') ?>" class="fas fa-edit btn-sm btn-danger">Tutup</a>
                    <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
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
                    echo form_open_multipart('/pembayaran/pem_mitrans');
                    ?>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Nama Depan</label>
                            <input name="depan" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Nama Belakang</label>
                            <input name="belakang" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>email</label>
                            <input name="email" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>ponsel</label>
                            <input name="ponsel" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Nominal Tagihan</label>
                            <input name="nominal" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Token</label>
                            <input name="token" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
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
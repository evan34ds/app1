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
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <p>
                    <?php
                    echo form_open('ruangan/update/' . $ruangan['id_ruangan']);
                    ?>
                    <div class="form-grup">
                        <label>Gedung</label>
                        <select name="id_gedung" class="form-control" placeholder="Gedung" required>
                            <option value="<?= $ruangan['id_gedung'] ?>"><?= $ruangan['gedung'] ?></option>
                            <?php foreach ($gedung as $key => $value) { ?>
                                <option value="<?= $value['id_gedung'] ?>"><?= $value['gedung'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Ruangan</label>
                        <input name="ruangan" value="<?= $ruangan['ruangan'] ?>" class="form-control" placeholder="ruangan" required>
                    </div>
                </p>
                <div class="modal-footer justify-content-between">
                    <a href="<?= base_url('ruangan') ?>" class="fas fa-edit btn-sm btn-danger">Tutup</a>
                    <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">

                <div class="col-md-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#edit<?= $data_institusi['id_institusi'] ?>"><i class="fas fa-edit"> Edit</i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- Pesan Error -->
                            <?php
                            if (session()->getFlashdata('pesan')) {
                                echo '<div class="alert alert-success" role="alert">';
                                echo session()->getFlashdata('pesan');
                                echo '</div>';
                            }
                            ?>
                            <p>
                            <div class="col-sm-12">
                                <div class="form-grup">
                                    <label>Nama Institusi</label>
                                    <input name="nama_institusi" value="<?= $data_institusi['nama_institusi'] ?>" class="form-control" placeholder="nama">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-grup">
                                    <label>Kepalah</label>
                                    <input name="id_dosen" value="<?= $data_institusi['nama_dosen'] ?>" class="form-control" placeholder="Kepalah">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-grup">
                                    <label>Alamat</label>
                                    <input name="alamat" value="<?= $data_institusi['alamat'] ?>" class="form-control" placeholder="Alamat">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-grup">
                                    <label>Kontak</label>
                                    <input name="kontak" value="<?= $data_institusi['kontak'] ?>" class="form-control" placeholder="Kontak">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-grup">
                                    <label>Lokasi</label>
                                    <input name="lokasi_maps" value="<?= $data_institusi['lokasi_maps'] ?>" class="form-control" placeholder="Link Maps">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-grup">
                                    <label>Visi dan Misi</label>
                                    <input name="visi_misi" value="<?= $data_institusi['visi_misi'] ?>" class="form-control" placeholder="Visi dan Misi">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-grup">
                                    <label>Sambutan</label>
                                    <textarea type="text" class="form-control summernote" id="sambutan" name="sambutan" name="sambutan"><?= $data_institusi['sambutan'] ?></textarea>
                                </div>
                            </div>
                            </p>
                            <div class="col-md-6">
                                <div class="card card-secondary">
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->





    <!-- form edit -->
    <div class="modal fade" id="edit<?= $data_institusi['id_institusi'] ?>">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open_multipart('admin/update_institusi/' . $data_institusi['id_institusi']);
                        ?>
                    <div class="col-sm-12">
                        <div class="form-grup">
                            <label>Nama Institusi</label>
                            <input name="nama_institusi" value="<?= $data_institusi['nama_institusi'] ?>" class="form-control" placeholder="nama">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Kepalah</label>
                        <select name="id_dosen" class="form-control">
                            <option value="<?= $data_institusi['id_dosen'] ?>">--Pilih Kepalah--</option>
                            <?php foreach ($dosen as $key => $value) { ?>
                                <option value="<?= $value['id_dosen'] ?>">-<?= $value['nama_dosen'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-grup">
                            <label>Alamat</label>
                            <input name="alamat" value="<?= $data_institusi['alamat'] ?>" class="form-control" placeholder="Alamat">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-grup">
                            <label>Kontak</label>
                            <input name="kontak" value="<?= $data_institusi['kontak'] ?>" class="form-control" placeholder="Kontak">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-grup">
                            <label>Lokasi</label>
                            <input name="lokasi_maps" value="<?= $data_institusi['lokasi_maps'] ?>" class="form-control" placeholder="Link Maps">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-grup">
                            <label>Visi dan Misi</label>
                            <input name="visi_misi" value="<?= $data_institusi['visi_misi'] ?>" class="form-control" placeholder="Visi dan Misi">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sambutan</label>
                        <textarea type="text" class="form-control summernote" id="sambutan" name="sambutan" name="sambutan"><?= $data_institusi['sambutan'] ?></textarea>
                        <div class="invalid-feedback errorIsi">
                        </div>
                    </div>
                    </p>
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

    <!-- summernote -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('.summernote').summernote({
            placeholder: 'Silahkan input',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
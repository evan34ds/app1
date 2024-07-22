<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.ISI DAN TABEL -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title ?></h3>
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

                <?php foreach ($daftar_pesan as $berita) { ?>

                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="centangSemua">
                            </th>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Hp</th>
                            <th>Pesan</th>
                            <th>Subject</th>
                            <th>Tipe Komentar</th>
                            <th>Tgl Pesan</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($daftar_pesan as $key => $value) :
                            $no++; ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="id_message[]" class="centangBeritaid" value="<?= $value['id_message'] ?>">
                                </td>
                                <td><?= $no ?></td>
                                <td><?= esc($value['name']) ?></td>
                                <td><?= esc($value['email']) ?></td>
                                <td><?= esc($value['hp']) ?></td>
                                <td><?= esc($value['message']) ?></td>
                                <td><?= esc($value['subject']) ?></td>
                                <td><?= esc($value['tipe_komentar']) ?></td>
                                <td><?= esc($value['tgl_pesan']) ?></td>
                                <td class=" text-center">
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_message'] ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">#</th>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Slug</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>User Posting</th>
                            <th>Sampul</th>
                            <th>Status</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </tfoot>

                </table>
                <?= form_close() ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <!-- form delete -->
    <?php foreach ($daftar_pesan as $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_message'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete <?= '$title ' ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['subject'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('/berita/delete_pesan/' . $value['id_message']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

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
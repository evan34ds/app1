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

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus"> Add</i>
                    </button>
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

                <?php foreach ($daftar_pengumuman as $pengumuman) { ?>

                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="centangSemua">
                            </th>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>User Posting</th>
                            <th width="150px" class="text-center">File</th>
                            <th>Status</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($daftar_pengumuman as $key => $value) :
                            $no++; ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="id_pengumuman[]" class="centangBeritaid" value="<?= $value['id_pengumuman'] ?>">
                                </td>
                                <td><?= $no ?></td>
                                <td><?= esc($value['judul_pengumuman']) ?></td>
                                <td><?= date_indo($value['tgl_pengumuman']) ?></td>
                                <td><?= esc($value['nama_user']) ?></td>
                                <td class="text-center"><a href="<?= base_url('pengumuman/viewPdf/' . $value['pdf']) ?>" target="_blank"><img src="<?= base_url('icon/pdf_icon.png') ?>" alt="PDF Icon" width="50" height="50"></td>
                                <td>
                                    <?php if ($value['status_pengumuman'] == 'published') { ?>
                                        <h6>
                                            <span class="badge badge-success"><?= $value['status_pengumuman'] ?></span>
                                        </h6>
                                    <?php } else { ?>
                                        <h6>
                                            <span class="badge badge-danger"><?= $value['status_pengumuman'] ?></span>
                                        </h6>
                                    <?php } ?>

                                </td>
                                <td class=" text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_pengumuman'] ?>"><i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_pengumuman'] ?>">
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
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>User Posting</th>
                            <th>File</th>
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



    <!-- form inputnya -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo form_open_multipart('pengumuman/add/'); ?>


                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" class="form-control" id="judul_pegumuman" name="judul_pengumuman">
                        <div class="invalid-feedback errorJudul">
                        </div>
                    </div>
                    <div class="form-grup">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_pengumuman" id="status_pengumuman" class="form-control">
                                <option Disabled=true Selected=true>Pilih</option>
                                <option value="published">Publish</option>
                                <option value="archived">Archive</option>
                            </select>
                            <div class="invalid-feedback errorStatus">
                            </div>
                        </div>

                        <div class="form-grup">
                            <label>Dokumen</label>
                            <input type="file" class="form-control" name="pdf" class="form-control" placeholder="pdf">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <?= form_close() ?>

                </div>
            </div>
        </div>

    </div>

    <!-- form edit -->
    <?php foreach ($daftar_pengumuman as $key => $value) {

    ?>
        <div class="modal fade" id="edit<?= $value['id_pengumuman'] ?>" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('pengumuman/edit/' . $value['id_pengumuman']); ?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_pengumuman" value="<?= $value['id_pengumuman'] ?>" name="id_pengumuman" readonly>
                            <label>Judul Pengumuman</label>
                            <input type="text" class="form-control" id="judul_pengumuman" value="<?= $value['judul_pengumuman'] ?>" name="judul_pengumuman">
                            <div class="invalid-feedback errorJudul">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tanggal</label>
                                <input class="form-control" id="as" placeholder='<?= date_indo($value['tgl_pengumuman']) ?>' disabled> </td>
                                <div class="invalid-feedback errorJudul">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ubah Tanggal</label>
                                <input type="date" class="form-control" id="as" value="<?= $value['tgl_pengumuman'] ?>" name="tgl_pengumuman">
                                <div class="invalid-feedback errorJudul">
                                </div>
                            </div>
                        </div>
                        <div class="form-grup">
                            <label>Ganti File</label>
                            <input type="file" value="<?= $value['pdf'] ?>" name="pdf" class="form-control" placeholder="pdf">
                        </div>
                        <div class="form-grup">
                            <br><img src="<?= base_url('icon/pdf_icon.png') ?>" class="attachment-img" width="80px" height="80px"></br>
                        </div>

                        <div class="form-group">
                            <label>Status Penugumuman</label>
                            <select name="status_pengumuman" id="status_pengumuman" class="form-control">
                                <option value="published" <?php if ($value['status_pengumuman'] == "published") echo "selected"; ?>>Published</option>
                                <option value="archived" <?php if ($value['status_pengumuman'] == "archived") echo "selected"; ?>>Archived</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>

    <?php } ?>


    <!-- form delete -->
    <?php foreach ($daftar_pengumuman as $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_pengumuman'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete <?= '$title ' ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['judul_pengumuman'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('pengumuman/delete/' . $value['id_pengumuman']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

    <!-- Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">View PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfFrame" src="" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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

<script>
    function pdf(pdf) {
        var url = '<?= base_url('pdf/pengumuman/') ?>' + pdf;
        $('#pdfFrame').attr('src', url);
        $('#pdfModal').modal('show');
    }
</script>
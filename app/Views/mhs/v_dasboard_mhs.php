<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="img-circle" src="<?= base_url('fotomahasiswa/' . $mhs['foto_mhs']) ?>" alt="User profile picture" width="">
                        </div>

                        <h3 class="profile-username text-center"></h3>

                        <p class="text-muted text-center"><?= $mhs['nim'] ?></p>
                        <p class="text-muted text-center"><?= $mhs['nama_mhs'] ?></p>
                        <p class="text-muted text-center"><?= $mhs['prodi'] ?></p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- tambahim div untuk ke samping dan tambahim  <div class="col-md-4">  di atas penutup dari <div class="row">-->
            <div class="col-md-9">
                <!-- About Me Box -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Biodata Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Tahun Akademik</th>
                                <th>:</th>
                                <th><?= $ta['ta'] ?> (<?= $ta['semester'] ?>)</th>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <th>:</th>
                                <th><?= $mhs['prodi'] ?></th>
                            </tr>
                            <tr>
                                <th>Fakultas</th>
                                <th>:</th>
                                <th><?= $mhs['fakultas'] ?></th>
                            </tr>
                            <tr>
                                <th>Dosen Pa</th>
                                <th>:</th>
                                <th><?= $mhs['nama_dosen'] ?></th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>:</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <th>:</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>E-Mail</th>
                                <th>:</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
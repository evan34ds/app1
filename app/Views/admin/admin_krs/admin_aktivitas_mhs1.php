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


                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th width="150px" class="text-center">Jenjang</th>
                            <th width="150px" class="text-center">Program Studi</th>
                            <th width="150px" class="text-center">SKS Semester </th>
                            <th width="150px" class="text-center">Total SKS Semester</th>
                            <th width="150px" class="text-center">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
        
                        $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah <?= $mhs['nama_dosen'] 
                        foreach ($sks_semester->getResult() as $jml_transkip ) {
                        
                            ?>
                    
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $jml_transkip->nim; ?></td>
                                <td><?= $jml_transkip->nama_mhs; ?></td>
                                <td class="text-center"><?= $jml_transkip->jenjang;?></td>
                                <td class="text-center"><?= $jml_transkip->prodi; ?></td>
                                <td class="text-center"><?= $jml_transkip->Total; ?></td>
                                <td class="text-center"><?= $jml_transkip->ba; ?></td>
                                <td class="text-center"> <?php if ($jml_transkip->Total >> 0 ) { ?> 
                                        <span class="badge badge-success">Aktif</span>
                                    <?php } else { ?>
                                            <i class="badge badge-danger">Tidak Aktif</i>
                                    <?php  }  ?>
                                    </b></td>
                                </tr>

                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th width="50px" class="text-center">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th width="150px" class="text-center">Jenjang</th>
                            <th width="150px" class="text-center">Program Studi</th>
                            <th width="150px" class="text-center">TOTAL Semester</th>
                            <th width="150px" class="text-center">TOTAL SKS Semester</th>
                            <th width="150px" class="text-center">STATUS</th>
                        </tr>
                    </tfoot>
                </table>

                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    

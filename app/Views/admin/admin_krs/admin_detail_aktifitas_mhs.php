<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?> Tahun Akademik : <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <!--tabel menggunakan https://www.tablesgenerator.com/-->
        <table class="table table-bordered table-striped">
            <div class="col-sm-12">
            <tr>
                        <th width="150px">Program Studi</th>
                        <td width="30px">:</td>
                        <td><?= $prodi['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang'] ?></td>
                    </tr>
                    <tr>
                        <th>Fakultas</th>
                        <td>:</td>
                        <td><?= $prodi['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>:</td>
                        <td> <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></td>
                    </tr>
        </table>
    </div>
    <div class="col-sm-12">
    </div>
    <div class="col-sm-12">
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
        <?php //pesan berhasil di simpan
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>

        <?php
                if (session()->getFlashdata('gagal')) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert"></i>';
                    echo session()->getFlashdata('gagal');
                    echo '</div>';
                }
        ?>

           <table class="table table-bordered table-striped text-sm">
                    <thead>
                        <tr class="bg-success color-palette">
                            <th class="text-center">NO</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">NAMA MAHASISWA</th>
                            <th class="text-center">tgl_masuk</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
            <tbody>
                <?php $no = 1;
                $sks = 0; //menjumlahkan sks
                $db      = \Config\Database::connect(); 
                foreach ($mhs as $key => $value) {  
                        
                ?>
                    <tr>
                    <td><?= $no++ ?></td>
                                
                                <td><?= $value['nim'] ?></td>
                                <td><?= $value['nama_mhs'] ?></td>
                                <td><?= $value['tgl_masuk'] ?></td>
                                    <td><?=  $data_sks['sks'] ?></td>
                                <td> 
                                     <a href="<?= base_url('Admin/tambah_status/' . $value['id_prodi']) ?>" class="btn-flat bg-primary color-palette">
                                </td>
                                <td></td>
                    </tr>
                <?php } ?>
                <tr class="bg-success color-palette">
                <th class="text-center">NO</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">NAMA MAHASISWA</th>
                            <th class="text-center">tgl_masuk</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">AKSI</th>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
            <?php echo form_close() ?>
    </div>
</div>

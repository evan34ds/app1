<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <!--tabel menggunakan https://www.tablesgenerator.com/-->
        <table class="table table-bordered table-striped">
            <div class="col-sm-12">
                <tr>
                    <th width="20px" rowspan="7"><img src="<?= base_url('fotomahasiswa/' . $daftar_pelunasan['foto_mhs']) ?>" width="120px" height="150px"></th>
                    <th width=" 150px">NAMA</th>
                    <th width="20px">:</th>
                    <th><?= $daftar_pelunasan['nama_mhs'] ?></th>
                    <th rowspan="7"></th>
                </tr>
                <tr>
                    <td>Kode Kelas Pembayaran</td>
                    <td>:</td>
                    <td><?= $daftar_pelunasan['nama_mhs'] ?></td>
                </tr>
                <tr>
                    <td>Kode Kelas Pembayaran</td>
                    <td>:</td>
                    <td><?= $daftar_pelunasan['kode_kelas_pembayaran'] ?></td>
                </tr>
                <tr>
                    <td>Nama Kelas Pembayaran</td>
                    <td>:</td>
                    <td><?= $daftar_pelunasan['nama_kelas_pembayaran'] ?></td>
                </tr>
                <tr>
                    <td>Jumlah Tagihan</td>
                    <td>:</td>
                    <td><?= 'Rp ' . number_format($daftar_pelunasan['biaya'], 0, ',', '.') ?> <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $daftar_pelunasan['midtrans_token'] ?>" class="fas fa-eye btn-sm btn-danger"> Bayar</a>
                        <?php foreach ($daftar_pelunasan as $data) :
                            $id = $daftar_pelunasan['order_id'];
                            $token = base64_encode("SB-Mid-server-EBgU9ji51TZg0QtIqTFcABgw:");
                            $url = "https://api.sandbox.midtrans.com/v2/" . $id . "/status";
                            $header = array(
                                'Accept: application/json',
                                'Authorization: Basic ' . $token, // Tambahkan spasi setelah 'Basic'
                                'Content-Type: application/json'
                            );
                            $method = 'GET';
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $result = curl_exec($ch);

                            if (curl_errno($ch)) {
                                // Tangani kesalahan cURL jika ada
                                echo 'Error:' . curl_error($ch);
                            }

                            curl_close($ch); // Tutup cURL

                            $hasil = json_decode($result, true);

                        ?>
                        <?php endforeach; ?>
                        <?php
                        if (empty($hasil['settlement_time'])) {
                            echo '<div class="badge badge-warning">Pending</div>';
                        } else {
                            echo '<div class="badge badge-success">Success</div>';
                        }
                        ?>
                    </td>

                <tr>

                </tr>

                <tr>
                    <td>Total Pembayaran</td>
                    <td>:</td>
                    <td><?= 'Rp ' . number_format($pembayaran['total_pelunasan'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>Sisa Pembayaran</td>
                    <td>:</td>
                    <td><?= 'Rp ' . number_format($daftar_pelunasan['biaya'] - $pembayaran['total_pelunasan'], 0, ',', '.') ?></td>
                </tr>
        </table>
    </div>
    <!-- /.ISI DAN TABEL -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#new"><i class="fas fa-plus"> Add</i>
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
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-success color-palette">
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Pembayaran</th>
                            <th class="text-center">Waktu Pembayaran</th>
                            <th class="text-center">Pelunasan</th>
                            <th class="text-center">Penerima</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $total_pelunasan = 0;
                        $db      = \Config\Database::connect();
                        foreach ($pembayaran_keuangan as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil
                            $rupiah = 'Rp ' . number_format($value['pelunasan'], 0, ',', '.');
                            $total_pelunasan = $total_pelunasan + $value['pelunasan']; //menjumlahkan sks
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['kode_pembayaran_mhs'] ?></td>
                                <td class="text-center"><?= $value['waktu_pembayaran_mhs'] ?></td>
                                <td class="text-center"><?php echo $rupiah; ?></td>
                                <td class="text-center"><?= $value['nama_user'] ?></td>
                                <td class="text-center"><button class="fas fa-edit btn-sm btn-danger" data-toggle="modal" data-target="#edit<?= $value['id_kelas_pembayaran'] ?>"><i class="fa fa-pencil"></i></button> | <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kelas_pembayaran'] ?>"><i class="fa fa-pencil"></i></td>
                            </tr>
                        <?php } ?>

                        <tr class="bg-warning color-palette">
                            <td align="center" colspan="3">Total Pembayaran</td>
                            <td align="center"><?= 'Rp ' . number_format($total_pelunasan, 0, ',', '.') ?></td> <!-- Mendapatkan total sks -->
                            <td colspan="6"></td>
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>

    </div>




    <!-- form tambah -->
    <div class="modal fade" id="new">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <b>
                        <h4 class="modal-title">Tambah Pembayaran</h4>
                    </b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Nama Pembayaran : <?= $daftar_pelunasan['nama_kelas_pembayaran'] ?></h5>
                    <h5>Biaya :<?= $daftar_pelunasan['biaya'] ?></h5>
                </div>

                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open('pembayaran/add_pembayaran_mhs/' . $daftar_pelunasan['id_kelas_pembayaran'] . '/' . $daftar_pelunasan['id_mhs']); ?>

                    <div class="form-grup">
                        <label>Pembayaran</label>
                        <input name="pelunasan" class="form-control" placeholder="Biaya" required>
                    </div>

                    <div class="form-grup">
                        <label>Kode Pembayaran</label>
                        <input name="kode_pembayaran_mhs" id="kode_pembayaran" class="form-control" placeholder="Kode Pembayaran" required>
                    </div>
                    <div class="form-grup">
                        <label>Waktu Pembayaran</label>
                        <input name="waktu_pembayaran_mhs" id="waktu_pembayaran" class="form-control" placeholder="Waktu Pembayaran" required>
                    </div>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="fas fa-edit btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
                </div>
                <?php echo form_close(); ?>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- form edit -->
    <?php foreach ($pembayaran_keuangan as $key => $edit) { ?>
        <div class="modal fade" id="edit<?= $edit['id_kelas_pembayaran'] ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Pembayaran Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php echo form_open('pembayaran/edit_pelunasan/' . $edit['id_kelas_pembayaran'] . '/' . $edit['id_mhs']); ?>
                        <div class="form-grup">
                            <label>Nama Pembayaran</label>
                            <input name="pelunasan" value="<?= $edit['pelunasan'] ?>" class="form-control" placeholder="Nama Pembayaran" required>
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
    <?php } ?>


    <!-- form delete -->
    <?php foreach ($pembayaran_keuangan as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_kelas_pembayaran'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kelas Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Kelas <b><?= $value['nama_kelas_pembayaran'] ?> - <?= $value['biaya'] ?></b>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('/Pembayaran/delete_pelunasan_mhs/' . $value['id_kelas_pembayaran'] . '/' . $value['id_mhs']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>



    <script type="text/javascript">
        /* Tanpa Rupiah */
        var tanpa_rupiah = document.getElementById('tanpa-rupiah');
        tanpa_rupiah.addEventListener('keyup', function(e) {
            tanpa_rupiah.value = formatRupiah(this.value);
        });

        /* Tanpa Rupiah */
        var tanpa_rupiah = document.getElementById('tanpa1-rupiah');
        tanpa_rupiah.addEventListener('input', function(e) {
            this.value = formatRupiah(this.value);
        });

        /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById('dengan-rupiah');
        dengan_rupiah.addEventListener('keyup', function(e) {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

    <script>
        // Fungsi untuk menghasilkan kode pembayaran otomatis
        function generateKodePembayaran() {
            var now = new Date();
            var tahun = now.getFullYear().toString().substr(-2); // Ambil 2 digit terakhir tahun
            var bulan = ('0' + (now.getMonth() + 1)).slice(-2); // Tambahkan nol di depan jika bulan < 10
            var tanggal = ('0' + now.getDate()).slice(-2); // Tambahkan nol di depan jika tanggal < 10
            var jam = ('0' + now.getHours()).slice(-2); // Tambahkan nol di depan jika jam < 10
            var menit = ('0' + now.getMinutes()).slice(-2); // Tambahkan nol di depan jika menit < 10
            var detik = ('0' + now.getSeconds()).slice(-2); // Tambahkan nol di depan jika detik < 10


            // Format kode pembayaran: TTTT-BBHHmmss-NNNN
            var kodeTanggalWaktu = tanggal + bulan + tahun + '-' + jam;

            // Mendapatkan nomor urut (mulai dari 0001)
            var nomorUrut = ('0000' + Math.floor(Math.random() * 10000)).slice(-4); // Nomor urut dengan 4 digit, dengan tambahan nol di depan jika diperlukan

            // Format kode pembayaran lengkap: TTTT-BBHHmmss-NNNN
            var kodePembayaran = kodeTanggalWaktu + '-' + nomorUrut;

            return kodePembayaran;
        }

        // Ambil elemen input kode_pembayaran
        var inputKodePembayaran = document.getElementById('kode_pembayaran');

        // Set nilai input dengan kode pembayaran yang dihasilkan
        inputKodePembayaran.value = generateKodePembayaran();
    </script>

    <script>
        // Fungsi untuk menghasilkan waktu otomatis
        function updateWaktu() {
            var now = new Date();
            var tahun = now.getFullYear();
            var bulan = ('0' + (now.getMonth() + 1)).slice(-2);
            var tanggal = ('0' + now.getDate()).slice(-2);
            var jam = ('0' + now.getHours()).slice(-2);
            var menit = ('0' + now.getMinutes()).slice(-2);
            var detik = ('0' + now.getSeconds()).slice(-2);

            // Format waktu: YYYY-MM-DD HH:MM:SS
            var waktu = tanggal + '-' + bulan + '-' + tahun + ' ' + jam + ':' + menit + ':' + 00;

            // Set nilai input dengan waktu yang dihasilkan
            document.getElementById('waktu_pembayaran').value = waktu;
        }

        // Panggil fungsi updateWaktu setiap detik
        setInterval(updateWaktu, 1000);

        // Panggil fungsi updateWaktu saat halaman dimuat pertama kali
        updateWaktu();
    </script>
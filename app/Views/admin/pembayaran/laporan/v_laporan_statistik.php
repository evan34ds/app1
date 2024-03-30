<!-- app/Views/kelas_pembayaran.php -->
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

    <body>

        <div class="table-container">
            <?php
            // Array untuk menyimpan data berdasarkan tahun akademik
            $data_by_ta = [];

            print_r($data_by_ta);

            // Mengelompokkan data berdasarkan tahun akademik
            foreach ($nama_mhs_list as $nama_mhs) {
                $tahun_akademik = $nama_mhs['ta'];
                $kode_kelas_data = [];

                // Mengelompokkan data berdasarkan kode kelas
                foreach ($kode_kelas_pembayaran_list as $kode_kelas) {
                    $kode_kelas_pembayaran = $kode_kelas['kode_kelas_pembayaran'];
                    $pelunasan = isset($pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran]) ?
                        ($pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran] !== null ? $pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran] : 1)
                        : 2;
                    $kode_kelas_data[$kode_kelas_pembayaran] = $pelunasan;
                }

                // Menyimpan data dalam array berdasarkan tahun akademik
                $data_by_ta[$tahun_akademik][] = [
                    'nama_mhs' => $nama_mhs['nama_mhs'],
                    'kode_kelas_data' => $kode_kelas_data
                ];
            }

            // Menampilkan tabel berdasarkan tahun akademik
            foreach ($data_by_ta as $tahun_akademik => $data_kelas) {
            ?>
                <h2>Tahun Akademik <?= $tahun_akademik ?></h2>
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <?php
                            // Array untuk menyimpan informasi apakah kolom harus ditampilkan
                            $show_column = array_fill_keys(array_keys($kode_kelas_pembayaran_list), false);

                            // Mengatur informasi apakah kolom harus ditampilkan atau tidak
                            foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                foreach ($data_kelas as $data) {
                                    if ($data['kode_kelas_data'][$kode_kelas['kode_kelas_pembayaran']] != 2) {
                                        $show_column[$key] = true;
                                        break;
                                    }
                                }
                            }

                            // Menampilkan kolom kelas pembayaran yang harus ditampilkan
                            foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                if ($show_column[$key]) {
                                    echo "<th>{$kode_kelas['kode_kelas_pembayaran']}</th>";
                                }
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_kelas as $data) : ?>
                            <tr>
                                <td><?= $data['nama_mhs'] ?></td>
                                <?php
                                foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                    if ($show_column[$key]) {
                                        echo "<td>{$data['kode_kelas_data'][$kode_kelas['kode_kelas_pembayaran']]}</td>";
                                    }
                                }
                                ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </body>

    <th>BATAS</th>

    <body>

        <div class="table-container">
            <?php
            // Array untuk menyimpan data berdasarkan tahun akademik
            $data_by_ta = [];




            // Mengelompokkan data berdasarkan tahun akademik
            foreach ($nama_mhs_list as $nama_mhs) {
                $tahun_akademik = $nama_mhs['ta'];
                $kode_kelas_data = [];
                echo '<pre>';
                print_r($kode_kelas_data);
                echo '</pre>';

                // Mengelompokkan data berdasarkan kode kelas
                foreach ($kode_kelas_pembayaran_list as $kode_kelas) {
                    $kode_kelas_pembayaran = $kode_kelas['kode_kelas_pembayaran'];
                    $pelunasan = isset($pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran]) ?
                        ($pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran] !== null ? $pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran] : 1)
                        : 2;
                    $kode_kelas_data[$kode_kelas_pembayaran] = $pelunasan;

                  
                }

                // Menyimpan data dalam array berdasarkan tahun akademik
                $data_by_ta[$tahun_akademik][] = [
                    'nama_mhs' => $nama_mhs['nama_mhs'],
                    'kode_kelas_data' => $kode_kelas_data
                ];

            }


            // Menampilkan tabel berdasarkan tahun akademik
            foreach ($data_by_ta as $tahun_akademik => $data_kelas) {
            ?>
                <h2>Tahun Akademik <?= $tahun_akademik ?></h2>
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <?php
                            // Array untuk menyimpan informasi apakah kolom harus ditampilkan
                            $show_column = array_fill_keys(array_keys($kode_kelas_pembayaran_list), false);


                            // Mengatur informasi apakah kolom harus ditampilkan atau tidak
                            foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                foreach ($data_kelas as $data) {
                                    if ($data['kode_kelas_data'][$kode_kelas['kode_kelas_pembayaran']] != 2) {
                                        $show_column[$key] = true;
                                        break;
                                    }
                                }

             
                            }

                            // Menampilkan kolom kelas pembayaran yang harus ditampilkan
                            foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                if ($show_column[$key]) {
                                    echo "<th>{$kode_kelas['kode_kelas_pembayaran']}</th>";
                                }
                            }
                            ?>
                             <th>Jumlah Pembayaran</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_kelas as $data) : ?>
                            <tr>
                                <td><?= $data['nama_mhs'] ?></td>
                                <?php
                                foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                    if ($show_column[$key]) {
                                        echo "<td>{$data['kode_kelas_data'][$kode_kelas['kode_kelas_pembayaran']]}</td>";

                                       // echo '<pre>';
                                       // print_r($data['kode_kelas_data']);
                                       // echo '</pre>';
                                    }
                                }
                                ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </body>

    <body>

    
    </body>


    Tentu, berikut adalah contoh sederhana penggunaan kode tersebut dalam bahasa pemrograman PHP:

    php
    Copy code
    <?php

    // Inisialisasi array kosong
    $data_by_ta = [];

    // Menambahkan data ke dalam array
    $data_by_ta['2019'] = ['jumlah' => 100, 'rata_rata' => 75];
    $data_by_ta['2020'] = ['jumlah' => 120, 'rata_rata' => 80];
    $data_by_ta['2021'] = ['jumlah' => 150, 'rata_rata' => 85];

    $data_by_ta['2019'] = ['jumlah' => 100, 'rata_rata' => 75];
    $data_by_ta['2020'] = ['jumlah' => 120, 'rata_rata' => 80];
    $data_by_ta['2021'] = ['jumlah' => 150, 'rata_rata' => 85];

    // Menampilkan isi array
    echo "Data berdasarkan tahun ajaran:\n";
    foreach ($data_by_ta as $tahun => $data) {
        echo "Tahun Ajaran: $tahun, Jumlah Siswa: {$data['jumlah']}, Rata-rata Nilai: {$data['rata_rata']}\n";
    }

    print_r($data_by_ta);
    ?>
    <th>batas 2</th>
    <?php

    // Data mahasiswa
    $nama_mhs = [
        'nama' => 'John Doe',
        'kode' => '10',
        'nim' => '123456789',
        'ta' => '2023/2024' // Tahun akademik
    ];

    // Mengambil tahun akademik dari data mahasiswa
    $tahun_akademik = $nama_mhs['ta'];

    // Menampilkan tahun akademik
    echo "Tahun akademik mahasiswa: $tahun_akademik";

    ?>

    </html>
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
                //   print_r($nama_mhs['id_mhs']);


                // Mengelompokkan data berdasarkan kode kelas
                foreach ($kode_kelas_pembayaran_list as $kode_kelas) {
                    $kode_kelas_pembayaran = $kode_kelas['kode_kelas_pembayaran'];
                    $pelunasan = isset($pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran]) ?
                        ($pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran] !== null ? $pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran] : 1)
                        : 2;
                    $kode_kelas_data[$kode_kelas_pembayaran] = $pelunasan;

                   //    print_r($pelunasan_data[$nama_mhs['nama_mhs']]);
                    // print_r([$kode_kelas_pembayaran]);
                   //  print_r($pelunasan_data);
                    //  print_r($kode_kelas_data[$kode_kelas_pembayaran]);
                    //  print_r($kode_kelas_pembayaran_list);
                    //  print_r($pelunasan);
                }

                // Mengelompokkan data jumlah pelunasan  berdasarkan nama
                foreach ($get_mhs_jumlah_pelunasan as $jumlah_pelunasan) {
                    $jumlah_pelunasan_kel = $jumlah_pelunasan['id_mhs'];
                    $pelunasan_kel = isset($jumlah_pelunasan_data[$nama_mhs['id_mhs']][$jumlah_pelunasan_kel]) ?
                        ($jumlah_pelunasan_data[$nama_mhs['id_mhs']][$jumlah_pelunasan_kel] !== null ? $jumlah_pelunasan_data[$nama_mhs['id_mhs']][$jumlah_pelunasan_kel] : 1)
                        : 2;
                      

                    $kode_kelas_data_pel[$jumlah_pelunasan_kel] = $pelunasan_kel;

                   // print_r([$nama_mhs['id_mhs']]);
                  // print_r($jumlah_pelunasan_data[$nama_mhs['id_mhs']]);
                    // print_r($jumlah_pelunasan_data['nama_mhs']);
                    // print_r($kode_kelas_data_pel[$jumlah_pelunasan_kel]);
                    // print_r($kode_kelas_data_pel[$jumlah_pelunasan_kel]);
                    //  print_r($kode_kelas_data_pel[$jumlah_pelunasan_kel] );
                    //  print_r($get_mhs_jumlah_pelunasan);
                   //  print_r($pelunasan_kel);

                }

                // Menyimpan data dalam array berdasarkan tahun akademik
                $data_by_ta[$tahun_akademik][] = [
                    'nama_mhs' => $nama_mhs['nama_mhs'],
                    'kode_kelas_data' => $kode_kelas_data,
                    'kode_kelas_data_pel' => $kode_kelas_data_pel,

                ];
            }

            //  echo '<pre>';
            //   print_r($kode_kelas_data);
            // print_r($kode_kelas_data_pel);
            // echo '</pre>';


            // Menampilkan tabel berdasarkan tahun akademik
            foreach ($data_by_ta as $tahun_akademik => $data_kelas) {
                //     print_r($data['pel']);
            ?>
                <h2>Tahun Akademik <?= $tahun_akademik ?></h2>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-success color-palette">
                                <th>Nama Mahasiswa</th>
                                <?php
                                // Array untuk menyimpan informasi apakah kolom harus ditampilkan
                                $show_column = array_fill_keys(array_keys($kode_kelas_pembayaran_list), false);
                                $show = array_fill_keys(array_keys($get_mhs_jumlah_pelunasan), false);
                               
                               // print_r($show);
                                // print_r($show_column);
                                //print_r($kode_kelas_pembayaran_list);
                                // print_r($get_mhs_jumlah_pelunasan);

                                // Mengatur informasi apakah kolom harus ditampilkan atau tidak
                                foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                    foreach ($data_kelas as $data) {
                                        if ($data['kode_kelas_data'][$kode_kelas['kode_kelas_pembayaran']] != 2) {
                                            $show_column[$key] = true;
                                            break;
                                            //          print_r( $show_column[$key]);
                                        }
                                    }
                                }

                                // Menampilkan kolom kelas pembayaran yang harus ditampilkan
                                foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                    if ($show_column[$key]) {
                                        echo "<th>{$kode_kelas['kode_kelas_pembayaran']}</th>";
                                    }
                                }


                                // Menampilkan kolom kelas pembayaran yang harus ditampilkan
                                foreach ($get_mhs_jumlah_pelunasan as $ke => $jumlah_pembayaran) {
                                    foreach ($data_kelas as $data) {
                                        if ($data['kode_kelas_data_pel'][$jumlah_pembayaran['id_mhs']] != 2) {
                                            $show[$ke] = true;
                                            break;
                                            //          print_r( $show_column[$key]);
                                        }
                                    }
                                }
                                
                                ?>

                                <th>Jumlah</th>



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
                                      //  print_r($kode_kelas['kode_kelas_pembayaran']);
                                           //   print_r($data_kelas);
                                             // print_r($data['nama_mhs']);
                                            // print_r($show_column[$key]);
                                            // echo '</pre>';
                                        }
                                    }
                                    ?>

                                    <?php
                                    $total = 0;
                                    foreach ($get_mhs_jumlah_pelunasan as $ke => $jumlah_pembayaran) {
                                        if ($show[$ke]) {
                                            echo "<td>{$data['kode_kelas_data_pel'][$jumlah_pembayaran['id_mhs']]}</td>";

                                                // echo '<pre>';
                                    //  print_r($data['kode_kelas_data_pel']);
                                    //  print_r($data['kode_kelas_data_pel']);
                                   // print_r($jumlah_pembayaran['id_mhs']);
                                    //  print_r($data['pel'][$jumlah_pembayaran['pelunasan']]);
                                    //  echo '</pre>';
                                        }
                                    }
                                    ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>

        </div>
    </body>

    <body>


    </body>
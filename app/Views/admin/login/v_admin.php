<script src="<?= base_url() ?>/template/Chart/chart.js"></script>




<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $jml_gedung ?></h3>

                <p>Gedung</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href=<?= base_url('gedung') ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $jml_ruangan ?><sup style="font-size: 20px"></sup></h3>

                <p>Ruangan</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href=<?= base_url('ruangan') ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $jml_fakultas ?></h3>

                <p>Fakultas</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href=<?= base_url('fakultas') ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $jml_prodi ?></h3>

                <p>Program Studi</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href=<?= base_url('prodi') ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $jml_dosen ?></h3>

                <p>Dosen</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href=<?= base_url('dosen') ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $jml_mhs ?></h3>

                <p>Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href=<?= base_url('mahasiswa') ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $jml_matkul ?></h3>

                <p>Mata Kuliah</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href=<?= base_url('matkul') ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $jml_user ?></h3>

                <p>User</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href=<?= base_url('user') ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>


<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">DATA MAHASISWA PRODI</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="chart">
            <?php
            foreach ($grafik as $key => $ms) {
                $thn[] = $ms['tahun'];
                $jml[] = $ms['jumlah'];
            }
            echo json_encode($thn);
            echo json_encode($jml);
            ?>

            <div>
                <canvas id="myChart" height="100" width="500"></canvas>
                <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($thn) ?>,
                            datasets: [{
                                label: 'DATA MASUK',
                                data: <?php echo json_encode($jml) ?>,

                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">DATA MAHASISWA PRODI</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <?php
                foreach ($data->getResult() as $value) {
                    $prod[] = $value->prodi;
                    $jml_prod[] = $value->jumlah;
                }
                echo json_encode($prod);
                echo json_encode($jml_prod);
                ?>

                <div>
                    <canvas id="myChart2" height="100" width="500"></canvas>
                    <script>
                        new Chart("myChart2", {
                            type: 'bar',
                            data: {
                                labels: <?php echo json_encode($prod) ?>,
                                datasets: [{
                                    label: 'DATA MASUK',
                                    data: <?php echo json_encode($jml_prod) ?>,

                                    backgroundColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)'
                                    ],
                                    borderColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">DATA MAHASISWA AKTIF TAHUN AKADEMIK <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <?php
                    foreach ($aktif_mhs->getResult() as $value) {


                        $status[] = $value->status;
                        $jml_aktif = $value->jenjang;
                        $jumlah_status = array_sum($status);
                    }

                    if (isset($jumlah_status, $jml_aktif)) {
                        echo json_encode([$jumlah_status]);
                        echo json_encode([$jml_aktif]);
                    } else {
                        $jml_aktif= "TIDAK ADA JUMLAH AKTIF";
                        $jumlah_status="TIDAK ADA JUMLAH AKTIF";
                    }

                    ?>

                    <div>
                        <canvas id="myChart3" height="100" width="500"></canvas>
                        <script>
                            new Chart("myChart3", {
                                type: 'bar',
                                data: {

                                    labels: <?php echo json_encode([$jml_aktif]) ?>,
                                    datasets: [{
                                        label: 'MAHASISWA AKTIF  <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?>',
                                        data: <?php echo json_encode([$jumlah_status]) ?>,

                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">DATA MAHASISWA AKTIF PER-PRODI TAHUN AKADEMIK <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <?php
                        foreach ($aktif_mhs_prodi->getResult() as $value) {


                            $hitung_aktif[] = $value->hitung_aktif;
                            $jml_aktif_prodi[] = $value->prodi;
                        }

                        if (isset($hitung_aktif, $jml_aktif_prodi)) {
                            echo json_encode([$hitung_aktif]);
                            echo json_encode([$jml_aktif_prodi]);
                        } else {
                            $hitung_aktif= "TIDAK ADA JUMLAH AKTIF";
                            $jml_aktif_prodi="TIDAK ADA JUMLAH AKTIF";
                        }
                        ?>

                        <div>
                            <canvas id="myChart4" height="100" width="500"></canvas>
                            <script>
                                new Chart("myChart4", {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($jml_aktif_prodi) ?>,
                                        datasets: [{
                                            label: 'MAHASISWA AKTIF',
                                            data: <?php echo json_encode($hitung_aktif) ?>,

                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
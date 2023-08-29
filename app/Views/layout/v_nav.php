    <a href="<?= base_url() ?>/template/index3.html" class="navbar-brand">
        <img src="<?= base_url() ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Template</span>
        <a href="<?= base_url('home/beranda') ?>" class="navbar-brand">
        <img src="<?= base_url() ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Beranda</span>
    </a>
    <a href="<?= base_url('home') ?>" class="navbar-brand">
        <img src="<?= base_url() ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIAKAD KAMPUS</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php if (session()->get('level') == 1) { ?>
                    <!-- jika lebih dari 2 pakai elseif jika terakhir  pakai else dan tanpan session-->
                    <!-- Menu Halaman Admin-->
                    <a href="<?= base_url('admin') ?>" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>/template/index3.html" class="nav-link">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Master</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="<?= base_url('fakultas') ?>" class="dropdown-item">Fakultas </a></li>
                    <li><a href="<?= base_url('gedung') ?>" class="dropdown-item">Gedung </a></li>
                    <li><a href="<?= base_url('ruangan') ?>" class="dropdown-item">Ruangan </a></li>
                    <li><a href="<?= base_url('prodi') ?>" class="dropdown-item">Program Studi</a></li>
                    <li><a href="<?= base_url('kurikulum') ?>" class="dropdown-item">Kurikulum</a></li>
                    <li><a href="<?= base_url('matkul') ?>" class="dropdown-item">Mata Kuliah</a></li>
                    <li><a href="<?= base_url('mahasiswa') ?>" class="dropdown-item">Mahasiswa</a></li>
                    <li><a href="<?= base_url('mahasiswa/akses_fitur_mhs') ?>" class="dropdown-item">Akses Fitur Mahasiswa</a></li>
                    <li><a href="<?= base_url('dosen') ?>" class="dropdown-item">Dosen</a></li>


                    <!-- Level two dropdown-->
                    <!-- End Level two -->
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Akademik</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="<?= base_url('ta') ?>" class="dropdown-item">Tahun Akademik</a></li>
                    <li><a href="<?= base_url('bobotnilai') ?>" class="dropdown-item">Bobot Nilai</a></li>
                    <li><a href="<?= base_url('kelas') ?>" class="dropdown-item">Kelas Pembimbing Akademik</a></li>
                    <li><a href="<?= base_url('kelas/kelas_perkuliahan') ?>" class="dropdown-item">Kelas Perkuliahan</a></li>
                    <li><a href="<?= base_url('ta/setting') ?>" class="dropdown-item">Tahun Akademik</a></li>
                    <li><a href="<?= base_url('jadwalkuliah') ?>" class="dropdown-item">Jadwal Kuliah</a></li>
                    <li><a href="<?= base_url('admin/admin_prodi_krs') ?>" class="dropdown-item">Kartu Rencana Mahasiswa</a></li>
                    <li><a href="<?= base_url('admin/daftar_mhs_khs') ?>" class="dropdown-item">Kartu Hasil Studi Mahasiswa</a></li>
                    <li><a href="<?= base_url('admin/admin_aktivitas_mhs') ?>" class="dropdown-item">Hitung Aktivitas Perkuliahan Mahasiswa</a></li>
                    <li><a href="<?= base_url('admin/daftar_mhs_transkip') ?>" class="dropdown-item">Transkip Nilai</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Setting</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="<?= base_url('user') ?>" class="dropdown-item">User </a></li>
                    <li><a href="<?= base_url('fakultas') ?>" class="dropdown-item">Fakultas</a></li>
                    <li><a href="<?= base_url('tutorial') ?>" class="dropdown-item">Tutorial</a></li>
                    <li><a href="<?= base_url('slider') ?>" class="dropdown-item">Slider</a></li>
                  <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Berita</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">Kategori</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a tabindex="-1" href="<?= base_url('berita') ?>" class="dropdown-item">List Berita</a>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  
                </ul>
              </li>
                </ul>
            </li>
        <?php } elseif (session()->get('level') == 2) { ?>
            <!-- jika lebih dari 2 pakai elseif jika terakhir  pakai else dan tanpan session-->
            <!-- Menu Halaman Mahasiswa-->
            <a href="<?= base_url('mhs') ?>" class="nav-link">Dashboard</a>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Akademik</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="<?= base_url('krs') ?>" class="dropdown-item">Kartu Rencana Studi (KRS)</a></li>
                    <li><a href="<?= base_url('khs') ?>" class="dropdown-item">Kartu Hasil Studi (KHS)</a></li>
                    <li><a href="<?= base_url('mhs/absensi') ?>" class="dropdown-item">Absensi</a></li>
                    <!-- Level two dropdown-->

                </ul>
            </li>
        <?php } elseif (session()->get('level') == 3) { ?>
            <!-- Menu Halaman Dosen-->
            <a href="<?= base_url('dsn') ?>" class="nav-link">Dashboard</a>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Akademik</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="<?= base_url('dsn/jadwal') ?>" class="dropdown-item">Jadwal Mengajar</a></li>
                    <li><a href="<?= base_url('dsn/AbsenKelas') ?>" class="dropdown-item">Absen Kelas</a></li>
                    <li><a href="<?= base_url('dsn/Nilai') ?>" class="dropdown-item">Nilai Perkuliahan</a></li>
                    <!-- Level two dropdown-->
                    <!-- End Level two -->
                </ul>
            </li>
        <?php } ?>

        </ul>




        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <?php if (session()->get('username') == "") { ?>
                    <a href="<?= base_url('auth') ?>" class="nav-link"><i class="fas fa-sign-in-alt">Login</i></a>
                <?php } else { ?>
            </li>
            <!-- Messages Dropdown Menu
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-comments"></i> 
        <span class="badge badge-danger navbar-badge">3</span>
        </a> -->
            <!-- LOGIN -->




            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                </li>
                <a href="#" class="dropdown-item"> -->
                    <!-- Message Start -->
                    <div class="media">
                        <img src="<?= base_url('foto/' . session()->get('foto'))  ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="<?= base_url('foto/' . session()->get('foto'))  ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="<?= base_url('foto/' . session()->get('foto'))  ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
            </li>
            <!-- Notifications Dropdown Menu 
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i> 
        <span class="badge badge-warning navbar-badge">15</span>
        </a> 
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div> -->
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <?php if (session()->get('level') == 1) { ?>
                        <img src="<?= base_url('foto/' . session()->get('foto'))  ?>" class="user-image img-circle elevation-2" alt="User Image">
                    <?php } elseif (session()->get('level') == 2) { ?>
                        <img src="<?= base_url('fotomahasiswa/' . session()->get('foto'))  ?>" class="user-image img-circle elevation-2" alt="User Image">
                    <?php } else { ?>
                        <img src="<?= base_url('fotodosen/' . session()->get('foto'))  ?>" class="user-image img-circle elevation-2" alt="User Image">
                    <?php } ?>
                    <span class="d-none d-md-inline"><?= session()->get('nama') ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <?php if (session()->get('level') == 1) { ?>
                            <img src="<?= base_url('foto/' . session()->get('foto'))  ?>" class="user-image img-circle elevation-2" alt="User Image">
                        <?php } elseif (session()->get('level') == 2) { ?>
                            <img src="<?= base_url('fotomahasiswa/' . session()->get('foto'))  ?>" class="user-image img-circle elevation-2" alt="User Image">
                        <?php } else { ?>
                            <img src="<?= base_url('fotodosen/' . session()->get('foto'))  ?>" class="user-image img-circle elevation-2" alt="User Image">
                        <?php } ?>

                        <p>
                        <?= session()->get('nama') ?> - <?php if (session()->get('level') == 1) {
                                                                echo 'Admin';
                                                            } elseif (session()->get('level') == 2) {
                                                                echo session()->get('username'); //untuk menampilkan nim di profil mahasiswa
                                                            } elseif (session()->get('level') == 3) {
                                                                echo 'Dosen';
                                                            }  ?>
                            <small><?= date('d M Y') ?></small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat float-right">Sign out</a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>

    </nav>



    <!-- /.navbar -->

    <!-- SEARCH FORM 
    <form class="form-inline ml-0 ml-md-3">
        <div class="input-group input-group-sm"> 
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div> 
        </div> 
    </form> 
</div> -->

    <?php } ?>


    </div>
    </nav>
    <!-- /.navbar -->





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!--    <h1 class="m-0 text-dark"> Top Navigation <small>Example 3.0</small></h1> -->
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!--    <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Top Navigation</li> -->
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
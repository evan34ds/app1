<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/template/bootstrap/css/style.css" rel="stylesheet">
    <title>Hello, world!</title>

    <style>
        /* bacground awal */
        #background {
            background-color: lightblue;
        }

        /* bacground akhir */

        .container {
            display: grid;
            background: #ffffff;

        }

        #row1 {

            height: 40px;
            background: #1dd1a1;
            align-items: center;
            text-align: start;

        }

        #row2 {
            background: #ffffff;
            top: 50px;
        }

        #row2 marquee {
            width: 99.5%;
            height: 30px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            border-style: solid;
            border-color: #efefef;
            line-height: 24px;
            padding-top: 0px;
            padding-right: 0px;
        }




        #row1 a {
            background: #feca57;
            height: 40px;
            width: 150px;
            left: 1000%;
            background-clip: content-box;
        }


        #header {
            background: #34495e;
            text-align: center;
        }

        #header img {
            position: inherit;
            right: 14px;
            width: 102.5%;
            height: 120px;

        }

        #header h1 {
            margin: 0;
            line-height: 100px;
        }

        #navbar1 {
            padding-top: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            padding-right: 0px;
            background: #1dd1a1;
        }

        #navbar nav.navbar.navbar-expand-lg.navbar-light.bg-light {
            background-color: #1dd1a1;
        }

        .main {
            position: absolute;
            transform: translateX(20%) translateY(50%);
            right: 693px;
            left: 50%;

        }

        #main2 {
            box-shadow: 10px 10px 5px lightblue inset;
            ;
        }

        .list-group {
            margin-top: 1px;
        }

        #carouselExampleFade {
            padding-top: 10px;
        }

        /* Batas atas left sidebar */

        #left-sidebar {
            height: 1200px;
            width: 100%;
            background: #ecf0f1;
        }

        #left-sidebar h5 {
            padding-left: 1px;
            width: 100%;
            font-size: 100%;
            height: 20px;
        }

        #left-sidebar .list-group-item-primary {
            margin-top: 10px;
            padding-top: 5px;
            padding-left: 20px;
            padding-right: 20px;
            background: #1dd1a1;
        }

        #left-sidebar .list-group-item {

            padding-top: 1px;
            padding-bottom: 1px;
            margin-bottom: 1px;
            bottom: -1;
            bottom: -10;
            margin-top: 2px;

        }



        .scroll {
            display: block;
            padding: 2px;
            margin-top: 5px;
            width: 100%;
            height: 250px;
            overflow: scroll;
            overflow-x: hidden;
        }

        /* Batas bawah left sidebar */

        /* Batas atas main content */
        #main-content {
            height: 1200px;
            width: 100%;
            background: #ecf0f1;
        }

        #main-content .list-group-item-primary {
            margin-top: 10px;
            padding-top: 5px;
            padding-left: 20px;
            padding-right: 20px;
            background: #1dd1a1;
        }

        #main-content .card-body {
            padding-top: 1px;
            padding-left: 2px;
            padding-right: 2px;
        }

        #main-content .card-text {
            margin-bottom: 10px;
        }

        #main-content .row {
            background: #ffffff;
            margin-top: 5px;
            margin-bottom: 5px;
            height: 220px;
        }

        #main-content .card-title {
            margin-top: 9px;
            margin-left: 21px;

        }

        #main-content .img-thumbnail {
            padding-left: 1px;
            padding-right: 2px;

        }

        #main-content .img-thumbnail:hover {
            -ms-transform: scale(1.5);
            /* IE 9 */
            -webkit-transform: scale(1.5);
            /* Safari 3-8 */
            transform: scale(1.5);

        }

        #main-content h5 {
            padding-left: 1px;
            width: 100%;
            font-size: 100%;
            height: 20px;

        }



        #main-content .btn {
            padding-top: 1px;
            padding-bottom: 1px;
            font-size: 12px;
        }

        /* Batas bawah main content */

        /* Batas atas right sidebar */
        #right-sidebar {
            height: 1200px;
            width: 100%;
            background: #ecf0f1;
        }

        #right-sidebar input.form-control.mr-sm-2 {
            width: 200px;
        }

        #right-sidebar .form-inline {
            margin-top: 10px;

        }

        #right-sidebar .menugrup {
            margin-top: 9px;
            border: 1px;
        }

        #right-sidebar .tab-content {
            border-style: none;
            background-color: #ffffff;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #right-sidebar .nav-item.nav-link {
            color: #000000;
            font-family: Droid Serif;


        }

        /* Batas bawah right sidebar */

        /* berita*/

        h6.card-title {
            padding-right: 10px;
        }

        /* Batas bawah berita */

        /* Batas atas footer */
        #footer {
            background: #1dd1a1;
            width: 1200px;
            padding-left: 10px;

        }


        /* Batas bawah footer */

        /* Responsif Breakpoint */
        @media (max-width:1024px) {}

        @media (max-width:767px) {
            .col-sm-6 {
                width: 66.66%;
            }

            #header img {
                position: inherit;
                right: 14px;
                width: 102.5%;
                height: 120px;
                border-radius: 20px;
            }

            #main-content {
                height: 400px;
                width: 20%;
                background: #ecf0f1;
            }

            #left-sidebar h5 {
                font-size: 11px;
                text-align: left;
            }

            #left-sidebar h6 {
                font-size: 10px;
            }

            #left-sidebar small.text-muted {
                font-size: 7px;
            }

            #right-sidebar input.form-control.mr-sm-2 {
                font-size: 8px;
                height: 20px;
                width: 90px;

            }

            #right-sidebar button.btn.btn-outline-success.my-2.my-sm-0 {
                font-size: 8px;
                width: 50px;
                height: 20px;
                line-height: 0px;
            }

            #right-sidebar .form-inline {
                margin-top: 8px;
            }

        }

        @media (max-width: 575px) {
            #left-sidebar {
                width: 100%;
                height: 400px;
                top: 25rem;
                background: #dac52c;
            }


            #main-content {
                height: 400px;
                width: 100%;
                bottom: 25rem;
                background: burlywood;
            }
        }

        @import url(https://fonts.googleapis.com/css2?family=Droid+Serif:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap);
    </style>
</head>




<body id="background">
    <div id="con1" class="container">
        <div id="row1" class="row">
            <a> &nbsp; <?php
                        echo date_indo('d-m-Y'); // Hasilnya menampilkan format tanggal hari ini 
                        ?> </a>
        </div>



    </div>
    <div class="container">
        <div class="row">
            <div id="header" class="col-sm-12">
                <img src="<?= base_url() ?>/corousel/header.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar1">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">HOME<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">KERJASAMA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">AKADEMIK</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">LAYANAN</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('slider') ?>" class="dropdown-item">DOSEN</a></li>
                                <!-- Level two dropdown-->
                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">MAHASISWA</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="#" class="dropdown-item">Feeder PDDIKTI</a>
                                        </li>

                                        <!-- Level three dropdown-->
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="<?= base_url('auth') ?>" class="dropdown-item">Sistem Informasi Akademik</a>
                                    </ul>
                                </li>
                                <!-- End Level three -->


                            </ul>
                        </li>
                    </ul>
                    </li>

                </div>
            </nav>
        </div>
    </div>
    <div id="con1" class="container">
        <div id="row2" class="row">
            &nbsp;<marquee>Selamat datang di Website Sekolah Tinggi Agama Kristen Luwuk Banggai "www.stak-luwuk banggai.com"</marquee>
        </div>
    </div>
    <div class="container">
        <div id="main2" class="row">
            <div id="left-sidebar" class="col-sm-3">
                <div class="list-group">
                    <a class="list-group-item-primary">
                        <div class="d-flex w-100 justify-content-sm-start">
                            <h5 class="mb-1">PENGUMUMAN</h5>
                        </div>
                    </a>
                    <div class="scroll">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                    </div>
                </div>
                <div class="list-group">
                    <a class="list-group-item-primary">
                        <div class="d-flex w-100 justify-content-sm-start">
                            <h5 class="mb-1">AGENDA KEGIATAN</h5>
                        </div>
                    </a>
                    <div class="scroll">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">List group item heading</h5>
                            </div>
                            <small class="text-muted">3 days ago</small>
                        </a>
                    </div>
                </div>
            </div>
            <div id="main-content" class="col-sm-5">

                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators" style="height: 10px;">
                        <?php foreach ($slider as $key => $value) : ?>
                            <?php if ($key == 0) : ?>
                                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="<?= $key ?>" class="active" aria-current="true" aria-label="Slide 1" style="height: 3px;"></button>
                            <?php else : ?>
                                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="<?= $key ?>" aria-label="Slide 2"></button>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="carousel-inner" style="height: 200px;">
                        <?php foreach ($slider as $key => $value) : ?>
                            <?php if ($key == 0) : ?>
                                <div class="carousel-item active">
                                    <img src="<?= base_url() ?>/corousel/<?= $value['foto'] ?>" class="d-block w-100" width="200" height="200" alt="">
                                </div>
                            <?php else : ?>

                                <div class="carousel-item">
                                    <img src="<?= base_url() ?>/corousel/<?= $value['foto'] ?>" class="d-block w-100" width="200" height="200" alt="">
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev" style="height: 10rem;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next" style="height: 10rem;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="list-group">
                    <a class="list-group-item-primary">
                        <div class="d-flex w-100 justify-content-sm-start">
                            <h5 class="mb-1">BERITA TERKINI</h5>
                        </div>
                    </a>
                    <div class="col" data-aos="zoom-in" data-aos-delay="100">
                        <?php
                        $nomor = 1 + (($noHalaman - 1) * 3);
                        foreach ($berita as $data) :
                        ?>

                            <div class="row g-0">
                                <h6 class="card-title">

                                    <b><?= $data['judul_berita'] ?></b>

                                </h6>
                                <div class="col-md-4">
                                    <img src="<?= base_url('img/berita/thumb/' . $data['gambar']) ?>" class="img-thumbnail" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text"><?= substr(strip_tags($data['isi']), 0, 100) ?>...</p>
                                        <a href="<?= base_url('home/detail_berita/' . $data['slug_berita']) ?>" class="btn btn-primary stretched-link">Read More</a>
                                        <p class="card-text"><small class="text-muted"><i class="bi bi-person-circle"></i>Post by <?= $data['nama_user'] ?> | <?= date_indo($data['tgl_berita']) ?> | <?= $data['nama_kategori'] ?> </small></p>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>

                    <?= $pager->links('berita', 'bootstrap_template') ?>
                </div>






            </div>
            <div id="right-sidebar" class="col-sm-4">
                <?= form_open('home/beranda') ?>
                <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="<?= $cari ?>" placeholder="Cari Berita" name='cariberita' aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append" autofocus>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="tombolcariberita">Cari</button>
                    </div>
                </div>
                <?= form_close(); ?>
                <div class="menugrup">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dosen</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Tautan External</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <h6 class="text-uppercase font-weight-bold">Daftar Dosen</h6>
                            <hr class="">
                            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php foreach ($dosen as $key => $value) : ?>
                                        <?php if ($key == 0) : ?>
                                            <div class="carousel-item active" data-bs-interval="10000" style="height: 41rem;   height: 400px;border-style: solid; width: 330px;">
                                                <img src="<?= base_url('fotodosen/' . $value['foto_dosen']) ?>" class="rounded float-end w-100" width="300" height="355" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <p class="mb-20" style=" margin-top: 267px; margin-left: -40px; text-align: center; margin-right: -40px; color:#000000;"><?= $value['nama_dosen'] ?></p>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="carousel-item" data-bs-interval="20000" style="height: 41rem;   height: 400px;border-style: solid; width: 330px;">
                                                <img src="<?= base_url('fotodosen/' . $value['foto_dosen']) ?>" class="rounded float-end w-100" width="300" height="355" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <p class="mb-20" style=" margin-top: 267px; margin-left: -40px; text-align: center; margin-right: -40px; color:#000000;"><?= $value['nama_dosen'] ?></p>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev" style="height: 20rem;">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" style="height: 20rem;">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h6 class="text-uppercase font-weight-bold">Tautan External</h6>
                            <hr class="">
                            <a href="https://pddikti.kemdikbud.go.id/">
                                <img src="<?= base_url() ?>/tautanexternal/pddikti-forlap-logo.png" alt="" style="height:100px; width=200px;">
                            </a>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="col">

                                <!-- Links -->
                                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                                <hr class="">
                                <p>
                                    <i class="fas fa-home mr-3"></i> New York, NY 10012, US
                                </p>
                                <p>
                                    <i class="fas fa-envelope mr-3"></i> info@example.com
                                </p>
                                <p>
                                    <i class="fas fa-phone mr-3"></i> + 01 234 567 88
                                </p>
                                <p>
                                    <i class="fas fa-print mr-3"></i> + 01 234 567 89
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="footer">
        <!-- Footer -->
        <!-- Footer -->
        <footer class="page-footer font-small teal pt-3">

            <!-- Footer Text -->
            <div class="container-fluid text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">

                        <!-- Content -->
                        <h5 class="text-uppercase font-weight-bold">Footer text 1</h5>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
                            repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
                            harum esse fugiat. Itaque, culpa?</p>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                    <div class="col-md-6 mb-md-0 mb-3">

                        <!-- Content -->
                        <h5 class="text-uppercase font-weight-bold">Footer text 2</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum
                            commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id
                            excepturi hic.</p>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Text -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="/"> MDBootstrap.com</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>


</html>
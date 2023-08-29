<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style type="text/css">
        .carousel-inner {
            width: 100%;
            max-height: 100% !important;
        }

        .carousel-caption123 {
            width: 100%;
            color: black;
        }

        .nav {
            margin: 3px;

        }
    </style>
</head>


<body>
    <div class="p-3 mb-2 bg-light text-white">
        <div class="container-fluid">
            <div class="container-sm p-3 mb-2 bg-light shadow">
                <div class="row ">
                    <div class="nav-scroller sticky-top mb-2" style="height: 50px;" id="navbarToggleExternalContent">
                        <!-- sticky-top membuat header melayang tetap ada -->
                        <nav class="navbar navbar-expand-lg navbar-dark justify-content-between align-items-center" style="background-color: #813a00;">
                            <a class="navbar-brand" href="#">NAVBAR</a>
                            <button class="navbar-toggler  text-white " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" >
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse  text-white nav-scroller justify-content-center" id="navbarNavDropdown">

                                <ul class="nav justify-content-center text-uppercase justify-content-center">
                                    <li class="nav-item">
                                        <a class="navbar-brand" href="#">
                                            <h6>Active</h6>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="navbar-brand" href="#">
                                            <h6>Link</h6>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="navbar-brand dropdown" href="#"  id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <h6>Link</h6>
                                        </a>
                                        <ul class="dropdown-menu text-capitalize" aria-labelledby="navbarScrollingDropdown" >
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="navbar-brand">
                                            <h6>Disabled</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="w-100"></div>
                    <!-- HEADER -->
                    <div class="container">
                        <img src="<?= base_url() ?>/corousel/header.jpg" alt="" width="100%" height="100%">
                    </div>
                    <div class="w-100"></div>
                    <div class="container col py-1">
                        <div class="navbar bg-white text-dark">
                            <marquee>Selamat datang di Website Sekolah Tinggi Agama Kristen Luwuk Banggai "www.stak-luwukbanggai.com"</marquee>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <!-- kiri -->
                    <div class=" container col col-lg-2">
                        <ul class="list-group overflow-auto">
                            <li class="list-group-item active" aria-current="true">An active item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                            <li class="list-group-item">A fourth item</li>
                            <li class="list-group-item">And a fifth one</li>
                        </ul>
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">An active item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                            <li class="list-group-item">A fourth item</li>
                            <li class="list-group-item">And a fifth one</li>
                        </ul>
                    </div>
                    <!-- kolom tengah -->
                    <div class="col">
                        <!-- corousall -->
                        <div class="col" style="height: 12.5rem;">
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
                        </div>
                        <div class="col">
                            <div class="col py-1">
                            </div>
                            <div class="navbar bg-primary py-1">
                                <div class="col">
                                    <b>Berita Terkini</b>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('home/semua_berita') ?>" class="btn btn-primary stretched-link"><b>Arsip</b></a>
                                </div>
                            </div>
                            <div class="col py-1">
                            </div>
                            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                                <?php
                                foreach ($berita as $data) :
                                ?>
                                    <div class="card mb-1" style="max-width: 600px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="<?= base_url('img/berita/thumb/' . $data['gambar']) ?>" class="img-thumbnail" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="card-title"><b><?= $data['judul_berita'] ?></b></h6>
                                                    <p class="card-text"><?= substr(strip_tags($data['isi']), 0, 100) ?>...</p>
                                                    <a href="<?= base_url('home/detail_berita/' . $data['slug_berita']) ?>" class="btn btn-primary stretched-link">Read More</a>
                                                    <p class="card-text"><small class="text-muted"><i class="bi bi-person-circle"></i>Post by <?= $data['nama_user'] ?> | <?= date_indo($data['tgl_berita']) ?> | <?= $data['nama_kategori'] ?> </small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                 
                            </div>
                        </div>

                    </div>
                    <!-- kanan -->
                    <div class="container col col-4">
                        <ul class="list-group  border border-1">
                            <li class="list-group-item active" aria-current="true">Info Loker</li>
                            <div class="row">
                                <div class="col-sm-6 p-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 p-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <p></p>
                        <ul class="container list-group  border border-1">
                            <li class="list-group-item active" aria-current="true">Dosen</li>
                            <div class="row">
                                <div class="col-sm-12 p-4 center">
                                    <div class="card" style="height: 25rem;">
                                        <div class="card-body">
                                            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php foreach ($dosen as $key => $value) : ?>
                                                        <?php if ($key == 0) : ?>
                                                            <div class="carousel-item active" data-bs-interval="10000" style="height: 41rem;">
                                                                <img src="<?= base_url('fotodosen/' . $value['foto_dosen']) ?>" class="rounded float-end w-100" width="300" height="355" alt="...">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <p class="mb-20" style="color:black"><?= $value['nama_dosen'] ?></p>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="carousel-item" data-bs-interval="20000" style="height: 41rem;">
                                                                <img src="<?= base_url('fotodosen/' . $value['foto_dosen']) ?>" class="rounded float-end w-100" width="300" height="355" alt="...">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <p class="mb-20" style="color:black" style="height: 50px;"><?= $value['nama_dosen'] ?></p>
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
                                    </div>
                                </div>
                            </div>
                        </ul>

                    </div>
                    <div class="w-100"></div>

                    <div class="col">
                        <div class="bg-dark text-center py-2">STAK-LUWUK BANGGAI</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
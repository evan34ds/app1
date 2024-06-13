<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">STAK-LUWUK BANGGAI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="active">Home</a></li>

          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.html">About</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>

              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="blog.html">Blog</a></li>

          <li><a href="contact.html">Contact</a></li>
          <li><a href="index.html" class="getstarted">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators">
        <?php foreach ($slider as $key => $value) : ?>
          <?php if ($key == 0) : ?>
            <data-target="#heroCarousel" data-slide-to="<?= $key ?>">
            <?php endif ?>
          <?php endforeach ?>
      </ol>
      <div class="carousel-inner" role="listbox">
        <?php foreach ($slider as $key => $value) : ?>
          <?php if ($key == 0) : ?>
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(<?= base_url() ?>/corousel/<?= $value['foto'] ?>">
              <div class="carousel-container">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">Selamat Datang </h2>
                  <h2 class="animate__animated animate__fadeInDown">SEKOLAH TINGGI AGAMA KRISTEN LUWUK BANGGAI</h2>
                  <p class="animate__animated animate__fadeInUp">Sekolah Tinggi Agama Kristen Luwuk Banggai (STAK-Luwuk Banggai) merupakan salah satu Perguruan Tinggi Agama Kristen Swasta yang dibawah naungan Yayasan Pendidikan Sekolah – Sekolah Kristen GKLB (YPSK – GKLB).</p>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          <?php else : ?>

            <div class="carousel-item" style="background-image: url(<?= base_url() ?>/corousel/<?= $value['foto'] ?>">
              <div class="carousel-container">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                  <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>

          <?php endif ?>
        <?php endforeach ?>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <h3>Foto Ketua</h3>
            <h3></h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <div class="section-title">
              <h2>Sambutan</h2>
              <p>Ketua STAK-LUWUK BANGGAI</p>
            </div>
            <td valign="top" style="padding-right: 20px;">
              <p class="fst-italic">
                SELAMAT DATANG

                Sekolah Tinggi Agama Kristen Luwuk Banggai merupakan
                salah satu Perguruan Tinggi Agama Kristen Swasta yang dibawah naungan Yayasan Pendidikan
                Sekolah – Sekolah Kristen GKLB (YPSK – GKLB) di indonesia yang berbentuk Sekolah Tinggi,
                dikelola oleh Kementerian Agama dan termasuk kedalam kopertis wilayah Ditjen Bimas Kristen.
                Kampus ini telah beridiri sejak 08 Agustus 2015 dengan Nomor SK PT Dj.III/Kep/HK.00.5/724/2014 dan
                Tanggal SK PT 31 Desember 2014 , Sekolah Tinggi ini beralamat di Jln. Tg. Jepara No 54 Kelurahan Karaton,
                Luwuk Kabupaten Banggai Provinsi Sulawesi Tengah, Indonesia. </p>

            </td>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box">

              <i class="bi bi-people-fill" style="font-size: 100px;"></i>
              <b>
                <p class="na"><?= $jml_mhs ?>
                <p>
              </b>
              <b>
                <p class="na">Mahasiswa</p>
              </b>
              <i class="bi bi-mortarboard" style="font-size: 100px;"></i>
              <b>
                <p class="na"><?= $jml_mhs - 1 ?>
                <p>
              </b>
              <b class="na">Lulusan</b>

            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box">

              <i class="bi bi-people-fill" style="font-size: 100px;"></i>
              <b>
                <p class="na"><?= $jml_dosen ?>
                <p>
              </b>
              <b>
                <p class="na">Dosen</p>
              </b>
              <i class="bi bi-people-fill" style="font-size: 100px;"></i>
              <b>
                <p class="na"><?= $jml_dosen - 2 ?>
                <p>
              </b>
              <b class="na">Doktor</b>

            </div>
          </div>


          <div class="col-lg-4 col-md-6">
            <div class="box">

              <i class="bi bi-columns-gap" style="font-size: 100px;"></i>
              <b>
                <p class="na"><?= $jml_prodi ?>
                <p>
              </b>
              <b>
                <p class="na">Program Studi</p>
              </b>
              <i class="bi bi-people-fill" style="font-size: 100px;"></i>
              <b>
                <p class="na"><?= $jml_prodi + 3 ?>
                <p>
              </b>
              <b class="na">Tenaga Kependidikan</b>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Pricing Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Berita</h2>
          <p>STAK-LUWUK BANGGAI</p>
        </div>
        <div class="row">
          <?php
          foreach ($berita as $data) :
          ?>
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="<?= base_url('/img/berita/thumb/' . $data['gambar']) ?>" class="img-fluid" alt="..."></div>
                <div class="member-info">
                  <h4><a href="<?= base_url('home/detail_berita/' . $data['slug_berita']) ?>"><?= $data['judul_berita'] ?></a></h4>
                  <p><?= substr(strip_tags($data['isi']), 0, 100) ?>..</p>
                  <a href="<?= base_url('home/detail_berita/' . $data['slug_berita']) ?>" class="btn btn-primary btn-sm">Read More</a>
                  <p class="card-text"><small class="text-muted"><i class="bi bi-person-circle"></i>Post by <?= $data['nama_user'] ?> | <?= date_indo($data['tgl_berita']) ?> | <?= $data['nama_kategori'] ?> </small></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <p></p>
        <div class="col-lg-12 d-flex justify-content-center"><a href="<?= base_url('home/semua_berita') ?>"> <button class="btn btn-block btn-outline-dark btn-lg">Selengkapnya</button></a></div>
      </div>
    </section><!-- End Team Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Pengumuman</h2>
          <p>STAK-LUWUK BANGGAI</p>
        </div>
        <div class="row">
          <?php foreach ($berita as $key => $data) : ?>
            <?php if ($key == 0) : ?>
              <div class="col-md-12">
                <div class="icon-box">
                  <i class="bi bi-file-earmark-pdf-fill"></i>
                  <h4><a href="#"><?= $data['judul_berita'] ?></a></h4>
                  <p><?= date_indo($data['tgl_berita']) ?></p>
                </div>
              </div>
            <?php else : ?>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                  <i class="bi bi-file-earmark-pdf-fill"></i>
                  <h4><a href="#"><?= $data['judul_berita'] ?></a></h4>
                  <p><?= date_indo($data['tgl_berita']) ?></p>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-center">
          <a href="<?= base_url('home/semua_berita') ?>">
            <button class="btn btn-block btn-outline-dark btn-lg">Selengkapnya</button>
          </a>
        </div>
      </div>
    </section><!-- End Services Section -->

   <!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title">
      <h2>Galeri</h2>
      <p>STAK-LUWUK BANGGAI</p>
    </div>

    <div class="row portfolio-container">
      <?php foreach ($slider as $data) : ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="<?= base_url() ?>/corousel/<?= $data['foto'] ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?= $data['judul'] ?></h4>
              <div class="portfolio-links">
                <a href="<?= base_url() ?>/corousel/<?= $data['foto'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $data['judul'] ?>"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
</section><!-- End Portfolio Section -->


    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">
        <div class="row">
          

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url() ?>/template/sailor/assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url() ?>/template/sailor/assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url() ?>/template/sailor/assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url() ?>/template/sailor/assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url() ?>/template/sailor/assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url() ?>/template/sailor/assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Sailor</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>


    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sailor</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
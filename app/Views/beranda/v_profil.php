

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
          foreach ($listberita as $data) :
          ?>
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="<?= base_url('/img/berita/thumb/' . $data['gambar']) ?>" class="img-fluid" alt="..."></div>
                <div class="member-info">
                  <h4><a href="<?= base_url('home/detail_berita1/' . $data['slug_berita']) ?>"><?= $data['judul_berita'] ?></a></h4>
                  <p><?= substr(strip_tags($data['isi']), 0, 100) ?>..</p>
                  <a href="<?= base_url('home/uraian_berita/' . $data['slug_berita']) ?>" class="btn btn-primary btn-sm">Read More</a>
                  <p class="card-text"><small class="text-muted"><i class="bi bi-person-circle"></i>Post by <?= $data['nama_user'] ?> | <?= date_indo($data['tgl_berita']) ?> | <?= $data['nama_kategori'] ?> </small></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <p></p>
        <div class="col-lg-12 d-flex justify-content-center"><a href="<?= base_url('home/berita_selengkapnya') ?>"> <button class="btn btn-block btn-outline-dark btn-lg">Selengkapnya</button></a></div>
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
          <?php foreach ($pengumuman as $key => $data) : ?>
            <?php if ($key == 0) : ?>
              <div class="col-md-12">
                <div class="icon-box">
                  <i class="bi bi-file-earmark-pdf-fill"></i>
                  <h4><a href="<?= base_url('home/viewPdf/' . $data['pdf']) ?>"><?= $data['judul_pengumuman'] ?></a></h4>
                  <p><?= date_indo($data['tgl_pengumuman']) ?></p>
                </div>
              </div>
            <?php else : ?>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                  <i class="bi bi-file-earmark-pdf-fill"></i>
                  <h4><a href="<?= base_url('home/viewPdf/' . $data['pdf']) ?>" target="_blank"><?= $data['judul_pengumuman'] ?></a></h4>
                  <p><?= date_indo($data['tgl_pengumuman']) ?></p>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-center">
          <a href="<?= base_url('home/pengumuman_selengkapnya') ?>">
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
          <a href="<?= base_url() ?>/auth"> <img src="<?= base_url() ?>/template/sailor/assets/img/clients/siakad.png" class="img-fluid" alt=""></a>
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

  
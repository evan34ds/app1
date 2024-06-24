<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?= $title ?></h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="blog.html"><?= $title ?></a></li>
          <li>Uraian</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Single Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <div class="entry-img">
              <img src="<?= base_url('/img/berita/thumb/' .  $berita->gambar) ?>" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="blog-single.html"><?= $berita->judul_berita ?></a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $berita->nama_user ?></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?= $berita->tgl_berita ?></time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html"><?= $berita->nama_kategori ?></a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                <?= $berita->isi ?>
              </p>
            </div>

            <div class="entry-footer">
              <p><i class="bi bi-bar-chart"></i> Post View 120</p>
              <h1>
                <div class="social-links">

                  <div class="btn btn-outline-danger"><a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a></div>
                  <div class="btn btn-outline-danger"><a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a></div>
                  <div class="btn btn-outline-danger"><a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a></div>

                </div>
              </h1>

            </div>

          </article><!-- End blog entry -->
        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

          <h3 class="sidebar-title">Search</h3>
            <?= form_open('home/berita_selengkapnya') ?>
            <?= csrf_field() ?>
            <div class="input-group mb-3">
              <input type="text" class="form-control" value="<?= $cari ?>" placeholder="Cari Berita" name='cariberita' aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append" autofocus>
                <button class="btn btn-outline-danger" type="submit" id="button-addon2" name="tombolcariberita"><i class="bi bi-search"></i></button>
              </div>
            </div>
            <?= form_close(); ?>


            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul>
                <?php
                $db      = \Config\Database::connect();
                foreach ($kategori as $data) :

                  $jumlah = $db->table('tbl_berita')
                    ->where('kategori_id', $data['kategori_id'])
                    ->where('status', 'published')
                    ->countAllResults();
                ?>
                  <li><a href="<?= base_url('home/berita_kategori/' . $data['kategori_id']) ?>"><?= $data['nama_kategori'] ?><span>(<?= $jumlah ?>)</span></a></li>
                <?php endforeach; ?>
              </ul>
            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
            <?php
            
                foreach ($listberita as $data) : ?>
              <div class="post-item clearfix">
                <img src="<?= base_url('img/berita/thumb/' . $data['gambar']) ?>" alt="">
                <h4><a href="<?= base_url('home/uraian_berita/' . $data['slug_berita']) ?>"><?= $data['judul_berita'] ?></a></h4>
                <time datetime="01-01-2020"><?= $data['tgl_berita'] ?></time>
              </div>
              <?php endforeach; ?>
            </div><!-- End sidebar recent posts-->

            <h3 class="sidebar-title">Recent Comments</h3>
            <div class="sidebar-item tags">
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div><!-- End sidebar tags-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Single Section -->

</main><!-- End #main -->
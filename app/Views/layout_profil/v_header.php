<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">STAK-LUWUK BANGGAI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= base_url('home/profil') ?>" class="active">Home</a></li>

          <li class="dropdown"><a href=""><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="dropdown-item" href="about.html">About</a></li>
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
          <li><a href="services.html">Akademik</a></li>
          <li><a href="portfolio.html">Kerjasama</a></li>

          <li><a href="<?= base_url('home/kontak') ?>">Kontak</a></li>
          <li class="dropdown">
            <a href=""><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul style="list-style-type: none; margin: 0; padding: 0; display: flex;">
              <li style="margin-left: 10px;"><a class="dropdown-item" href="about.html">About</a></li>
              <li style="margin-left: 10px;"><a href="team.html">Team</a></li>
              <li style="margin-left: 10px;"><a href="testimonials.html">Testimonials</a></li>
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
@extends('layout_pub.main')
@section('content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center">

      <h2>Informasi KUR</h2>
      <ol>
        <li><a href="#">Akses Keuangan</a></li>
        <li><a href="#">KUR</a></li>
        <li>Informasi KUR</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row g-5">

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-5 posts-list">
            <div class="col-lg-12">
              <article class="d-flex flex-column">

                <div class="row gy-12" data-aos="fade-up">
                  <img src="{{ env('APP_URL') }}{{ $profile->path_image }}" class="img-fluid" alt="">
                </div>
                <div class="content">
                  <p>
                    {{ $profile->paragrafh_1 }}
                  </p>
                  <p>
                    {{ $profile->paragrafh_2 }}
                  </p>
                  <p>
                    {{ $profile->paragrafh_3 }}
                  </p>
                </div>
              </article>
            </div><!-- End post list item -->

          </div><!-- End blog posts list -->
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
          <div class="sidebar ps-lg-4">

            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Pintasan</h3>
              <ul class="mt-3">
                 <li><a href="#">> Informasi KUR</a></li>
                 <li><a href="#">> Pengajuan KUR</a></li>
                 <li><a href="#">> Informasi K/PMR</a></li>
                 <li><a href="#">> Pengajuan K/PMR</a></li>
                 <li><a href="#">> Pengajuan Pinjaman</a></li>
                 <li><a href="#">> Pembukaan Rekening</a></li>
                 <li><a href="#">> Bank Terdekat</a></li>
                 <li><a href="#">> Cek Pengajuan</a></li> 
              </ul>
            </div><!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
              <!-- <h3 class="sidebar-title">Recent Posts</h3> -->

              <div class="mt-3">

                <div class="post-item mt-12">
                  <div class="row gy-12" data-aos="fade-up">
                    <img src="assets/img/pintasan1.jpeg" style="height: 80px; width: 300px;" class="img-fluid" alt="">
                  </div>
                  <br>
                  <div class="row gy-12" data-aos="fade-up">
                    <img src="assets/img/pintasan2.jpg" style="height: 80px; width: 300px;" class="img-fluid" alt="">
                  </div>
                </div><!-- End recent post item-->

              </div>
            </div><!-- End sidebar recent posts-->
          </div><!-- End Blog Sidebar -->
        </div>

      </div>

    </div>
  </section><!-- End Blog Section -->
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h3>Bank Penyalur KUR</h3>
        <p>Provinsi Kalimantan Tengah</p>
      </div>
      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
        data-portfolio-sort="original-order">

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/bank/Bank BRI.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Rakyat Indonesia</h4>
              <a href="assets/img/bank/Bank BRI.png" title="Bank Rakyat Indonesia" data-gallery="portfolio-gallery-app"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://bri.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <img src="assets/img/bank/Mandiri.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Mandiri</h4>
              <a href="assets/img/bank/Mandiri.png" title="Bank Mandiri" data-gallery="portfolio-gallery-product"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://bankmandiri.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-branding">
            <img src="assets/img/bank/BNI.png" class="img-fluid"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Negara Indonesia</h4>
              <a href="assets/img/bank/BNI.png" title="Bank Negara Indonesia" data-gallery="portfolio-gallery-branding"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://www.bni.co.id/id-id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/bank/BTN.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Tabungan Negara</h4>
              <a href="assets/img/bank/BTN.png" title="Bank Tabungan Negara" data-gallery="portfolio-gallery-app"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://www.btn.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <img src="assets/img/bank/BCA.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Central Asia</h4>
              <a href="assets/img/bank/BCA.png" title="Bank Central Asia" data-gallery="portfolio-gallery-product"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://www.bca.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-branding">
            <img src="assets/img/bank/Sinarmas.png" class="img-fluid"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Sinarmas</h4>
              <a href="assets/img/bank/Sinarmas.png" title="Bank Sinarmas" data-gallery="portfolio-gallery-branding"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://www.banksinarmas.com/id/personal" target="_blank" rel="noopener noreferrer"
                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/bank/BTPN.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Tabungan Pensiun Negara</h4>
              <a href="assets/img/bank/BTPN.png" title="Bank Tabungan Pensiun Negara"
                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://www.btpn.com/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <img src="assets/img/bank/BSI.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Syariah Indonesia</h4>
              <a href="assets/img/bank/BSI.png" title="Bank Syariah Indonesia" data-gallery="portfolio-gallery-product"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://www.bankbsi.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-branding">
            <img src="assets/img/bank/Mandiri_Taspen.png" class="img-fluid"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Mandiri Taspen</h4>
              <a href="assets/img/bank/Mandiri_Taspen.png" title="Bank Mandiri Taspen"
                data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                  class="bi bi-zoom-in"></i></a>
              <a href="https://www.bankmantap.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-5 col-md-6 portfolio-item filter-app">
            <img src="assets/img/bank/Nobu.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>National Bank Nobu</h4>
              <a href="assets/img/bank/Nobu.png" title="National Bank Nobu" data-gallery="portfolio-gallery-app"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://www.nobubank.com/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <img src="assets/img/bank/Bank_Kalteng.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Kalteng</h4>
              <a href="assets/img/bank/Bank_Kalteng.png" title="Bank Kalteng" data-gallery="portfolio-gallery-product"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="https://www.bankkalteng.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->


        </div><!-- End Portfolio Container -->

      </div>

    </div>
  </section><!-- End Portfolio Section -->

</main><!-- End #main -->

@endsection
@extends('layout_pub.main')
@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('{{ env('APP_URL') }}assets/img/blog-header.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center">

      <h2>Informasi K/PMR</h2>
      <ol>
        <li><a href="#">Akses Keuangan</a></li>
        <li><a href="#">K/PMR</a></li>
        <li>Informasi K/PMR</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row g-5">

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
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

        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
          <div class="sidebar ps-lg-4">

            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Pintasan</h3>
              <ul class="mt-3">
                <li><a href="/pengajuan-kur">> Pengajuan KUR</a></li>
                <li><a href="/pengajuan-kpmr">> Pengajuan K/PMR</a></li>
                <li><a href="/pengajuan-simpel">> Pengajuan SimPel</a></li>
                <li><a href="/pengajuan-pinjaman">> Pengajuan Pinjaman</a></li>
                <li><a href="/pengajuan-rekening">> Pembukaan Rekening</a></li>
                <li><a href="/maps">> Maps</a></li>
                <li><a href="/pengajuan-saya">> Cek Ajuan</a></li>
            </ul>
            </div><!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
              <!-- <h3 class="sidebar-title">Recent Posts</h3> -->

              <div class="mt-3">

                <div class="post-item mt-12">
                  <div class="row gy-12" data-aos="fade-up">
                    <img src="{{ env('APP_URL') }}assets/img/pintasan1.jpeg" style="height: 80px; width: 300px;"
                      class="img-fluid" alt="">
                  </div>
                  <br>
                  <div class="row gy-12" data-aos="fade-up">
                    <img src="{{ env('APP_URL') }}assets/img/pintasan2.jpg" style="height: 80px; width: 300px;"
                      class="img-fluid" alt="">
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
        <h3>Bank Penyalur K/PMR</h3>
        <p>Provinsi Kalimantan Tengah</p>
      </div>
      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
        data-portfolio-sort="original-order">

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">

          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <img src="{{ env('APP_URL') }}assets/img/bank/BPR Logo.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Perkreditan Rakyat</h4>
              <a href="{{ env('APP_URL') }}assets/img/bank/BPR Logo.png" title="Bank Perkreditan Rakyat"
                data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                  class="bi bi-zoom-in"></i></a>
              <a href="https://www.bankkalteng.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <img src="{{ env('APP_URL') }}assets/img/bank/Bank_Kalteng.png" class="img-fluid center"
              style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
              alt="">
            <div class="portfolio-info">
              <h4>Bank Kalteng</h4>
              <a href="{{ env('APP_URL') }}assets/img/bank/Bank_Kalteng.png" title="Bank Kalteng"
                data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                  class="bi bi-zoom-in"></i></a>
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
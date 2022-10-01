@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Infografis Keuangan</h2>
            <!-- <ol>
          <li><a href="/">Tentang TPAKD</a></li>
          <li>TPAKD Provinsi Kalimantan Tengah</li>
        </ol> -->

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-9" data-aos="fade-up" data-aos-delay="200">
                    <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                        data-portfolio-sort="original-order">

                        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">

                            <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                                <img src="{{ env('APP_URL') }}assets/img/info3.jpeg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Infografis Industri Jasa Keuangan Provinsi Kalimantan Tengah</h4>
                                    <p>Periode Agustus 2021</p>
                                    <a href="{{ env('APP_URL') }}assets/img/info3.jpeg"
                                        title="Infografis Industri Jasa Keuangan Provinsi Kalimantan Tengah"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <!-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> -->
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-6 col-md-6 portfolio-item filter-product">
                                <img src="{{ env('APP_URL') }}assets/img/info1.jpeg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Infografis TPAKD Kalimantan Tengah</h4>
                                    <p>Periode Agustus 2021</p>
                                    <a href="{{ env('APP_URL') }}assets/img/info1.jpeg"
                                        title="Infografis TPAKD Kalimantan Tengah"
                                        data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <!-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> -->
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-6 col-md-6 portfolio-item filter-branding">
                                <img src="{{ env('APP_URL') }}assets/img/info2.jpeg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Kondisi IJK Kalimantan Tengah</h4>
                                    <p>Periode Agustus 2021</p>
                                    <a href="{{ env('APP_URL') }}assets/img/info2.jpeg"
                                        title="Kondisi IJK Kalimantan Tengah" data-gallery="portfolio-gallery-branding"
                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <!-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> -->
                                </div>
                            </div><!-- End Portfolio Item -->

                        </div><!-- End Portfolio Container -->

                    </div>
                </div>
                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="sidebar ps-lg-4">

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Pintasan</h3>
                        </div><!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <div class="mt-3">
                                <div class="post-item mt-12">
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pintasan1.jpeg"
                                            style="height: 80px; width: 300px;" class="img-fluid" alt="">
                                    </div>
                                    <br>
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pintasan2.jpg"
                                            style="height: 80px; width: 300px;" class="img-fluid" alt="">
                                    </div>
                                </div><!-- End recent post item-->
                            </div>
                        </div><!-- End sidebar recent posts-->
                    </div><!-- End Blog Sidebar -->

                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->

</main><!-- End #main -->
@endsection
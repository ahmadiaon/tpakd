@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>TPAKD Provinsi Kalimantan Tengah</h2>
            <ol>
                <li><a href="index.html">Tentang TPAKD</a></li>
                <li>TPAKD Provinsi Kalimantan Tengah</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="services-cards" class="services-cards">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <!-- <div class="card-bg" style="background-image: url(assets/img/1Kalteng.png); height: 120px; width: 300px;"></div> -->
                                <img src="{{ env('APP_URL') }}assets/i/img/1Kalteng.png" class="rounded float-left"
                                    alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                                <!-- <div class="card-bg col-lg-5 col-md-6 footer-newsletter">
                      <img src="{{ env('APP_URL') }}assets/i/img/1Kalteng.png" style="width: 100%; margin-top: 25px;">
                    </div> -->
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">TPAKD Provinsi Kalimantan Tengah</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <img src="{{ env('APP_URL') }}assets/i/img/2Palangka Raya.png"
                                    class="rounded float-left" alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">TPAKD Kota Palangka Raya</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <img src="{{ env('APP_URL') }}assets/i/img/3Katingan.png" class="rounded float-left"
                                    alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">TPAKD Kabupaten Katingan</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <img src="{{ env('APP_URL') }}assets/i/img/4Sukamara.png" class="rounded float-left"
                                    alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">TPAKD Kabupaten Sukamara</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <img src="{{ env('APP_URL') }}assets/i/img/5Kobar.png" class="rounded float-left" alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">TPAKD Kabupaten Kotawaringin Barat</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <img src="{{ env('APP_URL') }}assets/i/img/6Kotim.png" class="rounded float-left" alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">TPAKD Kabupaten Kotawaringin Timur</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <img src="{{ env('APP_URL') }}assets/i/img/7Gunung Mas.png" class="rounded float-left"
                                    alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">TPAKD Kabupaten Gunung Mas</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <img src="{{ env('APP_URL') }}assets/i/img/8Kapuas.png" class="rounded float-left"
                                    alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">TPAKD Kabupaten Kapuas</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

            </div>

        </div>
    </section><!-- End Services Cards Section -->

</main><!-- End #main -->

@endsection
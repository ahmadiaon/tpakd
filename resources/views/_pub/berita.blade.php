@extends('layout_pub.main')
@section('content')
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Berita</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="row gy-5 posts-list">

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ env('APP_URL') }}assets/img/berita1.jpg" alt=""
                                        style="height: 250px; width: 500px;" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="berita_detail.html">Rapat Koordinasi TPAKD Kabupaten Kotawaringin Timur dan
                                        Kabupaten Kotawaringin Barat</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="berita_detail.html"><time datetime="2022-01-01">5 Oktober
                                                    2021</time></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                                href="berita_detail.html">216</a></li>
                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Sampit – Pangkalan Bun, 5 - 7 Oktober 2021. Otoritas Jasa Keuangan (OJK)
                                        Provinsi Kalimantan Tengah bersama Pemerintah Kabupaten Kotawaringin Timur dan
                                        Pemerintah Kabupaten Kotawaringin Barat melaksa . . .
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="berita_detail.html">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ env('APP_URL') }}assets/img/berita2.jpeg" alt=""
                                        style="height: 250px; width: 500px;" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="berita_detail.html">Pengukuhan Tim Percepatan Akses Keuangan Daerah
                                        Kabupaten Kapuas</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="berita_detail.html"><time datetime="2022-01-01">13 Juli
                                                    2021</time></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                                href="berita_detail.html">108</a></li>
                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Kapuas, 13 Juli 2021. Tim Percepatan Akses Keuangan Daerah Kabupaten Kapuas
                                        resmi dibentuk berdasarkan Keputusan Bupati Kapuas Nomor 148/Admin PSDA Tahun
                                        2021 tentang Tim Percepatan Akses Keuangan Daerah Kabupaten Kapuas. Wakil Bupati
                                        Kapuas, Drs. H. M. N . . .
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="berita_detail.html">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ env('APP_URL') }}assets/img/berita3.jpg" alt="" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="berita_detail.html">Pengukuhan Tim Percepatan Akses Keuangan Daerah
                                        Kabupaten Sukamara</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="berita_detail.html"><time datetime="2022-01-01">21 Juni
                                                    2021</time></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                                href="berita_detail.html">89</a></li>
                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Sukamara, 15 Juni 2021. Tim Percepatan Akses Keuangan Daerah Kabupaten Sukamara
                                        resmi dibentuk berdasarkan Keputusan Bupati Sukamara Nomor 185.45/212/2021
                                        tentang Tim Percepatan Akses Keuangan Daerah Kabup . . .
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="berita_detail.html">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ env('APP_URL') }}assets/img/berita4.jpg" alt="" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="berita_detail.html">Kunjungan Co-working Space dan Diskusi OJK Kalimantan
                                        Tengah, Bank Indonesia dan Industri Jasa Keuangan Bersama Walikota Palangka
                                        Raya</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="berita_detail.html"><time datetime="2022-01-01">15 April
                                                    2021</time></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                                href="berita_detail.html">108</a></li>
                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Palangka Raya, 15 April 2021. Kepala Otoritas Jasa Keuangan (OJK) Provinsi
                                        Kalimantan Tengah, Kepala Kantor Perwakilan Bank Indonesia Provinsi Kalimantan
                                        Tengah, Pimpinan Industri Jasa Keuangan dan Ketua DPW AKUMandiri Kalimanta . . .
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="berita_detail.html">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>

                            </article>
                        </div><!-- End post list item -->


                    </div><!-- End blog posts list -->

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div><!-- End blog pagination -->

                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

                    <div class="sidebar ps-lg-4">

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Berita Lainnya</h3>

                            <div class="mt-3">

                                <div class="post-item mt-3">
                                    <img src="{{ env('APP_URL') }}assets/img/berita1.jpg"
                                        style="height:  70px; width: 100px;" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Rapat Koordinasi TPAKD Kabupaten Kotawaringin Timur
                                                dan Kabupaten Kotawaringin Barat</a></h4>
                                        <time datetime="2020-01-01">13 Juli 2021</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="{{ env('APP_URL') }}assets/img/berita2.jpeg"
                                        style="height:  70px; width: 100px;" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Pengukuhan Tim Percepatan Akses Keuangan Daerah
                                                Kabupaten Kapuas</a></h4>
                                        <time datetime="2020-01-01">21 Juni 2021</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="{{ env('APP_URL') }}assets/img/berita3.jpg"
                                        style="height:  70px; width: 100px;" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Pengukuhan Tim Percepatan Akses Keuangan Daerah
                                                Kabupaten Sukamara</a></h4>
                                        <time datetime="2020-01-01">05 Oktober 2021</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="{{ env('APP_URL') }}assets/img/berita4.jpg"
                                        style="height:  70px; width: 100px;" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Laborum corporis quo dara net para</a></h4>
                                        <time datetime="2020-01-01">15 April 2021</time>
                                    </div>
                                </div><!-- End recent post item-->



                            </div>

                        </div><!-- End sidebar recent posts-->
                        <br>
                        <h3 class="sidebar-title">Pintasan</h3>

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
    </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection
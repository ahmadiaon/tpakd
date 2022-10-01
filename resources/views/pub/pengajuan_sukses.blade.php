@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Dasar Pembentukan</h2>
            <ol>
                <li><a href="/">Tentang TPAKD</a></li>
                <li>Dasar Pembentukan</li>
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
                                    <img src="{{ env('APP_URL') }}assets/img/dasar_pembentukan.png" class="img-fluid"
                                        alt="">
                                </div>

                                <div class="content">
                                    <span>
                                        <h1>Pengajuan anda berhasil, silahkan cek dengan nomor, </h1>
                                        <h2>{{ $id_kur }}</h2>
                                    </span>
                                    <span>
                                        atau bisa anda cek pada link,<a href="{{env('APP_URL')
                                        }}pengajuan-saya/{{ $id_kur }}">{{env('APP_URL')
                                            }}pengajuan-saya/{{ $id_kur }}</a>
                                    </span>
                                    {{-- <embed src="{{ env('APP_URL') }}surat.pdf" type="application/pdf" width="100%"
                                        --}} {{-- height="600px" /> --}}

                                    {{-- <p>
                                        Dalam pertemuan Presiden RI dengan perwakilan industri jasa keuangan yang
                                        diinisiasi oleh OJK serta dihadiri oleh Ketua dan Pimpinan Lembaga Tinggi
                                        Negara, Gubernur Bank Indonesia dan para Menteri Kabinet Kerja termasuk seluruh
                                        Kepala Daerah tanggal 15 Januari 2016 di Istana Negara, salah satu issue yang
                                        diangkat adalah pentingnya percepatan akses keuangan daerah dalam mendorong
                                        perekonomian daerah.
                                    </p>
                                    <p>
                                        Terkait hal tersebut, dalam pertemuan dimaksud diamanatkan adanya pembentukan
                                        Tim Percepatan Akses Keuangan Daerah (TPAKD) bekerjasama dengan Kementerian
                                        Dalam Negeri dan instansi/lembaga terkait lainnya. Sebagai tindak lanjutnya,
                                        telah dikeluarkan Radiogram Menteri Dalam Negeri nomor T-900/634/Keuda tanggal
                                        19 Februari 2016 yang isinya meminta Kepala Daerah dalam hal ini Gubernur,
                                        Bupati dan Walikota untuk membentuk TPAKD di Provinsi/Kabupaten/Kota.
                                    </p> --}}
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
                                <li><a href="#">> Latar Belakang</a></li>
                                <li><a href="#">> Dasar Pembentukan</a></li>
                                <li><a href="#">> Roadmap TPAKD</a></li>
                                <li><a href="#">> TPAKD Prov. Kalteng</a></li>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <!-- <h3 class="sidebar-title">Recent Posts</h3> -->

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
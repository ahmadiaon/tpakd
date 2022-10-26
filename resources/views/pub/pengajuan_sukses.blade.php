@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Pengajuan Sukses</h2>
           

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
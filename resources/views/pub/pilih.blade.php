@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Maps</h2>
            <ol>
                <li><a href="/">TPAKD</a></li>
                <li>Maps</li>
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
                                <div class="sidebar-item categories">
                                    <h3 class="sidebar-title">Silahkan pilih pengajuan</h3>
                                    <ul class="mt-3">
                                        <li><a href="/pengajuan-kur/{{ $id }}"> Pengajuan KUR</a></li>
                                        <li><a href="/pengajuan-kpmr/{{ $id }}"> Pengajuan K-PMR</a></li>
                                        <li><a href="/pengajuan-rekening/{{ $id }}"> Pengajuan Rekening Baru</a></li>
                                        <li><a href="/pengajuan-pinjaman/{{ $id }}"> Pengajuan Pinjaman</a></li>
                                        <li><a href="/pengajuan-qris/{{ $id }}"> Pengajuan QRIS</a></li>
                                        <li><a href="/pengajuan-simpel/{{ $id }}"> Pengajuan SimPel</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div><!-- End post list item -->

                    </div><!-- End blog posts list -->



                </div>

             

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection
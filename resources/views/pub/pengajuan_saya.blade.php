@extends('layout_pub.main')
@section('content')
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Cek Pengajuan</h2>
            <ol>
                <li><a href="/">Akses Keuangan</a></li>
                <li>Cek Pengajuan</li>
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



                                <div class="content">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <input onchange="go()" name="search" id="search" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <a id="togo" href="">
                                                <button onclick="submit()" class="btn btn-secondary">Cari</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @if(session()->has('data'))
                                <div class="content">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Data Pengajuan</h5>
                                            @if(session('data')== false)
                                            <p class="card-text">Tidak ada pengajuan ditemukan</p>
                                            @else
                                            {{-- @dd(session('data')) --}}
                                            <p class="card-text">Nama : {{ session('data')->nama }}</p>
                                            <p class="card-text">Email : {{ session('data')->email }}</p>
                                            <p class="card-text">Status Ajuan : {{ session('data')->status }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

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

@section('js')
<script>
    function go(){
        var x = document.getElementById("search");
        var currentVal = x.value;
        
        console.log(currentVal)
        document.getElementById("togo").href = '/pengajuan-saya/'+currentVal

    }
</script>
@endsection
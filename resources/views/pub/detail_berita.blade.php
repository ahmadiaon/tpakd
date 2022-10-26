@extends('layout_pub.main')
@section('content')
<main id="main">
 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Detail Berita</h2>
            <!-- <ol>
          <li><a href="/">Tentang TPAKD</a></li>
          <li>TPAKD Provinsi Kalimantan Tengah</li>
        </ol> -->

        </div>
    </div><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <article class="blog-details">
                        <div class="post-img">
                            <img src="{{ env('APP_URL').$news->photo_path}}" alt="" class="img-fluid" />
                        </div>

                        <h2 class="title">
                            {{ $news->title }}
                        </h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <a href="blog-details.html"><time datetime="2020-01-01">{{
                                            Carbon\Carbon::parse($news->date)->diffForHumans() }}</time></a>
                                </li>
                            </ul>
                        </div>
                        <!-- End meta top -->

                        <div class="content">
                            <p style="text-align: justify">
                                <span style="font-size: 12pt">
                                    {{ $news->paragrafh_1 }}
                                </span>
                            </p>
                            <p style="text-align: justify">
                                <span style="font-size: 12pt">
                                    {{ $news->paragrafh_2 }}
                                </span>
                            </p>
                            <p style="text-align: justify">
                                <span style="font-size: 12pt">
                                    {{ $news->paragrafh_3 }}
                                </span>
                            </p>

                            <p>&nbsp;</p>
                        </div>
                        <!-- End post content -->
                    </article>
                    <!-- End blog post -->
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="sidebar ps-lg-4">
                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">
                                Berita Lainnya
                            </h3>
                            @if($newses)
                            @foreach($newses as $item)
                            <div class="mt-3">
                                <div class="post-item mt-3">
                                    <img src="{{ env('APP_URL').$item->photo_path}}" style="
                                                height: 70px;
                                                width: 100px;
                                            " alt="" class="flex-shrink-0" />
                                    <div>
                                        <h4>
                                            <a href="{{ $item->slug }}">{{ $item->title }}</a>
                                        </h4>
                                        <time datetime="2020-01-01">{{
                                            Carbon\Carbon::parse($item->date)->diffForHumans() }}</time>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                                <!-- End recent post item-->

                                <!-- End recent post item-->
                            </div>
                        </div>
                        <!-- End sidebar recent posts-->
                        <br />
                        <h3 class="sidebar-title">Pintasan</h3>

                        <div class="sidebar-item recent-posts">
                            <div class="mt-3">
                                <div class="post-item mt-12">
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pintasan1.jpeg" style="
                                                height: 80px;
                                                width: 300px;
                                            " class="img-fluid" alt="" />
                                    </div>
                                    <br />
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pintasan2.jpg" style="
                                                height: 80px;
                                                width: 300px;
                                            " class="img-fluid" alt="" />
                                    </div>
                                </div>
                                <!-- End recent post item-->
                            </div>
                        </div>
                        <!-- End sidebar recent posts-->
                    </div>
                    <!-- End Blog Sidebar -->
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
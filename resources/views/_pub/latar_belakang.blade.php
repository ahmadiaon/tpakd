@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Latar Belakang</h2>
            <ol>
                <li><a href="/">Tentang TPAKD</a></li>
                <li>Latar Belakang</li>
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
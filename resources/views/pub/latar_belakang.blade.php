@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Latar Belakang</h2>
            <ol>
                <li><a href="index.html">Tentang TPAKD</a></li>
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
                                    <img src="{{ env('APP_URL') }}assets/img/latar_belakang.png" class="img-fluid"
                                        alt="">
                                </div>


                                <div class="content">
                                    <p>
                                        Akses keuangan merupakan hak dasar bagi seluruh masyarakat dan memiliki
                                        peran penting dalam meningkatkan taraf hidup masyarakat. Hal ini sejalan
                                        dengan Rencana Pembangunan Jangka Menengah Nasional (RPJMN) 2015-2019 bahwa
                                        salah satu sasaran penguatan sektor keuangan dalam lima tahun mendatang
                                        adalah meningkatnya akses masyarakat dan UMKM terhadap layanan jasa keuangan
                                        formal dalam kerangka pembangunan ekonomi yang inklusif dan berkeadilan.
                                    </p>
                                    <p>
                                        Hasil Survei Nasional Literasi Keuangan yang dilakukan oleh Otoritas Jasa
                                        Keuangan (OJK) pada tahun 2013 menunjukkan bahwa tingkat pemahaman
                                        masyarakat terhadap produk serta layanan jasa keuangan masih rendah yaitu
                                        hanya 21,84%, sementara tingkat inklusi keuangan mencapai 59,74%. Tingkat
                                        literasi dan inklusi tersebut tidak merata di sektor jasa keuangan, dimana
                                        tingkat literasi dan inklusi sektor perbankan relatif lebih tinggi dari pada
                                        sektor keuangan lainnnya.
                                    </p>
                                    <p>
                                        Dalam berbagai forum kebijakan publik, isu akses keuangan sering dikaitkan
                                        dengan upaya untuk mendorong UMKM dan sektor produktif. Dalam pertemuan
                                        tahunan OJK dengan pelaku industri jasa keuangan tanggal 15 Januari 2016
                                        yang dihadiri oleh Presiden Republik Indonesia, disebutkan perlunya upaya
                                        nyata untuk mendorong kegiatan ekonomi produktif melalui pemberdayaan
                                        kemampuan UMKM, pengembangan ekonomi daerah, dan penguatan sektor ekonomi
                                        prioritas. Hal ini memerlukan program yang mampu mempercepat akses keuangan
                                        di daerah dalam rangka menciptakan pertumbuhan ekonomi yang lebih merata,
                                        partisipatif, dan inklusif.
                                    </p>
                                    <p>
                                        Program percepatan akses keuangan tersebut sangat membutuhkan peran aktif
                                        dari Pemerintah Daerah dan stakeholders terkait. Untuk itu, OJK dan
                                        Kementerian Dalam Negeri serta institusi terkait lainnya membentuk Tim
                                        Percepatan Akses Keuangan Daerah atau yang disingkat dengan TPAKD.
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
@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Roadmap</h2>
            <ol>
                <li><a href="index.html">Tentang TPAKD</a></li>
                <li>Roadmap</li>
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
                                    <iframe width="590" height="470" src="https://www.youtube.com/embed/nuToG2ok-Ek"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>

                                <div class="content">
                                    <p>
                                        Otoritas Jasa Keuangan (OJK) bersama Kementerian/Lembaga terkait, Pemerintah
                                        Daerah dan Lembaga Jasa Keuangan berkomitmen untuk terus melakukan berbagai
                                        upaya dan inovasi guna meningkatkan akses keuangan masyarakat di daerah sesuai
                                        arahan Presiden RI Joko Widodo dalam Rakornas Tim Percepatan Akses Keuangan
                                        Daerah (TPAKD) 2020 yang digelar secara virtual di Jakarta pada tanggal 10
                                        Desember 2020.
                                    </p>
                                    <p>
                                        Sejalan dengan harapan Presiden, dalam Rakornas TPAKD ini diluncurkan Roadmap
                                        TPAKD 2021-2025 yang memuat strategi dan arah kebijakan pengembangan TPAKD untuk
                                        lima tahun ke depan.
                                    </p>
                                    <p>
                                        Roadmap ini disusun bersama oleh OJK, Kemenko Bidang Perekonomian (Sekretariat
                                        Dewan Nasional Keuangan Inklusif), Kementerian Dalam Negeri dan didukung oleh
                                        Asian Development Bank (ADB).
                                    </p>
                                    <p>
                                        Sesuai tujuan awal TPAKD, maka roadmap TPAKD mengutamakan sinergi berbagai pihak
                                        terkait dalam meningkatkan ketersediaan berbagai produk serta layanan keuangan
                                        formal secara konsisten yang juga bertujuan mendorong peningkatan produktifitas
                                        ekonomi masyarakat.
                                    </p>
                                </div>
                                <h2 class="title">
                                    <u> <a
                                            href="https://www.ojk.go.id/id/berita-dan-kegiatan/publikasi/Documents/Pages/Roadmap-TPAKD-2021-2025/Tayangan%20Roadmap%20TPAKD%202021-2025.pdf">Tayangan
                                            Roadmap TPAKD 2021-2025.pdf</a></u>
                                </h2>
                                <h2 class="title">
                                    <u> <a
                                            href="https://www.ojk.go.id/id/berita-dan-kegiatan/publikasi/Documents/Pages/Roadmap-TPAKD-2021-2025/Roadmap%20TPAKD%202021-2025.pdf">Roadmap
                                            TPAKD 2021-2025.pdf</a></u>
                                </h2>
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
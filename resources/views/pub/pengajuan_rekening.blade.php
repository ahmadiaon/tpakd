@extends('layout_pub.main')
@section('content')
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Pengajuan Rekening Baru</h2>
            <ol>
                <li><a href="#">Akses Keuangan</a></li>
                <li><a href="#">Rekening Baru</a></li>
                <li>Pengajuan Rekening Baru</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="contact" class="contact">
        <div class="container position-relative" data-aos="fade-up">
            <p>
            <h3>Form Pengajuan Rekening Baru</h3>
            </p>
            <div class="row gy-4 d-flex justify-content-end">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="250">

                    <form action="/pengajuan" method="post" role="form">
                        <br>
                        @csrf
                        <input type="hidden" name="jenis_pengajuan" value="BARU">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nama*</label>
                                <p> </p>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="form-control  @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Masukan Nama Lengkap"
                                    style="font-size: 14px;  border-radius: 0; height: 44px" pattern="[a-zA-Z ]+"
                                    title="Masukan Nama Menggunakan Alphabet" required maxlength="60" />
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label>E-Mail*</label>
                                <p> </p>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control  @error('email') is-invalid @enderror" id="email"
                                    placeholder="Masukan E-mail"
                                    style="font-size: 14px;  border-radius: 0; height: 44px"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Masukan E-Mail Yang Benar"
                                    required maxlength="60" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>NIK (Nomor Induk Kependudukan)*</label>
                                <p> </p>
                                <input type="text" name="nik" value="{{ old('nik') }}"
                                    class="form-control  @error('nik') is-invalid @enderror" id="nik"
                                    placeholder="Masukan NIK" style="font-size: 14px;  border-radius: 0; height: 44px"
                                    pattern="[0-9]{16}" title="Masukan NIK Menggunakan Angka (16 Digit)" required
                                    maxlength="16" />
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label>Jenis Kelamin*</label>
                                <p> </p>
                                <select name="gender" id="gender" class="form-control"
                                    style="font-size: 14px;  border-radius: 0; height: 44px" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ (old('gender')=='Laki-laki' )?'selected':'' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ (old('gender')=='Perempuan' )?'selected':'' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>No Telepon*</label>
                                <p> </p>
                                <input type="text" name="no_telpon" value="{{ old('no_telpon') }}"
                                    class="form-control  @error('no_telpon') is-invalid @enderror"
                                    id="no_telpon" placeholder="Masukan Nomor Telepon"
                                    style="font-size: 14px;  border-radius: 0; height: 44px" pattern="[0-9]{12}"
                                    title="Masukan No Telepon Menggunakan Angka (12 Digit)" required maxlength="12" />
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label>Tanggal Lahir</label>
                                <p> </p>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                    class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" required
                                    style="font-size: 14px;  border-radius: 0; height: 44px" />
                            </div>
                        </div>
                        <br>
                        
                        <br>
                        <div class="row">
                            <div class="col-md-6 form-group" style=" padding-bottom: 8px;">
                                <label>Pilih Bank Penyalur*</label>
                                <p> </p>
                                <select name="bank_id" id="bank_id" class="form-control"
                                    style="font-size: 14px;  border-radius: 0; height: 44px" required>
                                    <option value="">Pilih Bank Penyalur</option>
                                    @foreach($banks as $bank)
                                    @if($id == $bank->id)
                                    <option selected value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                    @else
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 form-group" style=" padding-bottom: 8px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                <label class="form-check-label" for="gridCheck"
                                    style="font-size: 12px; margin-top: 4px;">
                                    Dengan ini saya menyetujui memberikan data tersebut diatas untuk dipergunakan pada
                                    <span style="color: #b22222;">tpakdkalteng.id</span>
                                    <br>
                                    <p style="font-size: 12px; margin-top: 10px;"><i>*Pengajuan melalui website ini
                                            gratis<br>*Proses analisa dan persetujuan ditindaklanjuti oleh Bank Penyalur
                                            KUR<br>*Pastikan No. HP dan E-mail Anda sudah benar dan aktif</i>
                                </label>
                            </div>
                        </div>


                        <div class="text-left"><button type="submit">AJUKAN</button></div>
                        {{-- <div class="my-2">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div> --}}
                    </form>

                </div><!-- End Contact Form -->

                <div class="col-lg-4 blog" data-aos="fade-up" data-aos-delay="400">
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
                                        <img src="assets/img/pintasan1.jpeg" style="height: 80px; width: 300px;"
                                            class="img-fluid" alt="">
                                    </div>
                                    <br>
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="assets/img/pintasan2.jpg" style="height: 80px; width: 300px;"
                                            class="img-fluid" alt="">
                                    </div>
                                </div><!-- End recent post item-->

                            </div>
                        </div><!-- End sidebar recent posts-->
                    </div><!-- End Blog Sidebar -->
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>Bank Penyalur KUR</h3>
                <p>Provinsi Kalimantan Tengah</p>
            </div>
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="assets/img/bank/Bank BRI.png" class="img-fluid center"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Rakyat Indonesia</h4>
                            <a href="assets/img/bank/Bank BRI.png" title="Bank Rakyat Indonesia"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://bri.co.id/" target="_blank" rel="noopener noreferrer" title="Menuju Bank"
                                class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-product">
                        <img src="assets/img/bank/Mandiri.png" class="img-fluid center"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Mandiri</h4>
                            <a href="assets/img/bank/Mandiri.png" title="Bank Mandiri"
                                data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://bankmandiri.co.id/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-branding">
                        <img src="assets/img/bank/BNI.png" class="img-fluid"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Negara Indonesia</h4>
                            <a href="assets/img/bank/BNI.png" title="Bank Negara Indonesia"
                                data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.bni.co.id/id-id/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="assets/img/bank/BTN.png" class="img-fluid center"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Tabungan Negara</h4>
                            <a href="assets/img/bank/BTN.png" title="Bank Tabungan Negara"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.btn.co.id/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-product">
                        <img src="assets/img/bank/BCA.png" class="img-fluid center"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Central Asia</h4>
                            <a href="assets/img/bank/BCA.png" title="Bank Central Asia"
                                data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.bca.co.id/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-branding">
                        <img src="assets/img/bank/Sinarmas.png" class="img-fluid"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Sinarmas</h4>
                            <a href="assets/img/bank/Sinarmas.png" title="Bank Sinarmas"
                                data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.banksinarmas.com/id/personal" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="assets/img/bank/BTPN.png" class="img-fluid center"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Tabungan Pensiun Negara</h4>
                            <a href="assets/img/bank/BTPN.png" title="Bank Tabungan Pensiun Negara"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.btpn.com/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-product">
                        <img src="assets/img/bank/BSI.png" class="img-fluid center"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Syariah Indonesia</h4>
                            <a href="assets/img/bank/BSI.png" title="Bank Syariah Indonesia"
                                data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.bankbsi.co.id/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-branding">
                        <img src="assets/img/bank/Mandiri_Taspen.png" class="img-fluid"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Mandiri Taspen</h4>
                            <a href="assets/img/bank/Mandiri_Taspen.png" title="Bank Mandiri Taspen"
                                data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.bankmantap.co.id/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-5 col-md-6 portfolio-item filter-app">
                        <img src="assets/img/bank/Nobu.png" class="img-fluid center"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>National Bank Nobu</h4>
                            <a href="assets/img/bank/Nobu.png" title="National Bank Nobu"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.nobubank.com/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-product">
                        <img src="assets/img/bank/Bank_Kalteng.png" class="img-fluid center"
                            style="margin-top: 25px; margin-bottom: 25px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Bank Kalteng</h4>
                            <a href="assets/img/bank/Bank_Kalteng.png" title="Bank Kalteng"
                                data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://www.bankkalteng.co.id/" target="_blank" rel="noopener noreferrer"
                                title="Menuju Bank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->


                </div><!-- End Portfolio Container -->

            </div>

        </div>
    </section><!-- End Portfolio Section -->

</main><!-- End #main -->

@endsection
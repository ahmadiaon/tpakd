@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <!-- form berita start -->
        <div class="card-box mb-30">
            <!-- horizontal Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Berita</h4>
                    </div>
                </div>
                <form action="/superadmin/berita" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" id="id" value="{{ ($news)? '$news':''  }}">
                    <div class="form-group">
                        <label>Judul</label>
                        <input name="title" type="text" class="form-control  @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" id="title" placeholder="Rupiah Menguat hingga Rp. 1" />
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label class="weight-600">Status Berita</label>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio1" name="status" checked
                                        class="custom-control-input" />
                                    <label class="custom-control-label" for="customRadio1">Aktif</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio2" name="status" class="custom-control-input" />
                                    <label class="custom-control-label" for="customRadio2">Non-Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control  @error('description') is-invalid @enderror" name="description"
                            id="description" cols="100" rows="20">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Custom file input</label>
                        <div class="custom-file">
                            <input name="photo_path" required type="file" class="custom-file-input" />
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>

                </form>
                <div class="collapse collapse-box" id="horizontal-basic-form1">
                    <div class="code-box">
                        <div class="clearfix">
                            <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"
                                data-clipboard-target="#horizontal-basic"><i class="fa fa-clipboard"></i> Copy Code</a>
                            <a href="#horizontal-basic-form1" class="btn btn-primary btn-sm pull-right" rel="content-y"
                                data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- horizontal Basic Forms End -->
        </div>
        <!-- form berita End -->



        <div class="footer-wrap pd-20 mb-20 card-box">
            TPAKD web By
            <a href="https://github.com/dropways" target="_blank">TPAKD</a>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
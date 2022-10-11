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
                    <input type="hidden" name="id" id="id" value="{{ $news->id }}">
                    <div class="form-group">
                        <label>Judul</label>
                        <input required name="title" type="text"
                            class="form-control  @error('title') is-invalid @enderror"
                            value="{{ old('title', $news->title) }}" id="title"
                            placeholder="Rupiah Menguat hingga Rp. 1" />
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
                                    <input type="radio" id="customRadio1" value="1" name="status" checked
                                        class="custom-control-input" />
                                    <label class="custom-control-label" for="customRadio1">Aktif</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio2" value="0" name="status"
                                        class="custom-control-input" />
                                    <label class="custom-control-label" for="customRadio2">Non-Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Little Description</label>
                        <textarea class="form-control  @error('description') is-invalid @enderror"
                            name="little_description" id="little_description" cols="100"
                            rows="20">{{ old('little_description', $news->little_description) }}</textarea>
                        @error('little_description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Paragrafh 1</label>
                        <textarea name="paragrafh_1" class="form-control">{{ $news->paragrafh_1 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Paragrafh 2</label>
                        <textarea name="paragrafh_2" class="form-control">{{ $news->paragrafh_2 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Paragrafh 3</label>
                        <textarea name="paragrafh_3" class="form-control">{{ $news->paragrafh_3 }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Post Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5" src="{{  env('APP_URL').$news->photo_path }}"
                            alt="">
                        <input name="image" class="form-control  @error('image') is-invalid @enderror" type="file"
                            id="image" onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
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
<script>
    function  previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
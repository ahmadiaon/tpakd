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
                        <h4 class="text-blue h4">Tpakd</h4>
                    </div>
                </div>
                <form action="/superadmin/tpakd-kalteng" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="slug" id="slug" value="">
                    <div class="form-group">
                        <label>Name</label>
                        <input required name="name" type="text"
                            class="form-control  @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" id="name"
                            placeholder="Rupiah Menguat hingga Rp. 1" />
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label class="weight-600">Status Tpakd</label>
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
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Post Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5"
                            src="{{  env('APP_URL')}}" alt="">
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
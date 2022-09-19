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
                        <h4 class="text-blue h4">Dasar Pembentukan</h4>
                    </div>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <form action="/superadmin/dasar-pembentukan" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control  @error('dasar_pembentukan_description') is-invalid @enderror"
                            name="dasar_pembentukan_description" id="dasar_pembentukan_description" cols="100"
                            rows="20">{{ old('dasar_pembentukan_description', $profile->dasar_pembentukan_description) }}</textarea>
                        @error('dasar_pembentukan_description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label>Custom file input</label> --}}
                        {{-- <div class="custom-file">
                            <input name="photo_path" required type="file" class="custom-file-input" />
                            <label class="custom-file-label">Choose file</label>
                        </div> --}}
                        <div class="form-group">
                            <div class="mb-3">
                                {{-- @dd($profile->dasar_pembentukan_photo_path) --}}
                                <input type="hidden" name="oldImage"
                                    value="{{ $profile->dasar_pembentukan_photo_path }}">
                                @if($profile->dasar_pembentukan_photo_path)
                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                                    src="/{{ $profile->dasar_pembentukan_photo_path }}" alt="">
                                @else
                                <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
                                @endif

                                <input name="image" class="form-control  @error('image') is-invalid @enderror"
                                    type="file" id="image" onchange="previewImage()">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary">Batal</button>
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
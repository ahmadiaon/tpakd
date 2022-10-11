@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Informasi {{ $financialInformations->financial }}</h4>

                </div>
            </div>


            <form action="/superadmin/financial-information" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $financialInformations->id }}">
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" class="form-control" value="{{ $financialInformations->title }}" type="text">
                </div>

                <div class="form-group">
                    <label>Little Description</label>
                    <textarea name="litte_description"
                        class="form-control">{{ $financialInformations->litte_description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Paragrafh 1</label>
                    <textarea name="paragrafh_1"
                        class="form-control">{{ $financialInformations->paragrafh_1 }}</textarea>
                </div>
                <div class="form-group">
                    <label>Paragrafh 2</label>
                    <textarea name="paragrafh_2"
                        class="form-control">{{ $financialInformations->paragrafh_2 }}</textarea>
                </div>
                <div class="form-group">
                    <label>Paragrafh 3</label>
                    <textarea name="paragrafh_3"
                        class="form-control">{{ $financialInformations->paragrafh_3}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Post Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5"
                        src="{{ env('APP_URL').$financialInformations->path_image }}" alt="">
                    <input name="image" class="form-control  @error('image') is-invalid @enderror" type="file"
                        id="image" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- Simple Datatable End -->
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
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
                        <h4 class="text-blue h4">Grafik</h4>
                    </div>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
                @endif


                <div class="form-group">
                    <label>Description</label>
                    <div class="row">

                        <div class="col-6 card-box">
                            <div class="clearfix mt-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Grafik 1</h4>
                                </div>
                            </div>
                            <form action="/superadmin/grafik-1" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $grafik1->name }}">
                                        </div>
                                    </div>
                                    {{-- 1 --}}
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Name Data 1</label>
                                            <input type="text" class="form-control" name="name_value_1"
                                                value="{{ $grafik1->name_value_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Data 1</label>
                                            <input type="text" class="form-control" name="value_1"
                                                value="{{ $grafik1->value_1 }}">
                                        </div>
                                    </div>
                                    {{-- 2 --}}
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Name Data 1</label>
                                            <input type="text" class="form-control" name="name_value_2"
                                                value="{{ $grafik1->name_value_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Data 1</label>
                                            <input type="text" class="form-control" name="value_2"
                                                value="{{ $grafik1->value_2}}">
                                        </div>
                                    </div>
                                    {{-- 3 --}}
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Name Data 1</label>
                                            <input type="text" class="form-control" name="name_value_3"
                                                value="{{ $grafik1->name_value_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Data 1</label>
                                            <input type="text" class="form-control" name="value_3"
                                                value="{{ $grafik1->value_3 }}">
                                        </div>
                                    </div>
                                    {{-- 4 --}}
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Name Data 1</label>
                                            <input type="text" class="form-control" name="name_value_4"
                                                value="{{ $grafik1->name_value_4 }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Data 1</label>
                                            <input type="text" class="form-control" name="value_4"
                                                value="{{ $grafik1->value_4 }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        {{-- kanan --}}
                        <div class="col-6 card-box">
                            <div class="clearfix mt-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Grafik 2</h4>
                                </div>
                            </div>
                            <form action="/superadmin/grafik-2" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $grafik2->name }}">
                                        </div>
                                    </div>
                                    {{-- 1 --}}
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Name Data 1</label>
                                            <input type="text" class="form-control" name="name_value_1"
                                                value="{{ $grafik2->name_value_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Data 1</label>
                                            <input type="text" class="form-control" name="value_1"
                                                value="{{ $grafik2->value_1 }}">
                                        </div>
                                    </div>
                                    {{-- 2 --}}
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Name Data 1</label>
                                            <input type="text" class="form-control" name="name_value_2"
                                                value="{{ $grafik2->name_value_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Data 1</label>
                                            <input type="text" class="form-control" name="value_2"
                                                value="{{ $grafik2->value_2}}">
                                        </div>
                                    </div>
                                    {{-- 3 --}}
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Name Data 1</label>
                                            <input type="text" class="form-control" name="name_value_3"
                                                value="{{ $grafik2->name_value_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Data 1</label>
                                            <input type="text" class="form-control" name="value_3"
                                                value="{{ $grafik2->value_3 }}">
                                        </div>
                                    </div>
                                    {{-- 4 --}}
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Name Data 1</label>
                                            <input type="text" class="form-control" name="name_value_4"
                                                value="{{ $grafik2->name_value_4 }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Data 1</label>
                                            <input type="text" class="form-control" name="value_4"
                                                value="{{ $grafik2->value_4 }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
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
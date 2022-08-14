@extends('layout_admin.main')

@section('content')

@include('admin.bank_group.modal')

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <form action="/bank-group" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Bank Name</label>
                    <input type="hidden" name="bank_group_id" id="bank_group_id">
                    <input id="bank_group_name" name="bank_group_name" class="form-control" type="text"
                        placeholder="PT. Bank Rakyat Indonesia (Persero), Tbk">
                </div>
                <div class="form-group">
                    <label>Short Name</label>
                    <input id="bank_group_code" name="bank_group_code" class="form-control" placeholder="BRI"
                        type="text">
                </div>
                <a href="/admin/setup">
                    <button type="button" class="btn btn-secondary">Batal</button>
                </a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            TPAKD web By
            <a href="https://github.com/dropways" target="_blank">TPAKD</a>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function previewImage(element){

        const image = document.querySelector('#file');
        const imgPreview = document.querySelector('#showImage');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }

        document.getElementById('III').innerHTML
                = element;
    }
</script>
@endsection
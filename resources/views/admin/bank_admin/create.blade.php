@extends('layout_admin.main')

@section('content')

@include('admin.bank_group.modal')

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <form action="/bank-admin" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Bank Center</label>
                    <select class=" custom-select form-select @error('bank_id') is-invalid @enderror" name="bank_id">
                        @foreach($bank_names as $bank_name)
                        @if(old('bank_name_id',$bank_name->bank_name_id ) ==
                        $id)
                        <option value="{{ $bank_name->id }}" selected>{{
                            $bank_name->bank_name
                            }}</option>
                        @else
                        <option value="{{ $bank_name->id }}">{{ $bank_name->bank_name
                            }}
                        </option>
                        @endif

                        @endforeach
                    </select>
                    @error('bank_name_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input autofocus name="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" id="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input autofocus name="phone_number" type="text"
                        class="form-control  @error('phone_number') is-invalid @enderror"
                        value="{{ old('phone_number') }}" id="phone_number">
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input autofocus name="password" type="text"
                        class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}"
                        id="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class=" custom-select form-select @error('role_id') is-invalid @enderror" name="role_id">
                        @foreach($roles as $role)
                        @if(old('role_id',$role->role_id ) ==
                        $role->id)
                        <option value="{{ $role->id }}" selected>{{
                            $role->role
                            }}</option>
                        @else
                        <option value="{{ $role->id }}">{{ $role->role
                            }}
                        </option>
                        @endif

                        @endforeach
                    </select>
                    @error('role_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <a href="/admin/setup">
                    <button type="button" class="btn btn-secondary">Batal</button>
                </a>
                <button class="btn btn-primary">Simpan</button>
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
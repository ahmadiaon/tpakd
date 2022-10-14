@extends('layout_admin.main')

@section('content')

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">

            <form action="/add-user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="hidden" name="bank_id" id="bank_id" value="{{ $bank_id }}">
                    <input id="name" name="name" class="form-control" type="text" placeholder="bri-admin">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input id="password" name="password" class="form-control" placeholder="BRI" type="text">
                </div>
                <div class="form-group">
                    <label>User Level</label>
                    <select id="role_id" class="custom-select2 form-control select2-hidden-accessible" name="role_id"
                        style="width: 100%; height: 38px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach($roles as $role)
                        @if(old('role_id',$role_id ) == $role->id)
                        <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                        @else
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endif

                        @endforeach
                    </select>
                    @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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

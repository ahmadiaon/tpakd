@extends('layout_admin.main')
@section('head')
@include('layout_admin.head_input')
@endsection
@section('content')

@include('admin.bank_group.modal')

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">

            <form action="/bank/" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- id --}}
                    <div class="col-2">
                        <div class="form-group">
                            <label>ID</label>
                            <input autofocus name="id_bank" type="text"
                                class="form-control  @error('id_bank') is-invalid @enderror"
                                value="{{ old('id_bank') }}" id="id_bank">
                            @error('id_bank')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-5">
                        <div class="form-group">
                            <label>Bank Name</label>
                            <div class="form-group" data-select3-id="7">
                                <select class="custom-select2 form-control select2-hidden-accessible"
                                    name="bank_name_id" style="width: 100%; height: 38px" data-select2-id="1"
                                    tabindex="-1" aria-hidden="true">
                                    @foreach($bank_names as $bank_name)
                                    @if(old('bank_name_id',$bank_name_id ) == $bank_name->id)
                                    <option value="{{ $bank_name->id }}" selected>{{ $bank_name->bank_name }}</option>
                                    @else
                                    <option value="{{ $bank_name->id }}">{{ $bank_name->bank_name }}</option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('bank_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-5">
                        <div class="form-group">
                            <label>Nama Status Kantor</label>
                            <div class="form-group" data-select2-id="7">
                                <select
                                    class=" custom-select form-select @error('office_status_id') is-invalid @enderror"
                                    name="office_status_id">
                                    @foreach($office_statuss as $office_status)
                                    @if(old('office_status_id',$office_status->office_status_id ) == $office_status->id)
                                    <option value="{{ $office_status->id }}" selected>{{ $office_status->office_status
                                        }}</option>
                                    @else
                                    <option value="{{ $office_status->id }}">{{ $office_status->office_status }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('office_status_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    {{-- id --}}
                    <div class="col-4">
                        <div class="form-group">
                            <label>Kegiatan Operasional</label>
                            <div class="form-group" data-select2-id="7">
                                <select
                                    class=" custom-select form-select @error('bank_operationa_id') is-invalid @enderror"
                                    name="bank_operational_id">
                                    @foreach($bank_operationals as $bank_operational)
                                    @if(old('bank_operational_id',$bank_operational->bank_operational_id ) ==
                                    $bank_operational->id)
                                    <option value="{{ $bank_operational->id }}" selected>{{
                                        $bank_operational->bank_operational
                                        }}</option>
                                    @else
                                    <option value="{{ $bank_operational->id }}">{{ $bank_operational->bank_operational
                                        }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('bank_operational_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-4">
                        <div class="form-group">
                            <label>Berdasarkan Kepemilikan</label>
                            <div class="form-group" data-select3-id="7">
                                <select class=" custom-select form-select @error('bank_owner_id') is-invalid @enderror"
                                    name="bank_owner_id">
                                    @foreach($bank_owners as $bank_owner)
                                    @if(old('bank_owner_id',$bank_owner->bank_owner_id ) ==
                                    $bank_owner->id)
                                    <option value="{{ $bank_owner->id }}" selected>{{
                                        $bank_owner->bank_owner
                                        }}</option>
                                    @else
                                    <option value="{{ $bank_owner->id }}">{{ $bank_owner->bank_owner
                                        }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('bank_owner_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    {{-- id --}}
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Dat I</label>
                            <div class="form-group" data-select2-id="7">
                                <select class=" custom-select form-select @error('dat_i_id') is-invalid @enderror"
                                    name="dat_i_id">
                                    @foreach($dat_i_s as $dat_i)
                                    @if(old('dat_i_id',$dat_i->dat_i_id ) == $dat_i->id)
                                    <option value="{{ $dat_i->id }}" selected>{{ $dat_i->dat_i_code
                                        }}</option>
                                    @else
                                    <option value="{{ $dat_i->id }}">{{ $dat_i->dat_i_code.' - '.$dat_i->dat_i_name }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('dat_i_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Dat II</label>
                            <div class="form-group" data-select2-id="7">
                                <select class=" custom-select form-select @error('dat_i_i_id') is-invalid @enderror"
                                    name="dat_i_i_id">
                                    @foreach($dat_i_i_s as $dat_i_i)
                                    @if(old('dat_i_i_id',$dat_i_i->dat_i_i_id ) == $dat_i_i->id)
                                    <option value="{{ $dat_i_i->id }}" selected>{{ $dat_i_i->dat_i_i_code
                                        }}</option>
                                    @else
                                    <option value="{{ $dat_i_i->id }}">{{ $dat_i_i->dat_i_i_code.' -
                                        '.$dat_i_i->dat_i_i_name }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('dat_i_i_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>KR</label>
                            <div class="form-group" data-select2-id="7">
                                <select class=" custom-select form-select @error('kr_id') is-invalid @enderror"
                                    name="kr_id">
                                    @foreach($krs as $kr)
                                    @if(old('kr_id',$kr->kr_id ) ==
                                    $kr->id)
                                    <option value="{{ $kr->id }}" selected>{{
                                        $kr->kr
                                        }}</option>
                                    @else
                                    <option value="{{ $kr->id }}">{{ $kr->kr
                                        }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('kr_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Jenis Usaha</label>
                            <div class="form-group" data-select2-id="7">
                                <select class=" custom-select form-select @error('job_desk_id') is-invalid @enderror"
                                    name="job_desk_id">
                                    @foreach($job_desks as $job_desk)
                                    @if(old('job_desk_id',$job_desk->job_desk_id ) ==
                                    $job_desk->id)
                                    <option value="{{ $job_desk->id }}" selected>{{
                                        $job_desk->job_desk
                                        }}</option>
                                    @else
                                    <option value="{{ $job_desk->id }}">{{ $job_desk->job_desk
                                        }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('job_desk_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>


                </div>


                <div class="form-group">
                    <label>Nama Kantor</label>
                    <input autofocus name="bank_name" type="text"
                        class="form-control  @error('bank_name') is-invalid @enderror" value="{{ old('bank_name') }}"
                        id="bank_name">
                    @error('bank_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat Kantor</label>
                    <input autofocus name="bank_address" type="text"
                        class="form-control  @error('bank_address') is-invalid @enderror"
                        value="{{ old('bank_address') }}" id="bank_address">
                    @error('bank_address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Map Address</label>
                    <input autofocus name="bank_maps" type="text"
                        class="form-control  @error('bank_maps') is-invalid @enderror" value="{{ old('bank_maps') }}"
                        id="bank_maps">
                    @error('bank_maps')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row">
                    {{-- id --}}
                    {{-- Bank name --}}
                    <div class="col-2">
                        <div class="form-group">
                            <label>Kode Pos</label>
                            <div class="form-group" data-select2-id="7">
                                <input autofocus name="bank_pos_code" type="text"
                                    class="form-control  @error('bank_pos_code') is-invalid @enderror"
                                    value="{{ old('bank_pos_code') }}" id="bank_pos_code">
                                @error('bank_pos_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>No Handphone</label>
                            <div class="form-group" data-select2-id="7">
                                <input autofocus name="bank_no_phone" type="text"
                                    class="form-control  @error('bank_no_phone') is-invalid @enderror"
                                    value="{{ old('bank_no_phone') }}" id="bank_no_phone">
                                @error('bank_no_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- id --}}
                    {{-- Bank name --}}
                    <div class="col-2">
                        <div class="form-group">
                            <label>Nomor Izin</label>
                            <div class="form-group" data-select2-id="7">
                                <input autofocus name="bank_no_permission" type="text"
                                    class="form-control  @error('bank_no_permission') is-invalid @enderror"
                                    value="{{ old('bank_no_permission') }}" id="bank_no_permission">
                                @error('bank_no_permission')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tanggal Izin</label>
                            <div class="form-group" data-select2-id="7">
                                <input name="bank_date_permission" class="form-control date-picker"
                                    placeholder="Select Date" type="text">

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tanggal Mulai Operasi</label>
                            <div class="form-group" data-select2-id="7">
                                <input name="bank_date_operation" class="form-control date-picker"
                                    placeholder="Select Date" type="text">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- id --}}
                    {{-- Bank name --}}
                    <div class="col-2">
                        <div class="form-group">
                            <label>Surat Penutupan</label>
                            <div class="form-group" data-select2-id="7">
                                <input autofocus name="bank_no_close" type="text"
                                    class="form-control  @error('bank_no_close') is-invalid @enderror"
                                    value="{{ old('bank_no_close') }}" id="bank_no_close">
                                @error('bank_no_close')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tanggal Penutupan</label>
                            <div class="form-group" data-select2-id="7">
                                <input name="bank_date_close" class="form-control date-picker" placeholder="Select Date"
                                    type="text">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- id --}}
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Surat Perubahan Status</label>
                            <div class="form-group" data-select2-id="7">
                                <input autofocus name="bank_close_permission" type="text"
                                    class="form-control  @error('bank_close_permission') is-invalid @enderror"
                                    value="{{ old('bank_close_permission') }}" id="bank_close_permission">
                                @error('bank_close_permission')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tanggal Perubahan</label>
                            <div class="form-group" data-select2-id="7">
                                <input name="bank_date_change" class="form-control date-picker"
                                    placeholder="Select Date" type="text">


                            </div>
                        </div>
                    </div>
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
@include('layout_admin.js_input')
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
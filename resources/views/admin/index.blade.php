@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20 mb-30">
    <div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<div class="col-md-4">
					<img src="vendors/images/banner-img.png" alt="" />
				</div>
				<div class="col-md-8">
					<h4 class="font-20 weight-500 mb-10 text-capitalize">
						Welcome back
						<div class="weight-600 font-30 text-blue">Johnny Brown!</div>
					</h4>
					<p class="font-18 max-width-600">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
						hic non repellendus debitis iure, doloremque assumenda. Autem
						modi, corrupti, nobis ea iure fugiat, veniam non quaerat
						mollitia animi error corporis.
					</p>
				</div>
			</div>
		</div>
        <div class="title pb-20">
			<h2 class="h3 mb-0">Hospital Overview</h2>
		</div>

		<div class="row pb-10">
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark">{{$total_bank}}</div>
							<div class="font-14 text-secondary weight-500">
								Total Bank
							</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#00eccf">
								<i class="icon-copy dw dw-calendar1"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			@if(session('dataUser')->role_id == 1)
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark">{{!empty($total_admin_bank)?$total_admin_bank:''}}</div>
							<div class="font-14 text-secondary weight-500">
								Total Admin Bank
							</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#ff5b5b">
								<span class="icon-copy fi-crop"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark">{{$total_ajuan}}</div>
							<div class="font-14 text-secondary weight-500">
								Total Ajuan
							</div>
						</div>
						<div class="widget-icon">
							<div class="icon">
								<i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark">{{$total_ajuan_done}}</div>
							<div class="font-14 text-secondary weight-500">Total Selesai</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#09cc06">
								<i class="icon-copy fa fa-money" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
        <div class="card-box pb-10">
			<div class="h5 pd-20 mb-0">Recent Patient</div>
			<table class="data-table table nowrap">
				<thead>
					<tr>
						<th class="table-plus">Name</th>
						<th>KUR</th>
						<th>KPMR</th>
						<th>Pinjaman</th>
						<th>Baru</th>
						<th>QRIS</th>
						<th>SimPel</th>
					</tr>
				</thead>
				<tbody>
				{{-- @dd($banks) --}}
				@foreach ($banks as $bank )
					<tr>
						<td class="table-plus">
							<div class="name-avatar d-flex align-items-center">
								<div class="txt">
									<div class="weight-600">{{$bank->bank_name}}</div>
								</div>
							</div>
						</td>
						
						<td> <a href="admin/pengajuan/kur/{{$bank->id}}" > {{$bank->total_kur_done}}/{{$bank->total_kur_done+$bank->total_kur_pending}}</a></td>
						<td><a href="admin/pengajuan/kpmr/{{$bank->id}}" >{{$bank->total_kpmr_done}}/{{$bank->total_kpmr_done+$bank->total_kpmr_pending}}</a></td>
						<td><a href="admin/pengajuan/pinjaman/{{$bank->id}}" >{{$bank->total_pinjaman_done}}/{{$bank->total_pinjaman_done+$bank->total_pinjaman_pending}}</a></td>
						<td<a href="admin/pengajuan/baru/{{$bank->id}}" >{{$bank->total_baru_done}}/{{$bank->total_baru_done+$bank->total_baru_pending}}</a></td>
						<td><a href="admin/pengajuan/qris/{{$bank->id}}" >{{$bank->total_qris_done}}/{{$bank->total_qris_done+$bank->total_qris_pending}}</a></td>
						<td><a href="admin/pengajuan/simpel/{{$bank->id}}" >{{$bank->total_simpel_done}}/{{$bank->total_simpel_done+$bank->total_simpel_pending}}</a></td>
					</tr>
				@endforeach
					
				</tbody>
			</table>
		</div>

        <div class="footer-wrap pd-20 mb-20 card-box">
            TPAKD web By
            <a href="https://github.com/dropways" target="_blank">TPAKD</a>
        </div>
    </div>
</div>

@endsection
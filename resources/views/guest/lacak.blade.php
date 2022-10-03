@extends('guest.layout')

@section('content')
<style type="text/css">

.tracking-detail {
	padding:3rem 0
}
#tracking {
	margin-bottom:1rem
}
[class*=tracking-status-] p {
	margin:0;
	font-size:1.1rem;
	color:#fff;
	text-transform:uppercase;
	text-align:center
}
[class*=tracking-status-] {
	padding:1.6rem 0
}
.tracking-status-intransit {
	background-color:#65aee0
}
.tracking-status-outfordelivery {
	background-color:#f5a551
}
.tracking-status-deliveryoffice {
	background-color:#f7dc6f
}
.tracking-status-delivered {
	background-color:#4cbb87
}
.tracking-status-attemptfail {
	background-color:#b789c7
}
.tracking-status-error,.tracking-status-exception {
	background-color:#d26759
}
.tracking-status-expired {
	background-color:#616e7d
}
.tracking-status-pending {
	background-color:#ccc
}
.tracking-status-inforeceived {
	background-color:#214977
}
.tracking-list {
	border:1px solid #e5e5e5
}
.tracking-item {
	border-left:1px solid #e5e5e5;
	position:relative;
	padding:2rem 1.5rem .5rem 2.5rem;
	font-size:.9rem;
	margin-left:3rem;
	min-height:5rem
}
.tracking-item:last-child {
	padding-bottom:4rem
}
.tracking-item .tracking-date {
	margin-bottom:.5rem
}
.tracking-item .tracking-date span {
	color:#888;
	font-size:85%;
	padding-left:.4rem
}
.tracking-item .tracking-content {
	padding:.5rem .8rem;
	background-color:#f4f4f4;
	border-radius:.5rem
}
.tracking-item .tracking-content span {
	display:block;
	color:#888;
	font-size:85%
}
.tracking-item .tracking-icon {
	line-height:2.6rem;
	position:absolute;
	left:-1.3rem;
	width:2.6rem;
	height:2.6rem;
	text-align:center;
	border-radius:50%;
	font-size:1.1rem;
	background-color:#fff;
	color:#fff
}
.tracking-item .tracking-icon.status-sponsored {
	background-color:#f68
}
.tracking-item .tracking-icon.status-delivered {
	background-color:#4cbb87
}
.tracking-item .tracking-icon.status-outfordelivery {
	background-color:#f5a551
}
.tracking-item .tracking-icon.status-deliveryoffice {
	background-color:#f7dc6f
}
.tracking-item .tracking-icon.status-attemptfail {
	background-color:#b789c7
}
.tracking-item .tracking-icon.status-exception {
	background-color:#d26759
}
.tracking-item .tracking-icon.status-inforeceived {
	background-color:#214977
}
.tracking-item .tracking-icon.status-intransit {
	color:#e5e5e5;
	border:1px solid #e5e5e5;
	font-size:.6rem
}
@media(min-width:992px) {
	.tracking-item {
		margin-left:10rem
	}
	.tracking-item .tracking-date {
		position:absolute;
		left:-10rem;
		width:7.5rem;
		text-align:right
	}
	.tracking-item .tracking-date span {
		display:block
	}
	.tracking-item .tracking-content {
		padding:0;
		background-color:transparent
	}
}
</style>
<section id="services" class="services">

	<div class="container" data-aos="fade-up">

		<header class="section-header">
			<p>Lacak Perizinan Anda	</p>
		</header>

		<div class="row gy-4">
			<div class="container">
				<div class="col-lg-6 col-md-6 offset-3" data-aos="fade-up" data-aos-delay="200">
					<form action="{{route('lacak')}}" method="get">
						<div class="input-group mb-3">	
							<input type="text" class="form-control" placeholder="Masukkan Nomor Tiket" name="no_tiket" value="{{Request::get('no_tiket')}}"> 
							<button class="btn btn-outline-secondary" type="submit">Cari</button>
						</div>
					</form>
				</div>
			</div>
			@if($data)
			<div class="container">
				<div class="col-lg-6 col-md-6 offset-3" data-aos="fade-up" data-aos-delay="200">

					<div class="row">
						<h6>Nama : {{$data->user->name}}</h6>
						<h6>Jenis Perizinan : {{$data->jenis_izin}}</h6>
						@if($data->bidang_by == null) 
						@php 
							$bidang = 'intransit'; 
							$teknis = 'intransit';
							$kadis = 'intransit';
							$terbit = 'intransit';
						@endphp
						@elseif($data->bidang_by != '' && $data->teknis_by == '')
						@php 
							$bidang = 'deliveryoffice'; 
							$teknis = 'intransit';
							$kadis = 'intransit';
							$terbit = 'intransit';
						@endphp
						@elseif($data->bidang_by != '' && $data->teknis_by != '' && $data->kadis_by == '')
						@php 
							$bidang = 'deliveryoffice'; 
							$teknis = 'deliveryoffice';
							$kadis = 'intransit';
							$terbit = 'intransit';
						@endphp
						@else
						@php 
							$bidang = 'deliveryoffice'; 
							$teknis = 'deliveryoffice';
							$kadis = 'deliveryoffice';
							$terbit = 'deliveryoffice';
						@endphp
						@endif

						<div class="col-md-12 col-lg-12">
							<div id="tracking-pre"></div>
							<div id="tracking">
								<div class="tracking-list">
									<div class="tracking-item">
										<div class="tracking-icon status-{{$bidang}}">
										</div>
										<div class="tracking-date">{{ Carbon\Carbon::parse($data['updatedbidang_at'])->translatedFormat('d F Y'); }}<span></span></div>
										<div class="tracking-content">Verifikasi Administrasi!<span></span></div>
									</div>
									<div class="tracking-item">
										<div class="tracking-icon status-{{$teknis}}">
										</div>
										<div class="tracking-date">{{ Carbon\Carbon::parse($data['updatedteknis_at'])->translatedFormat('d F Y'); }}<span></span></div>
										<div class="tracking-content">Verifikasi Teknis!<span></span></div>
									</div>
									<div class="tracking-item">
										<div class="tracking-icon status-{{$kadis}}">
										</div>
										<div class="tracking-date">{{ $data['updated_at'] }}<span></span></div>
										<div class="tracking-content">Verifikasi Kadis<span></span></div>
									</div>
									<div class="tracking-item">
										<div class="tracking-icon status-{{$terbit}}">
										</div>
										<div class="tracking-date">{{ $data['updated_at'] }}<span></span></div>
										<div class="tracking-content">Telah Terbit!<span></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			@elseif($data == null && Request::get('no_tiket') )
			<div class="container">
				<div class="col-lg-6 col-md-6 offset-3" data-aos="fade-up" data-aos-delay="200">
					<h6 class="text-danger">Data Tidak Ditemukan</h6>
				</div>
			</div>
			@endif 

		</div>

	</section>
	@endsection

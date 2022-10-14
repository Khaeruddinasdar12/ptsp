@extends('guest.layout')

@section('content')
<section id="services" class="services">

	<div class="container" data-aos="fade-up">

		<header class="section-header">
			<h2>Cek Sertifikat</h2>
			@if($data->status == '1')
			<p>{{$data->no_tiket}} adalah sertifikat yang valid.</p>
			@else
			<p>Sertifikat tidak diterbitkan melalui sistem ini.</p>
			@endif
		</header>

	</div>

</section>
@endsection
@extends('guest.layout')

@section('content')
<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
	<div class="container pt-4 pb-4 pr-4" data-aos="fade-up">
		<div class="row mb-4">
			<div class="col-lg-12 entries">

				<article class="entry entry-single">

					<h2 class="entry-title">
						<a href="#">Struktur Organisasi</a>
					</h2>

					<div class="entry-content">
						<img src="{{asset('img/strukturorg.jpg')}}" alt="" class="img-fluid">
						
					</div>
				</article><!-- End blog entry -->
			</div>
		</div><!-- End blog entries list -->
	</div>
</section><!-- End Blog Single Section -->
@endsection
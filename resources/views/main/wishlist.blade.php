@include('layouts.header')

<main>

	<section class="hero_in tours">
		<div class="wrapper">
			<div class="container">
				<h1 class="fadeInUp"><span></span>Your Wishlist</h1>
			</div>
		</div>
	</section>
	<!--/hero_in-->

	<div class="container margin_60_35">

		<div class="wrapper-grid">
			<div class="row">
				@foreach($wishlists as $wishlist)
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="item">
						<div class="box_grid">
							<figure>
								<a href="{{ route('tailorDesigns.show', ['id' => $wishlist->user[0]->id ]) }}"><img src="{{asset('storage/users/'.$wishlist->user[0]->avatar)}}" class="img-fluid" alt="" width="800" height="600"></a>
								<small>{{ $wishlist->user[0]->name }}</small>
							</figure>
						</div>
					</div>
				<a href="/addwish/{{ $wishlist->tailorId }}">
					@if($wishlist!=null)
					@if($wishlist->tailorId == $wishlist->user[0]->id && $wishlist->userId == auth()->user()->id )
					Add from Wishlist
					@else
					Remove to Wishlist
					@endif
					@else
					Remove to Wishlist
					@endif
				</a>
				<a href="/order" style="float: right;">Order Now</a>
			</div>
			@endforeach
			<!-- /box_grid -->
		</div>
		<!-- /row -->
	</div>
	<!-- /isotope-wrapper -->
	</div>
	@if (Session::has('not_enough_quantity'))
	<script>
		alert("{{ Session::get('not_enough_quantity') }}");
	</script>
	@endif
	@if (Session::has('have_quantity'))
	<script>
		alert("{{ Session::get('have_quantity') }}");
	</script>
	@endif
	<!-- /container -->
</main>
<!--/main-->

@include('layouts.footer')
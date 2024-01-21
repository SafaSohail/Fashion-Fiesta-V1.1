@include('layouts.header')
<style>
	label {
		margin-top: 10px;
		/* Add some space between labels and input fields */
	}
</style>
<main>

	<section class="hero_in general">
		<div class="wrapper">
			<div class="container">
				<h1 class="fadeInUp"><span></span>Fashion Fiesta</h1>
				</h3 class="fadeInUp">Stitching Dreams</h3>
			</div>
		</div>
	</section>
	<!--/hero_in-->

	<div class="bg_color_1">
		<div class="container margin_60_35" style="text-align: center;">
			<h1 class="fadeInUp"><span></span>Your Order # {{ $orderId }} Request has been generated, Fill in the form below to confirm your order!</h1>
		</div>
		<!-- /row -->
	</div>

	<div class="container margin_60_35">
		<form id="checkoutForm" action="{{ route('main.processCheckout') }}" method="POST" enctype="multipart/form-data">
			<div class="row" style="display: grid !important;">
				<div class="box_cart">
					@csrf
					<input type="text" id="orderId" name="orderId" class="form-control" hidden value="{{ $orderId }}">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control" readonly value="{{ auth()->user()->name }}">
						<label for="email">Email</label>
						<input type="text" id="email" name="email" class="form-control" readonly value="{{ auth()->user()->email }}">
						<label for="shippingAddress">Address</label>
						<input type="text" id="shippingAddress" name="shippingAddress" class="form-control" required>
						<label for="shippingcontact">Contact</label>
						<input type="text" id="shippingcontact" name="shippingcontact" class="form-control" required>
						<label for="shippingdistrict">District</label>
						<input type="text" id="shippingdistrict" name="shippingdistrict" class="form-control" required>
						<label for="shippingcity">City</label>
						<input type="text" id="shippingcity" name="shippingcity" class="form-control" required>
						<div class='row'>
						<div class="col-md-8">
							<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="fabricProvided" name="fabricProvided">
							<label class="custom-control-label" for="fabricProvided">I will not provide the fabric</label>
						</div>
						<div id="fabricOptions" style="display: none;">
							<label for="fabricType">Select Fabric Type</label>
							<select id="fabricType" name="fabricType" class="form-control">
								<option value="">Select Fabric</option>
								<option value="cotton">Cotton</option>
								<option value="silk">Silk</option>
								<option value="wool">Wool</option>
								<option value="linen">Linen</option>
							</select>
						</div>
						<label for="description">Description</label>
						<input type="text" id="description" name="description" class="form-control" required>
						<label for="measurements">Measurement Size</label>
						<input type="text" id="measurements" name="measurements" class="form-control" required>
						<label for="budget">Budget</label>
						<input type="text" id="budget" name="budget" class="form-control" required>
						<label for="sample">Upload Sample</label>
						<input type="file" name="sample" id="sample" class="form-control" required>
					</div>
					<div class="col-md-4">
            <div class="box_detail">
                <img src="{{asset('assets/img/sizeChart.png')}} " alt="Size Chart" style="max-width: 100%;">
            </div>
					</div>
					</div>
    </div>
				</div>
				<aside id="sidebar">
					<div class="box_detail">
						<button type="submit" class="btn_1 full-width purchase">Complete Request</button>
					</div>
				</aside>
		</form>

	</div>
	<!-- /row -->
	</div>
	<!-- /container -->

</main>
<!--/main-->

<script>
	// Add script to show/hide fabric options based on the checkbox state
	document.addEventListener("DOMContentLoaded", function() {
		var fabricProvidedCheckbox = document.getElementById("fabricProvided");
		var fabricOptionsDiv = document.getElementById("fabricOptions");

		fabricProvidedCheckbox.addEventListener("change", function() {
			fabricOptionsDiv.style.display = fabricProvidedCheckbox.checked ? "block" : "none";
		});
	});
</script>
@include('layouts.footer')
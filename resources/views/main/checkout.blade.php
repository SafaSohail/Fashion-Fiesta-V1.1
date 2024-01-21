@include('layouts.header')

<main>
	<div class="hero_in cart_section">
		<div class="wrapper">
			<div class="container">
				<div class="bs-wizard clearfix">
					<div class="bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">Your cart</div>
						<div class="progress">
							<div class="progress-bar"></div>
						</div>
						<a href="#0" class="bs-wizard-dot"></a>
					</div>

					<div class="bs-wizard-step active">
						<div class="text-center bs-wizard-stepnum">Address</div>
						<div class="progress">
							<div class="progress-bar"></div>
						</div>
						<a href="#0" class="bs-wizard-dot"></a>
					</div>

					<div class="bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">Finish!</div>
						<div class="progress">
							<div class="progress-bar"></div>
						</div>
						<a href="#0" class="bs-wizard-dot"></a>
					</div>
				</div>
				<!-- End bs-wizard -->
			</div>
		</div>
	</div>
	<!--/hero_in-->

	<div class="bg_color_1">
		<div class="container margin_60_35">
			<form id="checkoutForm" action="{{ route('main.processCheckout') }}" method="POST">
				<div class="row" style="display: grid !important;">
					<div class="box_cart">
						@csrf
						<input type="text" id="orderId" name="orderId" class="form-control" hidden value="{{ $orderId }}">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" name="name" class="form-control" readonly value="{{ auth()->user()->name }}">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" class="form-control" readonly value="{{ auth()->user()->email }}">
							<label for="shippingAddress">Shipping Address</label>
							<input type="text" id="shippingAddress" name="shippingAddress" class="form-control" required>
							<label for="shippingcontact">Shipping Contact</label>
							<input type="text" id="shippingcontact" name="shippingcontact" class="form-control" required>
							<label for="shippingdistrict">Shipping District</label>
							<input type="text" id="shippingdistrict" name="shippingdistrict" class="form-control" required>
							<label for="shippingcity">Shipping City</label>
							<input type="text" id="shippingcity" name="shippingcity" class="form-control" required>
						</div>

						<div class="form-group">
							<input type="checkbox" id="sameAddress" name="sameAddress" onchange="toggleBillingFields()">
							<label for="sameAddress">Same as Shipping Address</label>
						</div>

						<div class="form-group" id="billingAddressFields" style="display: block;">
							<label for="billingAddress">Billing Address</label>
							<input type="text" id="billingAddress" name="billingAddress" class="form-control">
							<label for="billingcontact">Billing Contact</label>
							<input type="text" id="billingcontact" name="billingcontact" class="form-control">
							<label for="billingdistrict">Billing District</label>
							<input type="text" id="billingdistrict" name="billingdistrict" class="form-control">
							<label for="billingcity">Billing City</label>
							<input type="text" id="billingcity" name="billingcity" class="form-control">
						</div>
					</div>
					<aside id="sidebar">
						<div class="box_detail">
							<div id="total_cart">
								Order Total <span class="float-right">{{ $amount }}</span>
							</div>
							<button type="submit" class="btn_1 full-width purchase">Checkout (COD)</button>
						</div>
					</aside>
			</form>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
	</div>
	<!-- /bg_color_1 -->
	@if (Session::has('not_enough_quantity'))
	<script>
		alert("{{ Session::get('not_enough_quantity') }}");
	</script>
	@endif
	<script>
		function toggleBillingFields() {
			const billingFields = document.getElementById('billingAddressFields');
			const sameAddressCheckbox = document.getElementById('sameAddress');

			if (sameAddressCheckbox.checked) {
				billingFields.style.display = 'none';
			} else {
				billingFields.style.display = 'block';
			}
		}
	</script>
</main>
<!--/main-->

@include('layouts.footer')
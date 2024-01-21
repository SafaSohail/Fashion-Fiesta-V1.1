	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12 p-r-5">
					<p><img src="@if(!empty(AppSettings::get('logo'))) {{asset('storage/'.AppSettings::get('logo'))}} @else{{asset('assets/img/logo.png')}} @endif" alt="Logo" style="width: 150px;"></p>
					<!--<p>At Fashion Fiesta, we are dedicated to enhancing lives by providing innovative healthcare products designed to empower individuals to take control of their health and well-being. With a commitment to excellence, innovation, and customer care, we are your trusted partner on your journey to a healthier and happier life.</p>-->

					<div class="follow_us">
						<ul>
							<li><a><i class="ti-mobile"></i></a>@if($admin)+{{$admin->phone}}@endif</li>
							<li><a><i class="ti-email"></i></a>@if($admin){{$admin->email}}@endif</li>
							<li>Follow us</li>
							<li><a href="#0"><i class="ti-facebook"></i></a></li>
							<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="#0"><i class="ti-instagram"></i></a></li>
						</ul>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Information</h5>
					<ul class="links">
						<li><a href="{{URL('/aboutus')}}">About Us</a></li>
						<li><a href="#">Track Your Order</a></li>
						<li><a href="#">Shipping Information</a></li>
						<li><a href="#">Store Locater</a></li>
						<li><a href="#">Terms & Services</a></li>
						<li><a href="#">Refund Policy</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Customer Care</h5>
					<ul class="contacts">
						<li><a href="{{URL('/contactus')}}">Contact us</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Return && Exchange Policy</a></li>
						<li><a href="#">FAQs</a></li>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Payment Methods</h5>
					<div class="payment-methods">
						<img src="{{asset('assets/img/easyPaisa.png')}}" alt="Easy Paisa" style="width: 50px;">
						<img src="{{asset('assets/img/jazzCash.png')}}" alt="JazzCash" style="width: 50px; margin-left:50px">
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<ul id="footer-selector">
					</ul>
				</div>
				<div class="col-lg-6">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2023 Fashion Fiesta</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	@if(request()->is('tailorDesigns/*'))
	<div id="whatsapp-icon">
		<a href="{{ $whatsappUrl }}" target="_blank">
			<img src="{{ URL('..\assets\img\whatsapp.png') }}" alt="WhatsApp">
		</a>
		<div class="contact-message">Contact us</div>
	</div>
	@endif
	<div id="toTop"></div><!-- Back to top button -->

	@if(auth()->check())
	<div class="mobile-buttons">
		<a href="{{URL('/cart')}}" class="cart-mobile-btn" title="Cart"><i class="fa fa-shopping-cart"></i></a>
		<a href="{{URL('/wishlist')}}" class="wishlist-mobile-btn" title="Wishlist"><i class="fa fa-heart"></i></a>
	</div>
	@endif
	<!-- COMMON SCRIPTS -->
	<script src="{{URL('jsMain/jquery-2.2.4.min.js')}}"></script>
	<script src="{{URL('jsMain/common_scripts.js')}}"></script>
	<script src="{{URL('jsMain/main.js')}}"></script>
	<script src="{{URL('assets/validate.js')}}"></script>

	</body>

	</html>
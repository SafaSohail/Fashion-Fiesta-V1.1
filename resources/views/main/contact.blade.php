@include('layouts.header')
	
	<main>
		<section class="hero_in contacts">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Contact Us</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="contact_info">
			<div class="container">
				<ul class="clearfix">
					<li>
						<i class="pe-7s-map-marker"></i>
						<h4>Address</h4>
						<span>RawalPindi/Islamabad</span>
					</li>
					<li>
						<i class="pe-7s-mail-open-file"></i>
						<h4>Email address</h4>
						<span>{{$admin->email}}</span>

					</li>
					<li>
						<i class="pe-7s-phone"></i>
						<h4>Contacts info</h4>
						<span>+{{$admin->phone}}</span>
					</li>
				</ul>
			</div>
		</div>
		<!--/contact_info-->

			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->
	
@include('layouts.footer')
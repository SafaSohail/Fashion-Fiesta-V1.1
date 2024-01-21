@include('layouts.header')

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

	<div class="container margin_60_35">
		<div class="card">
			<div class="card-header">
				<h2>Orders Details</h2>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Tailor</th>
								<th>Status</th>
								<th>Total Amount</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($orders as $order)
							<tr>
								<td>{{ $order->id }}</td>
								@if( $order->tailor )
								<td>{{ $order->tailor->name }}</td>
								@else
								<td>Not Approved By Tailor</td>
								@endif
								<td>
									{{ $order->status }}
								</td>
								<td>RS {{ $order->budget }}</td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h2>Tailor Details</h2>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Tailor</th>
								<th>Payment Type</th>
								<th>Payment Number</th>
								<th>Contact Number</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($orders as $order)
							@if( $order->tailor )
							<tr>
								<td>{{ $order->id }}</td>
								<td>{{ $order->tailor->name }}</td>
								<td>{{ $order->tailor->paymentType }}</td>
								<td>{{ $order->tailor->paymentNumber }}</td>
								<td>{{ $order->tailor->phone }}</td>
								<td>{{ $order->tailor->area }}</td>
							</tr>
							@endif
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- /bg_color_1 -->

</main>
<!--/main-->

@include('layouts.footer')
@extends('layouts.app')

@push('page-css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Order History</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active">Order History</li>
	</ul>
</div>
@endpush

@section('content')

@if(auth()->user()->role=='tailor')
<div class="row">
	<div class="col-md-12">

		<!-- Order History -->
		<div class="card">
			<div class="card-header">
				<h3>All Orders</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="category-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Customer Details</th>
								<th>Shipping Details</th>
								<th>Description</th>
								<th>Measurements</th>
								<th>Budget</th>
								<th>Status</th>
								<th>Sample</th>
								@if(auth()->user()->role=='tailor')
								<th class="text-center">Action</th>
								@endif
							</tr>
						</thead>
						<tbody>

							@foreach ($newOrders as $order)
							<tr>
								<td>{{ $order->id }}</td>
								<td>{{$order->user->name}},{{$order->user->email}},{{$order->shippingcontact}}</td>
								<td>
									{{ $order->shippingaddress }},{{ $order->shippingcity }},{{ $order->shippingdistrict }}
								</td>
								<td>{{ $order->description }}</td>
								<td>{{ $order->measurements }}</td>
								<td>RS {{ $order->budget }}</td>
								<td>{{ $order->status }}</td>
								<td>
									<h2 class="table-avatar">
										@if(!empty($order->image))
										<span class="avatar avatar-sm mr-2">
											<img class="avatar-img" src="{{ asset('storage/users/'.$order->image) }}" alt="order image">
										</span>
										@endif
									</h2>
								</td>
								@if(auth()->user()->role=='tailor')
								<td class="text-center">
									<div class="actions">
										<a class="btn btn-sm bg-success-light approveBtn" href="./approveOrder/{{ $order->id }}">
											&#10003; Approve
										</a>
									</div>
								</td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Order History -->

	</div>
</div>
@endif

<div class="row">
	<div class="col-md-12">

		<!-- Order History -->
		<div class="card">
			<div class="card-header">
				<h3>Personal Orders</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Order ID</th>
								@if(auth()->user()->role=='admin')
								<th>Tailor Details</th>
								@endif
								<th>Customer Details</th>
								<th>Shipping Details</th>
								<th>Description</th>
								<th>Measurements</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Sample</th>
								@if(auth()->user()->role=='tailor')
								<th class="text-center">Action</th>
								@endif
							</tr>
						</thead>
						<tbody>

							@foreach ($orders as $order)
							<tr>
								<td>{{ $order->id }}</td>
								@if(auth()->user()->role=='admin')
								<td>{{$order->tailor->name}},{{$order->tailor->email}},{{$order->tailor->phone}}</td>
								@endif
								<td>{{$order->user->name}},{{$order->user->email}},{{$order->shippingcontact}}</td>
								<td>
									{{ $order->shippingaddress }},{{ $order->shippingcity }},{{ $order->shippingdistrict }}
								</td>
								<td>{{ $order->description }}</td>
								<td>{{ $order->measurements }}</td>
								<td>RS {{ $order->budget }}</td>
								<td>{{ $order->status }}</td>
								<td>
									<h2 class="table-avatar">
										@if(!empty($order->image))
										<span class="avatar avatar-sm mr-2">
											<img class="avatar-img" src="{{ asset('storage/users/'.$order->image) }}" alt="order image">
										</span>
										@endif
									</h2>
								</td>
								@if(auth()->user()->role=='tailor')
								<td class="text-center">
									<div class="actions">
										<a class="btn btn-sm bg-success-light approveBtn" href="./approveOrder/{{ $order->id }}">
											&#10003; Approve
										</a>
										<a class="btn btn-sm bg-success-light approveBtn" href="./processOrder/{{ $order->id }}">
											&#10003; Proccessing
										</a>
										<a href="./completeOrder/{{ $order->id }}" class="btn btn-sm bg-success-light approveBtn">
											&#10003; Completed
										</a>
									</div>
								</td>
								@endif
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Order History -->

	</div>
</div>
@endsection

@push('page-js')
<!-- Select2 JS -->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endpush
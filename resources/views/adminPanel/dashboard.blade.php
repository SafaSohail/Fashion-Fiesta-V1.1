@extends('layouts.app')

@push('page-css')
@endpush

@push('page-header')
<style>
	
#whatsapp-icon {
  position: fixed;
  bottom: 25px; /* Adjust the distance from the bottom as needed */
  left: 15px; /* Adjust the distance from the left as needed */
  z-index: 1100; /* Adjust the z-index to control the stacking order */
  cursor: pointer; /* Add a pointer cursor on hover */
}

#whatsapp-icon img {
  width: 50px; /* Adjust the icon's width as needed */
  height: auto;
}

#whatsapp-icon .contact-message {
  display: none; /* Hide the message by default */
  position: absolute;
  bottom: 50%; /* Position it vertically centered */
  left: calc(100% + 10px); /* Position it to the right of the icon */
  transform: translateY(50%); /* Center vertically */
  background-color: #333; /* Background color for the message */
  color: #fff; /* Text color for the message */
  padding: 5px 10px; /* Padding for the message */
  border-radius: 5px; /* Rounded corners */
  white-space: nowrap; /* Prevent line breaks */
}

#whatsapp-icon:hover .contact-message {
  display: block; /* Show the message on hover */
}

	</style>
<div class="col-sm-12">
	<h3 class="page-title">Welcome {{auth()->user()->name}}</h3>
	
	@if(auth()->user()->role=="tailor" && auth()->user()->status == "Blocked" )
	<h4>Status: Your request is {{auth()->user()->status}}</h4>
	<h4>Amount: 0</h4>
	@elseif(auth()->user()->role=="tailor" && auth()->user()->status == "Approved" )
	<h4>Status: Your request is {{auth()->user()->status}}</h4>
	<h4>Amount: {{auth()->user()->message}}</h4>
	@elseif(auth()->user()->role=="tailor" && auth()->user()->status == "Pending" )
	<h4>Status: Your request is {{auth()->user()->status}}, Kindly Contact to Admin, Click on the Whatsapp icon below.</h4>
	<h4>Amount: 0</h4>
	@endif
	<ul class="breadcrumb">
		<li class="breadcrumb-item active">Dashboard</li>
	</ul>
</div>
@endpush

@section('content')
	
	<div class="row">
		@if(auth()->user()->role=="admin")
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-success">
							<i class="fe fe-credit-card"></i>
						</span>
						<div class="dash-count">
							<h3>{{$total_tailors}}</h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Tailors</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-success w-75"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
		
	@if(auth()->user()->role=="tailor" && auth()->user()->status == "Approved" )
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-danger border-danger">
							<i class="fe fe-folder"></i>
						</span>
						<div class="dash-count">
							<h3>{{$orders}}</h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Orders</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-danger w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif

		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-warning border-warning">
							<i class="fe fe-users"></i>
						</span>
						<div class="dash-count">
							<h3>{{\DB::table('users')->where('role', '!=', 'admin')->count()}}</h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">System Users</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-warning w-100"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		
			<!-- Latest Customers -->
			
			<!-- /Latest Customers -->
			
		</div>
	</div>
	@if(auth()->user()->role=="tailor" && auth()->user()->status != "Approved" )
	<div id="whatsapp-icon">
            <a href="{{$whatsappUrl}}" target="_blank">
                <img src="{{ URL('..\assets\img\whatsapp.png') }}" alt="WhatsApp">
            </a>
            <div class="contact-message">Contact us</div>
        </div>
		@endif
@endsection

@push('page-js')

@endpush


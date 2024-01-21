@extends('layouts.app')

@push('page-css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Reviews</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Reviews</li>
	</ul>
</div>

@endpush

@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="category-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr>
								<th>User Name</th>
								<th>Rating</th>
								<th>Review</th>
							</tr>
						</thead>
						<tbody>
							@if($reviews)
							@foreach ($reviews as $review)
							<tr>
								<td>
									{{$review->User->name}}
								</td>
								<td>
									{{$review->rating}}
								</td>
								<td>
									{{$review->comment}}
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
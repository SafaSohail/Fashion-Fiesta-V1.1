@extends('layouts.app')

@push('page-css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Tailors</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Tailors</li>
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
								<th>Name</th>
								<th>Address</th>
								<th>Specialization</th>
								<th>Created date</th>
								<th>Status</th>
								<th class="text-center action-btn">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($tailors as $tailor)
							<tr>
								<td>
									<h2 class="table-avatar">
										@if(!empty($tailor->image))
										<span class="avatar avatar-sm mr-2">
											<img class="avatar-img" src="{{ asset('storage/tailor/'.$tailor->image) }}" alt="tailor image">
										</span>
										@endif
										{{$tailor->name}}
									</h2>
								</td>
								<td>
									{{$tailor->area}}
								</td>
								<td>
									{{$tailor->specialization}}
								</td>
								<td>{{date_format(date_create($tailor->created_at),"d M,Y")}}</td>
								<td>
									{{$tailor->status}}
								</td>

								<td class="text-center">
									<div class="actions">
										<a class="btn btn-sm bg-success-light approveBtn" href="./approveTailor/{{$tailor->id}}">
											&#10003; Approve
										</a>
										<a href="./rejectTailor/{{$tailor->id}}" class="btn btn-sm bg-danger-light rejectBtn">
										&#10007; Block
										</a>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Delete Modal -->
<x-modals.delete :route="'admin.tailors'" :title="'Approval'" />
<!-- /Delete Modal -->
@endsection
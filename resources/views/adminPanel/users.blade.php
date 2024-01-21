@extends('layouts.app')

@push('page-css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Users</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Users</li>
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
								<th>Email</th>
								<th>Status</th>
								<th class="text-center action-btn">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<td>
									<h2 class="table-avatar">
										@if(!empty($user->image))
										<span class="avatar avatar-sm mr-2">
											<img class="avatar-img" src="{{ asset('storage/user/'.$user->image) }}" alt="user image">
										</span>
										@endif
										{{$user->name}}
									</h2>
								</td>
								<td>
									{{$user->email}}
								</td>
								<td>
									@if($user->status)
									{{$user->status}}
									@else
									Approved
									@endif
								</td>

								<td class="text-center">
									<div class="actions">
										<a class="btn btn-sm bg-success-light approveBtn" href="./approve/{{$user->id}}">
											&#10003; Approve
										</a>
										<a href="./reject/{{$user->id}}" class="btn btn-sm bg-danger-light rejectBtn">
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
<x-modals.delete :route="'admin.users'" :title="'Approval'" />
<!-- /Delete Modal -->
@endsection
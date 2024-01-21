@extends('layouts.app')

@push('page-css')
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
    <h3 class="page-title">Additional Features</h3>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Additional Features</li>
    </ul>
</div>

@endpush

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" id="update_service" action="{{route('admin.features')}}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Whatsapp Number</label>
                                <input type="text" name="number" class="form-control" value="{{$features->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control service-desc" value="{{$features->message}}" name="message">{{$features->message}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
								<div class="form-group">
									<label for="images">Designs</label>
									<input type="file" name="images[]" id="images" multiple>
								</div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Save</button>
                    </div>
                </form>
                <!-- Show uploaded images -->
                @if($features->pictures)
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h4>Uploaded Images</h4>
                        @foreach($features->pictures as $image)
                            <img src="{{ asset('storage/users/' . $image) }}" alt="Image" class="img-thumbnail" style="height: 200px;">
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-js')

@endpush
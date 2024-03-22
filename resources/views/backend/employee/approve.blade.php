@extends('backend.layout.app')

@section('title', 'Approve Employee')

@section('employee-expend', 'true')
@section('employee-expend-show', 'show')
@section('create-employee-active', 'active')

@section('content')

@include('message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="">Update Employee</h4>
                <a class="btn btn-outline-primary" href="{{route('employee.pending')}}">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('employee.update',[$employee->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$employee->id}}">
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$employee->name}}" id="name" class="form-control" disabled>
                    </div>

                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{$employee->email}}" id="email" class="form-control" disabled>
                    </div>

                    <div class="form-group mb-2">
                        <label for="comp_id">Employee Type</label>
                        <select class="form-control" name="comp_id" id="comp_id">
                            <option value="">Please select</option>
                            <option value="1" {{$employee->comp_id==1?'selected':''}}>Admin</option>
                            <option value="2" {{$employee->comp_id==2?'selected':''}}>Supervisor</option>
                            <option value="3" {{$employee->comp_id==3?'selected':''}}>Executive</option>
                        </select>
                        @error('comp_id')
                            <div class="error text-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" value="" class="form-control">
                        @error('image')
                            <div class="error text-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="nid">NID</label>
                        <input type="text" name="nid" value="{{$employee->nid}}" id="nid" class="form-control">
                    </div>

                    <div class="form-group mb-2">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{$employee->phone}}" id="phone" class="form-control">
                    </div>

                    <div class="form-group mb-2">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{$employee->address}}" id="address" class="form-control">
                    </div>

                    <div class="form-group mb-2">
                        <label for="social_media_link">Social Media Link</label>
                        <input type="text" name="social_media_link" value="{{$employee->social_media_link}}" id="social_media_link" class="form-control">
                    </div>

                    <div class="form-group mb-2">
                        <input type="submit"  value="Update Employee" class="btn btn-outline-warning">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection

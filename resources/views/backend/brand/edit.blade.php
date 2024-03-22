@extends('backend.layout.app')

@section('title', 'Update Brand')

@section('brand-expend', 'true')
@section('brand-expend-show', 'show')
@section('manage-brand-active', 'active')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Brand</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form class="" action="{{route('brand.update',[$brand->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="name">Brand Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$brand->name}}">
                                    @error('name')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-outline-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection

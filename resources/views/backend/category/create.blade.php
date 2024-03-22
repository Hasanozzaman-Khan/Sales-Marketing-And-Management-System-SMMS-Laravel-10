@extends('backend.layout.app')

@section('title', 'Create Category')

@section('category-expend', 'true')
@section('category-expend-show', 'show')
@section('create-category-active', 'active')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Category</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form class="" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                    @error('name')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group mb-3">
                                    <label for="image">Category Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @error('image')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Create" class="btn btn-outline-primary">
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

@extends('backend.layout.app')

@section('title', 'Manage Product')

@section('product-expend', 'true')
@section('product-expend-show', 'show')
@section('manage-product-active', 'active')

@section('content')

@include('message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Manage Product</h3>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">

                        <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <!-- <img src="..." class="d-block w-100" alt="..."> -->
                                    <img src="{{Storage::url($product->feature_image)}}" width="300" height="350" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{Storage::url($product->first_image)}}" width="300" height="350" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{Storage::url($product->second_image)}}" width="300" height="350" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$product->id}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$product->id}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <hr>

                        <div class="">
                            <p>Stock : {{$product->stock}}</p>

                            <form class="" action="{{route('product.stock.update',[$product->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group mb-3">
                                    <input type="text" name="stock" class="form-control" placeholder="Update stock" aria-label="Update stock" aria-describedby="update-stock" required>
                                    <!-- <input type="hidden" name="id" value="{{$product->id}}"> -->
                                    <button type="submit" class="input-group-text btn btn-outline-primary" id="update-stock">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <h2>Name : {{$product->name}}</h2>
                        <p>Brand : {{$product->brand->name}}</p>
                        <p>Category : {{$product->category->name}}</p>
                        <p>Size : {{$product->size->name}}</p>
                        <p>Brand : {{$product->brand->name}}</p>
                        <p>Brand : {{$product->brand->name}}</p>
                        <p>Brand : {{$product->brand->name}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

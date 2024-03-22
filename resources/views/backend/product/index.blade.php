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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Image</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Size</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>

                                    <td style="width:150px; height:100px;" class="text-center">
                                        <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <!-- <img src="..." class="d-block w-100" alt="..."> -->
                                                    <img src="{{Storage::url($product->feature_image)}}" width="100" height="60" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{Storage::url($product->first_image)}}" width="100" height="60" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{Storage::url($product->second_image)}}" width="100" height="60" alt="...">
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
                                    </td>

                                    <td>{{$product->name}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->size->name}}</td>
                                    <td  class="text-center">
                                        <a href="{{route('product.show',[$product->id])}}"><button class="btn btn-outline-primary"><i class="mdi mdi-table-edit"></i>Show</button></a>
                                        <a href="{{route('product.edit',[$product->id])}}"><button class="btn btn-outline-primary"><i class="mdi mdi-table-edit"></i>Edit</button></a>
                                    <!-- </td>
                                    <td> -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$product->id}}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form class="" action="{{route('product.destroy',[$product->id])}}" method="post">@csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you Sure to delete size {{$product->name}} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-outline-danger">Yes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <td>No product found!</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@extends('backend.layout.app')

@section('title', 'Create Product')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product</h4>
                </div>
                <div class="card-body">
                    <form class="" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                    @error('name')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category" id="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="brand">Brand</label>
                                    <select class="form-control" name="brand" id="brand">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="size">Size</label>
                                    <select class="form-control" name="size" id="size">
                                        <option value="">Select Size</option>
                                        @foreach($sizes as $size)
                                            <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="feature_image">Feature Image</label>
                                    <input type="file" name="feature_image" id="feature_image" value="" class="form-control">
                                    @error('feature_image')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="first_image">First Image</label>
                                    <input type="file" name="first_image" id="first_image" value="" class="form-control">
                                    @error('first_image')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="second_image">Second Image</label>
                                    <input type="file" name="second_image" id="second_image" value="" class="form-control">
                                    @error('second_image')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" id="stock" value="" class="form-control">
                                    @error('stock')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Price">Price</label>
                                    <input type="text" name="Price" id="Price" value="" class="form-control">
                                    @error('Price')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="is_discounted">Is Discounted</label>
                                    <select class="form-control" name="is_discounted" id="is_discounted">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                    @error('is_discounted')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="discount">Discount Percentage</label>
                                    <input type="text" name="discount" id="discount" value="" class="form-control">
                                    @error('discount')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description">Discription</label>
                                    <textarea name="description" id="description" rows="4" cols="80" class="form-control"></textarea>
                                    @error('description')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="product_condition">Product Condition</label>
                                    <select class="form-control" name="product_condition" id="product_condition">
                                        <option value="Class A">Class A</option>
                                        <option value="Class B">Class B</option>
                                        <option value="Class C">Class C</option>
                                    </select>
                                    @error('product_condition')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="listing_location">Location</label>
                                    <input type="text" name="listing_location" id="listing_location" value="" class="form-control">
                                    @error('listing_location')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number" value="" class="form-control">
                                    @error('phone_number')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="link">Video Link</label>
                                    <input type="text" name="link" id="link" value="" class="form-control">
                                    @error('link')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Create" class="btn btn-outline-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

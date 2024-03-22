@extends('backend.layout.app')

@section('title', 'Update Product')

@section('product-expend', 'true')
@section('product-expend-show', 'show')
@section('manage-product-active', 'active')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Product</h4>
                </div>
                <div class="card-body">
                    <form class="" action="{{route('product.update',[$product->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
                                    @error('name')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="brand_id">Brand</label>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="size_id">Size</label>
                                    <select class="form-control" name="size_id" id="size_id">
                                        <option value="">Select Size</option>
                                        @foreach($sizes as $size)
                                            <option value="{{$size->id}}" {{$product->size_id == $size->id ? 'selected' : ''}}>{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('size_id')
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
                                    <img src="{{Storage::url($product->feature_image)}}" width="100" height="60" alt="" class="my-2">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="first_image">First Image</label>
                                    <input type="file" name="first_image" id="first_image" value="" class="form-control">
                                    @error('first_image')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                    <img src="{{Storage::url($product->first_image)}}" width="100" height="60" alt="" class="my-2">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="second_image">Second Image</label>
                                    <input type="file" name="second_image" id="second_image" value="" class="form-control">
                                    @error('second_image')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                    <img src="{{Storage::url($product->second_image)}}" width="100" height="60" alt="" class="my-2">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" id="stock" value="{{$product->stock}}" class="form-control">
                                    @error('stock')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control">
                                    @error('price')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="is_discounted">Is Discounted</label>
                                    <select class="form-control" name="is_discounted" id="is_discounted">
                                        <option value="No" {{$product->is_discounted == 'No' ? 'selected' : ''}}>No</option>
                                        <option value="Yes" {{$product->is_discounted == 'Yes' ? 'selected' : ''}}>Yes</option>
                                    </select>
                                    @error('is_discounted')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="discount">Discount Percentage</label>
                                    <input type="text" name="discount" id="discount" value="{{$product->discount}}" class="form-control">
                                    @error('discount')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description">Discription</label>
                                    <textarea name="description" id="description" rows="4" cols="80" class="form-control">{{$product->description}}</textarea>
                                    @error('description')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="product_condition">Product Condition</label>
                                    <select class="form-control" name="product_condition" id="product_condition">
                                        <option value="Class A" {{$product->product_condition == 'Class A' ? 'selected' : ''}}>Class A</option>
                                        <option value="Class B" {{$product->product_condition == 'Class B' ? 'selected' : ''}}>Class B</option>
                                        <option value="Class C" {{$product->product_condition == 'Class C' ? 'selected' : ''}}>Class C</option>
                                    </select>
                                    @error('product_condition')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="listing_location">Location</label>
                                    <input type="text" name="listing_location" id="listing_location" value="{{$product->listing_location}}" class="form-control">
                                    @error('listing_location')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number" value="{{$product->phone_number}}" class="form-control">
                                    @error('phone_number')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="link">Video Link</label>
                                    <input type="text" name="link" id="link" value="{{$product->link}}" class="form-control">
                                    @error('link')
                                        <div class="error text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-outline-primary mb-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

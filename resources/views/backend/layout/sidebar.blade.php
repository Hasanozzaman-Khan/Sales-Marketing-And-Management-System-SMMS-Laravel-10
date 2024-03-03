<div class="card">
    <div class="card-body">
        @if(!auth()->user()->image)
            <img src="/img/pp.jpg" alt="" class="mx-auto d-block img-thumbnail" width="130">
        @else
            <img src="{{Storage::url(auth()->user()->image)}}" alt="" class="mx-auto d-block img-thumbnail" width="130">
        @endif

        <p class="text-center"><b>{{auth()->user()->name}}</b></p>
        <hr style="border:2px solid blue">



        <div class="vartical-menu">

            @if(auth()->user()->comp_id == 1 || auth()->user()->comp_id == 2 || auth()->user()->comp_id == 3)
                <div class="">
                    <a href="{{route('dashboard.index')}}" class="{{request()->is('dashboard')?'active':''}}">Dashboard</a>
                </div>

                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#product" role="button" aria-expanded="{{request()->is('dashboard/product/create')?'true':(request()->is('dashboard/product')?'true':'false')}}" aria-controls="product">
                      Product
                    </a>
                    <div class="collapse {{request()->is('dashboard/product/create')?'show':(request()->is('dashboard/product')?'show':'')}}" id="product">
                      <a href="{{route('product.create')}}" class="ps-5 {{request()->is('dashboard/product/create')?'active':''}}">Add Product</a>
                      <a href="{{route('product.index')}}" class="ps-5 {{request()->is('dashboard/product')?'active':''}}">Manage Product</a>
                    </div>
                </div>

            @endif

            @if(auth()->user()->comp_id == 1)
                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#employee" role="button" aria-expanded="{{request()->is('dashboard/employee/pending')?'true':(request()->is('dashboard/employee')?'true':'false')}}" aria-controls="employee">
                      Employee
                    </a>
                    <div class="collapse {{request()->is('dashboard/employee/pending')?'show':(request()->is('dashboard/employee')?'show':'')}}" id="employee">
                      <a href="{{route('employee.pending')}}" class="ps-5 {{request()->is('dashboard/employee/pending')?'active':''}}">Add Employee</a>
                      <a href="{{route('employee.index')}}" class="ps-5 {{request()->is('dashboard/employee')?'active':''}}">Manage Employee</a>
                    </div>
                </div>
            @endif

            @if(auth()->user()->comp_id == 1 || auth()->user()->comp_id == 2)
                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#brand" role="button" aria-expanded="{{request()->is('dashboard/brand/create')?'true':(request()->is('dashboard/brand')?'true':'false')}}" aria-controls="brand">
                      Brand
                    </a>
                    <div class="collapse {{request()->is('dashboard/brand/create')?'show':(request()->is('dashboard/brand')?'show':'')}}" id="brand">
                      <a href="{{route('brand.create')}}" class="ps-5 {{request()->is('dashboard/brand/create')?'active':''}}">Add Brand</a>
                      <a href="{{route('brand.index')}}" class="ps-5 {{request()->is('dashboard/brand')?'active':''}}">Manage Brand</a>
                    </div>
                </div>

                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#category" role="button" aria-expanded="{{request()->is('dashboard/category/create')?'true':(request()->is('dashboard/category')?'true':'false')}}" aria-controls="category">
                      Category
                    </a>
                    <div class="collapse {{request()->is('dashboard/category/create')?'show':(request()->is('dashboard/category')?'show':'')}}" id="category">
                      <a href="{{route('category.create')}}" class="ps-5 {{request()->is('dashboard/category/create')?'active':''}}">Add Category</a>
                      <a href="{{route('category.index')}}" class="ps-5 {{request()->is('dashboard/category')?'active':''}}">Manage Category</a>
                    </div>
                </div>

                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#size" role="button" aria-expanded="{{request()->is('dashboard/size/create')?'true':(request()->is('dashboard/size')?'true':'false')}}" aria-controls="size">
                      Size
                    </a>
                    <div class="collapse {{request()->is('dashboard/size/create')?'show':(request()->is('dashboard/size')?'show':'')}}" id="size">
                      <a href="{{route('size.create')}}" class="ps-5 {{request()->is('dashboard/size/create')?'active':''}}">Add Brand</a>
                      <a href="{{route('size.index')}}" class="ps-5 {{request()->is('dashboard/size')?'active':''}}">Manage Brand</a>
                    </div>
                </div>
            @endif


            <a href="#" class="{{request()->is('profile')?'active':''}}">Profile</a>
            <a href="#" class="{{request()->is('ads')?'active':''}}">Publish ads</a>
            <a href="#" class="{{request()->is('ads/create')?'active':''}}">Create ads</a>
            <a href="#" class="{{request()->is('ads/pending')?'active':''}}">Pending ads</a>
            <a href="#" class="{{request()->is('my-saved-ad')?'active':''}}">Saved Advertisement</a>
            <a href="#" class="{{request()->is('messages')?'active':''}}">Message</a>
        </div>
    </div>
</div>

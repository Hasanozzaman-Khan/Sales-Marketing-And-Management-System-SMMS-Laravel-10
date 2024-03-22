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
                    <a href="{{route('dashboard.index')}}" class="@yield('dashboard-active')">Dashboard</a>
                </div>

                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#product" role="button" aria-expanded="@yield('product-expend')" aria-controls="product">
                      Product
                    </a>
                    <div class="collapse @yield('product-expend-show')" id="product">
                      <a href="{{route('product.create')}}" class="ps-5 @yield('create-product-active')">Add Product</a>
                      <a href="{{route('product.index')}}" class="ps-5 @yield('manage-product-active')">Manage Product</a>
                    </div>
                </div>

            @endif

            @if(auth()->user()->comp_id == 1)
                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#employee" role="button" aria-expanded="@yield('employee-expend')" aria-controls="employee">
                      Employee
                    </a>
                    <div class="collapse @yield('employee-expend-show')" id="employee">
                      <a href="{{route('employee.pending')}}" class="ps-5 @yield('create-employee-active')">Add Employee</a>
                      <a href="{{route('employee.index')}}" class="ps-5 @yield('manage-employee-active')">Manage Employee</a>
                    </div>
                </div>
            @endif

            @if(auth()->user()->comp_id == 1 || auth()->user()->comp_id == 2)
                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#brand" role="button" aria-expanded="@yield('brand-expend')" aria-controls="brand">
                      Brand
                    </a>
                    <div class="collapse  @yield('brand-expend-show')" id="brand">
                      <a href="{{route('brand.create')}}" class="ps-5 @yield('create-brand-active')">Add Brand</a>
                      <a href="{{route('brand.index')}}" class="ps-5 @yield('manage-brand-active')">Manage Brand</a>
                    </div>
                </div>

                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#category" role="button" aria-expanded="@yield('category-expend')" aria-controls="category">
                      Category
                    </a>
                    <div class="collapse  @yield('category-expend-show')" id="category">
                      <a href="{{route('category.create')}}" class="ps-5 @yield('create-category-active')">Add Category</a>
                      <a href="{{route('category.index')}}" class="ps-5  @yield('manage-category-active')">Manage Category</a>
                    </div>
                </div>

                <div class="">
                    <a class="" data-bs-toggle="collapse" href="#size" role="button" aria-expanded="@yield('size-expend')" aria-controls="size">
                      Size
                    </a>
                    <div class="collapse @yield('size-expend-show')" id="size">
                      <a href="{{route('size.create')}}" class="ps-5 @yield('create-size-active')">Add Size</a>
                      <a href="{{route('size.index')}}" class="ps-5 @yield('manage-size-active')">Manage Size</a>
                    </div>
                </div>
            @endif

            <a href="#" class="{{request()->is('messages')?'active':''}}">Message</a>

        </div>
    </div>
</div>

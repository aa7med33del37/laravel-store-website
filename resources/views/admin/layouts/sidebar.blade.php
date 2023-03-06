<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="mdi mdi-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/orders') }}">
            <i class="mdi mdi-pocket menu-icon"></i>
            <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-category" aria-expanded="false" aria-controls="ui-category">
            <i class="mdi mdi-dns menu-icon"></i>
            <span class="menu-title">Category</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.create') }}">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">View Categories</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
            <i class="mdi mdi-tshirt-crew menu-icon"></i>
            <span class="menu-title">Product</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.create') }}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">View Prodiuct</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-brand" aria-expanded="false" aria-controls="ui-brand">
            <i class="mdi mdi-puzzle menu-icon"></i>
            <span class="menu-title">Brands</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-brand">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('brands.create') }}">Add Brand</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('brands.index') }}">View Brand</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-color" aria-expanded="false" aria-controls="ui-color">
            <i class="mdi mdi-leaf menu-icon"></i>
            <span class="menu-title">Colors</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-color">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('colors.create') }}">Add Color</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('colors.index') }}">View Colors</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-slider" aria-expanded="false" aria-controls="ui-slider">
            <i class="mdi mdi-image-area menu-icon"></i>
            <span class="menu-title">Home Sliders</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-slider">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sliders.create') }}">Add Slider</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sliders.index') }}">View Sliders</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/users')}}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('site_settings') }}">
            <i class="mdi mdi-lead-pencil menu-icon"></i>
            <span class="menu-title">Site Setting</span>
            </a>
        </li>
    </ul>
</nav>

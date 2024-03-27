<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/user/{{Auth::user()->id}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">

                @if(Auth::user()->image != null)
                            <img src="{{Auth::user()->image}}" class="rounded-circle" style="width: 50px;height: 50px">
                        @else
                            <img src="/cms/user/defaultimage.png" class="rounded-circle" style="width: 50px;height: 50px">
                        @endif
                        <strong>{{ Auth::user()->name }}</strong>
                    </span>
                </a>

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">


                    <li>
                        <a href="/dashboard" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                    </li>

                    <li>
                        <a href="/user" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">User Module</span></a>
                    </li>

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Pages--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="/slug">Slug page</a>--}}
{{--                            <a class="dropdown-item" href="/category">Category</a>--}}
{{--                            <a class="dropdown-item" href="/author">Author</a>--}}

{{--                        </div>--}}
{{--                    </li>--}}
                    <li>
                        <a href="/category" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Category</span></a>
                    </li>

                    <li>
                        <a href="/author" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Author</span></a>
                    </li>

                    <li>
                        <a href="/tag" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Tags</span></a>
                    </li>

                    <li>
                        <a href="/post" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Posts</span></a>
                    </li>

{{--                    <li>--}}
{{--                        <a href="/customer" class="nav-link">--}}
{{--                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Customer</span></a>--}}
{{--                    </li>--}}

                    <li>
                        <a href="/image" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Javascript Module</span></a>
                    </li>

                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                    <li>
                        <a href="/role" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Role</span></a>
                    </li>
                    @endif

                    <li>
                        <a href="/opinion" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Dynamic Form</span></a>
                    </li>

{{--                    <li>--}}
{{--                        <a href="/secondopinion" class="nav-link">--}}
{{--                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Second Opinion</span></a>--}}
{{--                    </li>--}}

                    <li>
                        <a href="/advertisement" class="nav-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Advertisement</span></a>
                    </li>

                </ul>

            </div>
        </div>

        <main class="py-4">

            @yield('content')
        </main>
    </div>
</div>


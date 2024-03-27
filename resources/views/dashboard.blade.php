@extends('layouts.navbar')

@section('content')

<div class="d-flex pb-4 pl-5">
    <h1>Dashboard</h1>
{{--    <form class="form-inline ml-3">--}}
{{--        <div class="input-group input-group-sm">--}}
{{--            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-navbar" type="submit">--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
</div>


    <div class="row">
        <div class="col-lg-12 pl-5 pb-3">
            <div class="card">
                <div class="card-header">
                    <a href="/user">  Users</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-6">

                            <div class="description-block border-right">
                                <img src="/cms/dashboard/user.png" style="width: 90px;height: 100px">

                                <h5 class="description-header">{{count($users)}}</h5>
                                <span class="description-text">TOTAL Users</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 col-6">


                            <div class="description-block border-right">
                                <img src="/cms/dashboard/active.png" style="width: 100px;height: 100px">

                                <h5 class="description-header">{{count($activeusers)}}</h5>
                                <span class="description-text">Active Users</span>
{{--                                <h5 class="description-header">{{count($activeadmins)}}</h5>--}}
{{--                                <span class="description-text">Active Admins</span>--}}
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 col-6">

                            <div class="description-block border-right">
                                <img src="/cms/dashboard/inactive.png" style="width: 100px;height: 100px">
                                <h5 class="description-header">{{count($inactiveusers)}}</h5>
                                <span class="description-text">Inactive Users</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        @can('create', \App\User::class)

                        <div class="col-sm-3 col-6">
                            <a href="/user/create">
                            <img src="/cms/dashboard/add.png" style="width: 100px;height: 100px">

                            <div class="description-block">
                                <br>
                                <span class="description-text">Add Users</span>

                            </div>
                            </a>
                            <!-- /.description-block -->
                        </div>
                        @endcan
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

{{--        Category--}}
    </div><div class="row">
        <div class="col-lg-12 pl-5 pb-3">
            <div class="card">
                <div class="card-header">
                    <a href="/category">Category</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($categories)}}</h5>
                                <span class="description-text">TOTAL CATEGORIES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($publishedcategories)}}</h5>
                                <span class="description-text">PUBLISHED CATEGORIES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($unpublishedcategories)}}</h5>
                                <span class="description-text">UNPUBLISHED CATEGORIES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        @can('create', \App\Category::class)

                        <div class="col-sm-3 col-6">
                            <a href="/category/create">

                            <img src="/cms/dashboard/addbutton.png" style="width: 75px;height: 75px">

                            <div class="description-block">
                                    <span class="description-text">Add Category</span>
                            </div>
                            </a>

                        </div>
                          @endcan
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div><div class="row">
        <div class="col-lg-12 pl-5 pb-3">
            <div class="card">
                <div class="card-header">
                    <a href="/author">Authors</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($authors)}}</h5>
                                <span class="description-text">TOTAL AUTHORS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($publishedauthors)}}</h5>
                                <span class="description-text">Published Authors</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($unpublishedauthors)}}</h5>
                                <span class="description-text">Unpublished Authors</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        @can('create', \App\Author::class)

                        <div class="col-sm-3 col-6">
                            <a href="/author/create">

                                <img src="/cms/dashboard/addbutton.png" style="width: 75px;height: 75px">

                                <div class="description-block">
                                    <span class="description-text">Add Author</span>
                                </div>
                            </a>

                        </div>
                        @endcan

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div><div class="row">
        <div class="col-lg-12 pl-5 pb-3">
            <div class="card">
                <div class="card-header">
                    <a href="/post">Posts</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($posts)}}</h5>
                                <span class="description-text">Total Posts</span>
                            </div>
                            <!-- /.description-block -->
                        </div>


                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($publishedposts)}}</h5>
                                <span class="description-text">Published Posts</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{count($unpublishedposts)}}</h5>
                                <span class="description-text">Unpublished Posts</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        @can('create', \App\Post::class)
                        <div class="col-sm-3 col-6">
                            <a href="/category/post">

                                <img src="/cms/dashboard/addbutton.png" style="width: 75px;height: 75px">

                                <div class="description-block">
                                    <span class="description-text">Add Post</span>
                                </div>
                            </a>

                        </div>
                        @endcan
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
@endsection
